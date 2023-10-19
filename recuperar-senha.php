<?php
    include_once('PHP/Config.php');

   // Validar inserção dos dados cadastrais
   if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $cpf = $_POST['cpf'];
      $senhaNova = $_POST['senha'];
      $confirmsenhaNova = $_POST['confirmsenha'];

      $sqlVerifyProf = "SELECT * FROM professor WHERE email = '$email' AND cpf = '$cpf'";
      $sqlVerifyAluno = "SELECT * FROM aluno WHERE email = '$email' AND cpf = '$cpf'";
      $resultVerifyProf = $conexao -> query($sqlVerifyProf);
      $resultVerifyAluno = $conexao -> query($sqlVerifyAluno);

      // Teste de tabela
      if($resultVerifyAluno -> num_rows == 1){
         mysqli_query($conexao, "UPDATE aluno SET senha = '$senhaNova', confirmsenha = '$confirmsenhaNova' WHERE email = '$email' AND cpf = '$cpf'");
         echo "<script>
            alert('Excelente! Senha alterada com sucesso!');
            window.location.href = './index.html';
            </script>";
         
      }
      else if($resultVerifyProf -> num_rows == 1){
         mysqli_query($conexao, "UPDATE professor SET senha = '$senhaNova', confirmsenha = '$confirmsenhaNova' WHERE email = '$email' AND cpf = '$cpf'");
         echo "<script>
        alert('Excelente! Senha alterada com sucesso!');
        window.location.href = './index.html';
        </script>";
      }
      else{
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
    <style>
        :root{
            --azul_escuro: rgb(19, 51, 76); 
            --azul_claro: rgb(0, 106, 186);
            --branco: rgb(246, 246, 233);
            --laranja: rgb(207, 87, 23);
            --laranja-claro: rgb(255, 112, 35);
        }
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background-image: url(imagens/fundoquedabom.jpg);
            color: black;
        }
        input:focus{
            box-shadow: 0 0 0 0;
            outline: 0;
        }
        main{
            background-color: white;
            width: 30vw;
            min-height: 40vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            color: black;
            padding: 15px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.50);
        }
        h1{
            margin-top: 10px;
            margin-bottom: 25px;
        }
        hr{
            border: none;
            margin-top: -25px;
            margin-bottom: 20px;
            height: 5px;
            background-color: var(--laranja);
        }
        input{
            margin: 0.6rem 0;
            padding: 0.8rem;
            border: 1px solid gray;
            border-radius: 10px;
            box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.11);
            font-size: 0.8rem;
            width: 200px;
            margin-right: auto;
            margin-left: auto;
        }
        input:hover {
            background-color: rgba(238, 238, 238, 0.800);
            transition: 0.5s;
        }
        input:focus-visible {
            outline: 1px solid rgb(207, 87, 23);
        }
        section{
            margin-top: 20px;
            display: grid;
        }
        input[type="submit"]{
            border: 2px solid var(--azul_claro);
            background-color: white;
            color: black;
        }
        input[type="submit"]:hover{
            background-color: var(--azul_claro);
            cursor: pointer;
            color: white;
            transition: 0.5s;
        }
        label{
            font-size: 0.8rem;
            width: 221px;
            margin: 0 auto;
        }
        .login-button{
            position: absolute;
            top: 5px;
            right: 6px;
        }
        .login-button button:hover {
            background-color: #cf5717;
        }
        .login-button button {
            border: none;
            background-color: #cf5717;
            padding: 0.4rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-button button a{
            text-decoration: none;
            color: white;
        }

        /* Mediaquery */
        /* Celular */
        @media screen and (max-width: 600px){
            main{
                width: 60vw;
            }
            .login-button{
                top: 2px;
            }
        }
        @media screen and (min-width: 601px) and (max-width: 750px){
            main{
                width: 45vw;
            }
            .login-button{
                top: 2px;
            }
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Recuperar Senha</title>
</head>
<body>
    <main>
        <h1>Recuperação de senha</h1><div class="login-button"><button type="button"><a href="index.html">Voltar</a></button></div>
        <hr>
        <p>Informe o CPF e Email cadastrados juntamente da nova senha para poder realizar a alteração.</p>
         <form action="recuperar-senha.php" method="POST" validate>
               <section>
                  <label for="email">E-mail:</label>
                  <input type="email" placeholder="Email" required name="email" id="email">
                  <label for="cpf">CPF:</label>
                  <input type="text" placeholder="CPF" required name="cpf" id="cpf">
                  <label for="senha">Nova Senha:</label>
                  <input type="password" name="senha" id="senha" required>
                  <label for="conf_senha">Confirmar Senha:</label>
                  <input type="password" name="confirmsenha" id="conf_senha" required>
                  <input type="submit" value="Confirmar" name="submit">
               </section>
         </form>
    </main>
</body>
</html>