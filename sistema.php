<?php
  session_start();
  include_once('config.php');
     
  // print_r($_SESSION);
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:login.php');
      }
      $logado = $_SESSION['email'];
      if(!empty($_GET['search']))
      {
        $data=$_GET['search'];
        $sql= "SELECT * FROM formulario WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or meta LIKE '%$data%' or 
        data_conclusao LIKE '%$data%' or status_meta LIKE '%$data%' ";

      }
      else
      {
        $sql = "SELECT * FROM formulario ORDER BY cod DESC";
      }

      
      $result = $conexao_forms->query($sql);

     // print_r($result);

  if(isset($_POST['submit']))
  {
    // print_r('nome:' . $_POST['username']);
    // print_r('<br>');
    // print_r('meta:' . $_POST['meta']);
    // print_r('<br>');
    // print_r('data:' . $_POST['data']);
    // print_r('<br>');
    // print_r('status:' . $_POST['status']);
    
    include_once('config.php');

    $nome= $_POST['username'];
    $meta= $_POST['meta'];
    $data= $_POST['data'];
    $status= $_POST['status'];

    $result= mysqli_query($conexao_forms, "INSERT INTO formulario(nome,meta,data_conclusao,status_meta) 
    VALUES ('$nome','$meta','$data','$status')");



  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>sistema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .box-search{
        display: flex;
        justify-content: center;
        gap: .1%;
      }
    </style>
  </head>
<body>
    <h1>Acessou o sistema</h1>
    <div class="d-flex">
        <a href="sair.php">sair</a>
    </div>
    <br>
    
    <?php 
        echo "<h1>Bem Vindo <u>$logado</u> :) </h1>";
    ?>
   <br>
   
   <div class="box-search">
    <input type="search" class="form-control w-25" placeholder="pesquisar" id="pesquisar">
    <button class="btn btn-success" onclick="searchData()">
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
          <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
      </svg>
    </button>
   </div>

   <div class="m-5">
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">código</th>
      <th scope="col">nome</th>
      <th scope="col">meta</th>
      <th scope="col">conclusão</th>
      <th scope="col">status</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($user_data=mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>".$user_data['cod']."</td>";
        echo "<td>".$user_data['nome']."</td>";
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
        </td>";
        echo "<tr>";
      }
    ?>
  </tbody>
</table>
</div>



</body>
<script>
  var search= document.getElementById('pesquisar');
  search.addEventListener("keydown", function(event){
    if(event.key === "Enter")
    {
      searchData();
    }
  });
  function searchData()
  {
    window.location='sistema.php?search='+search.value;
  }

</script>
</html>

<!--
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style_coach.css">
</head>

<body>
  <div class="login-box">
    <h2>Formulário</h2>

    <div class="d-flex">
        <a href="sair.php">sair</a>
    </div>



    <form action="formulario.php" method="post">
      <div class="user-box">
        <input type="text" name="username" required>
        <label>Nome </label>
      </div>
      <div class="user-box">
        <input type="text" name="meta" required>
        <label>Meta </label>
      </div>
    
      <div class="user-box">
        <input type="date" name="data" required>
      </div>
    
      <div class="user-box">
        <input type="text" name="status" required>
        <label>Status </label>
      </div>

      <a class="botao">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="enviar" name="submit" id="enviar">
      </a>
  
    </form>
  </div>
  -->
<!-- partial -->