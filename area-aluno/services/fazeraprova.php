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
    <style>
        .input-group{
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <main id="main-provas" style="height: 100vh;">
    <?php          
        if(!empty($_GET['id'])){

            include_once('../PHP/Config.php');
        
            $id = $_GET['id'];
        
            $sqlSelect = "SELECT * FROM provas WHERE id=$id";
        
            $result=$conexao->query($sqlSelect);
        
            if($result->num_rows > 0){
                $prova_data=mysqli_fetch_assoc($result);
                //var_dump($prova_data);
                $nome=$prova_data['nome'];
                $questoes=$prova_data['questões'];
                $materia=$prova_data['materia'];

                $queryQuestoes = "SELECT * FROM questoes WHERE id IN ($questoes)";
                $resultQuestoes = mysqli_query($conexao, $queryQuestoes);

                echo "<div class='container01' style='height: fit-content;'>";
                echo '<h2>' . $nome . '</h2>';

                // Exibir as questões selecionadas
                $cont = 0;
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

                    echo '<form> <div class="container_questao">';
            
                    // Exibir os detalhes da questão
                    echo '<h4>'. $cont + 1 .") ". $conteudo . '</h4>';
                    echo '<br>';
                    echo '<div class="radios_form">';
                    echo "<input type='radio' name='correto' value='A' id'D'>";
                    echo '<span> A) ' . $itemA . '</span>';
                    echo '<br>';
                    echo "<input type='radio' name='correto' value='B' id'D'>";
                    echo '<span> B) ' . $itemB . '</span>';
                    echo '<br>';
                    echo "<input type='radio' name='correto' value='C' id'D'>";
                    echo '<span> C) ' . $itemC . '</span>';
                    echo '<br>';
                    echo "<input type='radio' name='correto' value='D' id'D'>";
                    echo '<span> D) ' . $itemD . '</span>';
                    echo '<br>';
                    echo "<input type='radio' name='correto' value='E' id'D'>";
                    echo '<span> E) ' . $itemE . '</span>';
                    echo '</div></div></form>';
                    
                    

                    $cont++;
                    
                }
                echo '</div>';
            }
            echo "<div class='input-group'><input type='submit' name='submit' class='buttons-form' value='Finalizar'>&nbsp&nbsp&nbsp";
            echo "<input type='reset' name='reset' class='buttons-form' value='Desistir'></div>";
            
        }
                     
    ?>
    </main> 
    <!-- Área de scripts -->
    <script src="JS/Perfil.js"></script>
</body>
</html>