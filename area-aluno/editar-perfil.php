<?php
  session_start();
  include_once('../PHP/Config.php');

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
    $email = $user_data['email'];
    $nome = $user_data['nome'];
    $serie = $user_data['serie'];
    $sobrenome = $user_data['sobrenome'];
    $id = $user_data['id_aluno'];
    $senha = $user_data['senha'];

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
    <a href="ajuda.php">Ajuda</a>
  </nav>
  <main>
    <h2 style="font-weight: normal;">Editar Cadastro</h2>
    <hr>
    <h1>Dados Cadastrais</h1>
    <hr><BR></BR>
    <form method="POST" action="save-edit.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div id="input-group">
        <div id="group1">
          <div class="itens-grid"><label for="Nome" class="inputs-text">Nome: <br></label><input type="text" placeholder="Nome" id="Nome" value="<?php echo $nome; ?>" name="nome"><br></div>
          <div class="itens-grid"><label for="Sobrenome" class="inputs-text">Sobrenome: <br></label><input type="text" placeholder="Sobrenome" id="Sobrenome" value="<?php echo $sobrenome; ?>" name="sobrenome"><br></div>
        </div>
        <div id="group2">
          <div class="itens-grid"><label for="Email" class="inputs-text">Email: <br></label><input type="text" placeholder="Email" id="Email" value="<?php echo $email; ?>" name="email"><br></div>
          <div class="itens-grid"><label for="Serie" class="inputs-text">Série: <br></label>
          <select name="serie" id="serie_select">
              <?php 
                if($serie === "1º ano"){
                  echo "
                    <option value='1º ano' selected>1º ano</option>
                    <option value='2º ano'>2º ano</option>
                    <option value='3º ano'>3º ano</option>
                    ";
                } 
                else if($serie === "2º ano"){
                  echo "
                    <option value='1º ano'>1º ano</option>
                    <option value='2º ano' selected>2º ano</option>
                    <option value='3º ano'>3º ano</option>
                    ";
                }
                else if($serie === "3º ano"){
                  echo "
                    <option value='1º ano'>1º ano</option>
                    <option value='2º ano'>2º ano</option>
                    <option value='3º ano' selected>3º ano</option>
                    ";
                }
              ?>
          </select>
          <br></div>
        </div>
        <br><br>
      </div>
      <div id="buttons">
        <input type="submit" name="Mudar" value="Mudar" class="buttons-form">
        <input type="button" value="Cancelar" onclick="limparCampos()" class="buttons-form">
      </div>
      <h1>Mudar senha</h1>
      <hr><BR></BR>
      <label for="nSenha">Nova Senha: <br></label><input type="password" placeholder="" name="senha" id="senha"><br>
      <label for="nSenha2">Confirmar nova senha:<br></label><input type="password" placeholder="" name="confirmsenha" id="confirmsenha">
      <div id="buttons2" style="margin-top: 15px;">
        <input type="submit" value="Mudar" class="buttons-form" name="MudarSenha">
        <input type="button" value="Cancelar" onclick="limparCamposSenha()" class="buttons-form">
      </div>
    </form>
  </main>
  <!-- Área de scripts -->
  <script>
    function limparCampos() {
      document.getElementById("Nome").value = '';
      document.getElementById("Sobrenome").value = '';
      document.getElementById("Email").value = '';
      document.getElementById("Serie").value = '';
    }

    function limparCamposSenha() {
      document.getElementById("senha").value = '';
      document.getElementById("confirmsenha").value = '';
    }
  </script>
  <script src="JS/Perfil.js"></script>
</body>
</html>
