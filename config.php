 <?php
    $dbHost ='Localhost';
    $dbUsername ='root';
    $dbPassword ='admin1234';
    $dbName ='db_coach';

    $conexao_forms = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );
    
    //conexão com o formulário de 15 anos
    $dbHost ='Localhost';
    $dbUsername ='root';
    $dbPassword ='admin1234';
    $dbName ='db_coach';
    $conexao_forms15 = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );

   //   if($conexao->connect_errno)
   //    {
   //       echo "Erro";
   //    }
   //   else 
   //    {
   //       echo "Conexão efetuada com sucesso";
   //    }

   $dbHost ='Localhost';
   $dbUsername ='root';
   $dbPassword ='admin1234';
   $dbName ='db_coach';

   $conexao_regis = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );

   $dbHost ='Localhost';
   $dbUsername ='root';
   $dbPassword ='admin1234';
   $dbName ='db_coach';

   $conexao_login = new mysqli("$dbHost", "$dbUsername", "$dbPassword", "$dbName", );
 ?> 