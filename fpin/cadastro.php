<?php 
require_once("conexao.php");
$nome=strtoupper($_POST['nome']);
$email=strtolower($_POST['email']);
$sexo=strtoupper($_POST['sexo']);
$telefone=strtoupper($_POST['telefone']);
$endereco=strtoupper($_POST['endereco']);
$bairro=strtoupper($_POST['bairro']);
$estado=strtoupper($_POST['estado']);
$cidade=strtoupper($_POST['cidade']);
$vinculo=strtoupper($_POST['vinculo']);
$senha=$_POST['senha'];
  $query = "INSERT INTO ifal.usuarios (nome, email, sexo, telefone, endereco, bairro, uf,  vinculo, cidade, senha) VALUES
                         (:nome, :email, :sexo, :telefone, :endereco, :bairro, :estado, :vinculo, :cidade, :senha)";
  $cadastro = $connection->prepare($query);
  $cadastro->bindValue(':nome',$nome);
  $cadastro->bindValue(':email',$email);
  $cadastro->bindValue(':sexo',$sexo);
  $cadastro->bindValue(':telefone',$telefone);
  $cadastro->bindValue(':endereco',$endereco);
  $cadastro->bindValue(':bairro',$bairro);
  $cadastro->bindValue(':estado',$estado);
  $cadastro->bindValue(':vinculo',$vinculo);
  $cadastro->bindValue(':cidade',$cidade);
  $cadastro->bindValue(':senha',$senha);
    if($cadastro->execute())
      $_SESSION['msn'] = 'Cadastro Efetuado Com Sucesso!';
    else
      $_SESSION['msn'] = 'Cadastro não Realizado!';
      
      header("Location: cadastro.html");  