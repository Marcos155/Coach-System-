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
    $sqlselect = "SELECT * FROM meta_dinheiro WHERE cod=$cod";
    $result2 = $conexao_forms15->query($sqlselect);

    if($result2->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result2))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          $meta1= $user_data['meta1'];
          $meta2= $user_data['meta2'];
          $meta3= $user_data['meta3'];
          $meta4= $user_data['meta4'];
          $meta5= $user_data['meta5'];
        }

    }
    else{
        header('Location: sistema_metas_coach.php');
    }
  }
  else
  {
    header('Location: sistema_metas_coach.php');
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
  <link rel="stylesheet" href="style_coach_cad_meta.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
        body{
    /*background: linear-gradient(90deg,#f5f5f5 35%, rgb(202, 202, 202) 100%);*/
    background-image: linear-gradient(to right, #f5f5f5 35%,rgb(202, 202, 202));
    background-attachment: fixed;
}
.btn:hover{
    background-color: #f01e1e;
    color: rgb(247, 247, 247);
    transition: all 0.3s;
    border: none;
}
.btn{
  background-color: #000;
  color: #fff;
  outline:none;
}
.topo input{
  background:#fff;
}
#listaTarefas li{
  background:#fff;
}
button:hover{
  opacity: 0.7;
  transition:all 0.5s;
}
.frm-linha input {
  background:#fff;
  color:#000;
}
#idTarefaEdicao{
  opacity: 0;
}
#meta{
  background: #ccc;
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
    #abrir_dialog{
      color:#fff;
      border-radius:5px;
      border:none;
      padding: 7px 14px 7px 14px;
      outline:none;
    }
    #fechar_dialog{
      color:#fff;
      border-radius:5px;
      border:none;
      outline:none;
      background:#000;
    }
    #abrir_dialog:hover{
      padding: 6px 13px 6px 13px;
      opacity: 0.7;
     
    }
    #fechar_dialog:hover{
      background:#f01e1e;
      opacity: 0.7;
      transition:all 0.5s;
    }
    input:hover{
      opacity: 0.7;
      transition:all 0.5s;
    }
    #titulo_dialog{
      font-weight:bold;
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
              
              echo "<a href='sistema_metas_coach.php' class='nav_link active'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Meta-Alunos</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";

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
        <h2 style="color:#000;"><b>Cadastro de metas</b></h2>
        <p style="color:#000;">cadastro de metas em relação à dinheiro</b></p>
        <?php
        echo "<h3>aluno(a) <b>$nome</b></h3>"
        ?>
        <div class="conteudo">
        
        <div class="topo">
          <form action="save_meta_dinheiro.php" method="post" name="forms">
            <input type="text" name="meta" id="inputNovaTarefa" placeholder="Adicionar nova meta"  maxlength="200" required>
            <button type="submit" class="btn" class="enviar_forms" name="update"  id="update" data-toggle='tooltip' data-placement='right' title='Adicionar meta'>
                <i class="fa fa-plus"></i>
            </button>
            <label for="characters">Quantidade de caracteres: 200/ </label><span id="characters"></span><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <br><br>
            
            <p>Meta 1 :</p>
            <input id="meta1" value="<?php echo $meta1 ?>" placeholder="Meta 1 ainda não cadastrada">
            <button type="submit" class="btn" id="exluir" onclick="eliminaMeta1 ('meta')" name="deletar" data-toggle='tooltip' data-placement='right' title='Deletar meta'>
              <i class="fa fa-trash"></i>
            </button>

            <br><br>
            <p>Meta 2 :</p>
            <input id="meta2" value="<?php echo $meta2 ?>" placeholder="Meta 2 ainda não cadastrada">
            <button type="submit" class="btn" id="exluir" onclick="eliminaMeta2 ('meta')" name="deletar" data-toggle='tooltip' data-placement='right' title='Deletar meta'>
              <i class="fa fa-trash"></i>
            </button>

            <br><br>
            <p>Meta 3 :</p>
            <input id="meta3" value="<?php echo $meta3 ?>" placeholder="Meta 3 ainda não cadastrada">
            <button type="submit" class="btn" id="exluir" onclick="eliminaMeta3 ('meta')" name="deletar" data-toggle='tooltip' data-placement='right' title='Deletar meta'>
              <i class="fa fa-trash"></i>
            </button>

            <br><br>
            <p>Meta 4 :</p>
            <input id="meta4" value="<?php echo $meta4 ?>" placeholder="Meta 4 ainda não cadastrada">
            <button type="submit" class="btn" id="exluir" onclick="eliminaMeta4 ('meta')" name="deletar" data-toggle='tooltip' data-placement='right' title='Deletar meta'>
              <i class="fa fa-trash"></i>
            </button>

            <br><br>
            <p>Meta 5 :</p>
            <input id="meta5" value="<?php echo $meta5 ?>" placeholder="Meta 5 ainda não cadastrada">
            <button type="submit" class="btn" id="exluir" onclick="eliminaMeta5 ('meta')" name="deletar" data-toggle='tooltip' data-placement='right' title='Deletar meta'>
              <i class="fa fa-trash"></i>
            </button>
          
        </div>
            </form>
        <!--
        <button type="submit" class="btn" class="expandir"   id='abrir_dialog'  data-toggle='tooltip' data-placement='right' title='Ver meta'>
            <i class="fa fa-expand"></i>
        </button>
       
        <dialog>
          <h2 id='titulo_dialog'>Meta sobre dinheiro</h2>
            <?php //echo "<p>$meta</p>"; ?>
          <button id='fechar_dialog'>Ok</button>
        <dialog>-->

    </div>   

<!--
    <div id="janelaEdicao">
        <button id="janelaEdicaoBtnFechar">
            <i class="fa fa-remove fa-2x"></i>
        </button>
        <h2 id="idTarefaEdicao"></h2>
        <h2>Meta dinheiro</h2>
        <hr>   
            <div class="frm-linha">
                <label for="nome">Meta</label>
                <input type="text" id="inputTarefaNomeEdicao">
            </div>
            <div class="frm-linha">
                <button id="btnAtualizarTarefa">Salvar</button>
            </div>     
    </div>
    <div id="janelaEdicaoFundo"></div>
-->
        
    <div>
          <?php
            echo "
            <a href='sistema_metas_coach.php'>
              <input type='submit' class='btn' class='enviar_forms' value='Voltar'>
            </a>
            ";
          ?>
          <br><br>
    </div>
    <script>
      var desc = document.querySelector("#inputNovaTarefa");
      desc.addEventListener("keypress", function(e) {
      var maxChars = 200;
      inputLength = desc.value.length;
      /* conta os caracteres */
      document.getElementById('characters').innerText = inputLength
      if(inputLength >= maxChars) {
      e.preventDefault();
      window.alert("André, você atingiu o máximo de caracteres permitidos!")
      }  
      });
    </script>
    <script>
       function eliminaMeta1 (el){
    var confirma =confirm("Tem a certeza que quer eliminar a Meta?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/delete_metadinheiro.php?cod=<?php echo $cod?>";
       
    } 
};

function eliminaMeta2 (el){
    var confirma =confirm("Tem a certeza que quer eliminar a Meta?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/delete_meta2dinheiro.php?cod=<?php echo $cod?>";
       
    } 
};

function eliminaMeta3 (el){
    var confirma =confirm("Tem a certeza que quer eliminar a Meta?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/delete_meta3dinheiro.php?cod=<?php echo $cod?>";
       
    } 
};

function eliminaMeta4 (el){
    var confirma =confirm("Tem a certeza que quer eliminar a Meta?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/delete_meta4dinheiro.php?cod=<?php echo $cod?>";
       
    } 
};

function eliminaMeta5 (el){
    var confirma =confirm("Tem a certeza que quer eliminar a Meta?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/delete_meta5dinheiro.php?cod=<?php echo $cod?>";
       
    } 
};

function confirmaSair(){
    var confirma =confirm("André, tem certeza que deseja encerrar a sessão?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/sair.php";
       
    } 
};
    </script>
    <script>
      const input_meta1 = document.querySelector('#meta1');
      input_meta1.disabled=true;

      const input_meta2 = document.querySelector('#meta2');
      input_meta2.disabled=true;

      const input_meta3 = document.querySelector('#meta3');
      input_meta3.disabled=true;

      const input_meta4 = document.querySelector('#meta4');
      input_meta4.disabled=true;

      const input_meta5 = document.querySelector('#meta5');
      input_meta5.disabled=true;
    </script>
<script>
      const button = document.querySelector("#abrir_dialog");
      const modal = document.querySelector("dialog");
      const buttonClose = document.querySelector("dialog #fechar_dialog");
      button.onclick=function(){
        modal.showModal();
      };
      buttonClose.onclick=function(){
        modal.close();
      };
    </script>


    <script src="coach_cad_meta.js"></script>
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
window.location = 'sistema.php?search=' + search.value;
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