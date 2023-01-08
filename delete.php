<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario_15_anos WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);

    if($result->num_rows > 0)
    {
       $sqldelete="DELETE FROM formulario_15_anos WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    //cadastro
    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM cadastro WHERE cod=$cod";
    $result2 = $conexao_regis->query($sqlselect);

    $sqlselect2 = "SELECT * FROM formulario_15_anos WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);

    if($result2->num_rows > 0)
    {
       $sqldelete="DELETE FROM cadastro WHERE cod=$cod";
       $resultdelete = $conexao_regis->query($sqldelete);

       $sqldelete2="DELETE FROM formulario_15_anos WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }
  }
  
  header('Location: sistema.php');

 ?> 