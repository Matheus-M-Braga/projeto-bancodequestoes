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
            <div class="bloco_group">
                <div class="blocos">
                    <h1>Prova de Biologia</h1>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                            <div class="progress-bar">
                            </div>
                        </div>
                    </div>
                    <div class="ver-btn">Ver Prova</div>
                </div>
                <div class="blocos">
                    <h1>Prova de Lógica de Programção</h1>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                            <div class="progress-bar">
                            </div>
                        </div>
                    </div>
                    <div class="ver-btn">Ver Prova</div>
                </div>
            </div>
            <div class="bloco_group second">
                <div class="blocos">
                    <h1>Prova de História</h1>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                            <div class="progress-bar">
                            </div>
                        </div>
                    </div>
                    <div class="ver-btn">Ver Prova</div>
                </div>
                <div class="blocos">
                    <h1>Prova de Informática Básica</h1>
                    <div class="container">
                        Resultado: *nota*
                        <div class="progress progress-striped">
                            <div class="progress-bar">
                            </div>
                        </div>
                    </div>
                    <div class="ver-btn">Ver Prova</div>
                </div>
            </div>
        </div>
        <h1>Desempenho</h1>
        <table>
            <thead>
                <tr>
                    <th>Matéria</th>
                    <th>Média geral</th>
                    <th>Melhor nota</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="long_text">Biologia</td>
                    <td>8</td>
                    <td>10</td>
                    <td>Bom</td>
                </tr>
                <tr>
                    <td class="long_text">Lógica de Programação</td>
                    <td>3</td>
                    <td>5</td>
                    <td>Regular</td>

                </tr>
                <tr>
                    <td class="long_text">História</td>
                    <td>7</td>
                    <td>2</td>
                    <td>Deplorável</td>
                </tr>
                <tr>
                    <td class="long_text">Informática Básica</td>
                    <td>6</td>
                    <td>2</td>
                    <td>Regular</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>