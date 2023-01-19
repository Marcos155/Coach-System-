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
    $sqlselect = "SELECT * FROM meta_relacionamento WHERE cod=$cod";
    $result2 = $conexao_forms15->query($sqlselect);

    if($result2->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result2))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          $meta= $user_data['meta'];
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
  if(isset($_POST['submit']))
  {
    
    include_once('config.php');
    $email= $_POST['email'];
    $nome= $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $meta= $_POST['meta'];
    $result= mysqli_query($conexao_forms15, "INSERT INTO meta_relacionamento(meta) 
    VALUES ('$meta')");
    
    header('Location:coach_meta_relacionamento.php');
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
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
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
              
              echo "<a href='sistema_metas_coach.php' class='nav_link active'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas-Alunos</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";

              echo "<a href='gerarQRCode.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' preserveAspectRatio='xMidYMid meet' 
              viewBox='0 0 32 32'><path fill='currentColor' d='M5 5v8h2v2h2v-2h4V5H5zm8 8v2h2v2h-4v2H5v8h8v-8h6v-2h-2v-2h4v-2h2v2h2v-2h2V5h-8v8h-6zm12 2v2h2v-2h-2zm0 2h-2v2h2v-2zm0 2v2h2v-2h-2zm0 2h-2v-2h-2v2h-5v6h2v-4h4v2h2v-2h1v-2zm-3 4h-2v2h2v-2zm1-8v-2h-2v2h2zm-12 0v-2H9v2h2zm-4-2H5v2h2v-2zm8-10v4h-1v2h1v1h2V9h1V7h-1V5h-2zM7 7h4v4H7V7zm14 0h4v4h-4V7zM8 8v2h2V8H8zm14 0v2h2V8h-2zM7 21h4v4H7v-4zm1 1v2h2v-2H8zm17 3v2h2v-2h-2z'/></svg>
               <span class='nav_name'>Gerar QR Code</span> </a>"; 
            ?>
          </div>
        </div> <a href="sair.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div>
    <main class="mdl-layout__content">
        <div class="page-content">
        <h2 style="color:#000;"><b>Cadastro de metas</b></h2>
        <p style="color:#000;">cadastro de metas em relação à relacionamentos</b></p>
        <?php
        echo "<h3>aluno(a) <b>$nome</b></h3>"
        ?><br>
        <div class="conteudo">
        
        <div class="topo">
          <form action="save_meta_relacionamento.php" method="post" name="forms">
            <!--
          <label for="id_meta">Número da meta <b>(máx:20)</b></label>
            <input list="num_meta" id="id_meta" name="id_meta" type="number" min="1" max="20" required/>
            <datalist id="num_meta">
              <option value="1"></option>
              <option value="2"></option>
              <option value="3"></option>
              <option value="4"></option>
              <option value="5"></option>
              <option value="6"></option>
              <option value="7"></option>
              <option value="8"></option>
              <option value="9"></option>
              <option value="10"></option>
              <option value="11"></option>
              <option value="12"></option>
              <option value="13"></option>
              <option value="14"></option>
              <option value="15"></option>
              <option value="16"></option>
              <option value="17"></option>
              <option value="18"></option>
              <option value="19"></option>
              <option value="20"></option>
            </datalist>
            <br>
            <br>-->
            <input type="text" name="meta" id="inputNovaTarefa" placeholder="Adicionar nova meta">
            
            <button type="submit" class="btn" class="enviar_forms" name="update"  id="update" >
                <i class="fa fa-plus"></i>
            </button>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <br><br>
            <input id="meta" value="<?php echo $meta ?>">
          </form>
        </div>
        <button type="submit" class="btn" id="exluir" onclick="eliminaMeta ()" name="deletar">
            <i class="fa fa-trash"></i>
        </button>

        <button type="submit" class="btn" class="expandir"   id='abrir_dialog'  >
            <i class="fa fa-expand"></i>
        </button>
       
        <dialog>
          <h2 id='titulo_dialog'>Meta sobre Relacionamento</h2>
            <?php echo "<p>$meta</p>"; ?>
          <button id='fechar_dialog'>Ok</button>
        <dialog>

    </div>   

<!--
    <div id="janelaEdicao">
        <button id="janelaEdicaoBtnFechar">
            <i class="fa fa-remove fa-2x"></i>
        </button>
        <h2 id="idTarefaEdicao"></h2>
        <h2>Meta Relacionamento</h2>
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
    </div>
    <script>
       function eliminaMeta (){
    var confirma =confirm("Tem a certeza que quer eliminar a Meta?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/delete_metaRelacionamento.php?cod=<?php echo $cod?>";
    } 
}
    </script>
    <script>
      const input_saude7 = document.querySelector('#meta');
      input_saude7.disabled=true;
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