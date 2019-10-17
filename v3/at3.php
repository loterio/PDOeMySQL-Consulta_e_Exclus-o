<!DOCTYPE html>
<?php 
  $text=isset($_POST['ask'])?$_POST['ask']:'';
  $esc=isset($_POST['op'])?$_POST['op']:'';
?>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>At-3</title>
</head>
<body>

<?php include 'navbar.php';?>

<form method="post">
  <input type="text" name='ask' value='<?php echo$text;?>' placeholder='Digite sua busca'>
  <input type="submit" value='send'><br>
  <input type="radio" name='op' value='ID' <?php if($esc=='ID')echo'checked';?>>ID
  <input type="radio" name='op' value='FB' <?php if($esc=='FB')echo'checked';?>>Fabricante
  <input type="radio" name='op' value='MM' <?php if($esc=='MM')echo'checked';?>>Memoria<br>
</form>

<table>
  <tr>
    <th>Código</th>
    <th>Fabricante</th>
		<th>Processador</th>
		<th>RAM(GB)</th>
		<th>HD(GB)</th>
    <th>Ação</th>
  </tr>
<?php
	try {
		include 'conexao.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($esc==='ID'){
      $consulta = $pdo->query("SELECT * FROM computador WHERE cod LIKE'$text%' ORDER BY cod;");
    }else if($esc==='FB'){
      $consulta = $pdo->query("SELECT * FROM computador WHERE fabricante LIKE'$text%' ORDER BY fabricante;");
    }else if($esc==='MM'){
      $consulta = $pdo->query("SELECT * FROM computador WHERE memoria >= $text ORDER BY memoria;");
    }else{
      $consulta = $pdo->query("SELECT * FROM computador;");
    }

    if(isset($consulta)){
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <tr>
          <td>{$linha['cod']}</td>
          <td>{$linha['fabricante']}</td>
          <td>{$linha['processador']}</td>
					<td>{$linha['memoria']}</td>
          <td>{$linha['hd']}</td> 
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
