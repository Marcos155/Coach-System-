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
    desc_meta LIKE '%$data%' or data_inicio LIKE '%$data%' or data_conclusao LIKE '%$data%' or status_meta LIKE '%$data%' ";

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

.box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    #pesquisar:focus{
      border-color: rgba(0,0,0,0.4);
      box-shadow:none;
    }
  </style>
    
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <div class="current-user">
            <i class="material-icons">account_circle</i>
            <?php echo "olá, André" ?>
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
          <a class="mdl-navigation__link" href="qrcode.php">Gerar QR Code</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">

        <h2><b>André</b></h2>

          <p>você pode procurar por um formulário de um aluno usando vários parâmetros diferentes, incluindo <b>código, meta, data de inicio,data de conclusao,
            descrição da meta e status</b></p>
         
          <br>
          <br>
          <div class="box-search">
              <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
              <button onclick="searchData()" class="btn btn-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
               </svg>
        </button>
          </div>
          <br>
          <br>
           
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

          <a class='btn btn-sm btn-dark' href='delete.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Deletar cadastro'>
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
    window.location = 'sistema_coach_forms.php?search=' + search.value;
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