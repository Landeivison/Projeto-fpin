<?php 
require_once("conexao.php");
session_start();
   
  $id=$_GET['id'];
  $_SESSION['livro'] = $id;
  $sql="SELECT * FROM ifal.livros where id = :banco";
  $stmt = $connection->prepare($sql);
  $stmt -> bindValue(':banco', $id);
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
			<LI><a href="novidades.html">Consultar Livros</a></LI>
			<LI><a href="login.html">logof</a></LI>
		

			
		</ul>
	</div>
	<!-- MAIN -->
	<div class="main">
		<div class="cadastro">
				<h2>MANUTENÇÃO DE LIVROS</h2>
				<hr>

				<form id="cadastro" name="cadastro" method="post" action="alterar_livro.php" onsubmit="return validaCampo(); return false;">
					<?php foreach ($rows as  $linha){ ?>
      <table width="625" border="0">
        <tr>
          <td width="69">Título:</td>
          <td width="546"><input name="titulo" type="text" id="titulo" size="70" maxlength="60" required value="<?php echo $linha['titulo'] ?>"/>
            <span class="style1">*</span></td>
        </tr>
        <tr>
          <td>Autor:</td>
          <td><input name="autor" type="text" id="autor" size="35" maxlength="60" required value="<?php echo $linha['autor'] ?>"/>
          <span class="style1">*</span></td>
        </tr>
       <tr>
          <td>Quantidade:</td>
          <td><input name="qtd" type="text" id="qtd" size="35" maxlength="60" required value="<?php echo $linha['qtd'] ?>"/>
          <span class="style1">*</span></td>
        </tr>  
        <tr>
          <td colspan="2"><p>
            <input name="cadastrar" type="submit" id="cadastrar" value="Alterar Livro"/>   
          <p>  </p></td>
        </tr>
      </table>
      <?php } ?>
    </form>
					


			</div>
		</div>
	</div>
	
