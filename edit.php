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
    $sqlselect = "SELECT * FROM formulario_15_anos WHERE cod=$cod";
    $result = $conexao_forms15->query($sqlselect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
          $nome=$user_data['nome'];
          $saude= $user_data['saude'];
          $relacionamento= $user_data['relacionamento'];
          $financeiro= $user_data['financeiro'];
          $espiritual= $user_data['espiritual'];
          $outro= $user_data['outro'];
        }

    }
    else{
        header('Location: testando.php');
    }
  }
  else
  {
    /*header('Location: testando.php');*/
    $fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;
  }
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Editar formulário</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">

</head>

<body className='snippet-body'>

  <body id="body-pd" style="background-color:#f8f9fa">
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
              echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";
              
              echo "<a href='show_sistema_persona.php' class='nav_link active'> <i class='bx bx-user nav_icon'></i>
              <span class='nav_name'>Conta</span> </a>"; 
              
              echo "<a href='testando.php' class='nav_link'> <i
              class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
              
              echo "<a href='meta.php' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;
              
              echo "<a href='#' class='nav_link'> <i class='bx bx-chat'></i> <span class='nav_name'>Mensagem</span></a>";
            ?>
          </div>
        </div> <a href="sair.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
        </a>
      </nav>
    </div>
    <div class="height-100 bg-light">
      <br><br>
      <h2><?php echo $nome?>, edite aqui os dados do seu formulário &#128578;</h2><br>
      <b>
        <p>Edite aqui os dados da sua meta para daqui <u>15 anos</u></p>
      </b><br>
      <?php
        //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
        echo"<form action='save_edit.php' method='post' name='forms'>";
      ?>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como quer estar de saúde</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Ex: Estar na faixa do 65Kg" name="saude" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como quer estar nos seus relacionamentos ?</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Ex: Casado e com filhos..." name="relacionamento"required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como quer estar financeiramente ?</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Ex: vivendo de renda..." name="financeiro" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como quer estar espiritualmente ?</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Objetivos espirituais" name="espiritual" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Algum outro ?</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Escreva outro objetivo" name="outro">
        <small id="emailHelp" class="form-text text-muted">Descreva aqui algum outro objetivo que tenha e que foi listado acima</small>
      </div><br>
    </div>
    <div class="height-100 bg-light">
<!--
      <b>
        <p>Agora seus objetivos para os proximos <u>12 meses</u></p>
      </b>
      <p>Metodologia 5W2h</p><br>
      <p>Primeira parte sobre saúde</p>
      <div class="mb-3">
        <li>Saude</li><br>
        <label for="exampleFormControlTextarea1" class="form-label">O que ?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Ex: Estar na faixa do 65Kg"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Alguma pessoa em especial ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Onde precisa estar para alcançar esse objetivo ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Motivo do objetivo"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como fazer ?"><br>
      </div>
      <br><br>-->
      <!-- //////////// -->
      <!--
      <p>Agora sobre relacionamentos</p>
      <div class="mb-3">
        <li>Relacionamentos</li><br>
        <label for="exampleFormControlTextarea1" class="form-label">O que ?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como quer estar nos seus relacionamentos?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Alguma pessoa em especial ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Onde precisa estar para alcançar esse objetivo ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Motivo do objetivo"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como fazer ?"><br>
      </div>
      <br><br>
      <p>Agora sobre seu trabalho</p>
      <div class="mb-3">
        <li>Trabalho</li><br>
        <label for="exampleFormControlTextarea1" class="form-label">O que ?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como quer estar em seus trabalhos ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Alguma pessoa em especial ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Onde precisa estar para alcançar esse objetivo ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Motivo do objetivo"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como fazer ?"><br>
      </div>
      <br><br>
      <p>Agora sobre seu dinheiro</p>
      <div class="mb-3">
        <li>Dinheiro</li><br>
        <label for="exampleFormControlTextarea1" class="form-label">O que ?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como quer estar financeiramente?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Alguma pessoa em especial ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Onde precisa estar para alcançar esse objetivo ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Motivo do objetivo"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como fazer ?"><br>
      </div>
      <br><br>
      <p>Agora descreva outro objetivo que tenha que não foi citado</p>
      <div class="mb-3">
        <li>Outro</li><br>
        <label for="exampleFormControlTextarea1" class="form-label">O que ?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Qual objetivo?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quem?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Alguma pessoa em especial ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Onde?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Onde precisa estar para alcançar esse objetivo ?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Quando?</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Em qual época quer alcançar?"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Por quê?</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Motivo do objetivo"><br>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Como</label>
        <input type="email" class="form-control" id="exampleFormControlTextarea1"
          placeholder="Como fazer ?"><br>
      </div>
      <br><br>
      <input type="email" class="form-control" id="exampleFormControlTextarea1" placeholder="Trazer o 'como' do banco para cá"><br>
      <p>É possivel ?</p>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"checked>
        <label class="form-check-label" for="flexCheckDefault">
          Sim
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
        <label class="form-check-label" for="flexCheckChecked">
          Não 
        </label>
      </div><br>
      <br>
      <p>Ações em saúde</p>-->
      <?php
        //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
        //echo"<form action='testando.php' method='post'>";
      ?>
      <div class="form-group espace">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Qual seu nome?"
          pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" name="nome"
          value="<?php echo $nome ?>" 
          required>
        <small id="emailHelp" class="form-text text-muted">Coloque aqui o mesmo nome utilizado no cadastro</small>
      </div>

      <div class="form-group espace">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Email" name="email" required />
        <small id="emailHelp" class="form-text text-muted">Coloque aqui o mesmo email usado no cadastro</small>
      </div>
<!--
      <div class="form-group espace">
        <label for="exampleInputEmail1">Meta</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Qual sua meta?" name="meta" required>
        <small id="emailHelp" class="form-text text-muted">Coloque aqui seu objetivo. Exemplo: perder peso</small>
      </div>

      <div class="form-group espace">
        <label for="exampleFormControlTextarea1">Defina sua meta</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"
          placeholder="Explique com detalhes seu objetivo" name="desc_meta">
      </div>

      <div class="form-group espace">
        <label for="exampleInputPassword1">Data de inicio</label>
        <input type="date" class="form-control" id="exampleInputPassword1" name="data_inicio">
        <label for="exampleInputPassword1">Data de conclusão</label>
        <input type="date" class="form-control" id="exampleInputPassword1" name="data" required>
        <small id="emailHelp" class="form-text text-muted">Quando quer concluir esse objetivo?</small>
      </div>
      <div class="form-group espace">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Atualmente o que já fez para concluir seu objetivo?" name="status" required>
        <small id="emailHelp" class="form-text text-muted">Coloque aqui o que já fez ou está fazendo para alcançar
          sua meta</small>
      </div>
-->
          <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Salvar" name="update" id="update">
      </form>
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
      });</script>

  </body>

</html>