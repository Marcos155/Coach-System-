<?php
  session_start();
  include_once('config.php');

  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:entrar.php');
      }
      $logado = $_SESSION['email'];

      $sql = "SELECT * FROM formulario ORDER BY cod DESC";
      $result = $conexao_forms->query($sql);


  if(isset($_POST['submit']))
  {
    
    include_once('config.php');
    $meta= $_POST['meta'];
    $data= $_POST['data'];
    $status= $_POST['status'];

    $result= mysqli_query($conexao_forms, "INSERT INTO formulario(meta,data_conclusao,status_meta) 
    VALUES ('$meta','$data','$status')"); 

  }
 ?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Complete seu cadastro</title>
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
      background-color: rgb(255, 0, 0);
    }

    .espace {
      margin-right: 1rem;
      margin-left: 1rem;
    }
  </style>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="current-user">
          <i class="material-icons">account_circle</i>
          <?php echo "olá,$logado!" ?>
        </div>
        <div class="mdl-layout-spacer"></div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Aluno</span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="entrar.php">Inicio</a>
        <br>
          <a class="mdl-navigation__link" href="show_sistema_forms.php">Formulário</a>
        <br>
          <a class="mdl-navigation__link active" href="complete_regis.php">Completar cadastro</a>
        <br>
          <a class="mdl-navigation__link " href="show_sistema_persona.php">Conta</a>
        <br>
          <a class="mdl-navigation__link " href="meta.php">Meta</a>
        <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
      <div class="page-content">

        <p>Olá
          <?php echo "$logado"?>, vamos completar seu cadastro &#128578;!
        </p>
        <form action="save_complete_regis.php" method="post">
          <div class="form-group espace">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual seu nome campeão(a)?" type="text" placeholder="Nome" name="username" value="<?php echo $nome ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+"required>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Email para contato" type="email" placeholder="Email" name="email" value="<?php echo $email ?>"  required>
          </div>
          <input type="hidden" name="cod" value="<?php echo $cod ?>">
          <div class="form-group espace">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="telefone para contato" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="meta" required>
          </div>
          <div class="form-group espace">
            <label>Sexo</label>
            <br>
            <input type="radio" value="feminino" name="sexo" required>
            <label for="faminino">Feminino</label>
            <input type="radio"  value="masculino" name ="sexo" required>
            <label for="masculino">Masculino</label>
            <input type="radio" value="outro" name ="sexo" required>
            <label for="outro">Outro</label>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Cidade</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual sua cidade?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="meta" required>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Estado</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual seu estado?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="meta" required>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Senha</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            type="password" placeholder="Senha" name="password"  value="<?php echo $senha ?>" id="senha" required>
          </div>
          <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Enviar">
        </form>
    </main>

    <script>
      $(document).ready(function () {

        $(".search-block").hide();
        $(".expander-title").click(function () {
          $(this).next(".search-block").slideToggle("fast");
        });

      });

      var search = document.getElementById('pesquisar');
      search.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
          searchData();
        }
      });
      function searchData() {
        window.location = 'sistema.php?search=' + search.value;
      }

      $(document).ready(function () {

        $(".search-block").hide();
        $(".expander-title").click(function () {
          $(this).next(".search-block").slideToggle("fast");
        });

      });
    </script>

</body>
</html>