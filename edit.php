<?php
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location:entrar.php');
}
$logado = $_SESSION['email'];
if(!empty($_GET['cod']))
{
  include_once('config.php');

  $cod = $_GET['cod'];
  $sqlselect = "SELECT * FROM formulario WHERE cod=$cod";
  $result = $conexao_forms->query($sqlselect);

  if($result->num_rows > 0)
  {
      while($user_data = mysqli_fetch_assoc($result))
      {
          $meta= $user_data ['meta'];
          $data= $user_data ['data_conclusao'];
          $status= $user_data ['status_meta'];
      }


  }
  else{
      header('Location: sistema.php');
  }
}
else
{
  header('Location: sistema.php');
}
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
          <a class="mdl-navigation__link active" href="home_pos_login.php">Inicio</a>
        <br>
        <a class="mdl-navigation__link " href="show_sistema_persona.php">Conta</a>
        <br>
        <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
      <div class="page-content">

        <p>Olá
          <?php echo "$logado"?>, preencha o formulario abaixo de acordo com o objetivo que almeja alcançar.
        </p>
        <form  action="save_edit.php" method="post">
          <div class="form-group espace">
            <label for="exampleInputEmail1">Meta</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="meta" value="<?php echo $meta ?>" required
              placeholder="Qual sua meta?">
            <small id="emailHelp" class="form-text text-muted">Coloque aqui seu objetivo. Exemplo: perder peso</small>
          </div>
          <div class="form-group espace">
            <label for="exampleFormControlTextarea1">Defina sua meta</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
              placeholder="Explique com detalhes seu objetivo"></textarea>
          </div>
          <div class="form-group espace">
            <label for="exampleInputPassword1">Data de inicio</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="data" value="<?php echo $data ?>" required>
            <label for="exampleInputPassword1">Data de conclusão</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="data" value="<?php echo $data ?>" required>
            <small id="emailHelp" class="form-text text-muted">Quando quer concluir esse objetivo?</small>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Status</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Atualmente o que já fez para concluir seu objetivo?" name="status" value="<?php echo $status ?>"required>
            <small id="emailHelp" class="form-text text-muted">Coloque aqui o que já fez ou está fazendo para alcançar
              sua meta</small>
          </div>
          <button type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;">Enviar</button>
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