<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Complete seu cadastro</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">    
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,500,700,900"
    rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    label,
    p,
    button {
      color: #000;
      margin-left: 0.3vw;
    }

    .mdl-layout__header {
      background-color: rgb(255, 0, 0);
    }

    .espace {
      margin-right: 1rem;
      margin-left: 1rem;
    }
  </style>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="current-user">
          <i class="material-icons">account_circle</i>
          <?php echo "olá, $nome" ?>
        </div>
        <div class="mdl-layout-spacer"></div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">
        <?php echo $nome?>
      </span>
      <nav class="mdl-navigation">
        <br>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="testando.php">Formulário</a>
        <br>
        <!--
          <a class="mdl-navigation__link active" href="edit_regis.php">Completar cadastro</a>
        <br>-->
          <a class="mdl-navigation__link " href="show_sistema_persona.php">Conta</a>
        <br>
          <a class="mdl-navigation__link " href="meta.php">Meta</a>
        <br>
        <a class="mdl-navigation__link" href="notas.php">Notas</a>
          <br>
          <a class="mdl-navigation__link" href="sair.php">Sair</a>
      </nav>
    </div>
    </header>
    <main class="mdl-layout__content">
      <div class="page-content">

        <p>
          <?php echo "$nome"?>, vamos completar seu cadastro &#128578;!
        </p>
        <form name="forms" action="save_edit_regis.php" method="post">
          <div class="form-group espace">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual seu nome campeão(a)?" type="text" placeholder="Nome" name="username" value="<?php echo $nome ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+"required>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Email para contato" type="email" placeholder="Email" name="email" value="<?php echo $email ?>"  required>
          </div>
          <input type="hidden" name="cod" value="<?php echo $cod ?>">
          <div class="form-group espace">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="telefone"  placeholder="Telefone (99)99999-9999" pattern="[0-9]({2})[0-9]{5}-[0-9]{4}"
              name="phone" value="<?php echo $telefone ?>" required>
          </div>
          <div class="form-group espace">
            <label>Sexo</label>
            <br>
            <input type="radio" value="feminino" name="sexo" <?php echo ($sexo == 'feminino') ? 'checked' : ''?> >
            <label for="faminino">Feminino</label>
            <input type="radio"  value="masculino" name ="sexo" <?php echo ($sexo == 'masculino') ? 'checked' : ''?> >
            <label for="masculino">Masculino</label>
            <input type="radio" value="outro" name ="sexo" <?php echo ($sexo == 'outro') ? 'checked' : ''?> >
            <label for="outro">Outro</label>
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Cidade</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual sua cidade?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="cidade" value="<?php echo $cidade ?>" >
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Estado</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Qual seu estado?" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]+" 
              name="estado" value="<?php echo $estado ?>" >
          </div>
          <div class="form-group espace">
            <label for="exampleInputEmail1">Senha</label>
            <table>
              <tr>
                <td>
                  <input type="password" class="form-control" aria-describedby="emailHelp"
                  type="password" placeholder="Senha" name="password"  value="<?php echo $senha ?>" id="senha" required>
                </td>
                <td>
                  <img src="eyes.png" alt="" id="eyesvg" onclick=" mostrarOcultarSenha()" width="24px">
                </td>
              </tr>
            </table>
            <br>
            <label for="exampleInputEmail1">Confirmar senha</label>
            <table>
            <tr>
              <td>
                <input class="form-control"  aria-describedby="emailHelp"
                type="password" placeholder="Confirmar senha" name="confirm_password"  id="confirmar_senha" value="<?php echo $senha ?>" required/>
              </td> 
              <td>
                <img src="eyes2.png" alt="" id="eyesvg2" onclick=" mostrarOcultarSenha2()" width="24px">
              </td>
            </tr> 
          </table>
          </div>
          <input type="submit" class="btn" class="enviar_forms" style="background-color:rgb(255,0,0); color: #fff;" value="Enviar" name="update"
           onclick="return validar()"
          id="update">
        </form>
    </main>

    <script>
      $(document).ready(function () {

        $(".search-block").hide();
        $(".expander-title").click(function () {
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
      }

      $(document).ready(function () {

        $(".search-block").hide();
        $(".expander-title").click(function () {
          $(this).next(".search-block").slideToggle("fast");
        });

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