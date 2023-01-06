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
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or cidade LIKE '%$data%' or estado LIKE '%$data%' ";

} else {
  $sql = "SELECT * FROM cadastro ORDER BY cod DESC";
}


$result2 = $conexao_regis->query($sql);


if (isset($_POST['submit'])) {

  include_once('config.php');

  $nome = $_POST['username'];
  $email = $_POST['email'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $telefone = $_POST['phone'];
  $sexo = $_POST['sexo'];

  $result = mysqli_query($conexao_regis, "INSERT INTO cadastro(nome,email,cidade,estado,telefone,sexo) 
VALUES ('$nome','$email','$cidade','$estado','$telefone','$sexo')");
}

?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Conta</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" style="color:black"></i> </div>
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar" style="background-color: darkgray;">
      <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' style="color:black"></i> <span class="nav_logo-name" style="color:black"> <?php
              echo "Administração" ?></span> </a>
          <div class="nav_list"> 
            <?php
              echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";
              
              echo "<a href='#' class='nav_link active'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>"; 
              
              echo "<a href='#' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
              
              echo "<a href='meta.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";
            ?>
          </div>
        </div> <a href="sair.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
      
        
    </div>

    <!--Container Main end-->
    <script type='text/javascript'
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>document.addEventListener("DOMContentLoaded", function (event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

          // Validate that all variables exist
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
              // show navbar
              nav.classList.toggle('show')
              // change icon
              toggle.classList.toggle('bx-x')
              // add padding to body
              bodypd.classList.toggle('body-pd')
              // add padding to header
              headerpd.classList.toggle('body-pd')
            })
          }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
          if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
          }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
      });</script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener('click', function (e) {
        e.preventDefault();
      });
      
      </script>

  </body>

</html>