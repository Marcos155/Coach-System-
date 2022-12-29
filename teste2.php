<?php
    session_start();
//    print_r($_REQUEST);
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
{
    // acessa
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM cadastro WHERE email = '$email' and senha = '$senha'";
    $result = $conexao_regis->query($sql);
   /* 
    if($email=='adm@gmail.com' && $senha=='123456'){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:sistema.php');

    }
    else{
        if(mysqli_num_rows($result)<1)
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location:entrar.php');
    } else
    {   
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:formulario.php');
    } }*/

    
    if($email=='adm@gmail.com' && $senha=='123456'){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:sistema.php');

    }
    else{
        if($email=='adm@gmail.com' && $senha=='123456')
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:entrar.php');

    } else
    {   
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:formulario.php');
    } }
    
   
}
else
{
    // não acessa
    header('Location: entrar.php');
}
?>