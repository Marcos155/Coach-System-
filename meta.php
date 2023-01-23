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
        
        $metaRelacionamento1= $user_data['meta1'];
        $metaRelacionamento2= $user_data['meta2'];
        $metaRelacionamento3= $user_data['meta3'];
        $metaRelacionamento4= $user_data['meta4'];
        $metaRelacionamento5= $user_data['meta5'];
        
        $feitoRelacionamento1=$user_data['feito1'];
        $feitoRelacionamento2=$user_data['feito2'];
        $feitoRelacionamento3=$user_data['feito3'];
        $feitoRelacionamento4=$user_data['feito4'];
        $feitoRelacionamento5=$user_data['feito5'];
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
       
        $metaSaude1= $user_data['meta1'];
        $metaSaude2= $user_data['meta2'];
        $metaSaude3= $user_data['meta3'];
        $metaSaude4= $user_data['meta4'];
        $metaSaude5= $user_data['meta5'];
        
        $feitoSaude1=$user_data['feito1'];
        $feitoSaude2=$user_data['feito2'];
        $feitoSaude3=$user_data['feito3'];
        $feitoSaude4=$user_data['feito4'];
        $feitoSaude5=$user_data['feito5'];
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
        
        $metaTrabalho1= $user_data['meta1'];
        $metaTrabalho2= $user_data['meta2'];
        $metaTrabalho3= $user_data['meta3'];
        $metaTrabalho4= $user_data['meta4'];
        $metaTrabalho5= $user_data['meta5'];
        
        $feitoTrabalho1=$user_data['feito1'];
        $feitoTrabalho2=$user_data['feito2'];
        $feitoTrabalho3=$user_data['feito3'];
        $feitoTrabalho4=$user_data['feito4'];
        $feitoTrabalho5=$user_data['feito5'];
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
        
        $metaDinheiro1= $user_data['meta1'];
        $metaDinheiro2= $user_data['meta2'];
        $metaDinheiro3= $user_data['meta3'];
        $metaDinheiro4= $user_data['meta4'];
        $metaDinheiro5= $user_data['meta5'];
        
        $feitoDinheiro1=$user_data['feito1'];
        $feitoDinheiro2=$user_data['feito2'];
        $feitoDinheiro3=$user_data['feito3'];
        $feitoDinheiro4=$user_data['feito4'];
        $feitoDinheiro5=$user_data['feito5'];
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
        
        $metaOutro1= $user_data['meta1'];
        $metaOutro2= $user_data['meta2'];
        $metaOutro3= $user_data['meta3'];
        $metaOutro4= $user_data['meta4'];
        $metaOutro5= $user_data['meta5'];
        
        $feitoOutro1=$user_data['feito1'];
        $feitoOutro2=$user_data['feito2'];
        $feitoOutro3=$user_data['feito3'];
        $feitoOutro4=$user_data['feito4'];
        $feitoOutro5=$user_data['feito5'];
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

      if(isset($_POST['submit_relacionamento']))
      {
          $cod=$_POST['cod'];
          $feitoRelacionamento1= $_POST['feito1'];
          $feitoRelacionamento2= $_POST['feito2'];
          $feitoRelacionamento3= $_POST['feito3'];
          $feitoRelacionamento4= $_POST['feito4'];
          $feitoRelacionamento5= $_POST['feito5'];
  
          $sqlupdate = "UPDATE meta_relacionamento SET feito1='$feitoRelacionamento1',feito2='$feitoRelacionamento2',feito3='$feitoRelacionamento3',
          feito4='$feitoRelacionamento4',feito5='$feitoRelacionamento5' WHERE cod='$cod' ";
          $result2 = $conexao_forms15->query($sqlupdate);
      }
      if(isset($_POST['submit_Saude']))
      {
          $cod=$_POST['cod'];
          $feitoSaude1= $_POST['feito1'];
          $feitoSaude2= $_POST['feito2'];
          $feitoSaude3= $_POST['feito3'];
          $feitoSaude4= $_POST['feito4'];
          $feitoSaude5= $_POST['feito5'];
  
          $sqlupdate = "UPDATE meta_saude SET feito1='$feitoSaude1',feito2='$feitoSaude2',feito3='$feitoSaude3',
          feito4='$feitoSaude4',feito5='$feitoSaude5' WHERE cod='$cod' ";
          $result2 = $conexao_forms15->query($sqlupdate);
      }
      if(isset($_POST['submit_Trabalho']))
      {
          $cod=$_POST['cod'];
          $feitoTrabalho1= $_POST['feito1'];
          $feitoTrabalho2= $_POST['feito2'];
          $feitoTrabalho3= $_POST['feito3'];
          $feitoTrabalho4= $_POST['feito4'];
          $feitoTrabalho5= $_POST['feito5'];
  
          $sqlupdate = "UPDATE meta_trabalho SET feito1='$feitoTrabalho1',feito2='$feitoTrabalho2',feito3='$feitoTrabalho3',
          feito4='$feitoTrabalho4',feito5='$feitoTrabalho5' WHERE cod='$cod' ";
          $result2 = $conexao_forms15->query($sqlupdate);
      }
      if(isset($_POST['submit_Dinheiro']))
      {
          $cod=$_POST['cod'];
          $feitoDinheiro1= $_POST['feito1'];
          $feitoDinheiro2= $_POST['feito2'];
          $feitoDinheiro3= $_POST['feito3'];
          $feitoDinheiro4= $_POST['feito4'];
          $feitoDinheiro5= $_POST['feito5'];
  
          $sqlupdate = "UPDATE meta_dinheiro SET feito1='$feitoDinheiro1',feito2='$feitoDinheiro2',feito3='$feitoDinheiro3',
          feito4='$feitoDinheiro4',feito5='$feitoDinheiro5' WHERE cod='$cod' ";
          $result2 = $conexao_forms15->query($sqlupdate);
      }
      if(isset($_POST['submit_Outro']))
      {
          $cod=$_POST['cod'];
          $feitoOutro1= $_POST['feito1'];
          $feitoOutro2= $_POST['feito2'];
          $feitoOutro3= $_POST['feito3'];
          $feitoOutro4= $_POST['feito4'];
          $feitoOutro5= $_POST['feito5'];
  
          $sqlupdate = "UPDATE meta_outro SET feito1='$feitoOutro1',feito2='$feitoOutro2',feito3='$feitoOutro3',
          feito4='$feitoOutro4',feito5='$feitoOutro5' WHERE cod='$cod' ";
          $result2 = $conexao_forms15->query($sqlupdate);
      }
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
         
         border-radius:2px;
    }
    h5{
      text-indent:1.6rem;
    }
    ul {
      list-style:none;
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
          <article class="card" id='abrir_dialogSaude'>
          <ul>
              <li>
                <?php echo "$metaSaude1"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude1 == 'on') ? 'checked' : ''?>  disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude2"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude2 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude3"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude3 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude4"; ?>
                <input type="checkbox"   <?php echo ($feitoSaude4 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaSaude5"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude5 == 'on') ? 'checked' : ''?> disabled>
              </li>
            </ul>
            <dialog id="dialog_saude">
            <form action="meta.php" method="post" name="forms">
            <h2 id='titulo_dialog'>Metas sobre Saúde</h2><br>
            <ul>
              <li>
                <form action="meta.php" method="post">
                <?php echo "$metaSaude1"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude1 == 'on') ? 'checked' : ''?> name="feito1">
              </li> 
              <br>   
              <li>
                <?php echo "$metaSaude2"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude2 == 'on') ? 'checked' : ''?> name="feito2">
              </li>
              <br>
              <li>
                <?php echo "$metaSaude3"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude3 == 'on') ? 'checked' : ''?> name="feito3">
              </li>
              <br>
              <li>
                <?php echo "$metaSaude4"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude4 == 'on') ? 'checked' : ''?> name="feito4">
              </li>
              <br>
              <li>
                <?php echo "$metaSaude5"; ?>
                <input type="checkbox"  <?php echo ($feitoSaude5 == 'on') ? 'checked' : ''?> name="feito5">
              </li>
            </ul>
            <br><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="submit_Saude" id='fechar_dialogSaude' >
            </form>
            </dialog>
          </article> 
          
        </section>

        <!-- relacionamento -->
        <section class="list">
        <header>Objetivos: 12 meses (Relacionamentos)</header>
          <article class="card"  id='abrir_dialogRelacionamento' >
            <ul>
              <li>
                <form action="meta.php" method="post">
                <?php echo "$metaRelacionamento1"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : ''?> disabled >
                </form>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento2"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento2 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento3"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento3 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento4"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento4 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento5"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento5 == 'on') ? 'checked' : ''?> disabled>
              </li>
            </ul>
          <dialog id="dialog_relacionamento">
            <form action="meta.php" method="post" name="forms">
            <h2 id='titulo_dialog'>Metas sobre Relacionamento</h2><br>
            <ul>
              <li>
                <form action="meta.php" method="post">
                <?php echo "$metaRelacionamento1"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento1 == 'on') ? 'checked' : ''?> name="feito1" >
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento2"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento2 == 'on') ? 'checked' : ''?> name="feito2">
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento3"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento3 == 'on') ? 'checked' : ''?> name="feito3" >
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento4"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento4 == 'on') ? 'checked' : ''?> name="feito4">
              </li>
              <br>
              <li>
                <?php echo "$metaRelacionamento5"; ?>
                <input type="checkbox"  <?php echo ($feitoRelacionamento5 == 'on') ? 'checked' : ''?> name="feito5">
              </li>
            </ul>
            <br><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="submit_relacionamento" id='fechar_dialogRelacionamento' >
            </form>
            </dialog>
          </article> 
        </section>

         <!-- Trabalho -->
         <section class="list">
        <header>Objetivos: 12 meses (Trabalho)</header>
          <article class="card" id='abrir_dialogTrabalho'>
          <ul>
              <li>
                <?php echo "$metaTrabalho1"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho1 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho2"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho2 == 'on') ? 'checked' : ''?> disabled >
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho3"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho3 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho4"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho4 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho5"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho5 == 'on') ? 'checked' : ''?> disabled>
              </li>
            </ul>
            <dialog id="dialog_trabalho">
            <form action="meta.php" method="post" name="forms">
            <h2 id='titulo_dialog'>Metas sobre Trabalho</h2><br>
            <ul>
              <li>
                <form action="meta.php" method="post">
                <?php echo "$metaTrabalho1"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho1 == 'on') ? 'checked' : ''?> name="feito1">
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho2"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho2 == 'on') ? 'checked' : ''?> name="feito2">
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho3"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho3 == 'on') ? 'checked' : ''?> name="feito3">
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho4"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho4 == 'on') ? 'checked' : ''?> name="feito4">
              </li>
              <br>
              <li>
                <?php echo "$metaTrabalho5"; ?>
                <input type="checkbox"  <?php echo ($feitoTrabalho5 == 'on') ? 'checked' : ''?> name="feito5">
              </li>
            </ul>
            <br><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="submit_Trabalho" id='fechar_dialogTrabalho' >
            </form>
            </dialog>
          </article> 
        </section>

         <!-- Dinheiro -->
         <section class="list">
        <header>Objetivos: 12 meses (Dinheiro)</header>
          <article class="card" id='abrir_dialogDinheiro'>
          <ul>
              <li>
                <?php echo "$metaDinheiro1"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro1 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro2"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro2 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro3"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro3 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro4"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro4 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro5"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro5 == 'on') ? 'checked' : ''?> disabled>
              </li>
            </ul>
            <dialog id="dialog_dinheiro">
            <form action="meta.php" method="post" name="forms">
            <h2 id='titulo_dialog'>Metas sobre Dinheiro</h2><br>
            <ul>
              <li>
                <form action="meta.php" method="post">
                <?php echo "$metaDinheiro1"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro1 == 'on') ? 'checked' : ''?> name="feito1">
              </li>
              <br> 
              <li>
                <?php echo "$metaDinheiro2"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro2 == 'on') ? 'checked' : ''?> name="feito2">
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro3"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro3 == 'on') ? 'checked' : ''?> name="feito3">
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro4"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro4 == 'on') ? 'checked' : ''?> name="feito4">
              </li>
              <br>
              <li>
                <?php echo "$metaDinheiro5"; ?>
                <input type="checkbox"  <?php echo ($feitoDinheiro5 == 'on') ? 'checked' : ''?> name="feito5">
              </li>
            </ul>
            <br><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="submit_Dinheiro" id='fechar_dialogDinheiro' >
            </form>
            </dialog>
          </article> 
        </section>

         <!-- Outro -->
         <section class="list">
        <header>Objetivos: 12 meses (Demais objetivos)</header>
          <article class="card" id='abrir_dialogOutro' >
          <ul>
              <li>
                <?php echo "$metaOutro1"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro1 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro2"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro2 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro3"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro3 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro4"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro4 == 'on') ? 'checked' : ''?> disabled>
              </li>
              <br>
              <li>
                <?php echo "$metaOutro5"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro5 == 'on') ? 'checked' : ''?> disabled>
              </li>
            </ul>
            <dialog id="dialog_outro">
            <form action="meta.php" method="post" name="forms">
            <h2 id='titulo_dialog'>Metas sobre Outro</h2><br>
            <ul>
              <li>
                <form action="meta.php" method="post">
                <?php echo "$metaOutro1"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro1 == 'on') ? 'checked' : ''?> name="feito1">
              </li>
              <br>
              <li>
                <?php echo "$metaOutro2"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro2 == 'on') ? 'checked' : ''?> name="feito2">
              </li>
              <br>
              <li>
                <?php echo "$metaOutro3"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro3 == 'on') ? 'checked' : ''?> name="feito3">
              </li>
              <br>
              <li>
                <?php echo "$metaOutro4"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro4 == 'on') ? 'checked' : ''?> name="feito4">
              </li>
              <br>
              <li>
                <?php echo "$metaOutro5"; ?>
                <input type="checkbox"  <?php echo ($feitoOutro5 == 'on') ? 'checked' : ''?> name="feito5">
              </li>
            </ul>
            <br><br>
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="submit" class="btn" class="enviar_forms"  value="Ok" name="submit_Outro" id='fechar_dialogOutro' >
            </form>
            </dialog>
          </article> 
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
      /* relacioanamento */
      const buttonRelacionamento = document.querySelector("#abrir_dialogRelacionamento");
      const modalRelacionamento = document.querySelector("#dialog_relacionamento");
      const buttonCloseRelacionamento = document.querySelector("dialog #fechar_dialogRelacionamento");
      buttonRelacionamento.onclick=function(){
        modalRelacionamento.showModal();
      };
      buttonCloseRelacionamento.onclick=function(){
        modalRelacionamento.closeModal();
      };
      /* saúde */
      const buttonSaude = document.querySelector("#abrir_dialogSaude");
      const modalSaude = document.querySelector("#dialog_saude");
      const buttonCloseSaude = document.querySelector("dialog #fechar_dialogSaude");
      buttonSaude.onclick=function(){
        modalSaude.showModal();
      };
      buttonCloseSaude.onclick=function(){
        modalSaude.closeModal();
      };
      /* trabalho */
      const buttonTrabalho = document.querySelector("#abrir_dialogTrabalho");
      const modalTrabalho = document.querySelector("#dialog_trabalho");
      const buttonCloseTrabalho = document.querySelector("dialog #fechar_dialogTrabalho");
      buttonTrabalho.onclick=function(){
        modalTrabalho.showModal();
      };
      buttonCloseTrabalho.onclick=function(){
        modalTrabalho.closeModal();
      };
      /* dinheiro */
      const buttonDinheiro = document.querySelector("#abrir_dialogDinheiro");
      const modalDinheiro = document.querySelector("#dialog_dinheiro");
      const buttonCloseDinheiro = document.querySelector("dialog #fechar_dialogDinheiro");
      buttonDinheiro.onclick=function(){
        modalDinheiro.showModal();
      };
      buttonCloseDinheiro.onclick=function(){
        modalDinheiro.closeModal();
      };
      /* outro */
      const buttonOutro = document.querySelector("#abrir_dialogOutro");
      const modalOutro = document.querySelector("#dialog_outro");
      const buttonCloseOutro = document.querySelector("dialog #fechar_dialogOutro");
      buttonOutro.onclick=function(){
        modalOutro.showModal();
      };
      buttonCloseOutro.onclick=function(){
        modalOutro.closeModal();
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
