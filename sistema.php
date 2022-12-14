<?php
session_start();
include_once('config.php');

//cadastro
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location:entrar.php');
}
$logado = $_SESSION['email'];
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM cadastro WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or 
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or senha LIKE '%$data%' ";

} else {
  $sql = "SELECT * FROM cadastro ORDER BY cod DESC";
}


$result2 = $conexao_regis->query($sql);


if (isset($_POST['submit'])) {

  include_once('config.php');

  $nome = $_POST['username'];
  $email = $_POST['email'];
  $senha = $_POST['password'];
  $telefone = $_POST['phone'];
  $sexo = $_POST['sexo'];

  $result = mysqli_query($conexao_regis, "INSERT INTO cadastro(nome,email,senha,telefone,sexo) 
VALUES ('$nome','$email','$senha','$telefone','$sexo')");
}
//testes

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistema</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sistema</title>
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,500,700,900" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .mdl-layout__header{
        background-color: rgb(245,0,0);
      }
    </style>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <div class="current-user">
            <i class="material-icons">account_circle</i>
            <span>Olá, André!</span>
          </div>
          <div class="mdl-layout-spacer"></div>
          <!-- aqui era a barrinha de pesquisa -->
          <div class="box-search" >
            <input type="hidden" class="form-control w-25" placeholder="pesquisar" id="pesquisar">
          </div>
          <!--
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
            <span>Procurar</span>
            <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
              <i class="material-icons" onclick="searchData()">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp" id="pesquisar">
            </div>-->
      </header>
      
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Administração</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link active" href="show_sistema_persona.php">conta</a>
          <br>
          <a class="mdl-navigation__link active" href="sair.php">sair</a>
          <br>
          <a class="mdl-navigation__link active" href="home_pos_login.php">Inicio</a>
        </nav>
      </div>
      
      <main class="mdl-layout__content">
        <div class="page-content">
          <!-- content start -->

          <h2>Alunos</h2>
          <p>Olá André você pode procurar um cliente usando vários parâmetros diferentes, incluindo nome, codigo, número
          de telefone, etc.</p>
          <div class="mdl-card mdl-shadow--2dp customer-search">
          <div class="mdl-card__actions">
              <form action="#">

                <div class="expander-title">
                  <i class="material-icons">person</i>
                  <p class="search-toggle" id="toggleNameSearch">Procurar por nome</p>
                </div>
                <div class="search-block" id="searchBlockName">
                  <div class="flex-row">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" id="lastName">
                      <label class="mdl-textfield__label" for="lastName">Nome</label>
                    </div>
                  </div>
                </div>

                  <div class="expander-title">
                    <i class="material-icons">location_on</i>
                    <p class="search-toggle" id="toggleLocationSearch">Procurar por endereço</p>
                  </div>
                  <div class="search-block" id="searchBlockLocation">
                    <div class="flex-row">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--small">
                        <input class="mdl-textfield__input" type="text" id="city">
                        <label class="mdl-textfield__label" for="city">Cidade</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--small">
                        <input class="mdl-textfield__input" type="text" id="customerState">
                        <label class="mdl-textfield__label" for="customerState">Estado</label>
                        <button id="customerStateDropdown" class="mdl-button mdl-js-button mdl-button--icon">
                          <i class="material-icons">keyboard_arrow_down</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="customerStateDropdown">
                          <li class="mdl-menu__item">Acre</li>
                          <li class="mdl-menu__item">Alagoas</li>
                          <li class="mdl-menu__item">Amapá</li>
                          <li class="mdl-menu__item">Amazonas</li>
                          <li class="mdl-menu__item">Bahia</li>
                          <li class="mdl-menu__item">Ceará</li>
                          <li class="mdl-menu__item">Distrito Federal</li>
                          <li class="mdl-menu__item">Goiás</li>
                          <li class="mdl-menu__item">Maranhão</li>
                          <li class="mdl-menu__item">Mato Grosso</li>
                          <li class="mdl-menu__item">Mato Grosso do Sul</li>
                          <li class="mdl-menu__item">Minas Gerais</li>
                          <li class="mdl-menu__item">Mato Grosso</li>
                          <li class="mdl-menu__item">Pará</li>
                          <li class="mdl-menu__item">Paraíba</li>
                          <li class="mdl-menu__item">Paraná</li>
                          <li class="mdl-menu__item">Pernanbuco</li>
                          <li class="mdl-menu__item">Piaui</li>
                          <li class="mdl-menu__item">Rio Grande do Norte</li>
                          <li class="mdl-menu__item">Rio Grande do Sul</li>
                          <li class="mdl-menu__item">Rondônia</li>
                          <li class="mdl-menu__item">Roraima</li>
                          <li class="mdl-menu__item">Santa Catarina</li>
                          <li class="mdl-menu__item">São Paulo</li>
                          <li class="mdl-menu__item">Sergipe</li>
                          <li class="mdl-menu__item">Tocantins</li>
                          <li class="mdl-menu__item">Pernanbuco</li>
                        </ul>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--small">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="zip">
                        <label class="mdl-textfield__label" for="zip"> CEP</label>
                        <span class="mdl-textfield__error">o valor digitado não é um número!</span>
                      </div>
                    </div>
                  </div>

                <div class="expander-title">
                  <i class="material-icons">phone</i>
                  <p class="search-toggle" id="toggleContactSearch">Procurar por Telefone/email</p>
                </div>
                <div class="search-block" id="searchBlockContact">
                  <div class="flex-row">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" id="email">
                      <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                  </div>
                  <div class="flex-row">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="phonePrimary">
                      <label class="mdl-textfield__label" for="phonePrimary">Telefone</label>
                      <span class="mdl-textfield__error">o valor digitado não é um número!</span>
                    </div>
                  </div>
                </div>

                <div class="expander-title">
                  <i class="material-icons">fingerprint</i>
                  <p class="search-toggle" id="toggleIdSearch">Procurar por código</p>
                </div>
                <div class="search-block" id="searchBlockId">
                  <div class="flex-row">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="idNum">
                      <label class="mdl-textfield__label" for="idNum">Código do Cliente</label>
                      <span class="mdl-textfield__error">O valor digitado não é um número</span>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="btn-wrap" >
                  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit"style="background-color:rgb(245,0,0)">Buscar</button>
                </div>
              </form>
            </div>
          </div>

          <div class="m-5">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Código</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Senha</th>
                  <th scope="col">Sexo</th>
                  <th scope="col">Código endereço</th>
                  <th scope="col">Cidade</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    while ($user_data = mysqli_fetch_assoc($result2)) {
                      echo "<tr>";
                      echo "<td>" . $user_data['cod'] . "</td>";
                      echo "<td>" . $user_data['nome'] . "</td>";
                      echo "<td>" . $user_data['email'] . "</td>";
                      echo "<td>" . $user_data['telefone'] . "</td>";
                      echo "<td>" . $user_data['senha'] . "</td>";
                      echo "<td>" . $user_data['sexo'] . "</td>";
                      echo "<td></td>";
                      echo "<td></td>";
                      echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit_regis.php?cod=$user_data[cod]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
                        <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>
                        </svg>
                        </a>

                        <a class='btn btn-sm btn-danger' href='delete.php?cod=$user_data[cod]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg>
                        </a>
                        
                        <a  class='btn btn-sm btn-warning' href='coach_show_sistema_forms.php?cod=$user_data[cod]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-card-text' viewBox='0 0 16 16'>
                        <path d='M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
                        <path d='M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z'/>
                        </svg>
                        </a>
                        </td>";
                      echo "<tr>";
                    }
        ?>
              </tbody>
            </table>
          </div>
          <!-- content end -->
        </div>
      </div>
      </main>
    </div>

    <script>
      var search = document.getElementById('pesquisar');
      search.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
      searchData();
      }
    });
    function searchData() {
    window.location = 'sistema.php?search=' + search.value;
    }


  $(document).ready(function(){

$(".search-block").hide();
$(".expander-title").click(function(){
  $(this).next(".search-block").slideToggle("fast");
});

});
    </script>

  </body>
</html>
<!-- partial -->
  
</body>
</html>