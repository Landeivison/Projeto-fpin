<?php

	require_once("conexao.php");
	session_start();
	
	$login = $_POST['email'];
	$senha = $_POST['senha'];
	
	$query = "SELECT id, nome, email, senha, vinculo FROM ifal.usuarios WHERE  email = :email AND senha = :senha";
	$stmt = $connection->prepare($query);
	$stmt->bindValue(":email", $login);
	$stmt->bindValue(":senha", $senha);
	$stmt->execute();
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($rows == null){
		$_SESSION['erro'] = "Login e/ou senha invalidos. Por favor verifique os dados e tente novamente.";
		header("Location: index.php");
	}else{
		$_SESSION['idcolab'] = $rows['id'];
		$_SESSION['nome']    = $rows['nome'];
		$_SESSION['tipo']    = $rows['vinculo'];
		
		if ($rows['vinculo'] == 'F') {
  			header("Location: funcionario.php");
  			echo $_SESSION['tipo'];		
		} else {
  			header("Location: aluno.php");
  			echo $_SESSION['tipo'];	
  			
		}
	}
		
//Fim do arquivo logar.php
