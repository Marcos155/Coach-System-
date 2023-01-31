<?php
include_once('config.php');
/*Deve funcionar quando estiver num servidor 
if(isset($_POST['submit'])){
  $to=$_POST['email'];
  $subject='Redefinição de Senha Coach-André Fernandes';
  $message='Olá, faça o registro da sua nova senha aqui ';
  $headers='From: adm@gmail.com'."\r\n".'Reply-To: adm@gmail.com';

  mail($to,$subject,$message,$headers);
  print "Enviado!";

}*/
if(isset($_POST['submit'])){
  include_once('config.php');
  
  $email=$_POST['email'];
  $cpf=$_POST['cpf'];
  $nome=$_POST['nome'];
  $sobrenome=$_POST['sobrenome'];

  $sql = "SELECT * FROM cadastro WHERE email = '$email' and cpf = '$cpf' and nome = '$nome' and sobrenome='$sobrenome' ";
  $result=$conexao_forms15->query($sql);

  if(mysqli_fetch_assoc($result))
  {
      $nova_senha= rand(100000,999999);
      $sql_senha= "UPDATE cadastro SET senha=MD5('$nova_senha') WHERE email = '$email' and cpf = '$cpf' and nome = '$nome' and sobrenome='$sobrenome' ";
      $result_senha=$conexao_forms15->query($sql_senha);
      echo "<b><h1>Sua nova senha é: </h1></b><b><h3>$nova_senha</h3></b><h5><a href='entrar.php' target='_blank' rel='noopener noreferrer'>Entrar</a></h5>";
  } else
  {   
      echo "<b><h5>Usuário não encontrado!</h5></b>";
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
  <title>Redefinir senha</title>
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
  </style>
</head>
<body>
   
<div class="container" id="container">
  <div class="form-container sign-in-container">
    
<?php
      echo "<form action='esqueci_a_senha.php' method='POST' class='form' class='signin-form' name='forms'>"
?>
        <h1>Redefinir senha</h1>
        <br>
        <input type="email" placeholder="Email" name="email" class="form-control" required/>
        <br>
        <input type="tel" placeholder="CPF" name="cpf" class="form-control" id="cpf" maxlength="11" oninput="mascara(this)" required/>
        <br>
        <input type="text" placeholder="Primeiro nome" name="nome" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" required/>
        <br>
        <input type="text" placeholder="Último nome" name="sobrenome" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" required/>
        <br>
        <div>
          <input type="submit" value="Redefinir Senha" name="submit" id="enviar" onclick="validar()">
        </div>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>Fala pessoa de sucesso</h1>
          <p>Coloque aqui seus dados cadastrais e vamos redefinir sua senha</p>
        </div>
      </div>
    </div>
  </div>
<script>
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
function validar(){
  var cpf=forms.cpf.value; 
  if(cpf.length != 14){
					alert('Número de CPF inválido!');
					forms.cpf.focus();
          document.getElementById('cpf').value='';
					return false;}
  }

</script>
</body>
</html>

