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
    /* relacionamento */
    $sqlselectRelacionamento = "SELECT * FROM meta_relacionamento WHERE cod=$cod";
    $resultRelacionamento = $conexao_forms15->query($sqlselectRelacionamento);

    /* saude */
    $sqlselectSaude = "SELECT * FROM meta_saude WHERE cod=$cod";
    $resultSaude = $conexao_forms15->query($sqlselectSaude);

    /* Trabalho */
    $sqlselectTrabalho = "SELECT * FROM meta_trabalho WHERE cod=$cod";
    $resultTrabalho = $conexao_forms15->query($sqlselectTrabalho);

    /* Dinheiro */
    $sqlselectDinheiro = "SELECT * FROM meta_dinheiro WHERE cod=$cod";
    $resultDinheiro = $conexao_forms15->query($sqlselectDinheiro);

    /* Outro */
    $sqlselectOutro = "SELECT * FROM meta_outro WHERE cod=$cod";
    $resultOutro = $conexao_forms15->query($sqlselectOutro);

    /* relacionamento */
    if($resultRelacionamento->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($resultRelacionamento))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          
        $metaRelacionamento1= $user_data['meta1'];
        $metaRelacionamento2= $user_data['meta2'];
        $metaRelacionamento3= $user_data['meta3'];
        $metaRelacionamento4= $user_data['meta4'];
        $metaRelacionamento5= $user_data['meta5'];
        
        $feitoRelacionamento1=$user_data['feito1'];
        $feitoRelacionamento2=$user_data['feito2'];
        $feitoRelacionamento3=$user_data['feito3'];
        $feitoRelacionamento4=$user_data['feito4'];
        $feitoRelacionamento5=$user_data['feito5'];
        }

    }
    /* Saude */
    if($resultSaude->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($resultSaude))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          
          $metaSaude1= $user_data['meta1'];
          $metaSaude2= $user_data['meta2'];
          $metaSaude3= $user_data['meta3'];
          $metaSaude4= $user_data['meta4'];
          $metaSaude5= $user_data['meta5'];
          
          $feitoSaude1=$user_data['feito1'];
          $feitoSaude2=$user_data['feito2'];
          $feitoSaude3=$user_data['feito3'];
          $feitoSaude4=$user_data['feito4'];
          $feitoSaude5=$user_data['feito5'];
        }

    }
    /* Trabalho */
    if($resultTrabalho->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($resultTrabalho))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          
          $metaTrabalho1= $user_data['meta1'];
          $metaTrabalho2= $user_data['meta2'];
          $metaTrabalho3= $user_data['meta3'];
          $metaTrabalho4= $user_data['meta4'];
          $metaTrabalho5= $user_data['meta5'];
          
          $feitoTrabalho1=$user_data['feito1'];
          $feitoTrabalho2=$user_data['feito2'];
          $feitoTrabalho3=$user_data['feito3'];
          $feitoTrabalho4=$user_data['feito4'];
          $feitoTrabalho5=$user_data['feito5'];
        }

    }
    /* Dinheiro */
    if($resultDinheiro->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($resultDinheiro))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          
          $metaDinheiro1= $user_data['meta1'];
          $metaDinheiro2= $user_data['meta2'];
          $metaDinheiro3= $user_data['meta3'];
          $metaDinheiro4= $user_data['meta4'];
          $metaDinheiro5= $user_data['meta5'];
          
          $feitoDinheiro1=$user_data['feito1'];
          $feitoDinheiro2=$user_data['feito2'];
          $feitoDinheiro3=$user_data['feito3'];
          $feitoDinheiro4=$user_data['feito4'];
          $feitoDinheiro5=$user_data['feito5'];
        }

    }
    /* Outro */
    if($resultOutro->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($resultOutro))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          
          $metaOutro1= $user_data['meta1'];
          $metaOutro2= $user_data['meta2'];
          $metaOutro3= $user_data['meta3'];
          $metaOutro4= $user_data['meta4'];
          $metaOutro5= $user_data['meta5'];
          
          $feitoOutro1=$user_data['feito1'];
          $feitoOutro2=$user_data['feito2'];
          $feitoOutro3=$user_data['feito3'];
          $feitoOutro4=$user_data['feito4'];
          $feitoOutro5=$user_data['feito5'];
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
  <title>Meta</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <link rel="stylesheet" href="assets/css/style-trelo.css">
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
    background-image: linear-gradient(to right, #f5f5f5 35%,rgb(202, 202, 202));
    background-attachment: fixed;
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
    #abrir_dialog{
      color:#000;
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
    input[type=checkbox] {
         position: absolute;
	       cursor: pointer;
         left:1.1rem;
         height:20px;
         width:20px;
         background-color:#000;
         border-radius:2px;
    }
    h5{
      text-indent:1.6rem;
    }
  input{
    border-radius:20px;
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
              
              echo "<a href='sistema.php' class='nav_link active'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta-Alunos</span> </a>"; 
              
              echo "<a href='sistema_coach_forms.php' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário-Alunos</span> </a>"; 
              
              echo "<a href='sistema_metas_coach.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas-Alunos</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";

              echo "<a href='gerarQRCode.php' class='nav_link'> <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' preserveAspectRatio='xMidYMid meet' 
              viewBox='0 0 32 32'><path fill='currentColor' d='M5 5v8h2v2h2v-2h4V5H5zm8 8v2h2v2h-4v2H5v8h8v-8h6v-2h-2v-2h4v-2h2v2h2v-2h2V5h-8v8h-6zm12 2v2h2v-2h-2zm0 2h-2v2h2v-2zm0 2v2h2v-2h-2zm0 2h-2v-2h-2v2h-5v6h2v-4h4v2h2v-2h1v-2zm-3 4h-2v2h2v-2zm1-8v-2h-2v2h2zm-12 0v-2H9v2h2zm-4-2H5v2h2v-2zm8-10v4h-1v2h1v1h2V9h1V7h-1V5h-2zM7 7h4v4H7V7zm14 0h4v4h-4V7zM8 8v2h2V8H8zm14 0v2h2V8h-2zM7 21h4v4H7v-4zm1 1v2h2v-2H8zm17 3v2h2v-2h-2z'/></svg>
               <span class='nav_name'>Gerar QR Code</span> </a>"; 
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div>
        <p>Analise do <b>andamento das metas</b> do aluno(a)</b><h2><?php echo "<b> <big>$nome</big></b>";?></h2></p>
<br><br>
     <div class="table-wrapper">
     <div style="display: flex; justify-content: space-evenly;">
      <!-- saúde -->
     <section class="list">
        <header>Objetivos: 12 meses (Saúde)</header>
          <article class="card"  id='abrir_dialog' >
          <form action="meta.php" method="post">
            <ul>
              <li>
                <?php echo "$metaSaude1"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude1 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaSaude2"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude2 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaSaude3"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude3 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaSaude4"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude4 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaSaude5"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude5 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
            </ul>
          
        </form>
          </article>    
        </section>     
        <!-- relacionamentos -->
        <section class="list">
        <header>Objetivos: 12 meses (Relacionamentos)</header>
          <article class="card"  id='abrir_dialog' >
          <form action="meta.php" method="post">
            <ul>
              <li>
                <?php echo "$metaRelacionamento1"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaRelacionamento2"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento2 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaRelacionamento3"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento3 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaRelacionamento4"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento4 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaRelacionamento5"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento5 == 'on') ? 'checked' : ''?> disabled>
              </li>
            </ul>
          
        </form>
          </article>    
        </section> 

         <!-- Trabalho -->
         <section class="list">
        <header>Objetivos: 12 meses (Trabalho)</header>
          <article class="card"  id='abrir_dialog' >
          <form action="meta.php" method="post">
            <ul>
              <li>
                <?php echo "$metaTrabalho1"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho1 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaTrabalho2"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho2 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaTrabalho3"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho3 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaTrabalho4"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho4 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaTrabalho5"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho5 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
            </ul>
        </form>
          </article>    
        </section> 
         <!-- dinheiro -->
         <section class="list">
        <header>Objetivos: 12 meses (Dinheiro)</header>
          <article class="card"  id='abrir_dialog' >
          <form action="meta.php" method="post">
            <ul>
              <li>
                <?php echo "$metaDinheiro1"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro1 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaDinheiro2"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro2 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaDinheiro3"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro3 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaDinheiro4"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro4 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaDinheiro5"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro5 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
            </ul>
        </form>
          </article>    
        </section> 
         <!--outro -->
         <section class="list">
        <header>Objetivos: 12 meses (Outros Objetivos)</header>
          <article class="card"  id='abrir_dialog' >
          <form action="meta.php" method="post">
            <ul>
              <li>
                <?php echo "$metaOutro1"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro1 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaOutro2"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro2 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaOutro3"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro3 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaOutro4"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro4 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
              <li>
                <?php echo "$metaOutro5"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro5 == 'Ok') ? 'checked' : ''?> disabled>
              </li>
            </ul>
          
        </form>
          </article>    
        </section> 
    </div>
    </div>
    
    <br><br><br>

      <!-- grpaficos 
      <h2 style="text-align: center;">Conclusão das atividades</h2 style="text-align: center;">
      <div style="width: 30vw; display: inline-block; margin-left: 35%;">
        <canvas id="conclusao" width="300" height="300"></canvas>
      </div><br><br><br>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="assets/js/style-trelo.js"></script>
      <script>
        const ctx = document.getElementById('turmas').getContext('2d');
        const turmas = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Turma 1', 'turma2', 'Turma 3', 'turma 4', 'Turma 5', 'turma 6' ///turmas tem que vir aqui 
            ],
            datasets: [{
              label: 'Notas das turmas',
              data: [6, 5, 3, 9, 8, 7], ///dados das notas tem que estarem aqui 
              backgroundColor: [
                '#198754b8'

              ],
              hoverBackgroundColor: [
                '#198754',
              ],
              borderColor: [
                'black',
              ],
              borderWidth: 1,
              hoverBorderWidth: 5,
            }]
          },
          options: {
            scales: {
              indexAxis: 'x',
            }
          }
        });

      </script>
      <script>
        new Chart(
          document.getElementById('alunos'),
          {
            type: 'bar',
            data: {
              labels: ['Aluno 1', 'Aluno2', 'Aluno 3', 'Aluno 4', 'Aluno 5', 'Aluno 6' ///nome dos alunos tem que vir aqui 
              ],
              datasets: [{
                label: 'Notas dos alunos',
                data: [6, 5, 3, 9, 8, 7], ///dados das notas tem que estarem aqui 
                backgroundColor: [
                  '#6a0baaa6'
                ],
                hoverBackgroundColor: [
                  '#6a0baa',],
                borderColor: [
                  'black',
                ],
                borderWidth: 1,
                hoverBorderWidth: 5,
              }]
            },
            options: {
              scales: {
                indexAxis: 'x',
              }
            }
          });
        new Chart(
          document.getElementById('conclusao'),
          {
            type: 'doughnut',
            data: {
              labels: ['Falta concluir', 'Concluído'///
              ],
              datasets: [{
                label: 'Notas dos alunos',
                data: [6, 5], ///trazer os dados de conclusão das anotações, numero 6 falta é o falta concluir  
                backgroundColor: [
                  '#0040ffb0',
                  'white',
                ],
                hoverBackgroundColor: [
                  '#0040ff',
                  'white'
                ],
                borderColor: [
                  'black',
                ],
                borderWidth: 1,
                hoverBorderWidth: 5,
              }]
            },
            options: {
              scales: {
                indexAxis: 'x',
              }
            }
          });
      </script>-->
    </div>
    <!--Container Main end-->

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

      /* travar input check */
      const input_feitoRelacionamento = document.querySelector('#feitoRelacionamento');
      input_feitoRelacionamento.disabled=true;

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
      });</script>

  </body>

</html>