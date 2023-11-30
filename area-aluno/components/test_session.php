<?php
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
     unset($_SESSION['email']);
     unset($_SESSION['senha']);
     header('Location: ../../index.php');
} else {
     $email = $_SESSION['email'];
     $senha = $_SESSION['senha'];
     $id = $_SESSION['id'];
     $result = mysqli_query($conexao, "SELECT * FROM aluno WHERE email = '$email' OR senha = '$senha' OR id_aluno = '$id'");

     $user_data = mysqli_fetch_assoc($result);
     $id = $user_data['id_aluno'];
     $nome = $user_data['nome'];
     $sobrenome = $user_data['sobrenome'];
     $serie = $user_data['serie'];
     $email = $user_data['email'];
     $senha = $user_data['senha'];

     $result = mysqli_query($conexao, "SELECT * FROM aluno WHERE email = '$email' OR senha = '$senha' OR id_aluno = '$id'");
     $resultTurma = mysqli_query($conexao, "SELECT * FROM aluno WHERE serie = '$serie' ORDER BY nome");
}
