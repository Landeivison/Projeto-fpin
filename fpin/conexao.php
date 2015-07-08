<?php
try{
    // Faz conexão com banco de daddos
    $connection = new PDO("mysql:localhost;dbname=ifal;","root","");
}catch(PDOException $e){
    /* Caso ocorra algum erro na conexão com o banco, exibe a mensagem */
    echo 'Falha ao conectar no banco de dados: '.$e->getMessage();
    die;
}
?>