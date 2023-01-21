<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $cod=$_POST['cod'];
        $meta= $_POST['meta'];
    
        /*
        $sqlupdate = "UPDATE meta_saude SET meta='$meta'
        WHERE cod='$cod' ";
        $result2 = $conexao_forms15->query($sqlupdate);*/

        $sqlselect = "SELECT * FROM meta_saude WHERE cod=$cod";
    $result2 = $conexao_forms15->query($sqlselect);

    
        while($user_data = mysqli_fetch_assoc($result2))
        {
          $meta1= $user_data['meta1'];
          $meta2= $user_data['meta2'];
          $meta3= $user_data['meta3'];
          $meta4= $user_data['meta4'];
          $meta5= $user_data['meta5'];
        }

        if($meta1==''){
             $sqlupdate = "UPDATE meta_saude SET meta1='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        } else if($meta1!='' && $meta2=='') {
            $sqlupdate = "UPDATE meta_saude SET meta2='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }else if($meta1!='' && $meta2!='' && $meta3==''){
             $sqlupdate = "UPDATE meta_saude SET meta3='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }else if ($meta1!='' && $meta2!='' && $meta3!='' && $meta4==''){
             $sqlupdate = "UPDATE meta_saude SET meta4='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }else if ($meta1!='' && $meta2!='' && $meta3!='' && $meta4!='' && $meta5==''){
             $sqlupdate = "UPDATE meta_saude SET meta5='$meta' 
            WHERE cod='$cod' ";
            $result = $conexao_forms15->query($sqlupdate);
        }
    }
    header('Location:coach_meta_saude.php?cod='.$cod);
?>