<DOCTYPE html>
<html>
	<head>
		<title> Celke - Pop-ups</title>
		<meta charset="utf-8">
		<style>
			.popup{
				position: fixed;
				top: 0; bottom: 0; 
				left: 0; right:0;
				margin: auto;
				width: 300px;
				height: 180px;
				padding: 15px;
				border: solid 1px #4c4d4f;
				background: #f5812a;
				display: none;
				text-align: center;
			}h1{
				text-align: center;
			}
		</style>	
		<script type="text/javascript">
			function abrir(){
				document.getElementById('popup').style.display = 'block';
			}
			function fechar(){
				document.getElementById('popup').style.display =  'none';
			}
			function duracao(){
				document.getElementById('popup').style.display =  'none';
				setTimeout ("abrir()", 1000);
			}
		</script>
	</head>
	<body onload="javascript:duracao()">
		<h1> Conteúdo do meu site</h1>
		<div id="popup" class="popup">
			<p>Inscreva-se para receber mais material</p>	
			<form method="POST" action="processa.php">
				<p><input type="email" name="email" placeholder="Seu melhor e-mail" required>
				<p><input type="submit" value="Receber">
			</form>
			<p><small class="fechar"><a href="javascript: fechar();">Fechar pop-up</a></small></p>
		</div>
	</body>	
</html>