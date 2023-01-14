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
    $sqlselect = "SELECT * FROM cadastro WHERE cod=$cod";
    $result2 = $conexao_forms15->query($sqlselect);

    if($result2->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result2))
        {
          $nome= $user_data['nome'];
          $sobrenome= $user_data['sobrenome'];
          $email= $user_data['email'];
          $senha= $user_data['senha'];
          $telefone= $user_data['telefone'];
          $sexo= $user_data['sexo'];
          $cidade= $user_data['cidade'];
          $estado= $user_data['estado'];
          $data_nasc= $user_data['data_nasc'];
        }

    }
    else{
        header('Location: show_sistema_persona.php');
    }
  }
  else
  {
    header('Location: show_sistema_persona.php');
    /*$fallback = 'index.html';
    $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    header("location: {$anterior}");
    exit;*/
  }
  if(isset($_POST['submit']))
  {
    
    include_once('config.php');
    $email= $_POST['email'];
    $nome= $_POST['nome'];
    $sobrenome= $_POST['sobrenome'];
    $telefone= $_POST['telefone'];
    $sexo= $_POST['sexo'];
    $senha= $_POST['senha'];
    $cidade= $_POST['cidade'];
    $estado= $_POST['estado'];
    $data_nasc= $_POST['data_nasc'];
    $result= mysqli_query($conexao_forms15, "INSERT INTO cadastro(cidade,estado,data_nasc) 
    VALUES ('$cidade','$estado','$data_nasc')");
    
    header('Location:edit_regis.php');
  }
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Formulário</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">

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
      <h2><?php echo $nome ?>, vamos completar seu cadastro &#128578;</h2><br>
      <?php
        //echo"<form action='show_sistema_forms.php?cod=$user_data[cod]' method='post'>";
        echo"<form action='save_edit_regis.php' method='post' name='forms'>";
      ?>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Nome</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
        placeholder="Qual seu nome campeão(a)?" type="text" placeholder="Nome" name="username" value="<?php echo $nome ?>" 
        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+"required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Sobrenome</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="Seu sobrenome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="sobrenome" value="<?php echo $sobrenome ?>" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
        placeholder="Email para contato" type="email" placeholder="Email" name="email" 
        value="<?php echo $email ?>"  required>
      </div>
      <input type="hidden" name="cod" value="<?php echo $cod ?>">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Telefone</label>
        <input type="tel" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="telefone"  placeholder="Telefone (99)99999-9999" pattern="[0-9]({2})[0-9]{5}-[0-9]{4}"
              name="phone" value="<?php echo $telefone ?>" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Sexo</label>
        <br>
            <input type="radio" value="feminino" name="sexo" <?php echo ($sexo == 'feminino') ? 'checked' : ''?> required>
            <label for="faminino">Feminino</label>
            <input type="radio"  value="masculino" name ="sexo" <?php echo ($sexo == 'masculino') ? 'checked' : ''?> required>
            <label for="masculino">Masculino</label>
            <input type="radio" value="outro" name ="sexo" <?php echo ($sexo == 'outro') ? 'checked' : ''?> required>
            <label for="outro">Outro</label>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="Qual sua cidade?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="cidade" value="<?php echo $cidade ?>" required >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Estado</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="Qual seu estado?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="estado" value="<?php echo $estado ?>" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="exampleFormControlTextarea1" name="data_nasc" value="<?php echo $data_nasc ?>" required>
      </div>
      <div  class="mb-3">

            
            <table>
              <th>
                <label for="exampleInputEmail1" class="form-label">Senha</label>
              </th>
              <th></th>
              <th>
                <label for="exampleInputEmail1" class="form-label">Confirmar senha</label>
            </th>
            <tr>

                <td>
                  <input type="password" class="form-control" type="password" placeholder="Senha" name="password"  value="<?php echo $senha ?>" id="senha" required>
                </td>
                <td>
                  <img src="eyes.png" alt="" id="eyesvg" onclick=" mostrarOcultarSenha()" width="24px">
                </td>
              <td>
                <input class="form-control" type="password" placeholder="Confirmar senha" name="confirm_password"  id="confirmar_senha" value="<?php echo $senha ?>" required/>
              </td> 
              <td>
                <img src="eyes2.png" alt="" id="eyesvg2" onclick=" mostrarOcultarSenha2()" width="24px">
              </td>
            </tr> 
          </table>
        
        </div>
        <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Salvar" name="update"
           onclick="return validar()"
          id="update">
    </div>
 
      </form>
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
          /*repetir senha */
  function validar(){
  var senha=forms.password.value;
  var confirmar_senha=forms.confirm_password.value;

  if(senha.length <= 5){
					alert('Preencha o campo senha com minimo 6 caracteres');
					forms.senha.focus();
          document.getElementById('senha').value='';
          document.getElementById('confirmar_senha').value='';
					return false;
				}
				
	if(confirmar_senha.length <= 5){
					alert('Preencha o campo confirmar senha com minimo 6 caracteres');
					forms.confirmar_senha.focus();
          document.getElementById('senha').value='';
          document.getElementById('confirmar_senha').value='';
					return false;
				}
				
	if (senha != confirmar_senha) {
					alert('As senhas devem ser iguais');
					forms.senha.focus();
          document.getElementById('senha').value='';
          document.getElementById('confirmar_senha').value='';
          /*forms.reset();*/
					return false;
				}
  }

    /* mostrar e ocultar senha */
    function mostrarOcultarSenha(){
    var senha=document.getElementById("senha");
    if(senha.type=="password"){
      senha.type="text";
      eyesvg.setAttribute("src","visibility.png");
      
    }else{
      senha.type="password";
      eyesvg.setAttribute("src","eyes.png");
    }
  }

  function mostrarOcultarSenha2(){
    var senha2=document.getElementById("confirmar_senha");
    if(senha2.type=="password"){
      senha2.type="text";
      eyesvg2.setAttribute("src","visibility2.png");
      
    }else{
      senha2.type="password";
      eyesvg2.setAttribute("src","eyes2.png");
    }
  }
      </script>

  </body>

</html>