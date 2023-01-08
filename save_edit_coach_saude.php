<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $oque= $_POST['oque'];
        $porquem= $_POST['porquem'];
        $onde= $_POST['onde'];
        $quando= $_POST['quando'];
        $porque= $_POST['porque'];
        $como= $_POST['como'];
        $objet= $_POST['objet'];
        $responsa=$_POST['responsa'];
        $data_inicio= $_POST['data_inicio'];
        $data_fim= $_POST['data_fim'];
        $obs= $_POST['obs'];
        $obs_andre= $_POST['obs_andre'];
         

        $sqlupdate = "UPDATE saude_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como',objet='$objet',responsa='$responsa',data_inicio='$data_inicio',
        data_fim='$data_fim',obs='$obs',obs_andre='$obs_andre'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: sistema_coach_forms.php');
?>