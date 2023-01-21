<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');
    $cod = $_GET['cod'];
    $cod2 = $cod;

    
    $sqlselect5 = "SELECT * FROM dinheiro_12_meses  WHERE cod=$cod2";
    $result5 = $conexao_forms15->query($sqlselect5);

    if($result5->num_rows > 0)
    {
       /*$sqldelete="DELETE FROM dinheiro_12_meses WHERE cod=$cod2";
       $resultdelete = $conexao_forms15->query($sqldelete);*/


       $max_cod= "SELECT max(cod) FROM dinheiro_12_meses";
       $result_max_cod = $conexao_forms15->query($max_cod);
     /*
       $troca_cod=" ALTER TABLE dinheiro_12_meses SET cod=$cod2 WHERE cod=$max_cod";
       $result_troca_cod = $conexao_forms15->query($troca_cod);
      
       $reiniciar="ALTER TABLE dinheiro_12_meses AUTO_INCREMENT= $result_troca_cod+1";
       $result_reiniciar = $conexao_forms15->query($reiniciar);*/
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php 
        echo $result_max_cod;
        ?>
    </h1>
</body>
</html>
