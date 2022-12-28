<?php
  session_start();
  include_once('config.php');

  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:entrar2.php');
      }
      $logado = $_SESSION['email'];

      if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM formulario WHERE cod LIKE '%$data%' or meta LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or desc_meta LIKE '%$data%' or 
          data_inicio LIKE '%$data%' or data_conclusao LIKE '%$data%' or status_meta LIKE '%$data%'";
      
      } else{
        $sql = "SELECT * FROM formulario ORDER BY cod DESC";
      }
      $result = $conexao_forms->query($sql);

  if(isset($_POST['submit']))
  {
    
    include_once('config.php');
    $meta= $_POST['meta'];
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $desc_meta= $_POST['desc_meta'];
    $data_inicio= $_POST['data_inicio'];
    $data= $_POST['data'];
    $status= $_POST['status'];

    $result= mysqli_query($conexao_forms, "INSERT INTO formulario(meta,nome,email,desc_meta,data_inicio,data_conclusao,status_meta) 
    VALUES ('$meta','$nome','$email','$desc_meta','$data_inicio','$data','$status')"); 
    header('show_sistema_persona.php');

  }
  $user_data = mysqli_fetch_assoc($result);
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
    button:disabled{
      cursor:not-allowed;
      background: #555b69;
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
      <span class="mdl-layout-title">
        <?php
          echo "Aluno";
        ?>
      </span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link active" href="#">Formulário</a>
        <br>
          <a class="mdl-navigation__link" href="#">Completar cadastro</a>
        <br>
          <a class="mdl-navigation__link " href="#">Conta</a>
        <br>
          <a class="mdl-navigation__link " href="#">Meta</a>
        <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
      <div class="page-content">

        <p> Bem vindo(a) &#128578;, para começarmos preencha o formulario abaixo de acordo com o objetivo que almeja alcançar.
        </p>
        <?php
            //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
            echo"<form action='testando.php' method='post'>";
          ?>
           <div class="form-group espace">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual seu nome?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="nome" required>
            <small id="emailHelp" class="form-text text-muted">Coloque aqui o mesmo nome utilizado no cadastro</small>
          </div>

        <div class="form-group espace">
          <label for="exampleInputEmail1">Email</label>
          <input type="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" required/>
          <small id="emailHelp" class="form-text text-muted">Coloque aqui o mesmo email usado no cadastro</small>
        </div>

          <div class="form-group espace">
            <label for="exampleInputEmail1">Meta</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual sua meta?" 
              name="meta" required>
            <small id="emailHelp" class="form-text text-muted">Coloque aqui seu objetivo. Exemplo: perder peso</small>
          </div>
          
          <div class="form-group espace">
            <label for="exampleFormControlTextarea1">Defina sua meta</label>
            <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"
              placeholder="Explique com detalhes seu objetivo" name="desc_meta">
          </div>
          
          <div class="form-group espace">
            <label for="exampleInputPassword1">Data de inicio</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="data_inicio">
            <label for="exampleInputPassword1">Data de conclusão</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="data" required>
            <small id="emailHelp" class="form-text text-muted">Quando quer concluir esse objetivo?</small>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Status</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Atualmente o que já fez para concluir seu objetivo?" 
              name="status" required>
            <small id="emailHelp" class="form-text text-muted">Coloque aqui o que já fez ou está fazendo para alcançar
              sua meta</small>
          </div>
          <button type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" name="submit">Enviar</button>
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


      class FormSubmit {
  constructor(settings) {
    this.settings = settings;
    this.form = document.querySelector(settings.form);
    this.formButton = document.querySelector(settings.button);
    if (this.form) {
      this.url = this.form.getAttribute("action");
    }
    this.sendForm = this.sendForm.bind(this);
  }

  displaySuccess() {
    this.form.innerHTML = this.settings.success;
  }

  displayError() {
    this.form.innerHTML = this.settings.error;
  }

  getFormObject() {
    const formObject = {};
    const fields = this.form.querySelectorAll("[name]");
    fields.forEach((field) => {
      formObject[field.getAttribute("name")] = field.value;
    });
    return formObject;
  }

  onSubmission(event) {
    event.preventDefault();
    event.target.disabled = true;
    event.target.innerText = "Enviando...";
  }

  async sendForm(event) {
    try {
      this.onSubmission(event);
      await fetch(this.url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(this.getFormObject()),
      });
      this.displaySuccess();
    } catch (error) {
      this.displayError();
      throw new Error(error);
    }
  }

  init() {
    if (this.form) this.formButton.addEventListener("click", this.sendForm);
    return this;
  }
}

const formSubmit = new FormSubmit({
  form: "[data-form]",
  button: "[data-button]",
  success: "<h1 class='success'>Mensagem enviada!</h1>",
  error: "<h1 class='error'>Não foi possível enviar sua mensagem.</h1>",
});
formSubmit.init();   
    </script>

</body>
</html>