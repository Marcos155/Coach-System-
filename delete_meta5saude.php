<?php

  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];


    $sqlupdate = "UPDATE meta_saude SET meta5= NULL
    WHERE cod='$cod' ";
    $result2 = $conexao_forms15->query($sqlupdate);
  
  }
  
  header('Location:coach_meta_saude.php?cod='.$cod);

 ?> 