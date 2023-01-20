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

/* saúde */
include_once('config.php');
$oque= $_POST['oque'];
$porquem= $_POST['porquem'];
$onde= $_POST['onde'];
$quando= $_POST['quando'];
$porque= $_POST['porque'];
$como= $_POST['como'];
$objet= $_POST['objet'];
$opcao= $_POST['opcao'];
$responsa=$_POST['responsa'];
$data_inicio= $_POST['data_inicio'];
$data_fim= $_POST['data_fim'];
$obs= $_POST['obs'];

$resultSaude= mysqli_query($conexao_forms15,"UPDATE saude_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',
objet='$objet',opcao='$opcao',responsa='$responsa',data_inicio='$data_inicio',data_fim='$data_fim',obs='$obs'
WHERE saude_12_meses.email='$logado'"); 

  /* relacionamento */
  include_once('config.php');
  $oque= $_POST['oque'];
  $porquem= $_POST['porquem'];
  $onde= $_POST['onde'];
  $quando= $_POST['quando'];
  $porque= $_POST['porque'];
  $como= $_POST['como'];
  $objet= $_POST['objet'];
  $opcao= $_POST['opcao'];
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"UPDATE relacionamento_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',
  objet='$objet',opcao='$opcao',responsa='$responsa',data_inicio='$data_inicio',data_fim='$data_fim',obs='$obs'
  WHERE relacionamento_12_meses.email='$logado'"); 

  /* trabalho */
  include_once('config.php');
  $oque= $_POST['oque'];
  $porquem= $_POST['porquem'];
  $onde= $_POST['onde'];
  $quando= $_POST['quando'];
  $porque= $_POST['porque'];
  $como= $_POST['como'];

  $objet= $_POST['objet'];
  $opcao= $_POST['opcao'];
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"UPDATE trabalho_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',
  objet='$objet',opcao='$opcao',responsa='$responsa',data_inicio='$data_inicio',data_fim='$data_fim',obs='$obs'
  WHERE trabalho_12_meses.email='$logado'"); 

/* dinheiro */
include_once('config.php');
  $oque= $_POST['oque'];
  $porquem= $_POST['porquem'];
  $onde= $_POST['onde'];
  $quando= $_POST['quando'];
  $porque= $_POST['porque'];
  $como= $_POST['como'];
  $objet= $_POST['objet'];
  $opcao= $_POST['opcao'];
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"UPDATE dinheiro_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',
  objet='$objet',opcao='$opcao',responsa='$responsa',data_inicio='$data_inicio',data_fim='$data_fim',obs='$obs'
  WHERE dinheiro_12_meses.email='$logado'"); 

/* outro */
include_once('config.php');
$oque= $_POST['oque'];
$porquem= $_POST['porquem'];
$onde= $_POST['onde'];
$quando= $_POST['quando'];
$porque= $_POST['porque'];
$como= $_POST['como'];
$objet= $_POST['objet'];
$opcao= $_POST['opcao'];
$responsa=$_POST['responsa'];
$data_inicio= $_POST['data_inicio'];
$data_fim= $_POST['data_fim'];
$obs= $_POST['obs'];
$resultSaude= mysqli_query($conexao_forms15,"UPDATE outro_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',
objet='$objet',opcao='$opcao',responsa='$responsa',data_inicio='$data_inicio',data_fim='$data_fim',obs='$obs'
WHERE outro_12_meses.email='$logado'"); 
}
header('Location: obrigado_forms.php');
?>