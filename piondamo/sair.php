<?php
    session_start();
    unset($_SESSION['email']); //destruir dados
    unset($_SESSION['senha']); //destruir dados
    header('Location: ../index.html');
?>