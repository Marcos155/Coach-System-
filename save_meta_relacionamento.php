<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $meta= $_POST['meta'];
    
        $verifica_meta="SELECT meta FROM meta_relacionamento WHERE cod='$cod' ";
        $result_meta = $conexao_forms15->query($verifica_meta);


        if(empty($verifica_meta)){
        $sqlupdate = "UPDATE meta_relacionamento SET meta='$meta'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
        }
        else if(empty($verifica_meta2)){
            $sqlupdate = "UPDATE meta_relacionamento SET meta2='$meta'
            WHERE cod='$cod' ";
            $result2 = $conexao_forms15->query($sqlupdate);
        }
        
    }
    header('Location:coach_meta_relacionamento.php?cod='.$cod);
?>