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

if (isset($_POST['confirmar'])) {
    include_once('../php/config.php');
    $conteudo = $_POST['conteudo'];
    $dificuldade = $_POST['dificuldade'];
    $serie = $_POST['serie'];
    $materia = $_POST['materia'];
    $itemA = $_POST['itemA'];
    $itemB = $_POST['itemB'];
    $itemC = $_POST['itemC'];
    $itemD = $_POST['itemD'];
    $itemE = $_POST['itemE'];
    $correto = $_POST['correto'];

    if (!empty($conteudo) && !empty($dificuldade) && !empty($serie) && !empty($materia) && !empty($itemA) && !empty($itemB) && !empty($itemC) && !empty($itemD) && !empty($itemE) && !empty($correto)) {
        $query = "INSERT INTO questoes (conteudo, dificuldade, serie, materia, itemA, itemB, itemC, itemD, itemE, correto) VALUES ('$conteudo', '$dificuldade', '$serie', '$materia', '$itemA', '$itemB', '$itemC', '$itemD', '$itemE', '$correto')";
        $result = mysqli_query($conexao, $query);

        if ($result) {
            echo "<script>alert('Questão adicionada com sucesso!');window.location.href = './provas.php';</script>";
        } else {
            echo "<script>alert('Erro ao adicionar a questão!');window.location.href = './provas.php';</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/area.css" media="all">
    <link rel="stylesheet" href="../estilos/mediaquery-area.css">
    <link rel="shortcut icon" href="../imagens/icones/favicon.ico" type="image/x-icon">
    <title>Estuda.ja</title>
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
        <a href="provas.php" style="text-decoration: underline;">Questões</a>
        <a href="turmas.php">Turmas</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>

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

if (isset($_POST['confirmar'])) {
    include_once('../php/config.php');
    $conteudo = $_POST['conteudo'];
    $dificuldade = $_POST['dificuldade'];
    $serie = $_POST['serie'];
    $materia = $_POST['materia'];
    $itemA = $_POST['itemA'];
    $itemB = $_POST['itemB'];
    $itemC = $_POST['itemC'];
    $itemD = $_POST['itemD'];
    $itemE = $_POST['itemE'];
    $correto = $_POST['correto'];

    if (!empty($conteudo) && !empty($dificuldade) && !empty($serie) && !empty($materia) && !empty($itemA) && !empty($itemB) && !empty($itemC) && !empty($itemD) && !empty($itemE) && !empty($correto)) {
        $query = "INSERT INTO questoes (conteudo, dificuldade, serie, materia, itemA, itemB, itemC, itemD, itemE, correto) VALUES ('$conteudo', '$dificuldade', '$serie', '$materia', '$itemA', '$itemB', '$itemC', '$itemD', '$itemE', '$correto')";
        $result = mysqli_query($conexao, $query);

        if ($result) {
            echo "<script>alert('Questão adicionada com sucesso!');window.location.href = './provas.php';</script>";
        } else {
            echo "<script>alert('Erro ao adicionar a questão!');window.location.href = './provas.php';</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/area.css" media="all">
    <link rel="stylesheet" href="../estilos/mediaquery.css">
    <link rel="shortcut icon" href="../imagens/icones/favicon.ico" type="image/x-icon">
    <title>Estuda.ja</title>
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
        <a href="provas.php" style="text-decoration: underline;">Questões</a>
        <a href="turmas.php">Turmas</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>

        <h1>Criar Questão</h1>

        <br><br>

        <!-- Área de Criação de Prova -->
        <form action="criar_provas.php" method="POST" onsubmit="return validateForm()">

            <div class="select_pai">
                <b>Dificuldade:</b>
                <select name="dificuldade">
                    <option disabled selected>Selecione</option>
                    <option value="Fácil">Fácil</option>
                    <option value="Médio">Médio</option>
                    <option value="Difícil">Difícil</option>
                </select>

                &nbsp;&nbsp;

                <b>Série:</b>
                <select name="serie">
                    <option disabled selected>Selecione</option>
                    <option value="1º ano">1º ano</option>
                    <option value="2º ano">2º ano</option>
                    <option value="3º ano">3º ano</option>
                </select>

                &nbsp;&nbsp;
                <b>Materia:</b>
                <select name="materia">
                    <option disabled selected>Selecione</option>
                    <option value="português">Português</option>
                    <option value="matemática">Matemática</option>
                    <option value="fisica">Física</option>
                </select>

                &nbsp;&nbsp;

            </div>

            <br><br>

            <div id="enunciado">
                <h2>Conteúdo:</h2>
            </div>
            <textarea name="conteudo" id="" cols="253" rows="20" class="areatexto" placeholder="Coloque aqui todo o seu conteúdo da prova aqui......"></textarea>

            <br><br>

            <b>Selecione o item correto:</b>
            <div class="itens">
                <input type="radio" name="correto" value="A" id="A">
                <label for="A">A</label>
                <input type="text" name="itemA" placeholder="Digite o texto do Gabarito">
                <br><br>
                <input type="radio" name="correto" value="B" id="B">
                <label for="B">B</label>
                <input type="text" name="itemB" placeholder="Digite o texto do Gabarito">
                <br><br>
                <input type="radio" name="correto" value="C" id="C">
                <label for="C">C</label>
                <input type="text" name="itemC" placeholder="Digite o texto do Gabarito">
                <br><br>
                <input type="radio" name="correto" value="D" id="D">
                <label for="D">D</label>
                <input type="text" name="itemD" placeholder="Digite o texto do Gabarito">
                <br><br>
                <input type="radio" name="correto" value="E" id="E">
                <label for="E">E</label>
                <input type="text" name="itemE" placeholder="Digite o texto do Gabarito">
            </div>
            <br><br>
            <div id="btns">
                <input type="submit" value="Confirmar" name="confirmar" class="buttons-form">
                <input type="reset" value="Cancelar" class="buttons-form">
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
</body>

</html>
            <div id="btns">
                <input type="submit" value="Confirmar" name="confirmar" class="buttons-form">
                <input type="reset" value="Cancelar" class="buttons-form">
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
</body>

</html>