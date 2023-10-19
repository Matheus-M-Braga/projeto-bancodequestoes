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
$query = "SELECT * FROM questoes";
$resultado = mysqli_query($conexao, $query);

// Verifica se houve algum erro na consulta
if (!$resultado) {
  die('Erro na consulta: ' . mysqli_error($conexao));
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <title>Estuda.ja</title>
</head>

<body onresize="mudaTamanho()">
  <!-- Cabeçalho -->
  <header>
    <div id="login-user">
      <div id="texto-user" style="display: flex;">
        <a href="editar-perfil.php" title="Clique para editar seu perfil, seu vagabundo">
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
  <span id="burguer" onclick="clickMenu()" class="material-symbols-outlined">
    menu
  </span>
  <span id="burguer_open" onclick="clickMenu()" class="material-symbols-outlined">
    menu_open
  </span>
  <nav id="linha">
    <a href="inicio.php" style="font-weight: bold;">Início</a>
    <a href="questao.php">Questões</a>
    <a href="turmas.php">Turmas</a>
    <a href="ajuda.php">Ajuda</a>
  </nav>
  <main>

    <br>
    <h2>PROVAS</h2>
    <br>

    <a href="criar_prova.php" style="text-decoration:none; width: fit-content; height:fit-content;" id="rapidex">
            <div id="novo">Novo +</div>
        </a>

    <?php
    // Consulta SQL para obter as provas
    $query = "SELECT * FROM provas";
    $result = mysqli_query($conexao, $query);

    $queryProvas = "SELECT questões FROM provas";
    $resultProvas = mysqli_query($conexao,$queryProvas);
    $ter=$resultProvas->fetch_assoc();

    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $nome = $row['nome'];
      $questoes = $row['questões'];

      // Consulta SQL para obter as questões selecionadas
      
      $queryQuestoes = "SELECT * FROM questoes WHERE id IN ($questoes)";
      $resultQuestoes = mysqli_query($conexao, $queryQuestoes);
      if($questoes!=0){
      echo "<div class='container01'>";
      echo '<h2>' . $nome . '</h2>';
        // Exibir as questões selecionadas
        while ($questao = mysqli_fetch_assoc($resultQuestoes)) {
          
       

          $idQuestao = $questao['id'];
          $conteudo = $questao['conteudo'];
          $itemA = $questao['itemA'];
          $itemB = $questao['itemB'];
          $itemC = $questao['itemC'];
          $itemD = $questao['itemD'];
          $itemE = $questao['itemE'];
          // $correta = $questao['correta'];
          $dificuldade = $questao['dificuldade'];
          $serie = $questao['serie'];
          $materia = $questao['materia'];
          
          
          
          echo '<div class="container_questao">';
    
          // Exibir os detalhes da questão
          echo '<h4>' . $conteudo . '</h4>';
          echo '<br>';
          echo '<div class="radios_form">';
          echo '<p>A) ' . $itemA . '</p>';
          echo '<br>';
          echo '<p>B) ' . $itemB . '</p>';
          echo '<br>';
          echo '<p>C) ' . $itemC . '</p>';
          echo '<br>';
          echo '<p>D) ' . $itemD . '</p>';
          echo '<br>';
          echo '<p>E) ' . $itemE . '</p>';
          // echo '<b>Item correto: </b>';
          // echo $correta;
          echo '</div>';
          echo '</div>';
          
        }
        echo '<div class="acoes" id="acoes01" style=" margin-left:90%; margin-bottom:-20px;">';
        echo "<a href='gerar-pdf.php?id=$row[id]' title='Gerar PDF'><img src='../imagens/pdf.svg' alt='Gerar PDF'> </a>";
        echo "<a href='delete-prova.php?id=$row[id]' title='Excluir Prova'><img src='../imagens/lixeira.svg' alt='Lixeira'> </a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br>';

       
      }else{
        echo " ";
      }
    }
      
      ?>

  </main>
  <!-- Área de scripts -->
  <script src="../JS/javascript.js"></script>
</body>

</html>
