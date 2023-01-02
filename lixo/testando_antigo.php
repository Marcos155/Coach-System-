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
   /* .table-wrapper {
    max-height: 500px;
    overflow-y: auto;}*/
  </style>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="current-user">
          <i class="material-icons">account_circle</i>
          <?php echo "olá,$nome!" ?>
        </div>
        <div class="mdl-layout-spacer"></div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">
      <?php 
          echo $nome;
        ?>
      </span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
        <a class="mdl-navigation__link active" href="testando.php">Formulário</a>
          <br>
          <?php
              //echo "<a class='mdl-navigation__link' href='edit_regis.php?cod=$user_data[cod]'>Completar cadastro</a>"
            ?>
          <a class="mdl-navigation__link" href="show_sistema_persona.php">Conta</a>
          <br>
          <a class="mdl-navigation__link" href="meta.php">meta</a>
          <br>
          <a class="mdl-navigation__link" href="notas.php">Notas</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
    
      <div class="page-content">

          <?php echo  "esses foram os dados preenchidos em seu formulário."?>
        <?php
            //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
            echo"<form action='testando.php' method='post'>";
          ?>
          <br>
          <div class="table-wrapper">
          
          <!-- novo formulário -->
          <div class="form-group espace">
            <label for="exampleInputEmail1">Saude</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[saude]'
              name='saude' id='saude'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Relacionamento</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[relacionamento]'
              name='relacionamento' id='relacionamento'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Financeiro</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[financeiro]'
              name='financeiro' id='financeiro'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Espiritual</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[espiritual]'
              name='espiritual' id='espiritual'>";
              ?>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Outro</label>
            <?php
             echo "<input type='text' class='form-control' aria-describedby='emailHelp' value=' $user_data[outro]'
              name='outro' id='outro'>";
              ?>
          </div>

        <div class="form-group espace">
          <label for="exampleInputEmail1">Email</label>
          <?php
          echo "<input type='email'  class='form-control' aria-describedby='emailHelp'  name='email' value=' $user_data[email]' id='email'/>"
          ?>
        </div>
        </div>
        </form>
      </div>
    </main>

    <script>
    
      const input6 = document.querySelector('#email');
      input6.disabled=true;

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