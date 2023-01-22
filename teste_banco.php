<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');
    $cod = $_GET['cod'];
    $cod2 = $cod;
    
    $select=strval("SELECT max(cod) FROM outro_12_meses");
    $result_select = $conexao_forms15->query($select);

    $set= "SET @count = $select ";
    $result_set = $conexao_forms15->query($set);
    
   $update="UPDATE outro_12_meses SET outro_12_meses.cod= @count + 1";
   $result_update = $conexao_forms15->query($update);
   
    
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
        echo $result_update;
        ?>
    </h1>
</body>
</html
