<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php	
			$email = $_POST['email'];
			
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$dbname = "funildevendas";
			
			//Criar a conexao
			$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
			
			$result_leados = "INSERT INTO leados (email) VALUES ('$email')";
			$resultado_leados = mysqli_query($conn, $result_leados);
			
			//Inicio Enviar e-mail
			require 'PHPMailer/PHPMailerAutoload.php';
	
			$Mailer = new PHPMailer();
			
			//Define que será usado SMTP
			$Mailer->IsSMTP();
			
			//Enviar e-mail em HTML
			$Mailer->isHTML(true);
			
			//Aceitar carasteres especiais
			$Mailer->Charset = 'UTF-8';
			
			//Configurações
			$Mailer->SMTPAuth = true;
			$Mailer->SMTPSecure = 'ssl';
			
			//nome do servidor
			$Mailer->Host = 'srv84.prodns.com.br';
			//Porta de saida de e-mail 
			$Mailer->Port = 465;
			
			//Dados do e-mail de saida - autenticação
			$Mailer->Username = 'admin@pontokc.com.br';
			$Mailer->Password = 'funildevendas';
			
			//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
			$Mailer->From = 'admin@pontokc.com.br';
			
			//Nome do Remetente
			$Mailer->FromName = 'Celke';
			
			//Assunto da mensagem
			$Mailer->Subject = 'Titulo - Recuperar Senha';
			
			//Corpo da Mensagem
			$Mailer->Body = 'Conteudo do E-mail';
			
			//Corpo da mensagem em texto
			$Mailer->AltBody = 'conteudo do E-mail em texto';
			
			//Destinatario 
			$Mailer->AddAddress($email);
			
			if($Mailer->Send()){
				echo "E-mail enviado com sucesso";
			}else{
				echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
			}
			
			//Fim Enviar e-mail

			
			if(mysqli_affected_rows($conn) != 0){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/baixar.php'>
					<script type=\"text/javascript\">
						alert(\"E-mail recebido com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/baixar.php'>
					<script type=\"text/javascript\">
						alert(\"Falha no cadastro do e-mail.\");
					</script>
				";	
			}?>
			
		?>
	</body>
</html>