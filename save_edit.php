<?php 
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod= $_POST['cod'];
        $nome= $_POST ['username'];
        $meta= $_POST ['meta'];
        $data= $_POST ['data'];
        $status= $_POST ['status']; 

        $sqlupdate = "UPDATE formulario SET nome='$nome',meta='$meta',data_conclusao='$data',status_meta='$status'
        WHERE cod='$cod' ";
        $result = $conexao_forms->query($sqlupdate);
    }
    header('Location: sistema.php');
?>