 <?php
    require_once("conexao.php");
    
    //Iniciando e validando a sessao
    session_start();
    $colab = $_SESSION['idcolab'];
    $nome = $_SESSION['nome'];
    
    $query = "" ;
    $campo = "" ;
    $buscar = "";
    
    if(isset($_POST['campo'])){
        $campo  =   $_POST['campo'];
        $buscar =   $_POST['pesquisar'];
        $query  =   "SELECT * FROM ifal.livros a 
                    WHERE $campo LIKE :busca
                    ORDER BY a.titulo";
        
    } else{
        $query =    "SELECT * FROM ifal.livros a 
                    WHERE a.autor LIKE :busca
                    ORDER BY a.autor";
    }
    
    $stmt = $connection -> prepare($query);
    $stmt->bindValue(':busca', '%' . $buscar . '%');
    $stmt->execute();
    $rows = $stmt -> fetchAll();
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
      <LI><a href="login.html">Sair</a></LI>
    

      
    </ul>
  </div>
  <!-- MAIN -->
  <div class="main">
    <div class="cadastro">
        <h2>CONSULTA DE LIVROS</h2>
        <hr>

                                            <!-- BEGIN FORM-->
                                                      </div>

                 <form action="" id="form_sample_1" class="form-horizontal" method="post">
                            <div class="input-append"> 
                                <select name="campo">
                                    <option value="a.titulo">Título</option>
                                    <option value="a.autor">Autor</option>
                                </select>
                                </div>
                                   <div class="input-append">
                                         <input class="span12" id="appendedInputButton" name="pesquisar" type="text">
                                           <button class="btn btn-primary" type="submit">Pesquisar</button>
                                          </div>
                               <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Título</th>
                                                <th>Autor</th>
                                                <th colspan="2">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($rows as  $value){ ?>                  
                                            <tr>
                                                <td><?php echo $value['id'];?></td>
                                                <td><?php echo $value['titulo'];?></td>
                                                <td><?php echo $value['autor'];?></td>
                                                <td><a href="alteralivro.php?id=<?php echo $value['id']?>"><img src="img/editar.png">Editar</a></td>
                                                <td><a href="deletar_livro.php?id=<?php echo $value['id']?>" onClick="return confirm('Confirmar exclusão de registro?');"><img src="img/deletar.png">Excluir</a><?php }?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                   
              </form>
          <!-- END FORM-->
          


      </div>
    </div>
  </div>
  
