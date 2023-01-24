<?php
/* conexão api */
    /*$url="http://Localhost:8080/api/auth/authenticate";
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    $resultado=json_decode(curl_exec($ch));
    var_dump($resultado);
    foreach($resultado->CoachAppApplication as $value){
            var_dump($value);
            echo "Email:".$value->email ."<br>";

    }*/
    $domain1 = 'http://Localhost:8080/api/auth/authenticate';

    function get_http_response_code($domain1) {
        $headers = get_headers($domain1);
        return substr($headers[0], 9, 3);
        }
        $get_http_response_code = get_http_response_code($domain1);
        if ( $get_http_response_code == 200 ) {
            echo "OKAY!";
        } else {
            echo "Nokay!";
        }

        function CallAPI($POST, $url="http://Localhost:8080/api/auth/authenticate", $data ="'email': 'andre@gmail.com', 'senha': '123456'")
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
                
    }
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
   
}/*
$domain1 = 'http://Localhost:8080/api/auth/authenticate';

function get_http_response_code($domain1) {
  $headers = get_headers($domain1);
  return substr($headers[0], 9, 3);
}
$get_http_response_code = get_http_response_code($domain1);


if ( $get_http_response_code == ) {
    header('Location:sistema.php');
} else {
  echo "Nokay!";
}*/

$url="http://Localhost:8080/api/auth/authenticate";

$data = "email: andre@gmail.com, senha: 123456";
function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    if($response){
        header('Location:sistema.php');
    }else{
        echo "erro";
    }
}
?>