<!DOCTYPE html>
<?php 
  $text=isset($_POST['ask'])?$_POST['ask']:'';
  $esc=isset($_POST['op'])?$_POST['op']:'';
?>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>At-5</title>
</head>
<body>

<?php include 'navbar.php';?>

<form method="post">
  <input type="text" name='ask' value='<?php echo$text;?>' placeholder='Digite sua busca'>
  <input type="submit" value='send'><br>
  <input type="radio" name='op' value='ID' <?php if($esc=='ID')echo'checked';?>>ID
  <input type="radio" name='op' value='NM' <?php if($esc=='NM')echo'checked';?>>Nome
  <input type="radio" name='op' value='NA' <?php if($esc=='NA')echo'checked';?>>Nº Andar<br>
</form>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
    <th>Nº Sala</th>
    <th>Nº Andar</th>
  </tr>
<?php
	try {
		include 'conexao.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($esc==='ID'){
      $consulta = $pdo->query("SELECT * FROM predio WHERE cod LIKE'$text%' ORDER BY cod;");
    }else if($esc==='NM'){
      $consulta = $pdo->query("SELECT * FROM predio WHERE nome LIKE'$text%' ORDER BY nome;");
    }else if($esc==='NA'){
      $consulta = $pdo->query("SELECT * FROM predio WHERE nAndar LIKE'$text%' ORDER BY nAndar;");
    }else{
      $consulta = $pdo->query("SELECT * FROM predio;");
    }

    if(isset($consulta)){
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <tr>
          <td>{$linha['cod']}</td>
          <td>{$linha['nome']}</td>
          <td>{$linha['nSala']}</td> 
          <td>{$linha['nAndar']}</td> 
          "; ?>  
          <td><a href="javascript:excluir('acao.php?id=<?php echo $linha['cod']; ?>')" onclick='btn()'>excluir</a></td>
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
