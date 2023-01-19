<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $feitoRelacionamento= $_POST['feito'];

        $sqlupdate = "UPDATE meta_relacionamento SET feito='$feitoRelacionamento'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
        
    }
    header('Location: meta.php');
?>