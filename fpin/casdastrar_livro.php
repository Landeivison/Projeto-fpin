<?php 
  require_once("conexao.php");
session_start();
$titulo=strtoupper($_POST['titulo']);
$autor=strtoupper($_POST['autor']);
$genero=strtoupper($_POST['genero']);
$qtd=strtoupper($_POST['qtd']);
  $query = "INSERT INTO ifal.livros(titulo, autor, genero, qtd) VALUES (:titulo, :autor, :genero, :qtd)";
  $livro = $connection->prepare($query);
  $livro->bindValue(':titulo',$titulo);
  $livro->bindValue(':autor',$autor);
  $livro->bindValue(':genero',$genero);
  $livro->bindValue(':qtd',$qtd);
    if($livro->execute())
      $_SESSION['msn'] = 'Cadastro Efetuado Com Sucesso!';
    else
      $_SESSION['msn'] = 'Cadastro não Realizado!';
      
      header("Location: livro.php");    
?>
 
