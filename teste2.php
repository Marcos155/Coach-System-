<?php
session_start();
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
{
    // acessa
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM cadastro WHERE email = '$email' and senha = '$senha'";
    $result=$conexao_forms15->query($sql);

    $sql_adm="SELECT cod FROM cadastro WHERE email = '$email' and senha = '$senha'";
    $result_adm=$conexao_forms15->query($sql_adm);
    $cod_adm=mysqli_fetch_assoc($result_adm);
    
    if($cod_adm['cod']=='1'){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:sistema.php');

    }
    else{
        if($cod_adm['cod']=='1')
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location:entrar.php');

    } else
    {   
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        /*header('Location:formulario.php');*/
        header('Location:show_sistema_persona.php');
    } }
    
   
}
else
{
    // não acessa
    header('Location: entrar.php');
}
?>