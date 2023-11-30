<?php
session_start();
include_once('../../PHP/Config.php');
include_once('../components/test_session.php');
?>
<!DOCTYPE html5>
<html lang="pt-br">
<?php
include_once('../components/head.php');
?>

<body>
    <?php
    $current_page = "inicio.php";
    include_once('../components/header.php');
    ?>
    <main>
        <!-- Relatório de provas -->
        <div class="grid-dash">
            <div class="blocos">
                <h1>Prova de Biologia</h1>
                <br><br>
                <div class="container">
                    Resultado: *nota*
                    <div class="progress progress-striped">
                        <div class="progress-bar">
                        </div>
                    </div>
                </div>
                <br>
                <div class="ver-btn">Ver Prova</div>
            </div>
            <div class="blocos">
                <h1>Prova de Lógica de Programção</h1>
                <br><br>
                <div class="container">
                    Resultado: *nota*
                    <div class="progress progress-striped">
                        <div class="progress-bar">
                        </div>
                    </div>
                </div>
                <br>
                <div class="ver-btn">Ver Prova</div>
            </div>
            <div class="blocos">
                <h1>Prova de História</h1>
                <br><br>
                <div class="container">
                    Resultado: *nota*
                    <div class="progress progress-striped">
                        <div class="progress-bar">
                        </div>
                    </div>
                </div>
                <br>
                <div class="ver-btn">Ver Prova</div>
            </div>
            <div class="blocos">
                <h1>Prova de Informática Básica</h1>
                <br><br>
                <div class="container">
                    Resultado: *nota*
                    <div class="progress progress-striped">
                        <div class="progress-bar">
                        </div>
                    </div>
                </div>
                <br>
                <div class="ver-btn">Ver Prova</div>
            </div>
        </div>
        <br>
        <hr>
        <h1>Médias Gerais</h1>
        <h2>Biologia</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
        <h2>Lógica de Programção</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
        <h2>História</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
        <h2>Informática Básica</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque inventore labore perferendis suscipit molestiae minima beatae. Eveniet unde corrupti pariatur deleniti, sequi ducimus est ad? Corrupti dicta nisi numquam eligendi?</p>
    </main>
</body>

</html>