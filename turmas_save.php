<?php
    include('config.php');
    if(isset($_POST['alocar']))
    {
      $nova_turma=$_POST['nome_turma'];

      $cod_turmaBuscar="SELECT cod_turma FROM turmas WHERE nome_turma='$nova_turma' ";
      $cod_turma=$conexao_forms15->query($cod_turmaBuscar);
      $cod_turma2=mysqli_fetch_assoc($cod_turma);
      $nome_aluno=$_POST['nome_aluno'];
      $alocar="UPDATE cadastro SET nome_turma='$nova_turma' WHERE nome='$nome_aluno' ";
      $resultado=$conexao_forms15->query($alocar);
      $alocar_cod="UPDATE cadastro SET  cod_turma=$cod_turma2[cod_turma] WHERE nome='$nome_aluno' ";
      $resultado2=$conexao_forms15->query($alocar_cod);
      
    }
  header('Location:turmas.php');
?>