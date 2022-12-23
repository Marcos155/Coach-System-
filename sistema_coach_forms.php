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
  $sql = "SELECT * FROM formulario WHERE cod LIKE '%$data%' or meta LIKE '%$data%' or 
    desc_meta LIKE '%$data%' or data_inicio LIKE '%$data%' or data_conclusão LIKE '%$data%' or status_meta LIKE '%$data%' ";

} else {
  $sql = "SELECT * FROM formulario ORDER BY cod DESC";
}


$result = $conexao_forms->query($sql);


if (isset($_POST['submit'])) {

  include_once('config.php');

  $meta = $_POST['meta'];
  $desc_meta = $_POST['desc_meta'];
  $data_inicio = $_POST['data_inicio'];
  $data_conclusao = $_POST['data'];
  $status = $_POST['status_meta'];

  $result = mysqli_query($conexao_forms, "INSERT INTO formulario(meta,desc_meta,data_inicio,data_conclusao,status_meta) 
VALUES ('$meta','$desc_meta','$data_inicio','$data_conclusao','$status')");
}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistema</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>
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
    .mdl-layout__header {
      background-color: rgb(25, 25, 25);
    }
    .table-wrapper {
    max-height: 500px;
    overflow-y: auto;
}
  </style>
    
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <div class="current-user">
            <i class="material-icons">account_circle</i>
            <?php echo "olá, André!" ?>
          </div>
          <div class="mdl-layout-spacer"></div>

      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Administração</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="sistema.php">Conta-Alunos</a>
          <br>
          <a class="mdl-navigation__link active" href="sistema_coach_forms.php">Formulário-Alunos</a>
          <br>
          <a class="mdl-navigation__link" href="#">Meta-Alunos</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">

          <h2>Alunos</h2>

          <p>André, você pode procurar um aluno usando vários parâmetros diferentes, incluindo nome, codigo, número
          de telefone, etc.</p>
          <div class="mdl-card mdl-shadow--2dp customer-search">
            <!-- <div class="mdl-card__title">Customer Search</div> -->
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
                    <div class="btn-wrap">
                  <input  style="background-color:rgb(0,0,0)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Buscar">
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
                      <li class="mdl-menu__item">Brasilia</li>
                      <li class="mdl-menu__item">Ceará</li>
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
                    </div>
                    <div class="btn-wrap">
                  <input style="background-color:rgb(0,0,0)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Buscar">
                </div>
                  </div>

                <div class="expander-title">
                  <i class="material-icons">phone</i>
                  <p class="search-toggle" id="toggleContactSearch">Procurar por email/telefone</p>
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
                      <span class="mdl-textfield__error">O valor inserido não é um número!</span>
                    </div>
                  </div>
                  <div class="btn-wrap">
                  <input style="background-color:rgb(0,0,0)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Buscar">
                </div>
                </div>

                <div class="expander-title">
                  <i class="material-icons">fingerprint</i>
                  <p class="search-toggle" id="toggleIdSearch">Procurar por ID</p>
                </div>

                <div class="search-block" id="searchBlockId">

                <div class="flex-row">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" id="idState">
                      <label class="mdl-textfield__label" for="idType">ID do estado</label>
                      <button id="idStateDropdown" class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons">keyboard_arrow_down</i>
                      </button>
                      <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="idStateDropdown">
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
                  <div class="flex-row">

                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="idNum">
                      <label class="mdl-textfield__label" for="idNum">número do ID</label>
                      <span class="mdl-textfield__error">O valor informado não é um número!</span>
                    </div>
                  </div>
                </div>
                <div class="btn-wrap">
                  <input style="background-color:rgb(0,0,0)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Buscar">
                </div>
              </form>
            </div>
          </div>
          <div class="table-wrapper">
            <table class="table">
            <thead class="thead-light">
               <tr>
                <th scope="row">Código</th>
                <th scope="row">Meta</th>
                <th scope="col">Descrição da meta</th>
                <th scope="col">Data de início</th>
                <th scope="col">Data de conclusão</th>
                <th scope="col">Status</th>
                <th scope="col">Excluir</th>
                </tr>
              </thead>
              <tbody>
              <?php
        while ($user_data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $user_data['cod'] . "</td>";
          echo "<td>" . $user_data['meta'] . "</td>";
          echo "<td>" . $user_data['desc_meta'] . "</td>";
          echo "<td>" . $user_data['data_inicio'] . "</td>";
          echo "<td>" . $user_data['data_conclusao'] . "</td>";
          echo "<td>" . $user_data['status_meta'] . "</td>";
          echo "<td>

          <a class='btn btn-sm btn-dark' href='delete.php?cod=$user_data[cod]' placeholer='editar' target='_blank' rel='noopener noreferrer' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Deletar cadastro'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
          </svg>
          </a>
        </td>";
          echo "<tr>";
        }
        ?>
              </tbody>
            </table>
          </div>
        </div>
          <!-- content end -->
        </div>
      </main>
    </div>

    <script>
      $(document).ready(function(){

        $(".search-block").hide();
        $(".expander-title").click(function(){
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
<!-- partial -->
  
</body>
</html>