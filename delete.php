<?php
  if(!empty($_GET['cod']))
  {
 
    
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario WHERE cod=$cod";
    $result = $conexao_forms->query($sqlselect);

    if($result->num_rows > 0)
    {
       $sqldelete="DELETE FROM formulario WHERE cod=$cod";
       $resultdelete = $conexao_forms->query($sqldelete);
    }
  }
  header('Location: sistema.php');

 ?> 