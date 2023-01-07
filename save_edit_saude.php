<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $oque= $_POST['oque'];
        $porquem= $_POST['porquem'];
        $onde= $_POST['onde'];
        $quando= $_POST['quando'];
        $porque= $_POST['porque'];
        $como= $_POST['como'];
        $objet= $_POST['objet'];
        $opcao= $_POST['opcao'];
        $responsa=$_POST['responsa'];
        $data_inicio= $_POST['data_inicio'];
        $data_fim= $_POST['data_fim'];
        $obs= $_POST['obs'];
         

        $sqlupdate = "UPDATE saude_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',objet='$objet','opcao'='$opcao',responsa='$responsa',data_inicio='$data_inicio',
        data_fim='$data_fim',obs='$obs'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: show_sistema_persona.php');
?>