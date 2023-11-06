<?php
include_once('php/Config.php');
if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confirmsenha = $_POST['confirmsenha'];
    $materia = $_POST['materia'];

    if ($materia == 0) {
        echo
        "<script> 
            alert('Atenção! Selecione uma matéria para prosseguir.') 
            window.location.href = 'cadastroprofesso.php';
        </script>";
    } else {
        mysqli_query($conexao, "INSERT INTO professor(nome, sobrenome, email, cpf, senha, confirmsenha, materia) VALUES ('$nome','$sobrenome','$email','$cpf','$senha','$confirmsenha','$materia')");

        mysqli_query($conexao, "ALTER TABLE bancoquest_bd.professor AUTO_INCREMENT = 1;");

        echo
        "<script> 
            alert('Cadastro realizado com sucesso!') 
            window.location.href = 'index.html';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
$entidade = "Professor";
include("components/cadastro/head.php");
?>

<body>
    <?php
    $currentPage = "cadastroprofessor.php";
    $ownPart = "
    <div class='input-box' id='materia'>
        <label for='materia'>Matéria</label>
        <select name='materia' id='materia'>
            <option selected disabled value='0'>Selecionar</option>
            <option value='Português'>Português</option>
            <option value='Espanhol'>Espanhol</option>
            <option value='Inglês'>Inglês</option>
            <option value='História'>História</option>
            <option value='Geografia'>Geografia</option>
            <option value='Sociologia'>Sociologia</option>
            <option value='Filosofia'>Filosofia</option>
            <option value='Matemática'>Matemática</option>
            <option value='Biologia'>Biologia</option>
            <option value='Física'>Física</option>
            <option value='Química'>Química</option>
            <option value='Ed. Física'>Ed. Física</option>
        </select>
    </div>";
    include("components/cadastro/containerForm.php");
    ?>
</body>

</html>