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
	<meta charset="UTF-8">
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
			<LI><a href="index.html">Voltar</a></LI>
			<LI><a href="livro.php">Cadastrar Livros</a></LI>
			<LI><a href="consulta_livro.php">Consultar Livros</a></LI>
			<li><a href="relatorio_usuarios.php">Relatorio de usuários</a></li>
			<li><a href="relatorio_livros.php">Relatorio de livros</a></li>
			<li><a href="locacao.php">Reserva de livros</a></li>
			<Li><a href="logout.php">Sair</a></LI>

		

			
		</ul>
	</div>
	<!-- MAIN -->
	<div class="main">
		<div class="cadastro">
				<h2>ÁREA ADMINISTRATIVA: Seja Bem Vindo!  <?php echo $_SESSION['nome']; ?></h2>
				<hr>

				<form id="cadastro" name="cadastro" method="post" action="alterar_cadastro.php" onsubmit="return validaCampo(); return false;">
					<?php foreach ($rows as  $linha){ ?>
      <table width="625" border="0">
        <tr>
          <td width="69">Nome:</td>
          <td width="546"><input name="nome" type="text" id="nome" size="70" maxlength="60" required value="<?php echo $linha['nome'] ?>"/>
            <span class="style1">*</span></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input name="email" type="text" id="email" size="35" maxlength="60" required value="<?php echo $linha['email'] ?>"/>
          <span class="style1">*</span></td>
        </tr>

 		<tr>
          <td>Senha:</td>
          <td><input name="senha" type="password" id="senha" size="15" maxlength="60" required value="<?php echo $linha['senha'] ?>"/>
          <span class="style1">*</span></td>

        </tr>   
        <tr>
          <td colspan="2"><p>
            <input name="cadastrar" type="submit" id="cadastrar" value="Alterar meu Cadastro"/>   
          <p>  </p></td>
        </tr>
        <tr>
          
          <p><?php echo "ID " . $_SESSION['idcolab'];?>  </p></td>
        </tr>
      </table>
      <?php } ?>
    </form>
					


			</div>
		</div>
	</div>
	
