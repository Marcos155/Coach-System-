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
        $nome= $_POST['nome'];
         

        $sqlupdate = "UPDATE relacionamento_12_meses SET oque='$oque',porquem='$porquem',onde='$onde',quando='$quando',porque='$porque',como='$como'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);
    }
    header('Location: show_sistema_persona.php');
?>