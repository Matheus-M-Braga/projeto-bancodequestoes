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

if (!empty($_GET['id'])) {

    include_once('../PHP/Config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM questoes WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        while ($questoes_data = mysqli_fetch_assoc($result)) {
            $conteudo = $questoes_data['conteudo'];
            $dificuldade = $questoes_data['dificuldade'];
            $serie = $questoes_data['serie'];
            $materia = $questoes_data['materia'];
            $correto = $questoes_data['correto'];
            $itemA = $questoes_data['itemA'];
            $itemB = $questoes_data['itemB'];
            $itemC = $questoes_data['itemC'];
            $itemD = $questoes_data['itemD'];
            $itemE = $questoes_data['itemE'];
        }
    } else {
        header('Location:questao.php');
    }
} else {
    header('Location:questao.php');
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/area.css" media="all">
    <link rel="stylesheet" href="../CSS/mediaquery-area.css">
    <link rel="shortcut icon" href="../imagens/icones/favicon.ico" type="image/x-icon">
    <title>Estuda.ja</title>
    <style>
        .d-flex {
            display: flex;
        }

        .me-1 {
            margin-right: 5px;
            padding: 5px;
            border: 1px solid #3c6e71;
            border-radius: 10px;
            background-color: #e0e5ec;
        }

        .info {
            font-size: 0.8rem;
            color: darkslategrey;
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <div id="login-user">
            <div id="texto-user" style="display: flex;">
                <a href="editar-perfil.php" title="Clique para editar seu perfil, seu vagabundo">
                    <div class="perfiluser" style="margin-right: 20px;">
                        <img src="../imagens/user.svg" alt="boneco_user">
                    </div>
                </a>
                <p>Olá, <?php echo $nome; ?>!<br> Seja bem-vindo <br>Matéria: <?php echo $materia; ?></p>
            </div>
        </div>
        <div id="sair">
            <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
        </div>
    </header>
    <nav id="linha">
        <a href="inicio.php">Início</a>
        <a href="questao.php" style="text-decoration: underline;">Questões</a>
        <a href="turmas.php">Turmas</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>

        <h1>Editar Questão</h1>

        <br><br>

        <!-- Área de Criação de Prova -->
        <form action="save-prova.php" method="POST" onsubmit="return validateForm()">

            <?php
            echo  '<div class="container01" style="background-color:white;height:350px;">';
            echo '<div class="d-flex flex-wrap text-left">
            <div class="me-1">';
            echo '<span class="info">' . $dificuldade . '</span>';
            echo '</div>
            <div class="me-1">';
            echo '<span class="info">' . $serie . '</span>';
            echo '</div>
            <div class="me-1">';
            echo '<span class="info">' . $materia . '</span>';
            echo '</div>
            </div>';
            // Display the retrieved data in the HTML structure
            echo '<h3>' . $conteudo . '</h3>';
            echo '<br>';
            echo '<div class="radios_form" >';
            echo '<p> A)' . $itemA . '</p>';
            echo '<br>';
            echo '<p> B)' . $itemB . '</p>';
            echo '<br>';
            echo '<p> C)' . $itemC . '</p>';
            echo '<br>';
            echo '<p> D)' . $itemD . '</p>';
            echo '<br>';
            echo '<p> E)' . $itemE . '</p>';
            echo '<br>';
            echo '<b> Item correto: </b>';
            echo  $correto;
            echo '</div>';
            ?>
            <br><br>
            <div class="input-box">
                <div class="select_prova">
                    <label for="select_prova">PROVA</label>
                    <select class="select_prova" name="select_prova" id="select_prova" onchange="updateHiddenInput()">
                        <option disabled selected>Selecione</option>
                        <?php
                        $sql = "SELECT * FROM provas ORDER BY id DESC";
                        $res = mysqli_query($conexao, $sql);
                        while ($user_prova = mysqli_fetch_row($res)) {
                            $cod_prova = $user_prova[0];
                            $nome_prova = $user_prova[1];
                            echo "<option name ='editora' value='$cod_prova'>$nome_prova</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div id="btns">
                <input type="submit" value="Selcionar" name="selecionar" class="buttons-form">
                <input type="reset" value="Cancelar" class="buttons-form">

                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="id_prova" id="id_prova" value="<?php echo $cod_prova ?>">
            </div>
        </form>
    </main>
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
    <script>
        function validateForm() {
            var dificuldade = document.forms[0]["dificuldade"].value;
            var serie = document.forms[0]["serie"].value;
            var conteudo = document.forms[0]["conteudo"].value;
            var materia = document.forms[0]["materia"].value;
            var correto = document.forms[0]["correto"].value;

            if (conteudo === "" || dificuldade === "" || serie === "" || materia === "" || correto === "") {
                alert("Preencha todos os campos!");
                return false;
            }
        }
    </script>
    <script>
        function updateHiddenInput() {
            var selectElement = document.getElementById('select_prova');
            var hiddenInput = document.getElementById('id_prova');
            hiddenInput.value = selectElement.value;
        }
    </script>
</body>

</html>