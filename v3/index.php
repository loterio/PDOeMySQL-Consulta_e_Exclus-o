<!DOCTYPE html>
<?php 
  $text=isset($_POST['ask'])?$_POST['ask']:'';
  $esc=isset($_POST['op'])?$_POST['op']:'';
?>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>At-1</title>
</head>
<body>

<?php include 'navbar.php';?>

<form method="post">
  <input type="text" name='ask' value='<?php echo$text;?>' placeholder='Digite sua busca'>
  <input type="submit" value='send'><br>
  <input type="radio" name='op' value='ID' <?php if($esc=='ID')echo'checked';?>>ID
  <input type="radio" name='op' value='NM' <?php if($esc=='NM')echo'checked';?>>Nome
  <input type="radio" name='op' value='SG' <?php if($esc=='SG')echo'checked';?>>Sigla<br>
</form>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
    <th>Sigla</th>
    <th>Ação</th>
  </tr>
<?php
	try {
		include 'conexao.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($esc==='ID'){
      $consulta = $pdo->query("SELECT * FROM estado WHERE id LIKE'$text%' ORDER BY id;");
    }else if($esc==='NM'){
      $consulta = $pdo->query("SELECT * FROM estado WHERE nome LIKE'$text%' ORDER BY nome;");
    }else if($esc==='SG'){
      $consulta = $pdo->query("SELECT * FROM estado WHERE sigla LIKE'$text%' ORDER BY sigla;");
    }else{
      $consulta = $pdo->query("SELECT * FROM estado;");
    }

    if(isset($consulta)){
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <tr>
          <td>{$linha['id']}</td>
          <td>{$linha['nome']}</td> 
          <td>{$linha['sigla']}</td> 
          "; ?>  
          <td><a href="javascript:excluir('acao.php?id=<?php echo $linha['id']; ?>')" onclick='btn()'>excluir</a></td>
        </tr>
        <?php
      }
    }
	} catch(PDOException $e) {
		echo '<b>Error:</b> '.$e->getMessage();
  }  
?>
</table>

<script type='text/javascript'>
  function excluir(url){
    if (confirm("Confirmar exclusão?")){
      location.href = url;
    }
  }  
</script>
</body>
</html>
