<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $nome= $_POST['username'];
        $email= $_POST['email'];
        $senha=$_POST['password'];
        $telefone= $_POST['phone'];
        $sexo= $_POST['sexo']; 
        $cidade=$_POST['cidade'];
        $estado=$_POST['estado']; 

        $sqlupdate = "UPDATE cadastro SET nome='$nome',email='$email',senha='$senha',telefone='$telefone',sexo='$sexo',cidade='$cidade',estado='$estado'
        WHERE cod='$cod' ";
        $result2 = $conexao_regis->query($sqlupdate);
    }
    header('Location: show_sistema_persona.php');
?>