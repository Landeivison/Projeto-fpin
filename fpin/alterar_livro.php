<?php

    require_once ("conexao.php");

    //Iniciando e validando a sessao
    session_start();
    $_SESSION['msn']='ALTERAR CADASTRO SIMPLIFICADO!';
	if(!isset($_SESSION["idcolab"]))
		header("Location: index.php");
	
	//Alimentando as variaveis para o insert no banco
	$origem=$_SESSION['livro'];
	$titulo=strtoupper($_POST['titulo']);
	$autor=strtolower($_POST['autor']);
	$qtd=$_POST['qtd'];
	$query = "UPDATE ifal.livros SET titulo=:titulo, 
	                                        autor=:autor,
	                                        qtd=:qtd
	                                  WHERE id = :origem";
	$colaborador = $connection->prepare($query);
	$colaborador->bindValue(':origem',$origem);
	$colaborador->bindValue(':titulo',$titulo);
	$colaborador->bindValue(':autor',$autor);
	$colaborador->bindValue(':qtd',$qtd);
	$colaborador->execute();
	  if($colaborador->rowCount() > 0){
	  	$_SESSION['msn'] = 'Cadastro Alterdo Com Sucesso!';
	    header("Location: funcionario.php");
}
	  else{
	  	$_SESSION['msn'] =  'Cadastro Não Alterdo!';
      
      header("Location: login.html");
  }
?>