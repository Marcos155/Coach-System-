<?php 
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod= $_POST['cod'];
        $meta= $_POST ['meta'];
        $desc_meta= $_POST ['desc_meta'];
        $data_inicio= $_POST ['data_inicio'];
        $data= $_POST ['data'];
        $status= $_POST ['status']; 

        $sqlupdate = "UPDATE formulario SET meta='$meta',desc_meta='$desc_meta',data_inicio='$data_inicio',  data_conclusao='$data',status_meta='$status'
        WHERE cod='$cod' ";
        $result = $conexao_forms->query($sqlupdate);
    }
    header('Location: formulario.php');
?>