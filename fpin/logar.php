<?php
	
	session_start();

	if(isset($_SESSION['tipo'])=='A'){
		header("Location: aluno.php");
	}
	if(isset($_SESSION['tipo'])=='F'){
		header("Location: funcionario.php");
	}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login IFAL </title>

  <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/style.css">
	

</head>

<body>
 <a href="cadastro.html"><button>Cadastre-se</button></a>
<form id="cadastro" name="cadastro" method="post" action="login.php" onsubmit="return validaCampo(); return false;">
  <div class="wrap">
		<div class="avatar">
      <img src="img/ifal2.jpg" alt="ifal2" />
		</div>
		<input type="text" placeholder="email" name="email" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" placeholder="senha" name="senha" required>
		<button>Login</button>
		<div class="wrap">
       
		
	</div>

  <script src="js/index.js"></script>
</form>
</body>

</html>