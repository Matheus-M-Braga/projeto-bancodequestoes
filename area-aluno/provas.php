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


    $resultPova = mysqli_query($conexao, "SELECT * FROM provas");

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
        <a href="provas.php" style="text-decoration: underline;">Provas</a>
        <a href="minha_turma.php">Minha turma</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main id="main-provas">
        <div class="container-pai">
            <h1>Provas</h1>
            <div class="header-provas">
                <div id="materias">
                    <h2>Matérias</h2>
                    <form action="">
                        <input type="checkbox" name="biologia-check" id="ibiologia">
                        <label for="ibiologia">Biologia</label><br>
                        <input type="checkbox" name="biologia-check" id="iinformatica">
                        <label for="iinformatica">Informática Básica</label><br>
                        <input type="checkbox" name="biologia-check" id="ihistoria">
                        <label for="ihistoria">História</label><br>
                        <input type="checkbox" name="biologia-check" id="ilogica">
                        <label for="ilogica">Lógica de Programação</label><br>
                    </form>
                </div>
                <div id="dificuldades">
                    <h2>Dificuldade</h2>
                    <form action="">
                        <input type="checkbox" name="biologia-check" id="ifacil">
                        <label for="ifacil">Fácil</label><br>
                        <input type="checkbox" name="biologia-check" id="imedio">
                        <label for="imedio">Médio</label><br>
                        <input type="checkbox" name="biologia-check" id="idificil">
                        <label for="idificil">Difícil</label><br>
                    </form>
                </div>
            </div>
            <br>
            <div class="questoes-container">
                <?php
                    while($prova_data = mysqli_fetch_assoc($resultPova)){
                        $id = $prova_data['id'];
                        echo"<div class='questoes-entrada'>
                        <h1>".$prova_data['nome']."</h1>
                        <p>vai encarar ???!!?!?</p><br>
                        <a href='fazeraprova.php?id=$id'><div class='ver-btn'>Resolver agora</div>
                        </div></a>";
                    }
                ?>
            </div>
        </div>
    </main> 
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>
</html>