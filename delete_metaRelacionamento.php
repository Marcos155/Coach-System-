<?php

  if(!empty($_GET['cod']))
  { 
    include_once('config.php');

    $cod = $_GET['cod'];
    $meta= $_POST['meta1'];


    $sqlupdate = "UPDATE meta_relacionamento SET meta1= NULL
    WHERE cod='$cod' ";
    $result2 = $conexao_forms15->query($sqlupdate);
  
  }
  
  header('Location:coach_meta_relacionamento.php?cod='.$cod);

 ?> 