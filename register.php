<?php
  if(isset($_POST['submit']))
  {
    
    include_once('config.php');

    $nome= $_POST['username'];
    $sobrenome= $_POST['sobrenome'];
    $email= $_POST['email'];
    $senha=  $_POST['password'];
    $tele= $_POST['phone'];
    $cpf= $_POST['cpf'];

    $val_email="SELECT*FROM cadastro WHERE email='$email'";
    $resultado_val_email=$conexao_forms15->query($val_email);

    $val_nome="SELECT*FROM cadastro WHERE nome='$nome' and sobrenome='$sobrenome' ";
    $resultado_val_nome=$conexao_forms15->query($val_nome);
    
    $val_cpf="SELECT*FROM cadastro WHERE cpf='$cpf'";
    $resultado_val_cpf=$conexao_forms15->query($val_cpf);

    $val_tele="SELECT*FROM cadastro WHERE telefone='$tele'";
    $resultado_val_tele=$conexao_forms15->query($val_tele);

    if(mysqli_num_rows($resultado_val_email)<=0 && mysqli_num_rows($resultado_val_cpf)<=0 && mysqli_num_rows($resultado_val_nome)<=0 && mysqli_num_rows($resultado_val_tele)<=0){

    /* cadastro */
    $result= mysqli_query($conexao_forms15, "INSERT INTO cadastro(nome,sobrenome,email,senha,telefone,cpf,nome_turma) 
    VALUES ('$nome','$sobrenome','$email','$senha','$tele','$cpf','Turma Geral')");

    /* metas */
    $result2= mysqli_query($conexao_forms15, "INSERT INTO meta_relacionamento(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result3= mysqli_query($conexao_forms15, "INSERT INTO meta_saude(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result4= mysqli_query($conexao_forms15, "INSERT INTO meta_trabalho(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result5= mysqli_query($conexao_forms15, "INSERT INTO meta_dinheiro(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result6= mysqli_query($conexao_forms15, "INSERT INTO meta_outro(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");

    /* formulario 15 anos */
    $result7= mysqli_query($conexao_forms15, "INSERT INTO formulario_15_anos(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");

    /* formularios 12 meses */
    $result8= mysqli_query($conexao_forms15, "INSERT INTO saude_12_meses(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result9= mysqli_query($conexao_forms15, "INSERT INTO relacionamento_12_meses(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result10= mysqli_query($conexao_forms15, "INSERT INTO dinheiro_12_meses(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result11= mysqli_query($conexao_forms15, "INSERT INTO trabalho_12_meses(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    $result12= mysqli_query($conexao_forms15, "INSERT INTO outro_12_meses(nome,sobrenome,email) 
    VALUES ('$nome','$sobrenome','$email')");
    
    
    /*header('Location:formulario.php');*/
    header('Location:entrar.php');}else{
      echo "<br><br><h2> Cadastro já existente! </h2><h4>Faça seu login aqui: <a href='entrar.php' style='color:#DC143C;'><b> ENTRAR</b></a></h4>";
    }
  } 
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
  <title>Criar conta</title>
  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <link rel="stylesheet" href="assets/css/style-login.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <style>
    #enviar{
      background-color:rgba(255,0,0,1);
      text-transform: uppercase;
      color: #fff;
      font-size:0.9em;
      padding-bottom: 0.5em;
      padding-top:0.5em;
      padding-left:0.5em;
      padding-right:0.5em;
      cursor:pointer;
      border-radius: 10rem;
      
      border-color:#000;
    }
    input[type=submit]{
      border:1px solid #000;
      width:10rem;
    }
    .termos{
      font-weight: bold
    }
    img{
      
      margin: 5px 5px 5px 5px;
      
    }
    .container{
      min-height: 565px;
    }
  </style>
</head>

<body>
  
<div class="container" id="container">
  <!--register-->  
  <div class="form-container sign-in-container">
      <form  action="register.php" method="post" name="forms">
        <h1>Criar conta</h1>
        <input type="text" placeholder="Nome" name="username" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" required/>
        <input type="text" placeholder="Sobrenome" name="sobrenome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" required/>
        <input type="email" placeholder="Email" name="email" required/>
        <input type="tel" name="phone" placeholder="Telefone (99)99999-9999" pattern="[0-9]({2})[0-9]{5}-[0-9]{4}" maxlength="15"  id="tel" required>
        <input type="tel" name="cpf" placeholder="CPF 000.000.000-00"  id="cpf" maxlength="14" oninput="mascara(this)" required>
   
        <table> 
        <tr><td><input type="password" placeholder="Senha" name="password"  id="senha" required/></td>
          <td><img src="eyes.png" alt="" id="eyesvg" onclick=" mostrarOcultarSenha()" width="24px"></td></tr>
        </table>
        <!-- confirmar senha -->
        <table>
        <tr>
          <td>
            <input type="password" placeholder="Confirmar senha" name="confirm_password"  id="confirmar_senha" required/>
          </td>
          <td>
            <img src="eyes2.png" alt="" id="eyesvg2" onclick=" mostrarOcultarSenha2()" width="24px">
          </td>
        </tr>
        </table>
       <table>
        <tr>
          <td>
            <input type="checkbox" id="termos" name="termos" required value="termos">
          </td>
          <td>
            <label for="termos">
                <a href="assets/pdf/termo-de-privacidade.pdf" download="termo-de-privacidade.pdf" 
                type="application/pdf" target="_blank" style="font-size: 0.7rem;" class="termos">
                li e concordo com os termos e privacidade</a> 
            </label>
          </td>
        </tr>
        </table>
        <div>
          <!--
        <button> Inscreva-se</button>
           -->
          <input type="submit" value="Cadastrar" name="submit" id="enviar"
          onclick="return validar()" onclick="alert('cadastro realizado com sucesso!')">
        </div>
      </form>
    </div>
    
    <!--login-->
    
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>Fala pessoa de sucesso!</h1>
          <p>Coloque seus dados pessoais e vamos rumo ao topo</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Java Script -->
<script>
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
    document.getElementById('remember').addEventListener('click', function () {
      var href = this.dataset.link;
      window.location = href;
    });
    document.getElementById('register').addEventListener('click', function () {
      var href = this.dataset.link;
      window.location = href;
    });



  </script>
  <script src="senha.js"></script>
  <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active");
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


  /* o CPF existe? */

  </script>
</body>

</html>