<?php
session_start();
include_once('../../php/Config.php');
include_once('../components/test_session.php');
?>
<!DOCTYPE html5>
<html lang="pt-br">
<?php
include_once('../components/head.php');
?>

<body>
    <?php
    $current_page = "minha_turma.php";
    include_once('../components/header.php');
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
                            <img src='../../img/profile.png'>
                        </div>
                        <div class='dados'>
                            <p>" . $turma_data['nome'] . " " . $turma_data['sobrenome'] . " (Você)</p><br>
                            <p>" . $turma_data['email'] . "</p>
                        </div>
                    </div>";
                } else {
                    echo
                    "<div class='aluno'>
                        <div class='user-img'>
                            <img src='../../img/profile.png'>
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
</body>

</html>