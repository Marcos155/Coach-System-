<?php
  //cadastro
  if(!empty($_GET['cod']))
  {
  
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM cadastro WHERE cod=$cod";
    $result2 = $conexao_regis->query($sqlselect);

    if($result2->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result2))
        {
          $nome= $user_data['nome'];
          $email= $user_data['email'];
          $senha= $user_data['senha'];
          $telefone= $user_data['telefone'];
          $sexo= $user_data['sexo'];
        }

    }
    else{
        header('Location: sistema.php');
    }
  }
  else
  {
    header('Location: sistema.php');
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>register</title>
  <link rel="stylesheet" href="style_coach.css">
  <style>
    .escolha{
      color: #fff;
    }
    #img_senha{
        position: absolute;
        top: 0;
        right: 20px;
        transform: translate(-50%);
        background: url('./img/fecha.png');
        background-size: cover;
        width: 25px;
        height: 25px;
        cursor: pointer;
    }
    #img_senha.hide{
        background: url('./img/abre.png');
        background-size: cover;
    }
    .login-box form #update{
        position: relative;
        display: inline-block;
        padding: 3px 3px;
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: .5s;
        margin-top: 1px;
        margin-bottom: 1px;
        letter-spacing: 4px;
        display: flex;
        justify-content: center;
        background-color: transparent;
        border: transparent;
        cursor: pointer;
    }
    .botao{
        cursor: pointer;
    }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Cadastro</h2>
  <form action="save_edit_regis.php" method="post">
    <div class="user-box">
      <input type="text" name="username"  value="<?php echo $nome ?>"required>
      <label>Nome</label>
    </div>
    <div class="user-box">
      <input type="text" name="email"  value="<?php echo $email ?>"required>
      <label>Email</label>
    </div>
    
    <div class="user-box">
      <input type="text" name="phone"  value="<?php echo $telefone ?>"required>
      <label>Telefone</label>
    </div>
    
    <div class="user-box">
      <label>Sexo</label>
    </div>
    <br>
    <br>
    <input type="radio" id="feminino" name="sexo" value="feminino" <?php echo ($sexo == 'feminino')?'checked': '' ?>required>
    <label class="escolha">Feminino</label>
    
    <input type="radio" id="masculino" name="sexo" value="masculino" <?php echo ($sexo == 'masculino')?'checked': '' ?>required>
    <label class="escolha">Masculino</label>
  
    <input type="radio" id="outro" name="sexo" value="outro" <?php echo ($sexo == 'outro')?'checked': '' ?>required>
    <label class="escolha">Outro</label>
    <br>
    <br>
    
    <div class="user-box">
      <input type="password" name="password"  id="senha"  value="<?php echo $senha ?>"required>
      <label>Senha</label>
      <div onclick="mostrarsenha()" id="img_senha"></div>
    </div>	
    
    <a class="botao">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="hidden" name="cod" value="<?php echo $cod ?>">
      <input type="submit" value="enviar" name="update" id="update">
    </a>
  </form>
</div>
<!-- partial -->
  <script>
    function mostrarsenha(){
        var tipo = document.getElementById("senha");
        if (tipo.type == "password"){
            tipo.type = "text";
            img_senha.classList.add('hide')
        }
        else{
            tipo.type = "password";
            img_senha.classList.remove('hide')
        }
    }
  </script>
</body>
</html>