<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $meta= $_POST['meta'];
    

        $sqlupdate = "UPDATE meta_outro SET meta='$meta'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location:coach_meta_outro.php?cod='.$cod);
?>