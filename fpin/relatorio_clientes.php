<?php

	require_once("conexao.php");
	session_start();

		$query = "SELECT * FROM ifal.usuarios";
		$stmt = $connection->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll();

    
	?>

<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<h3>Relatorio de Usuários</h3>
                               <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($rows as $value){ ?>                  
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td><?php echo $value['nome']; ?></td>
                                                <td><?php echo $value['email']; ?></td>                                                
                                            </tr>
                                            <?php } ?> 
                                        </tbody>
                                    </table>

</body>
</html>
