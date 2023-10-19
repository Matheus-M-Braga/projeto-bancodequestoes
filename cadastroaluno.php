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
    
    echo"<script> alert('Cadastro realizado com sucesso!') 
        window.location.href = 'index.html';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/cadastro.css?<?php echo rand(1, 1000); ?>" media="all">
    <link rel="stylesheet" href="CSS/mediaquery-cadast.css?<?php echo rand(1, 1000); ?>">
    <link rel="shortcut icon" href="imagens/icones/favicon.ico" type="image/x-icon">
    <title>Cadastro do Aluno</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="imagens/imgparacadastro.png" alt="negro apontando para logo">
        </div>
        <div class="form">
            <form action="cadastroaluno.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <a href="cadastro00.html"><div class="login-button"><button type="button">Voltar</button></div></a>
                </div>

                <div class="input-group">
                        <div class="input-box">
                            <label for="nome">Primeiro Nome</label>
                            <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                        </div>
                        <div class="input-box">
                            <label for="sobrenome">Sobrenome</label>
                            <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                        </div>
                        <div class="input-box">
                            <label for="email">E-mail</label>
                            <input id="email" type="text" name="email" placeholder="Digite seu e-mail" required>
                        </div>
                    
                        <div class="input-box">
                            <label for="cpf">CPF</label>
                            <input id="cpf" type="text" name="cpf" placeholder="000000000-00" required>
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha</label>
                            <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                        </div>
                        <div class="input-box">
                            <label for="confirmsenha">Confirme sua Senha</label>
                            <input id="confirmsenha" type="password" name="confirmsenha" placeholder="Digite sua senha novamente" required>
                        </div>

                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Turma</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="serie" value="1º ano">
                            <label for="female">1°ano</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="serie" value="2º ano">
                            <label for="male">2°ano</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="serie" value="3º ano">
                            <label for="others">3°ano</label>
                        </div>

                       
                    </div>
                </div>
                <br>
                <div class="continue-button">
                    <input name="submit" type="submit" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>