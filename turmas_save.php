<?php
  if(!empty($_GET['cod'])){
    include('config.php');
    $cod=$_GET['cod'];
    if(isset($_POST['adicionar'])){
      $nova_turma=$_POST['nome_turma'];
      $consulta_turma="UPDATE cadastro SET nome_turma=$nome_turma WHERE cod=$cod";
      $resultado=$conexao_forms15->query($consulta_turma);
      
    }
  }header('Location:turmas.php');
?>