<?php 
    include("login.php");
    if(isset($_POST['ok'])){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro[] = "E-mail inválido.";

        }



        $sql_code= "SELECT senha FROM tb_login WHERE email='$email'";
        $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
        $dado = $sql_query->fetch_assoc();
        $total = $sql_query->num_rows;


        if($total == 0){
            $erro[]="O email informado não existe";
        }

        if(count($erro)==0 && $total>0){
            $novasenha = substr(md5(time()), 0,6);
            $nscriptografada = md5(md5($novasenha));
            $email = $mysqli->escape_string($_POST['email']);

        
        
        
            if(mail( $email, "Sua nova senha", "Sua nova senha: " .$novasenha)){
                $sql_code = "UPDATE tb_login SET senha = '$nscriptografada' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
</head>
<body>
<form action="" method="post">
    <input placeholder="Seu e-mail" name="email"  type="text">
    <input type="submit" name="ok" value="ok">
</form>
</body>
</html>
