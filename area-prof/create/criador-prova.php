<?php
session_start();
include_once('../PHP/Config.php');

// Teste da sessão
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: ../index.html');
    exit;
} else {
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $id = $_SESSION['id'];
    $result = mysqli_query($conexao, "SELECT * FROM professor WHERE email = '$email' OR senha = '$senha' OR id_prof = '$id'");

    $user_data = mysqli_fetch_assoc($result);
    $nome = $user_data['nome'];
    $materia = $user_data['materia'];
}

if(isset($_POST['submit'])){
    include_once('../PHP/Config.php');
    $nome=$_POST['nome_prova'];
    mysqli_query($conexao, "INSERT INTO provas(nome, questões ) VALUES ('$nome',0)");

    echo"<script> alert('Prova criada com sucesso! Agora você será redirecionado a página de questões para adicionar à sua prova!!') 
        window.location.href = 'questao.php';
        </script>";
    
}else{
    header('Location:inicio.php');
}



?>