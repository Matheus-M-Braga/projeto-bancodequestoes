<?php 

$dbhost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'admin';
$dbName ='bancoquest_bd';

$conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbName);

/* if($conexao->connect_errno){
    echo "erro";
}else{
    echo "Deu Bom";
} */
if($conexao -> error){
    die("Falha ao conectar ao Banco de dados: " .$conexao->error);
}

?>