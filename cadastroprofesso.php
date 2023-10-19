<?php
include_once('PHP/Config.php');
if (isset($_POST['submit'])) {
    

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confirmsenha = $_POST['confirmsenha'];
    $materia = $_POST['materia'];

        if($materia == 0){
            echo"<script> alert('Atenção! Selecione uma matéria para prosseguir.') 
                window.location.href = 'cadastroprofesso.php';
                </script>";
        }
        else{
            mysqli_query($conexao, "INSERT INTO professor(nome, sobrenome, email, cpf, senha, confirmsenha, materia) VALUES ('$nome','$sobrenome','$email','$cpf','$senha','$confirmsenha','$materia')");

            mysqli_query($conexao, "ALTER TABLE bancoquest_bd.professor AUTO_INCREMENT = 1;");

            echo"<script> alert('Cadastro realizado com sucesso!') 
                window.location.href = 'index.html';
                </script>";
        }
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
    <title>Cadastro do Professor</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="imagens/imgparacadastro.png" alt="negro apontando para logo">
        </div>
        <div class="form">
            <form action="cadastroprofesso.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <a href="cadastro00.html"><div class="login-button"><button type="button">Voltar</button></div></a>
                </div>

                <div class="input-group" id="inputs-prof">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="number">CPF</label>
                        <input id="number" type="tel" name="cpf" placeholder="000000000-00" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>


                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmsenha" placeholder="Digite sua senha novamente" required>
                    </div>

                    <div class="input-box" id="materia">
                        <label for="materia">Matéria</label>
                        <select name="materia" id="materia">
                            <option selected disabled value="0">Selecionar</option>
                            <option value="Português">Português</option>
                            <option value="Espanhol">Espanhol</option>
                            <option value="Inglês">Inglês</option>
                            <option value="História">História</option>
                            <option value="Geografia">Geografia</option>
                            <option value="Sociologia">Sociologia</option>
                            <option value="Filosofia">Filosofia</option>
                            <option value="Matemática">Matemática</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Física">Física</option>
                            <option value="Química">Química</option>
                            <option value="Ed. Física">Ed. Física</option>
                        </select>
                    </div>
                </div>
                <div class="continue-button">
                    <input name="submit" type="submit" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>