<!DOCTYPE html>
<?php 
  $text=isset($_POST['ask'])?$_POST['ask']:'';
  $esc=isset($_POST['op'])?$_POST['op']:'';
?>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>At-2</title>
</head>
<body>

<?php include 'navbar.php';?>

<form method="post">
  <input type="text" name='ask' value='<?php echo$text;?>' placeholder='Digite sua busca'>
  <input type="submit" value='send'><br>
  <input type="radio" name='op' value='ID' <?php if($esc=='ID')echo'checked';?>>ID
  <input type="radio" name='op' value='NM' <?php if($esc=='NM')echo'checked';?>>Nome
  <input type="radio" name='op' value='NP' <?php if($esc=='NP')echo'checked';?>>Número de praticantes<br>
</form>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
		<th>Número de<br>
		Praticantes(milhões)</th>
    <th>Ação</th>
  </tr>
<?php
	try {
		include 'conexao.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($esc==='ID'){
      $consulta = $pdo->query("SELECT * FROM esporte WHERE cod LIKE'$text%' ORDER BY cod;");
    }else if($esc==='NM'){
      $consulta = $pdo->query("SELECT * FROM esporte WHERE nome LIKE'$text%' ORDER BY nome;");
    }else if($esc==='NP'){
      $consulta = $pdo->query("SELECT * FROM esporte WHERE nPraticantes >= $text ORDER BY nPraticantes;");
    }else{
      $consulta = $pdo->query("SELECT * FROM esporte;");
    }

    if(isset($consulta)){
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <tr>
          <td>{$linha['cod']}</td>
          <td>{$linha['nome']}</td> 
          <td>{$linha['nPraticantes']}</td> 
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
