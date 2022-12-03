<?php
    //cadastro
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $nome= $_POST['username'];
        $email= $_POST['email'];
        $senha=$_POST['password'];
        $telefone= $_POST['phone'];
        $sexo= $_POST['sexo']; 

        $sqlupdate = "UPDATE cadastro SET nome='$nome',email='$email',senha='$senha',telefone='$telefone',senha='$senha'
        WHERE cod='$cod' ";
        $result2 = $conexao_regis->query($sqlupdate);
    }
    header('Location: sistema.php');
?>