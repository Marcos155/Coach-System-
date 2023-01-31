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
          $cpf= $user_data['cpf'];
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
  function validateCPF($cpf) {
 
      // Extrai somente os números
      $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
       
      // Verifica se foi informado todos os digitos corretamente
      if (strlen($cpf) != 11) {
          return false;
      }
  
      // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
      if (preg_match('/(\d)\1{10}/', $cpf)) {
          return false;
      }
  
      // Faz o calculo para validar o CPF
      for ($t = 9; $t < 11; $t++) {
          for ($d = 0, $c = 0; $c < $t; $c++) {
              $d += $cpf[$c] * (($t + 1) - $c);
          }
          $d = ((10 * $d) % 11) % 10;
          if ($cpf[$c] != $d) {
              return false;
          }
      }
      return true;
  
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
    $cpf= $_POST['cpf'];

    if(validateCPF($cpf)){
    $result= mysqli_query($conexao_forms15, "INSERT INTO cadastro(cidade,estado,data_nasc,cpf) 
    VALUES ('$cidade','$estado','$data_nasc','$cpf')");
    header('Location:edit_regis.php');}
  }
?>
<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Completar Cadastro</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="assets/css/nav.css">
  <style>
    .btn:hover{
      opacity: 0.7;
      transition:all 0.5s;
    }
  </style>
</head>

<body className='snippet-body' style="background-color:#f8f9fa">

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
      <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"> <?php
              echo $nome ?></span> </a>
          <div class="nav_list"> 
            <?php
              /*echo "<a href='#' class='nav_link'> <i class='bx bx-grid-alt nav_icon'></i> <span
                class='nav_name'>Início</span> </a>";*/
              
                echo "<a href='show_sistema_persona.php?cod=$cod' class='nav_link active'> <i class='bx bx-user nav_icon'></i>
                <span class='nav_name'>Conta</span> </a>"; 
                
                echo "<a href='testando.php?cod=$cod' class='nav_link'> <i
                class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Formulário</span> </a>"; 
                
                echo "<a href='meta.php?cod=$cod' class='nav_link'> <i class='bx bxs-doughnut-chart'></i> <span class='nav_name'>Metas</span></a>" ;

                echo "<a href='https://wa.me/5561992656388' class='nav_link'><svg xmlns='http://www.w3.org/2000/svg' width='1.3em' height='1.3em' viewBox='0 0 24 24'><path fill='currentColor' d='M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z'/></svg> <span class='nav_name'>Mensagem</span></a>" ;
            ?>
          </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' onclick="confirmaSair()"></i> <span class="nav_name">Sair</span>
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
        <label for="exampleFormControlTextarea1" class="form-label">Primeiro nome</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1"
        placeholder="Qual seu nome campeão(a)?" type="text" placeholder="Nome" name="username" value="<?php echo $nome ?>" 
        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+"required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Último nome</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="Seu último nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="sobrenome" value="<?php echo $sobrenome ?>">
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
        <input type="tel" class="form-control"  placeholder="Telefone (99)99999-9999" pattern="[0-9]({2})[0-9]{5}-[0-9]{4}"
              name="phone" value="<?php echo $telefone ?>" maxlength="15" id="tel">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">CPF</label>
        <input type="tel" class="form-control" id="cpf"  placeholder="CPF 000.000.000-00"
              name="cpf" value="<?php echo $cpf ?>" maxlength="11" oninput="mascara(this)" required>
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
        placeholder="Qual sua cidade?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" name="cidade" value="<?php echo $cidade ?>" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Estado</label>
        <input type="text" class="form-control" id="exampleFormControlTextarea1" 
        placeholder="Qual seu estado?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" name="estado" value="<?php echo $estado ?>" list="estados" required>
        <datalist id="estados">
            <option>Acre </option>
            <option>Alagoas </option>
            <option>Amapá </option>
            <option>Amazonas </option>
            <option>Bahia </option>
            <option>Ceará </option>
            <option>Distrito Federal </option>
            <option>Espírito Santo </option>
            <option>Goiás </option>
            <option>Maranhão </option>
            <option>Mato Grosso </option>
            <option>Mato Grosso do Sul </option>
            <option>Minas Gerais </option>
            <option>Pará</option>
            <option>Acre  </option>
            <option>Alagoas  </option>
            <option>Amapá  </option>
            <option>Amazonas  </option>
            <option>Bahia  </option>
            <option>Ceará  </option>
            <option>Distrito Federal  </option>
            <option>Espírito Santo  </option>
            <option>Goiás  </option>
            <option>Maranhão  </option>
            <option>Mato Grosso  </option>
            <option>Mato Grosso do Sul  </option>
            <option>Minas Gerais  </option>
            <option>Pará </option>
        </datalist>
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
          id="update" onclick="return validar()">
          <br><br>
    </div>
 
      </form>



      <script>

const input = document.querySelector('#cpf');
      input.disabled=true;

const tel = document.getElementById('tel') // Seletor do campo de telefone

tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

const mascaraTelefone = (valor) => {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    tel.value = valor // Insere o(s) valor(es) no campo
}
function mascara(i){
   var v = i.value;
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";
}

</script>
    <script>
      function confirmaSair(){
    var confirma =confirm("<?php echo $nome ?>, tem certeza que deseja encerrar a sessão?");
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
          /*repetir senha */
        
  function validar(){
  var senha=forms.password.value;
  var confirmar_senha=forms.confirm_password.value;
  var cpf=forms.cpf.value;
  var phone=forms.phone.value;

if(phone.length != 15 ){
					alert('Número de telefone inválido!');
					forms.phone.focus();
          document.getElementById('tel').value='';
					return false;}
      
  if(cpf.length != 14){
					alert('Número de CPF inválido!');
					forms.cpf.focus();
          document.getElementById('cpf').value='';
					return false;}

  if(senha.length <= 5){
					alert('Preencha o campo senha com minimo 6 caracteres');
					forms.senha.focus();
          document.getElementById('senha').value='';
          document.getElementById('confirmar_senha').value='';
					return false;
				}
  if(senha.length > 20){
					alert('O campo senha só aceita até 20 caracteres');
					forms.senha.focus();
          document.getElementById('senha').value='';
          document.getElementById('confirmar_senha').value='';
					return false;
				}
				
	if (senha != confirmar_senha) {
					alert('As senhas devem ser iguais');
					forms.senha.focus();
          document.getElementById('senha').value='';
          document.getElementById('confirmar_senha').value='';
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