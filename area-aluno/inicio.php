<?php
    session_start();
    include_once('../PHP/Config.php');
  
    // Teste da seção
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../index.html');
    }
    else{
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/area.css" media="all">
    <link rel="stylesheet" href="../estilos/mediaquery.css">
    <link rel="shortcut icon" href="imagens/icones/favicon.ico" type="image/x-icon">
    <title>Estuda.ja</title>
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
            <p>Olá, <?php echo $nome; ?>!<br> Seja Bem-vindo <br>Série: <?php echo $serie; ?></p>
        </div>
        </div>
        </div><div id="sair">
        <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
        </div>
    </header> 
    <nav id="linha">
        <a href="inicio.php" style="text-decoration: underline;">Início</a>
        <a href="provas.php">Questões</a>
        <a href="minha_turma.php">Minha turma</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>
        <!-- Relatório de provas -->
        <div class="grid-dash">
            <div class="blocos">
                <h1>Prova de Biologia</h1>
                    <br><br>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                          <div class="progress-bar">
                          </div>
                        </div>
                    </div>
                  <br>
                  <div class="ver-btn">Ver Prova</div>
            </div>
            <div class="blocos">
                <h1>Prova de Lógica de Programção</h1>
                    <br><br>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                          <div class="progress-bar">
                          </div>
                        </div>
                    </div>
                  <br>
                  <div class="ver-btn">Ver Prova</div>
            </div>
            <div class="blocos">
                <h1>Prova de História</h1>
                    <br><br>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                          <div class="progress-bar">
                          </div>
                        </div>
                    </div>
                  <br>
                  <div class="ver-btn">Ver Prova</div>
            </div>
            <div class="blocos">
                <h1>Prova de Informática Básica</h1>
                    <br><br>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                          <div class="progress-bar">
                          </div>
                        </div>
                    </div>
                  <br>
                  <div class="ver-btn">Ver Prova</div>
            </div>
        </div>
        <br>
        <hr>
        <h1>Médias Gerais</h1>
        <h2>Biologia</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
        <h2>Lógica de Programção</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
        <h2>História</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
        <h2>Informática Básica</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
    </main> 
    <!-- Área de scripts -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <script src="JS/Perfil.js"></script>
</body>
</html>