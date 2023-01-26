<?php
  if(!empty($_GET['cod_turma']))
  { 
    include_once('config.php');

    $cod = $_GET['cod_turma'];
    $sqlselect = "SELECT * FROM turmas  WHERE cod_turma=$cod";
    $result = $conexao_forms15->query($sqlselect);

    $sqlselect2 = "SELECT * FROM cadastro  WHERE cod_turma=$cod";
    $result2 = $conexao_forms15->query($sqlselect2);

    if($result->num_rows > 0)
    {
       $sqldelete="DELETE FROM turmas WHERE cod_turma=$cod";
       $resultdelete = $conexao_forms15->query($sqldelete);
    }

    if($result2->num_rows > 0)
    {
        $sqlupdate="UPDATE cadastro SET cod_turma=10, nome_turma='Turma Geral' WHERE cod_turma=$cod";
        $resultupdate = $conexao_forms15->query($sqlupdate);
    }

  }
  
  header('Location: turmas.php');

 ?> 