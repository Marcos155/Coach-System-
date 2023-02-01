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
  if($data!=1){
  $sql = "SELECT * FROM cadastro WHERE cod LIKE '%$data%' or nome LIKE '%$data%' or sobrenome LIKE '%$data%' or nome_turma LIKE '%$data%' ";
  }else{
    $sql = "SELECT * FROM cadastro WHERE cod>1 ORDER BY cod DESC";
  }

} else {
  $sql = "SELECT * FROM cadastro WHERE cod>1 ORDER BY cod DESC";
}

$result = $conexao_forms15->query($sql);


if (isset($_POST['submit'])) {

  include_once('config.php');
  $nome= $_POST['nome'];
  $sobrenome= $_POST['sobrenome'];
  $email= $_POST['email'];
  $saude= $_POST['saude'];
  $relacionamento= $_POST['relacionamento'];
  $financeiro= $_POST['financeiro'];
  $espiritual= $_POST['espiritual'];
  $outro= $_POST['outro'];
$result= mysqli_query($conexao_forms15,"INSERT INTO formulario_15_anos(nome,sobrenome,email,saude,relacionamento,financeiro,espiritual,outro) 
VALUES ('$nome','$sobrenome','$email','$saude','$relacionamento','$financeiro','$espiritual','$outro')"); 
header('show_sistema_persona.php');
}

?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Formulário-Alunos</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  
  <style>
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
    body{
    /*background: linear-gradient(90deg,#f5f5f5 35%, rgb(202, 202, 202) 100%);*/
    background-image: linear-gradient(to right, #f5f5f5 35%,rgb(202, 202, 202));
}
.btn:hover{
 
    background-color: #f01e1e;
    color: rgb(247, 247, 247);
    transition: all 0.3s;
    border: none;

}
  </style>
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" style="color:black"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar" style="background-color: darkgray;">
      <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' style="color:black"></i> <span class="nav_logo-name" style="color:black"> <?php
              echo "Administração" ?></span> </a>
          <div class="nav_list"> 
            <?php
              echo "<a href='sistema.php' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta-Alunos</span> </a>"; 
              
              echo "<a href='sistema_coach_forms.php' class='nav_link active'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário-Alunos</span> </a>"; 
              
              echo "<a href='sistema_metas_coach.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Meta-Alunos</span></a>" ;

              echo "<a href='turmas.php' class='nav_link'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M22 9V7h-2v2h-2v2h2v2h2v-2h2V9zM8 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 1c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm4.51-8.95C13.43 5.11 14 6.49 14 8s-.57 2.89-1.49 3.95C14.47 11.7 16 10.04 16 8s-1.53-3.7-3.49-3.95zm4.02 9.78C17.42 14.66 18 15.7 18 17v3h2v-3c0-1.45-1.59-2.51-3.47-3.17z'/></svg>
              <span class='nav_name'>Turmas</span></a>"; 

              echo "<a href='gerarQRCode.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' preserveAspectRatio='xMidYMid meet' 
              viewBox='0 0 32 32'><path fill='currentColor' d='M5 5v8h2v2h2v-2h4V5H5zm8 8v2h2v2h-4v2H5v8h8v-8h6v-2h-2v-2h4v-2h2v2h2v-2h2V5h-8v8h-6zm12 2v2h2v-2h-2zm0 2h-2v2h2v-2zm0 2v2h2v-2h-2zm0 2h-2v-2h-2v2h-5v6h2v-4h4v2h2v-2h1v-2zm-3 4h-2v2h2v-2zm1-8v-2h-2v2h2zm-12 0v-2H9v2h2zm-4-2H5v2h2v-2zm8-10v4h-1v2h1v1h2V9h1V7h-1V5h-2zM7 7h4v4H7V7zm14 0h4v4h-4V7zM8 8v2h2V8H8zm14 0v2h2V8h-2zM7 21h4v4H7v-4zm1 1v2h2v-2H8zm17 3v2h2v-2h-2z'/></svg>
               <span class='nav_name'>Gerar QR Code</span> </a>"; 

               echo "<a href='edit_coach_regis.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 24 24'><path fill='none' stroke='currentColor' stroke-width='2' d='M16 15c4.009-.065 7-3.033 
               7-7c0-3.012-.997-2.015-2-1c-.991.98-3 3-3 3l-4-4s2.02-2.009 3-3c1.015-1.003 1.015-2-1-2c-3.967 0-6.947 2.991-7 7c.042.976 0 3 0 3c-1.885 1.897-4.34 4.353-6 6c-2.932 2.944 1.056 6.932 4 4c1.65-1.662 4.113-4.125 6-6c0 0 2.024-.042 3 0Z'/></svg>
               <span class='nav_name'>Alterar cadastro</span> </a>"; 
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div>
    <main class="mdl-layout__content">
        <div class="page-content">

        <h2><b>André</b></h2>

        <p>você pode procurar por um formulário de um aluno procurando por <b>nome</b>, <b>sobrenome</b>, <b> código de aluno</b> e <b>código de turma</b></p>

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
               <th scope="row">Turma</th>
                <th scope="row">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">formulário</th>
                <th scope="col">Saúde</th>
                <th scope="col">Relacionamento</th>
                <th scope="col">Dinheiro</th>
                <th scope="col">Trabalho</th>
                <th scope="col">Outros</th>
                <!--
                <th scope="row">Excluir</th>
  -->
                </tr>
              </thead>
              <tbody>
              <?php
        while ($user_data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$user_data['nome_turma']."</td>";
          echo "<td>" . $user_data['cod'] . "</td>";
          echo "<td>" . $user_data['nome']."</td>";
          echo "<td>" . $user_data['sobrenome']. "</td>";
          echo "<td>
                  <a class='btn btn-sm btn-dark' href='coach_testando.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
                    Formulário
                  </a>
                </td>
                <td>
                  <a class='btn btn-sm btn-dark' href='coach_testando_saude.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
                    Saúde
                  </a>
                </td>
                <td>
                  <a class='btn btn-sm btn-dark' href='coach_testando_relacionamento.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
                    Relacionamento
                  </a>
                </td>
                <td>
                  <a class='btn btn-sm btn-dark' href='coach_testando_dinheiro.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
                    Dinheiro
                  </a>
                </td>
                <td>
                  <a class='btn btn-sm btn-dark' href='coach_testando_trabalho.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
                    trabalho
                  </a>
                </td>
                <td>
                  <a class='btn btn-sm btn-dark' href='coach_testando_outro.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Ver formulário'>
                    Outro
                  </a>
                </td>"
                
                /*<td>
                  <a class='btn btn-sm btn-dark' href='delete.php?cod=$user_data[cod]' placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Deletar cadastro'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                  </svg>
                  </a>
                </td>*/;
          echo "<tr>";
        }
        ?>
              </tbody>
            </table>
          </div>
</div>
        
    </div>

    <!--Container Main end-->

    <script>
      function confirmaSair(){
    var confirma =confirm("André, certeza que deseja encerrar a sessão?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/sair.php";
    } 
};
    </script>
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
      
      /* do antigo sistema */
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
};


$(document).ready(function () {

$(".search-block").hide();
$(".expander-title").click(function () {
$(this).next(".search-block").slideToggle("fast");
});

});
      </script>

  </body>

</html>