<?php
    require_once("conexao.php");

    //Iniciando e validando a sessao
    session_start();
	if(!isset($_SESSION["idcolab"]))
		header("Location: index.html");
	
	
	$id=$_GET['id'];
	$query = 'DELETE FROM ifal.livros where id=:id';
	$agencia = $connection->prepare($query);
	$agencia->bindValue(':id',$id);
		  if($agencia->execute())
	  	$_SESSION['msn'] = 'Cadastro Deletado Com Sucesso!';
	  else
	  	$_SESSION['msn'] = 'Cadastro não Deletado!';
      
      header("Location: consulta_livro.php");		 
?>