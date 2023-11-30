<?php
session_start();
include_once('../../PHP/Config.php');
include_once('../components/test_session.php');
?>
<!DOCTYPE html5>
<html lang="pt-br">
<?php
include_once('../components/head.php');
?>

<body>
    <?php
    $current_page = "ajuda.php";
    include_once('../components/header.php');
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
</body>

</html>