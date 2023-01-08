<?php
session_start();
include_once('config.php');

//formulário
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM formulario_15_anos WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or sobrenome LIKE '%$data%' or email LIKE '%$data%'  or saude LIKE '%$data%' or relacionamento LIKE '%$data%' or financeiro LIKE '%$data%'
  or espiritual LIKE '%$data%' or outro LIKE '%$data%'";

} else {
  $sql = /*"SELECT * FROM formulario ORDER BY cod DESC";*/"SELECT*from formulario_15_anos where formulario_15_anos.email = '$logado' ";
}
$result2 = $conexao_forms15->query($sql);

if (isset($_POST['submit'])) {

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
}
if(!empty($_GET['cod']))
  {
  
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario_15_anos WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
          $nome=$user_data ['nome'];
          $sobrenome=$user_data ['sobrenome'];
          $email= $user_data ['email'];
          $saude= $user_data['saude'];
          $relacionamento= $user_data['relacionamento'];
          $financeiro= $user_data['financeiro'];
          $espiritual= $user_data['espiritual'];
          $outro= $user_data['outro'];
        }

    }
    else{
        header('Location: show_sistema_persona.php');
    }
  }
  //else
  {
    /*header('Location: show_sistema_persona.php');*/
    /*$fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;*/
  }

  if(!empty($_GET['cod'])){
    include_once('config.php');
    $cod= $_GET['cod'];
    $sqlSelect="SELECT*FROM formulario_15_anos WHERE cod=$cod";
    $result=$conexao_forms15->query($sqlSelect);
  
    if($result->num_rows>0){
      while($user_data= mysqli_fetch_assoc($result)){
        $saude = $user_data['saude'];
        $relacionamento = $user_data['relacionamento'];
        $financeiro = $user_data['financeiro'];
        $espiritual = $user_data['espiritual'];
        $outro = $user_data['outro'];
      }
    }else{
      header('Location:sistema_coach_forms.php');
    }
  
  
  };

$user_data = mysqli_fetch_assoc($result2);


//$nome= $user_data['nome'];
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulário</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">    
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,500,700,900"
    rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    label,
    p,
    button {
      color: #000;
      margin-left: 0.3vw;
    }

    .mdl-layout__header {
      background-color: rgb(25, 25, 25);
    }

    .espace {
      margin-right: 1rem;
      margin-left: 1rem;
    }
    .table-wrapper {
    max-height: 500px;
    overflow-y: auto;}
  </style>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="current-user">
          <i class="material-icons">account_circle</i>
          <?php echo "olá,André!" ?>
        </div>
        <div class="mdl-layout-spacer"></div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">
      <?php 
          echo "Administração";
        ?>
      </span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="sistema.php">Conta-Alunos</a>
          <br>
          <a class="mdl-navigation__link active" href="sistema_coach_forms.php">Formulário-Alunos</a>
          <br>
          <a class="mdl-navigation__link" href="#">Meta-Alunos</a>
          <br>
          <a class="mdl-navigation__link" href="qrcode.php">Gerar QR Code</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
    
      <div class="page-content">
      <?php echo  "<a href='sistema_coach_forms.php'>voltar</a>"?>
        <?php
            //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
            echo"<form action='show_sistema_forms.php' method='post'>";
          ?>
          <br>
          <div class="table-wrapper">

          <div class="form-group espace">
            <label for="exampleInputEmail1">Saúde</label>
            <input type='text' class='form-control' aria-describedby='emailHelp' name=saude  value="<?php echo $saude ?>" id='saude'>
          </div>
          
          <div class="form-group espace">
            <label for="exampleFormControlTextarea1">Relacionamento</label>
            <input type='text' class='form-control' rows='3' name='relacionamento' value="<?php echo $relacionamento ?>" id='relacionamento'>
          </div>
          
          <div class="form-group espace">
            <label for="exampleInputPassword1">Financeiro</label>
             <input type='text' class='form-control' name='financeiro' value="<?php echo $financeiro ?>" id='financeiro'>
            
            <label for="exampleInputPassword1">Espiritual</label>
            <input type='text' class='form-control' name='espiritual' value="<?php echo $espiritual ?>"  id='espiritual'>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Demais objetivos</label>
           <input type='text' class='form-control' aria-describedby='emailHelp' name='outro' value="<?php echo $outro ?>" id='outro'>
              
          </div>
    </div>
        </form>
        
    </main>

    <script>
      const input = document.querySelector('#saude');
      input.disabled=true;

      const input2 = document.querySelector('#relacionamento');
      input2.disabled=true;

      const input3 = document.querySelector('#financeiro');
      input3.disabled=true;

      const input4 = document.querySelector('#espiritual');
      input4.disabled=true;

      const input5 = document.querySelector('#outro');
      input5.disabled=true;
    </script>
</body>
</html>