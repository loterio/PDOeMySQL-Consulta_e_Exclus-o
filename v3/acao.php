<?php

try {
  include 'conexao.php';
  $cod = isset($_GET['id']) ? $_GET['id'] : 0;
  // echo $cod;

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<script type='text/javascript'>

function btn(){
  decisao = confirm("Deseja mesmo excluir?");
  if (decisao){
    <?php 
      $esc = $pdo->query("DELETE FROM estado WHERE id = $cod;");
    ?>
  }else{
    <?php 
      $esc = $pdo->query("SELECT * FROM estado;");
    ?>
  }
}  

</script>
<?php  

} catch(PDOException $e) {
	echo '<b>Error:</b> '.$e->getMessage();
}  
  $consulta = $pdo->query("SELECT * FROM estado;");
  header('location:index.php');
?> 
