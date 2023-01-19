<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $meta= $_POST['meta'];
    

        $sqlupdate = "UPDATE meta_dinheiro SET meta='$meta'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location:coach_meta_dinheiro.php?cod='.$cod);
?>