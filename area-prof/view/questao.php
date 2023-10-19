<?php
session_start();
include_once('../PHP/Config.php');

// Teste da sessão
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../index.html');
} else {
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $id = $_SESSION['id'];
    $result = mysqli_query($conexao, "SELECT * FROM professor WHERE email = '$email' OR senha = '$senha' OR id_prof = '$id'");

    $user_data = mysqli_fetch_assoc($result);
    $nome = $user_data['nome'];
    $materia = $user_data['materia'];
}

// Variáveis de pesquisa
$dificuldade = isset($_GET['dificuldade']) ? $_GET['dificuldade'] : '';
$serie = isset($_GET['serie']) ? $_GET['serie'] : '';


// Consulta SQL com filtros
$query = "SELECT * FROM questoes WHERE materia='$materia'";
if (!empty($dificuldade)) {
    $query .= " AND dificuldade = '$dificuldade'";
}
if (!empty($serie)) {
    $query .= " AND serie = '$serie'";
}


$result = mysqli_query($conexao, $query);
?>
<!DOCTYPE html5>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/area.css" media="all">
    <link rel="stylesheet" href="../estilos/mediaquery-area.css">
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
                <a href="editar-perfil.php" title="Clique para editar seu perfil,  seu vagabudno">
                    <div class="perfiluser" style="margin-right: 20px;">
                        <img src="../imagens/user.svg" alt="boneco_user">
                    </div>
                </a>
                <p>Olá, <?php echo $nome; ?>!<br> Seja Bem-vindo <br>Matéria: <?php echo $materia; ?></p>
            </div>
        </div>
        <div id="sair">
            <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
        </div>
    </header>
    <nav id="linha">
        <a href="inicio.php">Início</a>
        <a href="questao.php" style="font-weight: bold;">Questões</a>
        <a href="turmas.php">Turmas</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>

        <h1 style="margin-top:3px; padding: 8px;">Questões</h1>
        <br>

        <form action="questao.php">

            <div class="select_pai" id="select_prova_pai">
                <b>Dificuldade:</b>
                <select name="dificuldade" class="select_questoes">
                    <option disabled selected>Selecione</option>
                    <option value="fácil">Fácil</option>
                    <option value="médio">Médio</option>
                    <option value="difícil">Difícil</option>
                </select>
                &nbsp;&nbsp;
                <b>Série:</b>
                <select name="serie" class="select_questoes">
                    <option disabled selected>Selecione</option>
                    <option value="1º ano">1º ano</option>
                    <option value="2º ano">2º ano</option>
                    <option value="3º ano">3º ano</option>
                </select>
                &nbsp;&nbsp;

                <input type="submit" value="Filtrar" name="filtrar" id="bt_filter" onclick="searchData()">
                <br><br>

        </form>

        </div>
        <a href="criar_questao.php" style="text-decoration:none; width: fit-content; height:fit-content;" id="rapidex">
            <div id="novo">Novo +</div>
        </a>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $enunciado = $row['conteudo'];
            $itemA = $row['itemA'];
            $itemB = $row['itemB'];
            $itemC = $row['itemC'];
            $itemD = $row['itemD'];
            $itemE = $row['itemE'];
            $correta = $row['correto'];
            $dificuldade = $row['dificuldade'];
            $serie = $row['serie'];
            $materia = $row['materia'];
            echo  "<div class='container01' style='background-color:white; width:98%;'>";
            echo '<div class="d-flex flex-wrap text-left">
            <div class="me-1">';
                echo '<span class="info">'.$dificuldade.'</span>';
            echo '</div>
            <div class="me-1">';
            echo '<span class="info">'.$serie.'</span>';
               echo '</div>
            <div class="me-1">';
            echo '<span class="info">'.$materia.'</span>';
            echo '</div>
            </div>';
            // Display the retrieved data in the HTML structure
            echo '<h3>' . $enunciado . '</h3>';
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
            echo  $correta;
            echo '</div>';
            echo '<br>';
            echo '<br>';
            echo '<div class="acoes" id="acoes01">';
            echo "<a href='editar_questao.php?id=$row[id]' title='Editar questão'><img src='../imagens/editar.svg' alt='editar'></a>";
            echo "<a href='add.php?id=$row[id]' title='Selecionar questão'><img src='../imagens/adicionar.png' alt='selecionar'></a>";
            echo "<a href='deletar-questao.php?id=$row[id]' title='Excluir questão'><img src='../imagens/lixeira.svg' alt='Lixeira'> </a>";
            echo '</div>';
            echo '</div>';
        }
        ?>
    </main>
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
    <script>
        var search = document.getElementById('bt_filter')

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData()
            }
        })

        function searchData() {
            window.location = 'Usuarios.php?search=' + search.value
        }
    </script>
</body>

</html>