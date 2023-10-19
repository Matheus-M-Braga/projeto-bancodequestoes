<?php
session_start();
include_once("../PHP/Config.php");
    
if (isset($_POST['Mudar'])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $serie = $_POST["serie"];
    
    // Verifica se os campos foram preenchidos
    if (!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($serie)) {
        $sqlUpdate = "UPDATE aluno SET nome='$nome', sobrenome='$sobrenome', email='$email' , serie ='$serie' WHERE id_aluno=$id";
        $result = $conexao->query($sqlUpdate);
        
        if ($result) {
            // Dados atualizados com sucesso
            echo "<script type='text/javascript'>
            alert('Excelente! Dados editados com sucesso!');
            window.location.href = 'editar-perfil.php';
            </script>";
        } else {
            // Erro ao atualizar os dados
            echo "<script type='text/javascript'>
            alert('Erro ao atualizar os dados. Por favor, tente novamente.');
            window.location.href = 'editar-perfil.php';
            </script>";
        }
    } else {
        // Campos obrigatórios não preenchidos
        echo "<script type='text/javascript'>
        alert('Por favor, preencha todos os campos obrigatórios.');
        window.location.href = 'editar-perfil.php';
        </script>";
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
            
            $sqlUpdate = "UPDATE aluno SET senha='$senha',confirmsenha='$confirmsenha' WHERE id_aluno=$id";
            $result = $conexao->query($sqlUpdate);
            
            if ($result == true) {
                // Senha alterada com sucesso
                echo "<script type='text/javascript'>
                alert('Excelente! Senha alterada com sucesso!');
                window.location.href = 'editar-perfil.php';
                </script>";

            } else {
                // Erro ao atualizar a senha
                echo "<script type='text/javascript'>
                alert('Erro ao alterar a senha. Por favor, tente novamente.');
                window.location.href = 'editar-perfil.php';
                </script>";

            }
        } else {
            // Senhas não coincidem
            echo "<script type='text/javascript'>
            alert('As senhas não coincidem. Por favor, tente novamente.');
            window.location.href = 'editar-perfil.php';
            </script>";
        }
    } else {
        // Campos obrigatórios não preenchidos
        echo "<script type='text/javascript'>
        alert('Por favor, preencha todos os campos obrigatórios.');
        window.location.href = 'editar-perfil.php';
        </script>";
    }
}
?>
