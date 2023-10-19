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
        $id = $user_data['id_aluno'];

        $result = mysqli_query($conexao, "SELECT * FROM aluno WHERE email = '$email' OR senha = '$senha' OR id_aluno = '$id'");
        $resultTurma = mysqli_query($conexao, "SELECT * FROM aluno WHERE serie = '$serie' ORDER BY nome");
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
    <link rel="stylesheet" href="../estilos/provas.css">
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
        <div id="sair">
        <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
        </div>
    </header> 
    <nav id="linha">
        <a href="inicio.php">Início</a>
        <a href="provas.php">Provas</a>
        <a href="minha_turma.php" style="text-decoration: underline;">Minha turma</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>
        <h1>Turma: <?php echo $serie; ?></h1>
        <br>
        <div class="alunos">
            <?php 
                while($turma_data = mysqli_fetch_assoc($resultTurma)){
                    if($id == $turma_data['id_aluno']){
                        echo 
                        "<div class='aluno'>
                            <div class='user-img'>
                                <img src='../imagens/profile.png'>
                            </div>
                            <div class='dados'>
                                <p>".$turma_data['nome']." ".$turma_data['sobrenome']."(Você)</p><br>
                                <p>".$turma_data['email']."</p>
                            </div>
                        </div>";
                    }
                    else{
                        echo 
                        "<div class='aluno'>
                            <div class='user-img'>
                                <img src='../imagens/profile.png'>
                            </div>
                            <div class='dados'>
                                <p>".$turma_data['nome']." ".$turma_data['sobrenome']."</p><br>
                                <p>".$turma_data['email']."</p>
                            </div>
                        </div>";
                    }
                }
            ?>
        </div>
    </main> 
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>
</html>