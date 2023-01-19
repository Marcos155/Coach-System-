<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario_15_anos  WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);

    $sqlselect2 = "SELECT * FROM saude_12_meses  WHERE cod=$cod";
    $result2 = $conexao_forms15->query($sqlselect2);

    $sqlselect3 = "SELECT * FROM relacionamento_12_meses  WHERE cod=$cod";
    $result3 = $conexao_forms15->query($sqlselect3);

    $sqlselect4= "SELECT * FROM trabalho_12_meses  WHERE cod=$cod";
    $result4 = $conexao_forms15->query($sqlselect4);

    $sqlselect5 = "SELECT * FROM dinheiro_12_meses  WHERE cod=$cod";
    $result5 = $conexao_forms15->query($sqlselect5);

    $sqlselect6 = "SELECT * FROM outro_12_meses  WHERE cod=$cod";
    $result6 = $conexao_forms15->query($sqlselect6);

    $sqlselect7 = "SELECT * FROM cadastro  WHERE cod=$cod";
    $result7 = $conexao_forms15->query($sqlselect7);

    $sqlselect8 = "SELECT * FROM meta_relacionamento WHERE cod=$cod";
    $result8 = $conexao_forms15->query($sqlselect7);


    if($result->num_rows > 0)
    {
       $sqldelete="DELETE FROM formulario_15_anos WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result2->num_rows > 0)
    {
       $sqldelete="DELETE FROM saude_12_meses WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result3->num_rows > 0)
    {
       $sqldelete="DELETE FROM relacionamento_12_meses WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result4->num_rows > 0)
    {
       $sqldelete="DELETE FROM trabalho_12_meses WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result5->num_rows > 0)
    {
       $sqldelete="DELETE FROM dinheiro_12_meses WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result6->num_rows > 0)
    {
       $sqldelete="DELETE FROM outro_12_meses WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result7->num_rows > 0)
    {
       $sqldelete="DELETE FROM cadastro WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result8->num_rows > 0)
    {
       $sqldelete="DELETE FROM meta_relacionamento WHERE cod=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    //cadastro
    /*$cod = $_GET['cod'];
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
    }*/
  }
  
  header('Location: sistema.php');

 ?> 