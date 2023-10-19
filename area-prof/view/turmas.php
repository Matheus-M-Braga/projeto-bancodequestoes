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
    // Captura dos dados do professor
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $id = $_SESSION['id'];
    $result = mysqli_query($conexao, "SELECT * FROM professor WHERE email = '$email' OR senha = '$senha' OR id_prof = '$id'");
    $prof_data = mysqli_fetch_assoc($result);

    // Filtragem das turmas
    $result_primeiro = mysqli_query($conexao, "SELECT * FROM aluno WHERE serie = '1º ano' ORDER BY nome");

    $result_segundo = mysqli_query($conexao, "SELECT * FROM aluno WHERE serie = '2º ano' ORDER BY nome");
    
    $result_terceiro = mysqli_query($conexao, "SELECT * FROM aluno WHERE serie = '3º ano' ORDER BY nome");
  }
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
            <p>Olá, <?php echo $prof_data['nome']; ?>!<br>Seja Bem-vindo Matéria: <?php echo $prof_data['materia']; ?></p>
        </div>
        </div>
        <div id="sair">
            <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
        </div>
    </header> 
    <nav id="linha">
        <a href="inicio.php">Início</a>
        <a href="questao.php">Questões</a>
        <a href="turmas.php" style="font-weight: bold;"> Turmas</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>
        <h1>Turma: 1º ano</h1>
        <br>
        <div class="alunos">
            <?php
                while($turma_data = mysqli_fetch_assoc($result_primeiro)){
                    echo 
                    "<div class=aluno>
                        <div class=user-img>
                            <img src=../imagens/profile.png>
                        </div>
                        <div class=dados>
                            <p>".$turma_data['nome']." ".$turma_data['sobrenome']."</p>
                            <p>".$turma_data['email']."</p>
                        </div>
                    </div>";
                }
            ?>
        </div>

        <!----Segundo ano-->
        <hr>
        <h1>Turma: 2º ano</h1>
        <br>
        <div class="alunos">
            <?php
                while($turma_data = mysqli_fetch_assoc($result_segundo)){
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
            ?>
        </div>
        <!---Terceiro ano-->
        <hr>
        <h1>Turma: 3º ano</h1>
        <br>
        <div class="alunos">
            <?php
                while($turma_data = mysqli_fetch_assoc($result_terceiro)){
                    echo 
                    "<div class=aluno>
                        <div class=user-img>
                            <img src=../imagens/profile.png>
                        </div>
                        <div class=dados>
                            <p>".$turma_data['nome']." ".$turma_data['sobrenome']."</p>
                            <p>".$turma_data['email']."</p>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </main> 
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>
</html>
