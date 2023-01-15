<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $nome= $_POST['nome'];
        $sobrenome= $_POST['sobrenome'];
        $email= $_POST['email'];
        $saude= $_POST['saude'];
        $relacionamento= $_POST['relacionamento'];
        $financeiro= $_POST['financeiro'];
        $espiritual= $_POST['espiritual'];
        $outro= $_POST['outro'];
        $mot_edit= $_POST['mot_edit'];
        $obs_andre=$_POST['obs_andre'];

        $sqlupdate = "UPDATE formulario_15_anos SET nome='$nome',sobrenome='$sobrenome',email='$email',saude='$saude',relacionamento='$relacionamento',financeiro='$financeiro', espiritual='$espiritual'
        , outro='$outro', mot_edit='$mot_edit', obs_andre='$obs_andre'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: sistema_coach_forms.php');

?>