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
        $metaRelacionamento= $user_data['meta1'];
        $feitoRelacionamento=$user_data['feito'];
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
        $metaSaude= $user_data['meta'];
        $feitoSaude=$user_data['feito'];
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
        $metaTrabalho= $user_data['meta'];
        $feitoTrabalho=$user_data['feito'];
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
        $metaDinheiro= $user_data['meta'];
        $feitoDinheiro=$user_data['feito'];
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
        $metaOutro= $user_data['meta'];
        $feitoOutro=$user_data['feito'];
      }

  }
  else{
      header('Location: testando.php');
  }
}
else
{
  header('Location: testando.php');
}
    /*
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location:entrar.php');
        }
    $logado = $_SESSION['email'];
*/
    if (!empty($_GET['search'])) {
        $dataRelacionamento = $_GET['search'];
        $sql = "SELECT * FROM meta_relacionamento WHERE cod LIKE '%$dataRelacionamento%' or nome LIKE '%$dataRelacionamento%' or sobrenome like '%$dataRelacionamento%' or email LIKE '%$dataRelacionamento%' or 
          meta LIKE '%$dataRelacionamento%' or feito like '%$dataRelacionamento%' ";
      
      } else {
        $sql ="SELECT*from meta_relacionamento where meta_relacionamento.email = '$logado' ";
      } 
      /*
      $user_data = mysqli_fetch_assoc($resultRelacionamento);
      $feitoRelacionamento= $user_data['feito'];
      $metaRelacionamento= $user_data['meta'];
      $cod=$user_data['cod'];
      $nome= $user_data['nome'];*/
      /*$result2 = $conexao_regis->query($sql);*/
      $result2 = $conexao_forms15->query($sql);
      $user_data = mysqli_fetch_assoc($result2);
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
      background:#f01e1e;
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
         background-color:#eee;
         border-radius:2px;
    }
    h5{
      text-indent:1.6rem;
    }
  
  </style>
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
      <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"> <?php
              echo $nome ?></span> </a>
          <div class="nav_list"> 
            <?php
              /*echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";*/
              
              echo "<a href='show_sistema_persona.php?cod=$user_data[cod]' class='nav_link'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>"; 
              
              echo "<a href='testando.php?cod=$user_data[cod]' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
              
              echo "<a href='meta.php?cod=$user_data[cod]' class='nav_link active'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
      <br><br>
      <h2> Olá,
        <?php echo $nome ?>&#128578;
      </h2>
      <br>
      <b>
        <p>essas são suas metas para alcançar seu objetivo</p>
      </b><br><br>
     <b><h3>Metas já registradas</h3></b><br>
     <div class="table-wrapper">
      <div style="display: flex; justify-content: space-evenly;">
     
        <!-- 12 meses -->

        <!-- saude -->
        <section class="list">
        <header>Objetivos: 12 meses (Saúde)</header>
          <article class="card">
            <header>
                <?php echo $metaSaude ?>
            </header>
          </article> 
          <form action="save_feito_metaSaude.php" method="post">
            <!--
          <dialog>
          <h2 id='titulo_dialog'>Metas sobre Saude</h2><br>
            <input type="checkbox" value="feito" name="feito" <?php //echo ($feitoSaude == 'feito') ? 'checked' : ''?> >
            <h5><?php //echo "$metaSaude"; ?></h5>
            <br><br>
            <input type="hidden" name="cod" value="<?php //echo $cod ;?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="update" id='fechar_dialog'>
        <dialog>-->
        </form>
        </section>

        <!-- relacionamento -->
        <section class="list">
        <header>Objetivos: 12 meses (Relacionamentos)</header>
          <article class="card"  id='abrir_dialog' >
            <header>
                <?php echo $metaRelacionamento ?>
            </header>
          </article> 
          <form action="save_feito_metaRelacionamento.php" method="post">
          <dialog>
          <h2 id='titulo_dialog'>Metas sobre Relacionamento</h2><br>
            <input type="checkbox" value="feito" name="feito" <?php echo ($feitoRelacionamento == 'feito') ? 'checked' : ''?> >
            <h5><?php echo "$metaRelacionamento"; ?></h5>
            <br><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="update" id='fechar_dialog'>
        <dialog>
        </form>
        </section>

         <!-- Trabalho -->
         <section class="list">
        <header>Objetivos: 12 meses (Trabalho)</header>
          <article class="card">
            <header>
                <?php echo $metaTrabalho ?>
            </header>
          </article> 
          <form action="save_feito_metaTrabalho.php" method="post">
            <!--
          <dialog>
          <h2 id='titulo_dialog'>Metas sobre Trabalho</h2><br>
            <input type="checkbox" value="feito" name="feito" <?php// echo ($feitoTrabalho == 'feito') ? 'checked' : ''?> >
            <h5><?php// echo "$metaTrabalho"; ?></h5>
            <br><br>
            <input type="hidden" name="cod" value="<?php //echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="update" id='fechar_dialog'>
        <dialog>-->
        </form>
        </section>

         <!-- Dinheiro -->
         <section class="list">
        <header>Objetivos: 12 meses (Dinheiro)</header>
          <article class="card"  >
            <header>
                <?php echo $metaDinheiro ?>
            </header>
          </article> 
          <form action="save_feito_metaDinheiro.php" method="post">
            <!--
          <dialog>
          <h2 id='titulo_dialog'>Metas sobre Dinheiro</h2><br>
            <input type="checkbox" value="feito" name="feito" <?php //echo ($feitoDinheiro == 'feito') ? 'checked' : ''?> >
            <h5><?php //echo "$metaDinheiro"; ?></h5>
            <br><br>
            <input type="hidden" name="cod" value="<?php //echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="update" id='fechar_dialog'>
        <dialog>-->
        </form>
        </section>

         <!-- Outro -->
         <section class="list">
        <header>Objetivos: 12 meses (Demais objetivos)</header>
          <article class="card" >
            <header>
                <?php echo $metaOutro ?>
            </header>
          </article> 
          <form action="save_feito_metaOutro.php" method="post">
            <!--
          <dialog>
          <h2 id='titulo_dialog'>Metas sobre Outro</h2><br>
            <input type="checkbox" value="feito" name="feito" <?php //echo ($feitoOutro == 'feito') ? 'checked' : ''?> >
            <h5><?php //echo "$metaOutro"; ?></h5>
            <br><br>
            <input type="hidden" name="cod" value="<?php //echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="update" id='fechar_dialog'>
        <dialog>-->
        </form>
        </section>
        
      </div>
    </div>
    <!--
    <br>
    <a href='aluno_cad_meta.php'>
      <input type='submit' class='btn' class='enviar_forms' style='background-color:	#FF0000; color: #fff;' value='Cadastrar nova meta'>
    </a>-->
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
      function confirmaSair(){
    var confirma =confirm("Tem certeza que deseja encerrar a sessão?");
    if (confirma==true){
        window.location.href="http://localhost/Coach-System-/sair.php";
       
    } 
};
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
