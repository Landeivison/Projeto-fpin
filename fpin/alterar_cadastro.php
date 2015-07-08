<?php

    require_once ("conexao.php");

    //Iniciando e validando a sessao
    session_start();
	if(!isset($_SESSION["idcolab"]))
		header("Location: index.php");
	
	//Alimentando as variaveis para o insert no banco
	$origem=$_SESSION['idcolab'];
	$nome=strtoupper($_POST['nome']);
	$email=strtolower($_POST['email']);
	$senha=$_POST['senha'];
    echo $email;
	$query = "UPDATE ifal.usuarios SET nome=:nome, 
	                                        email=:email,
	                                        senha=:senha
	                                  WHERE id = :origem";
	$colaborador = $connection->prepare($query);
	$colaborador->bindValue(':origem',$origem);
	$colaborador->bindValue(':nome',$nome);
	$colaborador->bindValue(':email',$email);
	$colaborador->bindValue(':senha',$senha);
	$colaborador->execute();
	  if($colaborador->rowCount() > 0){
	    header("Location: funcionario.php");
}
	  else{
      
      header("Location: funcionario.php");
  }
?>