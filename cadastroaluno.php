<?php
include_once('PHP/Config.php');

if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confirmsenha = $_POST['confirmsenha'];
    $serie = $_POST['serie'];

    mysqli_query($conexao, "INSERT INTO aluno(nome, sobrenome, email, cpf, senha, confirmsenha, serie) VALUES ('$nome','$sobrenome','$email','$cpf','$senha','$confirmsenha','$serie')");

    echo
    "<script> 
        alert('Cadastro realizado com sucesso!') 
        window.location.href = 'index.html';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
$entidade = "Aluno";
include("components/cadastro/head.php");
?>

<body>
    <?php
    $currentPage = "cadastroaluno.php";
    $ownPart = "
    <div class='grade-inputs'>
        <div class='gender-title'>
            <h6>Turma</h6>
        </div>
        <div class='gender-group'>
            <div class='gender-input'>
                <input id='female' type='radio' name='serie' value='1º ano'>
                <label for='female'>1°ano</label>
            </div>

            <div class='gender-input'>
                <input id='male' type='radio' name='serie' value='2º ano'>
                <label for='male'>2°ano</label>
            </div>

            <div class='gender-input'>
                <input id='others' type='radio' name='serie' value='3º ano'>
                <label for='others'>3°ano</label>
            </div>
        </div>
    </div>";
    include("components/cadastro/containerForm.php");
    ?>
</body>

</html>