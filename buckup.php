<?php
//conexão com o formulário de 15 anos
/*$dbHost ='Localhost';
$dbUsername ='root';
$dbPassword ='admin1234';
$dbName ='db_coach';
$conexao_forms15 = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );*/

$conexao_forms15 = mysqli_init();
$conexao_forms15->ssl_set(NULL,NULL, "C:/xampp/htdocs/Coach-System-/assets/banco/cacert.pem", NULL, NULL);
$conexao_forms15->real_connect('aws-sa-east-1.connect.psdb.cloud', 'rx00kp0y3ayz4twsz42o', 'pscale_pw_KsoH8l2o1a2uLpCIfW8IezNTw216VfkYj7vvoOWIrSv', 'bd_coach');
/*$mysqli->close();*/

//conexão com o formulário de 12 meses-saude
/*$dbHost ='Localhost';
$dbUsername ='root';
$dbPassword ='admin1234';
$dbName ='db_coach';
$conexao_formsSaude = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );*/

//   if($conexao->connect_errno)
//    {
//       echo "Erro";
//    }
//   else 
//    {
//       echo "Conexão efetuada com sucesso";
//    }
/*
$dbHost ='Localhost';
$dbUsername ='root';
$dbPassword ='admin1234';
$dbName ='db_coach';

$conexao_regis = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );

$dbHost ='Localhost';
$dbUsername ='root';
$dbPassword ='admin1234';
$dbName ='db_coach';

$conexao_login = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );*/

?> 

<?php/*
$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
$mysqli->real_connect($_ENV["HOST"], $_ENV["USERNAME"], $_ENV["PASSWORD"], $_ENV["DATABASE"]);
$mysqli->close();*/
?>
<?php
/* $mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
$mysqli->real_connect('aws-sa-east-1.connect.psdb.cloud', 'rx00kp0y3ayz4twsz42o', 'pscale_pw_KsoH8l2o1a2uLpCIfW8IezNTw216VfkYj7vvoOWIrSv', 'bd_coach');
$mysqli->close();*/
?>
<?php
/*$dsn = "mysql:host={$_ENV["HOST"]};dbname={$_ENV["DATABASE"]}";
$options = array(
PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
);

$pdo = new PDO($dsn, $_ENV["USERNAME"], $_ENV["PASSWORD"], $options);*/
?>