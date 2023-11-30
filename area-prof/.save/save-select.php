<?php
include_once("../PHP/Config.php");

if (isset($_POST['Mudar'])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $materia = $_POST["materia"];
    // Verifica se os campos foram preenchidos
    if (!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($materia)) {
        $sqlInsert = "UPDATE professor SET nome='$nome', sobrenome='$sobrenome', Email='$email' , materia ='$materia' WHERE id_prof=$id";
        $result = $conexao->query($sqlInsert);

        if ($result) {
            // Dados atualizados com sucesso
            echo "<script type='text/javascript'>
            alert('Excelente! Dados editados com sucesso!');
            window.location.href = './editar-perfil.php';
            </script>";
            exit();
        } else {
            // Erro ao atualizar os dados
            echo "<script type='text/javascript'>
            alert('Erro ao atualizar os dados. Por favor, tente novamente.');
            window.location.href = './editar-perfil.php';
            </script>";
            exit();
        }
    } else {
        // Campos obrigatórios não preenchidos
        echo "<script type='text/javascript'>
        alert('Por favor, preencha todos os campos obrigatórios.');
        window.location.href = './editar-perfil.php';
        </script>";
        exit();
    }
}

if (isset($_POST['MudarSenha'])) {
    $id = $_POST["id"];
    $senha = $_POST["senha"];
    $confirmsenha = $_POST["confirmsenha"];

    // Verifica se as senhas foram preenchidas
    if (!empty($senha) && !empty($confirmsenha)) {
        // Verifica se as senhas são iguais
        if ($senha === $confirmsenha) {

            $sqlUpdate = "UPDATE professor SET senha='$senha',confirmsenha='$confirmsenha' WHERE id_prof=$id";
            $result = $conexao->query($sqlUpdate);

            if ($result) {
                // Senha alterada com sucesso
                echo "<script type='text/javascript'>
                alert('Excelente! Senha alterada com sucesso!');
                window.location.href = './editar-perfil.php';
                </script>";
                exit();
            } else {
                // Erro ao atualizar a senha
                echo "<script type='text/javascript'>
                alert('Erro ao alterar a senha. Por favor, tente novamente.');
                window.location.href = './editar-perfil.php';
                </script>";
                exit();
            }
        } else {
            // Senhas não coincidem
            echo "<script type='text/javascript'>
            alert('As senhas não coincidem. Por favor, tente novamente.');
            window.location.href = './editar-perfil.php';
            </script>";
            exit();
        }
    } else {
        // Campos obrigatórios não preenchidos
        echo "<script type='text/javascript'>
        alert('Por favor, preencha todos os campos obrigatórios.');
        window.location.href = './editar-perfil.php';
        </script>";
        exit();
    }
}
