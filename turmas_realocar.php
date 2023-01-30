<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];

    $sqlselect2 = "SELECT * FROM cadastro  WHERE cod='$cod'";
    $result2 = $conexao_forms15->query($sqlselect2);

    if($result2->num_rows > 0)
    {
        $sqlupdate="UPDATE cadastro SET nome_turma='Turma Geral' WHERE cod='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

  }
  
  header('Location: turmas.php');

 ?> 