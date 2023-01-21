<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $meta= $_POST['meta1'];
    
        $verifica_meta1= "SELECT meta1 FROM meta_relacionamento WHERE cod='$cod'";
        $result_meta = $conexao_forms15->query($verifica_meta1);


        
        $sqlupdate = "UPDATE meta_relacionamento SET meta1='$meta' 
        WHERE cod='$cod' ";
        $result = $conexao_forms15->query($sqlupdate);
        
        
        
        
        
    }
    header('Location:coach_meta_relacionamento.php?cod='.$cod);
?>