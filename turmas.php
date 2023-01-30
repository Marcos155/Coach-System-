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
    telefone LIKE '%$data%' or sexo LIKE '%$data%' or cidade LIKE '%$data%' or estado LIKE '%$data%' or sobrenome LIKE '%$data%' or cpf LIKE '%$data%' or nome_turma LIKE '%$data%' or nome and sobrenome Like '%$data%' ";

} else {
  $sql = "SELECT * FROM cadastro WHERE cod>1 ORDER BY cod DESC";
}
$result2 = $conexao_forms15->query($sql);

/* options com nomes das turmas */
$sql_nome_turmas="SELECT*FROM turmas";
$result3=$conexao_forms15->query($sql_nome_turmas);

/* options com nomes dos alunos */
$sql_nome_alunos="SELECT*FROM cadastro WHERE cod!=1";
$result3_aluno=$conexao_forms15->query($sql_nome_alunos);

/* lançar turmas */
if(isset($_POST['lancar'])){
  $criar_turma=$_POST['criar_turma'];
  $val_turma="SELECT*FROM turmas WHERE nome_turma='$criar_turma' ";
  $resultado_val_turmas=$conexao_forms15->query($val_turma);
  if(mysqli_num_rows($resultado_val_turmas)<=0 && $criar_turma!='Turma Geral'){
  $sql_turma="INSERT INTO turmas(nome_turma) VALUES ('$criar_turma')";
  $result_turma=$conexao_forms15->query($sql_turma);
  header('Location:turmas.php');}
}

/* tabelas das turmas existentes */
$turmas_existentes="SELECT*FROM turmas";
$turmas_cadastradas=$conexao_forms15->query($turmas_existentes);

$sql_qtd_turmas="SELECT COUNT(nome_turma) as 'qtd_turmas' FROM turmas;";
$resultado4=$conexao_forms15->query($sql_qtd_turmas);

while($user_data = mysqli_fetch_assoc($resultado4)) { 
  $qtd_turmas=$user_data['qtd_turmas'];}
          
              
if(isset($_POST['alocar'])){
  $nova_turma=$_POST['nome_turma'];
  $nome_aluno=$_POST['nome_aluno'];
  $resultado=mysqli_query($conexao_forms15,"UPDATE cadastro SET nome_turma='$nova_turma' WHERE nome='$nome_aluno' ");
  header('Location:turmas.php');
  }          
               
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Turmas</title>
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
dialog::backdrop{
      background: rgb(0 0 0 / .5);
    }
    dialog{
      border:none;
      border-radius: .5rem;
      box-shadow: 0 0 1em rgb(0 0 0 / .3);
      width:80%;
    }
    #fechar_dialogDelete{
      color: rgb(247, 247, 247);
      padding: 5px 10px;
      border:none;
      text-transform:uppercase;
      background:	#1C1C1C;
    }
    #Sim_dialogDelete{
      background:	#1C1C1C;
      color: rgb(247, 247, 247);
      text-transform:uppercase;
      border:none;
      padding: 5px 10px;
      margin-left:10px;
    }
    #Sim_dialogDelete:hover{
      background-color: #f01e1e;
    color: rgb(247, 247, 247);
    transition: all 0.3s;
    }
    #fechar_dialogDelete:hover{
      background-color: #f01e1e;
    color: rgb(247, 247, 247);
    transition: all 0.3s;
    }
    #titulo_dialog{
      font-weight:bold;
    }
    .button_turmas{
      background:#000;
      color:#fff;
      border-radius:3px;
      border:none;
    }
    .button_turmas:hover{
      background-color: #f01e1e;
    color: rgb(247, 247, 247);
    transition: all 0.3s;
    border: none;
    }
    #forms{
      text-align:center;
    }
    #Inputnome_turma{
      border-radius:4px;
    }
    #nome_turma{
      text-align:center;
    }
    .formulario{
      text-align:center;
      border:2px solid #000;
      padding:20px 0;
      height: 260px;
      margin: 2%;
    background: #fff;
    max-width: 410px;
    border-radius: 7px;
    transition: height 0.2s ease;
    box-shadow: 2px 2px #000;
    }
    #realocar{
      color:#000;
    }
    #realocar:hover{
      color: #f01e1e;
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
              
              echo "<a href='sistema_coach_forms.php' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário-Alunos</span> </a>"; 
              
              echo "<a href='sistema_metas_coach.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Meta-Alunos</span></a>" ;

              echo "<a href='turmas.php' class='nav_link active'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M22 9V7h-2v2h-2v2h2v2h2v-2h2V9zM8 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 1c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm4.51-8.95C13.43 5.11 14 6.49 14 8s-.57 2.89-1.49 3.95C14.47 11.7 16 10.04 16 8s-1.53-3.7-3.49-3.95zm4.02 9.78C17.42 14.66 18 15.7 18 17v3h2v-3c0-1.45-1.59-2.51-3.47-3.17z'/></svg>
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
    <div >
    <main class="mdl-layout__content">
        <div class="page-content">

        <h2><b>André</b></h2>

          <p>você pode <b>administrar</b> suas <b>turmas</b> aqui</p>

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
                <th scope="col">Turma</th>
                <th scope="col">Código-Aluno</th>
                <th scope="col">Nome-Aluno</th>
                <th scope="col">Sobrenome-Aluno</th>
                <?php 
                if(mysqli_num_rows($result3)>0){
                  echo"<th scope='col'>Realocar</th>";}
                ?>
                </tr>
              </thead>
              <tbody>
              <?php
        while ($user_data = mysqli_fetch_assoc($result2)) {
          echo "<tr>";
          echo "<td>" . $user_data['nome_turma'] . "</td>";
          echo "<td>" . $user_data['cod'] . "</td>";
          echo "<td>" . $user_data['nome'] ."</td>";
          echo "<td>" . $user_data['sobrenome'] . "</td>";
          if(mysqli_num_rows($result3)>0){
          echo "<td>
                      <a href='turmas_realocar.php?cod=$user_data[cod]' id='realocar' data-toggle='tooltip' data-placement='right' title='Realocar Aluno'> 
                      <svg xmlns='http://www.w3.org/2000/svg' width='1.5em' height='1.5em' viewBox='0 0 24 24'><path fill='currentColor' d='m19.775 22.575l-2.975-2.95q-.175.175-.35.275q-.175.1-.45.1H2q-.425 0-.712-.288Q1 19.425 1 19v-1.8q0-.85.438-1.563q.437-.712 1.162-1.087q1.55-.775 3.15-1.163Q7.35 13 9 13q.3 0 .613.012q.312.013.612.038L9.175 12H9q-1.65 0-2.825-1.175Q5 9.65 5 8v-.175L1.375 4.2Q1.1 3.925 1.1 3.5q0-.425.275-.725q.3-.275.725-.275t.725.275l18.375 18.4q.275.275.275.7q0 .425-.275.7q-.3.3-.712.3q-.413 0-.713-.3ZM16.65 13.15q1.275.15 2.4.512q1.125.363 2.1.888q.9.5 1.375 1.112Q23 16.275 23 17v2q0 .275-.112.462q-.113.188-.238.313L18.875 16q-.225-.825-.787-1.562q-.563-.738-1.438-1.288ZM3 18h12v-.175l-2.175-2.175q-.95-.325-1.912-.488Q9.95 15 9 15q-1.4 0-2.775.337q-1.375.338-2.725 1.013q-.225.125-.362.35q-.138.225-.138.5Zm11.05-6.825q.475-.7.712-1.5Q15 8.875 15 8q0-1.05-.363-2.025Q14.275 5 13.6 4.2q.35-.125.7-.163Q14.65 4 15 4q1.65 0 2.825 1.175Q19 6.35 19 8q0 1.65-1.237 2.825Q16.525 12 14.875 12Zm-1.45-1.45l-1.6-1.6V8q0-.825-.587-1.412Q9.825 6 9 6h-.125l-1.6-1.6q.4-.2.825-.3q.425-.1.9-.1q1.65 0 2.825 1.175Q13 6.35 13 8q0 .475-.1.9q-.1.425-.3.825ZM9 18h6H3h6Zm.95-10.95Z'/></svg>
                      </a>
                  </td>";};
          echo "</tr>";
        }
        ?>
              </tbody>
            </table>
      </div>
      <br><br><br>
      <div class="row justify-content-md-center">
        <div class="col-5 formulario">
          <h4><b>Alocar Alunos</b></h4><br>
          <form action="turmas.php" method="post">
            <label >Turma:</label>
            <?php
             if(mysqli_num_rows($result3)>0){
             echo "<select id='nome_turmas' name='nome_turma' list='nome_turmas' >";
            
                while ($nomesDasTurmas = mysqli_fetch_assoc($result3)) {
                echo "<option>" . $nomesDasTurmas['nome_turma'] . "</option>";};}else{
                  echo "<b>Não há turmas cadastradas</b>";
                }
              ?>
            </select><br><br>
            <label>Aluno:</label>
            <?php
            if(mysqli_num_rows($result3_aluno)>0){
              echo "<select id='nome_alunos'  name='nome_aluno'list='nome_alunos'>";
            
                while ($nomesDosAlunos = mysqli_fetch_assoc($result3_aluno)) {
                echo "<option>" . $nomesDosAlunos['nome']. "</option>";};}else{
                  echo "Não há alunos cadastrados";
                }
              ?>
            </select><br><br>
            <?php
            if(mysqli_num_rows($result3)>0){
            echo "<button type='submit' name='alocar' class='btn btn-sm btn-dark' >Alocar Aluno</button>";
            }
           ?>
          </form>
        </div>

        <br><br><br>

        <div class="col-5 formulario">
          <h4><b>Criar Turmas</b></h4><br>
          <form action="turmas.php" method="post">
            <input type="text" placeholder="Nome da turma" name="criar_turma" maxlength="30" id="criar_turmas" required>
            <br>
            <label for="characters">Quantidade de caracteres: 30/ </label><span id="characters"></span><br><br>
            <button type="submit" name="lancar" class='btn btn-sm btn-dark' >Lançar Turma</button>
          </form>
        </div>
        <br><br><br>

       </div>
        <br><br><br>
        <div>
        <h5><b>Quantidade de turmas:<?php echo " ".$qtd_turmas ?></b></h5>
        <table class="table table-sm">
          <?php
            if(mysqli_num_rows($result3)>0){
                echo" <thead class='thead-light'>
                <tr>
                  <th scope='col'>Turma</th>
                  <th scope='col'>Quantidade de alunos</th>
                  <th scope='col'>Deletar turma</th>
               </tr>
            </thead>";}
            ?>
            <tbody>
              <?php
                while ($user_data3 = mysqli_fetch_assoc($turmas_cadastradas)) {
                  $turminhas = $user_data3['nome_turma'];
                  echo "<tr>";
                  echo "<td>" . $user_data3['nome_turma'] . "</td>";
                  $sql_qtd_alunos_por_turma="SELECT COUNT(cod) as qtd_alunos_por_turma FROM cadastro WHERE nome_turma='$turminhas'";
                  $result_alunos_por_turma=$conexao_forms15->query($sql_qtd_alunos_por_turma);
                  while ($user_data4 = mysqli_fetch_assoc($result_alunos_por_turma)) {
                    echo "<td>" . $user_data4['qtd_alunos_por_turma'] . "</td>";
                  }
                  echo "<td>
                      <a class='btn btn-sm btn-dark' href='delete_turma.php?nome_turma=$user_data3[nome_turma]'
                        placeholer='editar' class='btn btn-secondary' data-toggle='tooltip' data-placement='right' title='Deletar Turma'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                         <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg>
                      </a>
                  </td>";
                  echo "</tr>";
                    }
                  ?>
              </tbody>
            </table>
            </div><br><br><br>

      </div>

    <!--Container Main end-->

    <script>
      var desc = document.querySelector("#criar_turmas");
      desc.addEventListener("keypress", function(e) {
      var maxChars = 30;
      inputLength = desc.value.length;
      /* conta os caracteres */
      document.getElementById('characters').innerText = inputLength
      if(inputLength >= maxChars) {
      e.preventDefault();
      window.alert("André, você atingiu o máximo de caracteres permitidos!")
      }  
      });
      /* saida */
      function confirmaSair(){
    var confirma =confirm("André, tem certeza que deseja encerrar a sessão?");
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
window.location = 'turmas.php?search=' + search.value;
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