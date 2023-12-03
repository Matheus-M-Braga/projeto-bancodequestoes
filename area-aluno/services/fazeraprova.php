<?php
session_start();
include_once('../../php/Config.php');
include_once('../components/test_session.php');

$resultPova = mysqli_query($conexao, "SELECT * FROM provas");

?>
<!DOCTYPE html5>
<html lang="pt-br">

<head>
    <?php
    include_once("../components/head.php");
    ?>
</head>

<body>
    <main id="main-provas" style="height: 100vh;">
        <form action="">
            <?php
            if (!empty($_GET['id'])) {

                $id = $_GET['id'];
                $sqlSelect = "SELECT * FROM provas WHERE id=$id";
                $result = $conexao->query($sqlSelect);

                if ($result->num_rows > 0) {

                    $prova_data = mysqli_fetch_assoc($result);
                    $nome = $prova_data['nome'];
                    $questoes = $prova_data['questões'];
                    $queryQuestoes = "SELECT * FROM questoes WHERE id IN ($questoes)";
                    $resultQuestoes = mysqli_query($conexao, $queryQuestoes);
                    echo "<div class='container01' style='height: fit-content;'>";
                    echo '<h2>' . $nome . '</h2>';

                    // Exibir as questões selecionadas
                    $cont = 0;
                    while ($questao = mysqli_fetch_assoc($resultQuestoes)) {
                        $idQuestao = $questao['id'];
                        $conteudo = $questao['conteudo'];
                        $itemA = $questao['itemA'];
                        $itemB = $questao['itemB'];
                        $itemC = $questao['itemC'];
                        $itemD = $questao['itemD'];
                        $itemE = $questao['itemE'];
                        // $correta = $questao['correta'];
                        $dificuldade = $questao['dificuldade'];
                        $serie = $questao['serie'];
                        $materia = $questao['materia'];
                        // Exibir os detalhes da questão
                        echo '<h4>' . $cont + 1 . ") " . $conteudo . '</h4>';
                        echo '<br>';
                        echo '<div class="radios_form">';
                        echo "<input type='radio' name='correto' value='A' id'D'>";
                        echo '<span> A) ' . $itemA . '</span>';
                        echo '<br>';
                        echo "<input type='radio' name='correto' value='B' id'D'>";
                        echo '<span> B) ' . $itemB . '</span>';
                        echo '<br>';
                        echo "<input type='radio' name='correto' value='C' id'D'>";
                        echo '<span> C) ' . $itemC . '</span>';
                        echo '<br>';
                        echo "<input type='radio' name='correto' value='D' id'D'>";
                        echo '<span> D) ' . $itemD . '</span>';
                        echo '<br>';
                        echo "<input type='radio' name='correto' value='E' id'D'>";
                        echo '<span> E) ' . $itemE . '</span>';
                        echo '</div></div></form>';
                        $cont++;
                    }
                    echo '</div>';
                }
                echo "<div class='input-group'><input type='submit' name='submit' class='buttons-form' value='Finalizar'>&nbsp&nbsp&nbsp";
                echo "<input type='reset' name='reset' class='buttons-form' value='Desistir'></div>";
            }
            ?>
        </form>
    </main>
</body>

</html>