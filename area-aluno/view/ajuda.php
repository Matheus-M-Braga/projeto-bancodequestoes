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
        <h1 id="tituloduv">Dúvidas</h1>
        <h2 class="h2-duvidas">1. Como alterar configurações de usúario?</h2>
        <p class="p-duvidas">Através do acesso a aba editar perfil,o usuário poderá realizar as devidas mudanças nos dados que achar necessário.Isso não afetará o login da respectiva conta utilizada como também o uso de ferramentas no site.</p>
        <h2 class="h2-duvidas">2. Quantas matérias um professor pode ter?</h2>
        <p class="p-duvidas">Um usuário professor poderá ter disponível quantas matérias desejar.Ele poderá adicionar novas matérias ao longo do uso do site,necessitando apenas dos dados de login necessários.</p>
        <h2 class="h2-duvidas">3. Como cadastrar novas questões?</h2>
        <p class="p-duvidas">Acessando a aba de provas o usuário professor terá disponível as avaliações já criadas, podendo então para cada prova adicionar novas questões. Ele terá disponível somente o repertório de questões da sua área de ensino.</p>
        <h2 class="h2-duvidas">4. Como ter acesso as informações dos alunos?</h2>
        <p class="p-duvidas">Essa é uma ferramenta disponível somente ao usuário professor. Este deverá inserir suas informações de login como email, senha, cpf e código de turma necessárias na aba minha turma.</p>
    </main>
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>

</html>