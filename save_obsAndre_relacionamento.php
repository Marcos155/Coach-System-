<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        
        $obs_andre=$_POST['obs_andre'];

        $sqlupdate = "UPDATE relacionamento_12_meses SET obs_andre='$obs_andre'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: sistema_coach_forms.php');
?>