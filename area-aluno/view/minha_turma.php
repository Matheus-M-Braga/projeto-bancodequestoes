<?php
session_start();
include_once('../../PHP/Config.php');

// Teste da seção
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../index.html');
} else {
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $id = $_SESSION['id'];
    $result = mysqli_query($conexao, "SELECT * FROM aluno WHERE email = '$email' OR senha = '$senha' OR id_aluno = '$id'");

    $user_data = mysqli_fetch_assoc($result);
    $nome = $user_data['nome'];
    $serie = $user_data['serie'];
    $id = $user_data['id_aluno'];

    $result = mysqli_query($conexao, "SELECT * FROM aluno WHERE email = '$email' OR senha = '$senha' OR id_aluno = '$id'");
    $resultTurma = mysqli_query($conexao, "SELECT * FROM aluno WHERE serie = '$serie' ORDER BY nome");
}
?>
<!DOCTYPE html5>
<html lang="pt-br">
<?php
include("../../components/areas/head.php");
?>

<body>
    <?php
    include("../../components/areas/header.php");
    ?>
    <main>
        <h1>Turma: <?php echo $serie; ?></h1>
        <br>
        <div class="alunos">
            <?php
            while ($turma_data = mysqli_fetch_assoc($resultTurma)) {
                if ($id == $turma_data['id_aluno']) {
                    echo
                    "<div class='aluno'>
                        <div class='user-img'>
                            <img src='../imagens/profile.png'>
                        </div>
                        <div class='dados'>
                            <p>" . $turma_data['nome'] . " " . $turma_data['sobrenome'] . "(Você)</p><br>
                            <p>" . $turma_data['email'] . "</p>
                        </div>
                    </div>";
                } else {
                    echo
                    "<div class='aluno'>
                        <div class='user-img'>
                            <img src='../imagens/profile.png'>
                        </div>
                        <div class='dados'>
                            <p>" . $turma_data['nome'] . " " . $turma_data['sobrenome'] . "</p><br>
                            <p>" . $turma_data['email'] . "</p>
                        </div>
                    </div>";
                }
            }
            ?>
        </div>
    </main>
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>

</html>