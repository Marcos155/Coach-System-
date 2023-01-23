<?php
  if(!empty($_GET['cod']))
  { 
    include_once('config.php');
    $cod = $_GET['cod'];
    $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
    
   
    
}
?>
