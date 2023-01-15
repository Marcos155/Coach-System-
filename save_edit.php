<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $nome= $_POST['username'];
        $email= $_POST['email'];
        $telefone= $_POST['phone'];
        $cidade=$_POST['cidade'];
        $estado=$_POST['estado']; 
        $mot_edit=$_POST['mot_edit'];

        $sqlupdate = "UPDATE formulario_15_anos SET saude='$nome',relacionamento='$email',financeiro='$telefone',espiritual='$cidade',outro='$estado',mot_edit='$mot_edit'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: show_sistema_persona.php');
?>