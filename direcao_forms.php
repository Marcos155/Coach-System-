<?php
session_start();
include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location:entrar.php');
  }
  $logado = $_SESSION['email'];

if (isset($_POST['submit'])) {

/* formulário 15 anos */
include_once('config.php');
  $saude= $_POST['saude'];
  $relacionamento= $_POST['relacionamento'];
  $financeiro= $_POST['financeiro'];
  $espiritual= $_POST['espiritual'];
  $outro= $_POST['outro'];
$result= mysqli_query($conexao_forms15,"UPDATE formulario_15_anos SET saude='$saude',relacionamento='$relacionamento',financeiro='$financeiro',espiritual='$espiritual',outro='$outro' 
WHERE formulario_15_anos.email='$logado'"); 
header('formulario_part2.php');
}
header('Location: formulario_part2.php');
?>