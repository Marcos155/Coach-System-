<?php
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_obrigado_forms.css">
    <title>Formulário</title>
    <style>
        body{
           background-attachment: fixed;
           background-image: radial-gradient( #f6f5f7 35%,rgb(97, 97, 97));
        }
        .bem_vindo_texto{
            color:	#DC143C;
        }
    </style>
</head>
<body>
    <div class="conteudo">
        <div class="logado">
            <h1><?php echo $logado ?>,</h1>
        </div>
        <div class="bem_vindo">
            <h1 class="bem_vindo_texto">bem vindo ao time &#128513;</h1>
        </div>
        <br><br><br>
        <div class="conteudo2">
            <h3>Pronto para concluir seus objetivos?</h3>
        <br>
            <div class="botao">
                <a href="show_sistema_persona.php">
                    <button>começar</button>
                </a>
            </div>
        </div>
    </div> 
</body>
</html>