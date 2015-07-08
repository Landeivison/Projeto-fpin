<?php 
require_once("conexao.php");
session_start();
   
    $query = "SELECT * FROM ifal.usuarios where vinculo in ('A','P')";
	$stmt = $connection->prepare($query);
	$stmt->execute();
	$rows = $stmt->fetchAll();

	$query2 = "SELECT * FROM ifal.livros";
	$stmt2 = $connection->prepare($query2);
	$stmt2->execute();
	$rows2 = $stmt2->fetchAll();

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
</div>
<h2>RESERVA DE LIVRO!!!</h2>
<div class="main">

<div class="container">
	<div class="form">
<form method="post" action="reservar_livro.php">
	<table border="1">
		<tr>  
		<td>Usuário</td>
		<td>
			<select name="usuario"><?php foreach ($rows as $value){ ?>
             <option value="<?php echo $value['id'] ?>"><?php echo $value['nome'] ?></option>
           <?php }?>
            </select>
        </td>
		</tr>
		<tr>
		<td>Livro</td>
		<td>
			<select name="livro"><?php foreach ($rows2 as $value2){ ?>
             <option value="<?php echo $value2['id'] ?>"><?php echo $value2['titulo'] ?></option>
           <?php }?>
            </select>
        </td>
		</tr>
		<tr>
		<td>Quant.</td>
		<td><input type="text" name="qtd"></td>
		</tr>
        <tr>
          <td colspan="2"><p>
            <input name="cadastrar" type="submit" id="cadastrar" value="Reservar"/>   
          <p>  </p></td>
        </tr>
        <tr>

	</table>
</form>
  </div>
</div>
</div>
</body>
</html>