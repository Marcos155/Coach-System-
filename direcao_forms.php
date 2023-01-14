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
  $nome= $_POST['nome'];
  $sobrenome= $_POST['sobrenome'];
  $email= $_POST['email'];
  $saude= $_POST['saude'];
  $relacionamento= $_POST['relacionamento'];
  $financeiro= $_POST['financeiro'];
  $espiritual= $_POST['espiritual'];
  $outro= $_POST['outro'];
$result= mysqli_query($conexao_forms15,"INSERT INTO formulario_15_anos(nome,sobrenome,email,saude,relacionamento,financeiro,espiritual,outro) 
VALUES ('$nome','$sobrenome','$email','$saude','$relacionamento','$financeiro','$espiritual','$outro')"); 
header('obrigado_forms.php');

/* saúde */
include_once('config.php');
$oque= $_POST['oque'];
$porquem= $_POST['porquem'];
$onde= $_POST['onde'];
$quando= $_POST['quando'];
$porque= $_POST['porque'];
$como= $_POST['como'];
$nome= $_POST['nome'];
$sobrenome= $_POST['sobrenome'];
$objet= $_POST['objet'];
$opcao= $_POST['opcao'];
$responsa=$_POST['responsa'];
$data_inicio= $_POST['data_inicio'];
$data_fim= $_POST['data_fim'];
$obs= $_POST['obs'];

$resultSaude= mysqli_query($conexao_formsSaude,"INSERT INTO saude_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs) 
VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs')"); 
header('obrigado_forms.php');

  /* relacionamento */
  include_once('config.php');
  $oque= $_POST['oque'];
  $porquem= $_POST['porquem'];
  $onde= $_POST['onde'];
  $quando= $_POST['quando'];
  $porque= $_POST['porque'];
  $como= $_POST['como'];
  $nome= $_POST['nome'];
  $sobrenome= $_POST['sobrenome'];
  $objet= $_POST['objet'];
  $opcao= $_POST['opcao'];
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO relacionamento_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs) 
  VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs')"); 
  header('obrigado_forms.php');

  /* trabalho */
  include_once('config.php');
  $oque= $_POST['oque'];
  $porquem= $_POST['porquem'];
  $onde= $_POST['onde'];
  $quando= $_POST['quando'];
  $porque= $_POST['porque'];
  $como= $_POST['como'];
  $nome= $_POST['nome'];
  $sobrenome= $_POST['sobrenome'];
  $objet= $_POST['objet'];
  $opcao= $_POST['opcao'];
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO trabalho_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs) 
  VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs')"); 
  header('obrigado_forms.php');

/* dinheiro */
include_once('config.php');
  $oque= $_POST['oque'];
  $porquem= $_POST['porquem'];
  $onde= $_POST['onde'];
  $quando= $_POST['quando'];
  $porque= $_POST['porque'];
  $como= $_POST['como'];
  $nome= $_POST['nome'];
  $sobrenome= $_POST['sobrenome'];
  $objet= $_POST['objet'];
  $opcao= $_POST['opcao'];
  $responsa=$_POST['responsa'];
  $data_inicio= $_POST['data_inicio'];
  $data_fim= $_POST['data_fim'];
  $obs= $_POST['obs'];
  $resultSaude= mysqli_query($conexao_forms15,"INSERT INTO dinheiro_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs) 
  VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs')"); 
  header('obrigado_forms.php');

/* outro */
include_once('config.php');
$oque= $_POST['oque'];
$porquem= $_POST['porquem'];
$onde= $_POST['onde'];
$quando= $_POST['quando'];
$porque= $_POST['porque'];
$como= $_POST['como'];
$nome= $_POST['nome'];
$sobrenome= $_POST['sobrenome'];
$objet= $_POST['objet'];
$opcao= $_POST['opcao'];
$responsa=$_POST['responsa'];
$data_inicio= $_POST['data_inicio'];
$data_fim= $_POST['data_fim'];
$obs= $_POST['obs'];
$resultSaude= mysqli_query($conexao_forms15,"INSERT INTO outro_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs) 
VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs')"); 
header('obrigado_forms.php');
}
header('Location: obrigado_forms.php');
?>