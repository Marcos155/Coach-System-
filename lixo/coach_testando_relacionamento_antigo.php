session_start();
include_once('config.php');

//formulário
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];
$cod = $_GET['cod'];
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM relacionamento_12_meses WHERE cod LIKE '%$data%' or oque LIKE '%$data%'  or porquem LIKE '%$data%'  or onde LIKE '%$data%' or quando LIKE '%$data%' or porque LIKE '%$data%'
  or como LIKE '%$data%' or nome LIKE '%$data%' or sobrenome LIKE '%$data%' or objet LIKE '%$data%' or opcao LIKE '%$data%' or responsa LIKE '%$data%' or data_inicio LIKE '%$data%'
  or data_fim LIKE '%$data%' or obs LIKE '%$data%' or mot_edit LIKE '%$data%' ";
} else {
  
  $sql = /*"SELECT * FROM saude_12_meses ORDER BY cod DESC";*/"SELECT*from relacionamento_12_meses where relacionamento_12_meses.cod = $cod ";
}
$result2 = $conexao_formsSaude->query($sql);

if (isset($_POST['submit'])) {

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
  $mot_edit=$_POST['mot_edit'];

  $resultSaude= mysqli_query($conexao_formsSaude,"INSERT INTO relacionamento_12_meses(oque,porquem,onde,quando,porque,como,nome,sobrenome,objet,opcao,responsa,data_inicio,data_fim,obs,mot_edit) 
  VALUES ('$oque','$porquem','$onde','$quando','$porque','$como','$nome','$sobrenome','$objet','$opcao','$responsa','$data_inicio','$data_fim','$obs','$mot_edit')"); 
  header('show_sistema_persona.php');
}
if(!empty($_GET['cod']))
  {
  
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM relacionamento_12_meses WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
          $oque= $user_data['oque'];
          $porquem= $user_data['porquem'];
          $onde= $user_data['onde'];
          $quando= $user_data['quando'];
          $porque= $user_data['porque'];
          $como= $user_data['como'];
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $objet= $user_data['objet'];
          $opcao= $user_data['opcao'];
          $responsa=$user_data['responsa'];
          $data_inicio= $user_data['data_inicio'];
          $data_fim= $user_data['data_fim'];
          $obs= $user_data['obs'];
          $mot_edit=$user_data['mot_edit'];
        }

    }
    else{
        header('Location: testando.php');
    }
  }
  else
  {
    /*header('testando.php');*/
    $fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;
  }
$user_data = mysqli_fetch_assoc($result2);
$nome= $user_data['nome'];