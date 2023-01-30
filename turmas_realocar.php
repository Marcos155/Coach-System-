<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];

    $sqlselect2 = "SELECT * FROM cadastro  WHERE cod='$cod'";
    $result2 = $conexao_forms15->query($sqlselect2);

    $sqlselect3 = "SELECT * FROM meta_saude  WHERE cod='$cod'";
    $result3 = $conexao_forms15->query($sqlselect3);

    $sqlselect4 = "SELECT * FROM meta_relacionamento  WHERE cod='$cod'";
    $result4 = $conexao_forms15->query($sqlselect4);

    $sqlselect5 = "SELECT * FROM meta_trabalho  WHERE cod='$cod'";
    $result5 = $conexao_forms15->query($sqlselect5);

    $sqlselect6 = "SELECT * FROM meta_dinheiro  WHERE cod='$cod'";
    $result6 = $conexao_forms15->query($sqlselect6);

    $sqlselect7 = "SELECT * FROM meta_outro  WHERE cod='$cod'";
    $result7 = $conexao_forms15->query($sqlselect7);


    if($result2->num_rows > 0)
    {
        $sqlupdate="UPDATE cadastro SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

    if($result3->num_rows > 0)
    {
        $sqlupdate="UPDATE meta_saude SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

    if($result4->num_rows > 0)
    {
        $sqlupdate="UPDATE meta_relacionamento SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

    if($result5->num_rows > 0)
    {
        $sqlupdate="UPDATE meta_trabalho SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

    if($result6->num_rows > 0)
    {
        $sqlupdate="UPDATE meta_dinheiro SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

    if($result7->num_rows > 0)
    {
        $sqlupdate="UPDATE meta_outro SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

  }
  
  header('Location: turmas.php');

 ?> 