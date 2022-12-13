<?php
  session_start();
  include_once('config.php');

  //cadastro
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
  {
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location:entrar.php');
  }
  $logado = $_SESSION['email'];
  if(!empty($_GET['search']))
  {
    $data=$_GET['search'];
    $sql= "SELECT * FROM cadastro WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or 
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or senha LIKE '%$data%' ";

  }
  else
  {
    $sql = "SELECT*FROM cadastro ORDER BY cod DESC";
  }

  
  $result2 = $conexao_regis->query($sql);


if(isset($_POST['submit']))
{

include_once('config.php');

$nome= $_POST['username'];
$email= $_POST['email'];
$senha= $_POST['password'];
$telefone= $_POST['phone'];
$sexo= $_POST['sexo'];

$result= mysqli_query($conexao_regis, "INSERT INTO cadastro(nome,email,senha,telefone,sexo) 
VALUES ('$nome','$email','$senha','$telefone','$sexo')");
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
<!-- cadastro -->
<div class="m-5">
    <h1>Cadastro</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">código</th>
    <th scope="col">nome</th>
      <th scope="col">Email</th>
      <th scope="col">telefone</th>
      <th scope="col">sexo</th>
      <th scope="col">senha</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if($user_data=mysqli_fetch_assoc($result2))
      {
        echo "<tr>";
        echo "<td>".$user_data['cod']."</td>";
        echo "<td>".$user_data['nome']."</td>";
        echo "<td>".$user_data['email']."</td>";
        echo "<td>".$user_data['telefone']."</td>";
        echo "<td>".$user_data['sexo']."</td>";
        echo "<td>".$user_data['senha']."</td>";
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
          <a  class='btn btn-sm btn-warning' href='show_sistema_forms.php?cod=$user_data[cod]'>
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
    window.location='show_sistema_persona.php?search='+search.value;
  }

</script>
</html>