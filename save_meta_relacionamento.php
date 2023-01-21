<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $meta= $_POST['meta'];


    $sqlselect = "SELECT * FROM meta_relacionamento WHERE cod=$cod";
    $result2 = $conexao_forms15->query($sqlselect);

    
        while($user_data = mysqli_fetch_assoc($result2))
        {
          $meta1= $user_data['meta1'];
          $meta2= $user_data['meta2'];
          $meta3= $user_data['meta3'];
          $meta4= $user_data['meta4'];
          $meta5= $user_data['meta5'];
        }
   
    /*
        $verifica_meta1= "SELECT meta1 FROM meta_relacionamento WHERE cod='$cod' and meta1='null' ";
        $result_meta1 = $conexao_forms15->query($verifica_meta1);

        $verifica_meta2= "SELECT meta2 FROM meta_relacionamento WHERE cod='$cod' and meta2='null' ";
        $result_meta2 = $conexao_forms15->query($verifica_meta2);

        $verifica_meta3= "SELECT meta3 FROM meta_relacionamento WHERE cod='$cod'";
        $result_meta3 = $conexao_forms15->query($verifica_meta3);

        $verifica_meta4= "SELECT meta4 FROM meta_relacionamento WHERE cod='$cod'";
        $result_meta4 = $conexao_forms15->query($verifica_meta4);

        $verifica_meta5= "SELECT meta5 FROM meta_relacionamento WHERE cod='$cod'";
        $result_meta5 = $conexao_forms15->query($verifica_meta5);*/


        if($meta1==''){
             $sqlupdate = "UPDATE meta_relacionamento SET meta1='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        } else if($meta1!='' && $meta2=='') {
            $sqlupdate = "UPDATE meta_relacionamento SET meta2='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }else if($meta1!='' && $meta2!='' && $meta3==''){
             $sqlupdate = "UPDATE meta_relacionamento SET meta3='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }else if ($meta1!='' && $meta2!='' && $meta3!='' && $meta4==''){
             $sqlupdate = "UPDATE meta_relacionamento SET meta4='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }else if ($meta1!='' && $meta2!='' && $meta3!='' && $meta4!='' && $meta5==''){
             $sqlupdate = "UPDATE meta_relacionamento SET meta5='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }
    }
    header('Location:coach_meta_relacionamento.php?cod='.$cod);
?>