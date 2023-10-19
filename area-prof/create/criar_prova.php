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
    //fim da sessão 

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

        <h1>Criar Prova </h1>

        <br><br>
                <div class="container01" style="margin-left: 34%;padding:12px;margin-top: 178px;">
                    <h3>Digite o nome da prova abaixo:</h3>
                    <br>
                <form action="criador-prova.php" method="POST">

                <input type="text" name="nome_prova" placeholder="Digite o nome da prova aqui">

                
                <br><br>

                        <div id="btns" style="margin-left: 17%;width: 314px;">
                            <input type="submit" value="Criar" name="submit" class="buttons-form">
                            <input type="reset" value="Cancelar" class="buttons-form">
                        </div>

                </form>
                    
                </div>
        <!-- Área de Criação de Prova -->
       
    </main>
</body>

</html>