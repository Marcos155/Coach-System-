<?php
  if(!empty($_GET['nome_turma']))
  { 
    include_once('config.php');

    $cod = $_GET['nome_turma'];

    $sqlselect2 = "SELECT * FROM cadastro  WHERE nome_turma='$cod'";
    $result2 = $conexao_forms15->query($sqlselect2);

    if($result2->num_rows > 0)
    {
        $sqlupdate="UPDATE cadastro SET nome_turma='Turma Geral' WHERE nome_turma='$cod'";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

  }
  
  header('Location: turmas.php');

 ?> 