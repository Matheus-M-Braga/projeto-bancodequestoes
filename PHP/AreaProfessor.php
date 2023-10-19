<?php
session_start();
include_once("Config.php");
/*  print_r($_SESSION); */
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']); //destruir dados
    unset($_SESSION['senha']); //destruir dados
    header('Location: Login.php');
}
$logado = $_SESSION['email'];

$sql = "SELECT * FROM professor ORDER BY id DESC";

$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>SISTEMA</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        color: white;
        text-align: center;
    }

    .table-bg{
        background: rgba(0, 0, 0, 0.3);
        border-radius: 15px 15px 0 0;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DO PEPAS</a>
            <span class=" navbar-brand mb-0 h1"></span>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
    echo "<h1>Bem Vindo <u>$logado</u></h1>";
    ?>

    </div>
</body>

</html>