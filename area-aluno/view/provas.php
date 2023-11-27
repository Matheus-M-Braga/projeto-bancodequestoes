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

    $result = mysqli_query($conexao, "SELECT * FROM aluno WHERE email = '$email' OR senha = '$senha' OR id_aluno = '$id'");
}


$resultPova = mysqli_query($conexao, "SELECT * FROM provas");

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
    <main id="main-provas">
        <div class="container-pai">
            <h1>Provas</h1>
            <div class="header-provas">
                <div id="materias">
                    <h2>Matérias</h2>
                    <form action="">
                        <input type="checkbox" name="biologia-check" id="ibiologia">
                        <label for="ibiologia">Biologia</label><br>
                        <input type="checkbox" name="biologia-check" id="iinformatica">
                        <label for="iinformatica">Informática Básica</label><br>
                        <input type="checkbox" name="biologia-check" id="ihistoria">
                        <label for="ihistoria">História</label><br>
                        <input type="checkbox" name="biologia-check" id="ilogica">
                        <label for="ilogica">Lógica de Programação</label><br>
                    </form>
                </div>
                <div id="dificuldades">
                    <h2>Dificuldade</h2>
                    <form action="">
                        <input type="checkbox" name="biologia-check" id="ifacil">
                        <label for="ifacil">Fácil</label><br>
                        <input type="checkbox" name="biologia-check" id="imedio">
                        <label for="imedio">Médio</label><br>
                        <input type="checkbox" name="biologia-check" id="idificil">
                        <label for="idificil">Difícil</label><br>
                    </form>
                </div>
            </div>
            <br>
            <div class="questoes-container">
                <?php
                while ($prova_data = mysqli_fetch_assoc($resultPova)) {
                    $id = $prova_data['id'];
                    echo "<div class='questoes-entrada'>
                        <h1>" . $prova_data['nome'] . "</h1>
                        <p>vai encarar ???!!?!?</p><br>
                        <a href='fazeraprova.php?id=$id'><div class='ver-btn'>Resolver agora</div>
                        </div></a>";
                }
                ?>
            </div>
        </div>
    </main>
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>

</html>