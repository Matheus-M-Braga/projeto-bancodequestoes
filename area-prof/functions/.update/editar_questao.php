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

 if(!empty($_GET['id'])){

    include_once('../PHP/Config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM questoes WHERE id=$id";

    $result=$conexao->query($sqlSelect);

    if($result->num_rows > 0){

        while($questoes_data = mysqli_fetch_assoc($result)){
            $conteudo = $questoes_data['conteudo'];
            $dificuldade = $questoes_data['dificuldade'];
            $serie = $questoes_data['serie'];
            $materia = $questoes_data['materia'];
            $correto = $questoes_data['correto'];
            $itemA = $questoes_data['itemA'];
            $itemB = $questoes_data['itemB'];
            $itemC = $questoes_data['itemC'];
            $itemD = $questoes_data['itemD'];
            $itemE = $questoes_data['itemE'];
        }

    }else{
        header('Location:questao.php');
    }

 }else{
    header('Location:questao.php');
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
        <a href="questao.php" style="text-decoration: underline;">Questões</a>
        <a href="turmas.php">Turmas</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
    <main>

        <h1>Editar Questão</h1>

        <br><br>

        <!-- Área de Criação de Prova -->
        <form action="save-questao.php" method="POST" onsubmit="return validateForm()">

            <div class="select_pai">
                <b>Dificuldade:</b>
                <select name="dificuldade" value="Dificuldade:">
                    <option value="Dificuldade:"><?php echo "Dificuldade atual: $dificuldade";?> </option>
                    <option value="fácil">Fácil</option>
                    <option value="médio">Médio</option>
                    <option value="difícil">Difícil</option>
                </select>

                &nbsp;&nbsp;

                <b>Série:</b>
                <select name="serie">
                    <option ><?php echo "Série  atual: $serie";?></option>
                    <option value="1º ano">1º ano</option>
                    <option value="2º ano">2º ano</option>
                    <option value="3º ano">3º ano</option>
                </select>

                &nbsp;&nbsp;
                <b>Materia:</b>
                <select name="materia">
                <option disabled selected value=0>Materia atual : <?php echo "$materia" ?></option>
                    <?php 
                    $result_Materia = "SELECT * FROM professor";
                    $resultado_Materia = mysqli_query($conexao,$result_Materia ) ;
                    while($row_materia = mysqli_fetch_assoc($resultado_Materia)){ ?>
                      <option value="<?php echo $row_materia['materia'];?>">
                      <?php echo $row_materia['materia'];?>
                      </option><?php
                    }
                    ?>
                    
                </select>

                &nbsp;&nbsp;

            </div>

            <br><br>

            <div id="enunciado">
                <h2>Conteúdo:</h2>
            </div>
            <textarea name="conteudo" id="" cols="253" rows="20" class="areatexto" placeholder="Coloque aqui todo o seu conteúdo da prova aqui......" > <?php echo $conteudo; ?></textarea>

            <br><br>

            <b>Selecione o item correto:</b>
            <div class="itens">
                <input type="radio" name="correto" value="A"   id="A" <?php if ($correto == "A") echo "checked"; ?>>
                <label for="A">A</label>
                <input type="text" name="itemA" placeholder="Digite o texto do Gabarito"   value="<?php  echo $itemA; ?>">
                <br><br>
                <input type="radio" name="correto" value="B"  id="B" <?php if ($correto == "B") echo "checked"; ?>>
                <label for="B">B</label>
                <input type="text" name="itemB" placeholder="Digite o texto do Gabarito"   value="<?php  echo $itemB; ?>" >
                <br><br>
                <input type="radio" name="correto" value="C"  id="C" <?php if ($correto == "C") echo "checked"; ?>>
                <label for="C">C</label>
                <input type="text" name="itemC" placeholder="Digite o texto do Gabarito"  value="<?php  echo $itemC; ?>">
                <br><br>
                <input type="radio" name="correto" value="D"  id="D" <?php if ($correto == "D") echo "checked"; ?>>
                <label for="D">D</label>
                <input type="text" name="itemD"  placeholder="Digite o texto do Gabarito"   value="<?php  echo $itemD; ?>">
                <br><br>
                <input type="radio" name="correto" value="E" id="E" <?php if ($correto == "E") echo "checked"; ?>>
                <label for="E">E</label>
                <input type="text" name="itemE" placeholder="Digite o texto do Gabarito"   value="<?php  echo $itemE; ?>">
            </div>
            <br><br>
            <div id="btns">
                <input type="submit" value="Mudar" name="update" class="buttons-form">
                <input type="reset" value="Cancelar" class="buttons-form">

                <input type="hidden" name="id" value="<?php echo $id ?>">
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