<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $nome=$_POST['nome'];

        $sqlupdate = "UPDATE meta_saude SET nome='$nome'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: sistema_coach_forms.php');
?>