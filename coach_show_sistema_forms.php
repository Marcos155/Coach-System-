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
        if(!empty($_GET['cod']))
      {
        $data=$_GET['cod'];
        $sql= "SELECT * FROM formulario WHERE cod LIKE '%$data%'or meta LIKE '%$data%' or 
        data_conclusao LIKE '%$data%' or status_meta LIKE '%$data%' ";

      }
      else
      {
        $sql = "SELECT * FROM formulario ORDER BY cod DESC";
      }

        $result = $conexao_forms->query($sql);
        if(isset($_POST['search']))
        {
        $meta= $_POST['meta'];
        $data= $_POST['data'];
        $status= $_POST['status'];

        $result= mysqli_query($conexao_forms, "INSERT INTO formulario(meta,data_conclusao,status_meta) 
        VALUES ('$meta','$data','$status')");
        }

    }
    else{
        header('Location: sistema.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Conta</title>
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <?php echo "André, esse é seu aluno de email $logado" ?>
          </div>
          <div class="mdl-layout-spacer"></div>
          

      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Mais opções</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link active" href="sair.php">sair</a>
          <br>
          <a class="mdl-navigation__link active" href="home_pos_login.php">Inicio</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
      <div class="m-5" >
    <h1>Fórmulario</h1>
<table class="table" >
  <thead class="" >
    <tr>
    <th scope="col">código</th>
      <th scope="col">meta</th>
      <th scope="col">conclusão</th>
      <th scope="col">status</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if($user_data=mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>".$user_data['cod']."</td>";
        echo "<td>".$user_data['meta']."</td>";
        echo "<td>".$user_data['data_conclusao']."</td>";
        echo "<td>".$user_data['status_meta']."</td>";
        echo "<td>
          <a class='btn btn-sm btn-primary' href='edit.php?cod=$user_data[cod]'>
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
          <a  class='btn btn-sm btn-warning' href='sistema.php?cod=$user_data[cod]'>
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
<script>
      $(document).ready(function(){

        $(".search-block").hide();
        $(".expander-title").click(function(){
          $(this).next(".search-block").slideToggle("fast");
        });

      });
      var search= document.getElementById('pesquisar');
  search.addEventListener("keydown", function(event){
    if(event.key === "Enter")
    {
      searchData();
    }
  });
  function searchData()
  {
    window.location='show_sistema_persona.php?search='+search.value;
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