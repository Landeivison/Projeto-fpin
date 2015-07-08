<?php

	require_once("conexao.php");
	session_start();

$query = "SELECT * FROM ifal.livros";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
	?>

    <html>
<head>
    <meta charset="UTF-8">
</head>
<body>

        <h3>Relatorio de Livros</h3>
                               <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Autor</th>
                                                <th>Gênero</th>
                                                <th>Quantidade</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($rows as $value){ ?>                  
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td><?php echo $value['titulo']; ?></td>
                                                <td><?php echo $value['genero']; ?></td>  
                                                <td><?php echo $value['qtd'];    ?></td>                                             
                                            </tr>
                                            <?php } ?> 
                                        </tbody>
                                    </table>
                                </body>





</html>





