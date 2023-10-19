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
        <div id="sair">
        <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
        </div>
    </header> 
    <nav id="linha">
        <a href="inicio.php">Início</a>
        <a href="provas.php">Provas</a>
        <a href="minha_turma.php">Minha turma</a>
        <a href="ajuda.php" style="text-decoration: underline;">Ajuda</a>
    </nav>
    <main>
        <h1 id="tituloduv">Dúvidas</h1> 
        <h2 class="h2-duvidas">1. Como alterar configurações de usúario?</h2>
        <p class="p-duvidas">Através do acesso a aba editar perfil,o usuário poderá realizar as devidas mudanças nos dados que achar necessário.Isso não afetará o login da respectiva conta utilizada como também o uso de ferramentas no site.</p>
        <h2 class="h2-duvidas">2. Quantas matérias um professor pode ter?</h2>
        <p class="p-duvidas">Um usuário professor poderá ter disponível quantas matérias desejar.Ele poderá adicionar novas matérias ao longo do uso do site,necessitando apenas dos dados de login necessários.</p>
        <h2 class="h2-duvidas">3. Como cadastrar novas questões?</h2>
        <p class="p-duvidas">Acessando a aba de provas o usuário professor terá disponível as avaliações já criadas, podendo então para cada prova adicionar novas questões. Ele terá disponível somente o repertório de questões da sua área de ensino.</p>
        <h2 class="h2-duvidas">4. Como ter acesso as informações dos alunos?</h2>
        <p class="p-duvidas">Essa é uma ferramenta disponível somente ao usuário professor. Este deverá inserir suas informações de login como email, senha, cpf e código de turma necessárias na aba minha turma.</p>
    </main> 
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>
</html>