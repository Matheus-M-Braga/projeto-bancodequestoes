<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    //Acessa
    include_once('Config.php');

    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario'];

    if ($usuario == "professor") {
        $sql = "SELECT * FROM professor WHERE email = '$email' and senha = '$senha'"; 
        $result = $conexao->query($sql);
        $prof_data = mysqli_fetch_assoc($result);
        $id = $prof_data['id_prof'];

        if ($result && mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $id;
            header('Location: ../area-prof/view/inicio.php');
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo "<script> 
                alert('Usuário inexistente.'); 
                window.location.href = '../index.php';
                </script>
            ";
        }
    } else if ($usuario == "aluno") {
        $sql = "SELECT * FROM aluno WHERE email = '$email' and senha = '$senha'"; 
        $result = $conexao->query($sql);
        $aluno_data = mysqli_fetch_assoc($result);
        $id = $aluno_data['id_aluno'];

        if ($result && mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $id;
            header('Location: ../area-aluno/inicio.php');
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo "<script> 
                alert('Usuário inexistente.'); 
                window.location.href = '../index.php';
                </script>
            ";
        }
    } else {
        echo "<script> 
        alert('Usuário inexistente.'); 
        window.location.href = '../index.php';
        </script>
        ";
    }
} 
else {
    echo "<script> 
        alert('Usuário inexistente.'); 
        window.location.href = '../index.php';
        </script>
    ";
}
