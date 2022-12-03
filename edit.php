<?php
  if(!empty($_GET['cod']))
  {
 
    
    include_once('config.php');

    $cod = $_GET['cod'];
    $sqlselect = "SELECT * FROM formulario WHERE cod=$cod";
    $result = $conexao_forms->query($sqlselect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $nome= $user_data ['nome'];
            $meta= $user_data ['meta'];
            $data= $user_data ['data_conclusao'];
            $status= $user_data ['status_meta'];
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style_coach.css">
    <style>
      p{
        position: relative;
        top:0;
        left: 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;
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
  <!-- formulario -->
  <div class="login-box">
    <h2>Formulário</h2>

    <a href="sistema.php">Voltar</a>
    <br>
    <br>
    
    <form action="save_edit.php" method="post">
      <div class="user-box">
        <input type="text" name="username" value="<?php echo $nome ?>" required>
        <label>Nome </label>
      </div>
      <div class="user-box">
        <input type="text" name="meta" value="<?php echo $meta ?>" required>
        <label>Meta </label>
      </div>
      
      
      <div class="user-box">
        <p>Data de Conclusão</p>
        <input type="date" name="data" value="<?php echo $data ?>" required>
      </div>
    
      <div class="user-box">
        <input type="text" name="status" value="<?php echo $status ?>"required>
        <label>Status </label>
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
</body>
</html>