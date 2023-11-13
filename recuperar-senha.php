<?php
include_once('php/Config.php');

// Validar inserção dos dados cadastrais
if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $cpf = $_POST['cpf'];
   $senhaNova = $_POST['senha'];
   $confirmsenhaNova = $_POST['confirmsenha'];

   $sqlVerifyProf = "SELECT * FROM professor WHERE email = '$email' AND cpf = '$cpf'";
   $sqlVerifyAluno = "SELECT * FROM aluno WHERE email = '$email' AND cpf = '$cpf'";
   $resultVerifyProf = $conexao->query($sqlVerifyProf);
   $resultVerifyAluno = $conexao->query($sqlVerifyAluno);

   // Teste de tabela
   if ($resultVerifyAluno->num_rows == 1) {
      mysqli_query($conexao, "UPDATE aluno SET senha = '$senhaNova', confirmsenha = '$confirmsenhaNova' WHERE email = '$email' AND cpf = '$cpf'");
      echo "<script>
            alert('Excelente! Senha alterada com sucesso!');
            window.location.href = './index.html';
            </script>";
   } else if ($resultVerifyProf->num_rows == 1) {
      mysqli_query($conexao, "UPDATE professor SET senha = '$senhaNova', confirmsenha = '$confirmsenhaNova' WHERE email = '$email' AND cpf = '$cpf'");
      echo "<script>
        alert('Excelente! Senha alterada com sucesso!');
        window.location.href = './index.html';
        </script>";
   } else {
      echo "<script>
        alert('Registro não encontrado, digita direito man.');
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
   <link rel="stylesheet" href="css/cadastro/recuperar-senha.css">
   <link rel="shortcut icon" href="img/icons/favicon.ico" type="image/x-icon">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <title>Recuperar Senha</title>
</head>

<body>
   <main>
      <h1>Recuperação de senha</h1>
      <a href="index.php">
         <div class="login-button"><button type="button">Voltar</button></div>
      </a>
      <hr>
      <p>Informe o CPF e Email cadastrados juntamente da nova senha para poder realizar a alteração.</p>
      <form action="recuperar-senha.php" method="POST" validate>
         <section>
            <div>
               <label for="email">E-mail:</label>
               <input type="email" placeholder="Email" required name="email" id="email">
               <label for="senha">Nova Senha:</label>
               <input type="password" name="senha" id="senha" required>
            </div>
            <div>
               <label for="cpf">CPF:</label>
               <input type="text" placeholder="CPF" required name="cpf" id="cpf">
               <label for="conf_senha">Confirmar Senha:</label>
               <input type="password" name="confirmsenha" id="conf_senha" required>
            </div>
         </section>
         <div><input type="submit" value="Confirmar" name="submit"></div>
      </form>
   </main>
</body>

</html>