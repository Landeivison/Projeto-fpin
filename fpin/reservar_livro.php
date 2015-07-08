<?php 
  require_once("conexao.php");
session_start();

// SQL que verifica estoque de livros
$usuario = $_POST['usuario'];
$livro = $_POST['livro'];
$qtd = $_POST['qtd'];

$saldo = 'SELECT * FROM ifal.livros where id = :livro';
 $book = $connection->prepare($saldo);
 $book->bindValue(':livro',$livro);
 $book->execute();
 foreach ($book as $value);
 //$book = $book->fetchAll();
   if($book->rowCount() < 0){
     echo "Nenhum Registro Selecionado!";
//Fim Sql
   }else{
      if ($value['qtd']<='0') {
       echo "Livro Sem Saldo!";
       exit();
     }
     $atualiza = "UPDATE ifal.livros SET qtd = (qtd-:qtd) WHERE id = :livro";
      $dado = $connection->prepare($atualiza);
      $dado->bindValue(':qtd',$qtd);
      $dado->bindValue(':livro',$livro);
      $dado->execute();
      echo "Dados atualizado Com Sucesso!";
}
  
?>
 
