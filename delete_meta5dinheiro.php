<?php

  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];
    $meta= $_POST['meta'];


    $sqlupdate = "UPDATE meta_dinheiro SET meta5= NULL
    WHERE cod='$cod' ";
    $result2 = $conexao_forms15->query($sqlupdate);
  
  }
  
  header('Location:coach_meta_dinheiro.php?cod='.$cod);

 ?> 