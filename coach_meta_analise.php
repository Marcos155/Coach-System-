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
          $metaRelacionamento= $user_data['meta'];
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
        </div> <a href="sair.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <!--Container Main start-->
    <div>
      <h2><b>André</b></h2>
        <p>Aqui você pode <b>analisar</b> como está o <b>andamento das metas</b> de seu aluno(a)</b></p>
<br><br>

     <div class="table-wrapper">
      <div style="display: flex; justify-content: space-evenly;">
       <!--
        <section class="list">
          <header>Objetivos: daqui 15 anos</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox"><?php ?>
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
-->
        <!-- 12 meses -->
        <section class="list">
          <header>Objetivos: 12 meses (Saúde)</header>
          <article class="card">
            
            <header>
                <input class="" type="checkbox">
            </header>
            <!--
            <div class="detail">1/2</div>
            -->
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Relacionamento)</header>
          <article class="card">
          <header>
                <input class="" type="checkbox">
                <?php echo $metaRelacionamento ?>
            </header>
            <!--
            <div class="detail">1/2</div>
            -->
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Dinheiro)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Trabalho)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Outros)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
      </div>
    </div>
      <br><br><br><br>
<!--
      <p>andamento das <b>metas cadastradas por seu aluno(a)</b></p>
<br><br>
     <div class="table-wrapper">
      <div style="display: flex; justify-content: space-evenly;">
        <section class="list">
          <header>Objetivos: daqui 15 anos</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>-->
        <!-- 12 meses -->
        <!--
        <section class="list">
          <header>Objetivos: 12 meses (Saúde)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Relacionamentos)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Dinheiro)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Trabalho)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
        <section class="list">
          <header>Objetivos: 12 meses (Outros)</header>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
          <article class="card">
            <header>
                <input class="" type="checkbox">
            </header>
            <div class="detail">1/2</div>
          </article>
        </section>
      </div>
    </div>
      <br><br><br><br>-->

      <!-- grpaficos -->
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
      </script>

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