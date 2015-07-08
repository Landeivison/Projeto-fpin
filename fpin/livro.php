<?php 
require_once("conexao.php");
session_start();
   
    $query = "SELECT * FROM ifal.usuarios where id = ".$_SESSION['idcolab'];
	$stmt = $connection->prepare($query);
	$stmt->execute();
	$rows = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
	<title>ÁREA ADMINISTRATIVA</title>

	<meta http-equiv="content-language" content="pt-br">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	

	<!-- Importando a folha de estilo CSS para o HTML -->
	<link rel="stylesheet" type="text/css" href="css/layout.css"> 
	<link rel="shortcut icon" href="img/ifal.jpg" type="image/x-ifal">
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
<div class="container">
	<!-- MENU -->
	<div class="menu">
		<ul class="menu-top">
      <li><a href="index.html">Início</a></li>
			<LI><a href="funcionario.php">Voltar</a></LI>
			<LI><a href="consulta_livro.php">Consultar Livros</a></LI>
			<LI><a href="logout.php">Sair</a></LI>
		

			
		</ul>
	</div>
	<!-- MAIN -->
	<div class="main">
		<div class="cadastro">
				<h2>CADASTRO DE LIVROS</h2>
				<hr>

				<form id="cadastro" name="cadastro" method="post" action="casdastrar_livro.php" onsubmit="return validaCampo(); return false;">
					<?php foreach ($rows as  $linha){ ?>
      <table width="625" border="0">
        <tr>
          <td width="69">Título:</td>
          <td width="546"><input name="titulo" type="text" id="titulo" size="70" maxlength="60" required />
            <span class="style1">*</span></td>
        </tr>
        <tr>
          <td>Autor:</td>
          <td><input name="autor" type="text" id="autor" size="35" maxlength="60" required/>
          <span class="style1">*</span></td>
        </tr>

 		 <tr>
      <td>Gênero:</td>
      <td><select name="genero" id="genero" required>
        <option>  </option>
        <option value="FICCAO">Ficção</option>
        <option value="ROMANCE">Romance</option>
        <option value="TERROR">Terror</option>
        <option value="INFANTIL">Infantil</option>
         </select>
	
        <span class="style1">*      </span></td>
    </tr> 
       <tr>
          <td>Quantidade:</td>
          <td><input name="qtd" type="text" id="qtd" size="35" maxlength="60" value="1" required/>
          <span class="style1">*</span></td>
        </tr>  
        <tr>
          <td colspan="2"><p>
            <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar Livro"/>   
          <p>  </p></td>
        </tr>
      </table>
      <?php } ?>
    </form>
					


			</div>
		</div>
	</div>
	
