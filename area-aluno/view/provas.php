<?php
session_start();
include_once('../../PHP/Config.php');
include_once('../components/test_session.php');
$resultPova = mysqli_query($conexao, "SELECT * FROM provas");

?>
<!DOCTYPE html5>
<html lang="pt-br">
<?php
include_once('../components/head.php');
?>

<body>
    <?php
    $current_page = "provas.php";
    include_once('../components/header.php');
    ?>
    <main>
        <div>
            <div class="header_exams">
                <input type="text" placeholder="Pesquisar..." name="searchExam" id="exams_searchbar" class="exams_searchbar">
                <div class="filters">
                    <div id="series">
                        <h2>Série</h2>
                        <form action="">
                            <input type="checkbox" name="1ano" id="prova" class="checkbox">
                            <label for="ibiologia">1º ano</label><br>
                            <input type="checkbox" name="2ano" id="batman" class="checkbox">
                            <label for="iinformatica">2º ano</label><br>
                            <input type="checkbox" name="3ano" id="3º ano" class="checkbox">
                            <label for="ilogica">3º ano</label><br>
                        </form>
                    </div>
                    <div id="dificuldades">
                        <h2>Dificuldade</h2>
                        <form action="">
                            <input type="checkbox" name="Fácil" id="Fácil" class="checkbox">
                            <label for="Fácil">Fácil</label><br>
                            <input type="checkbox" name="Médio" id="Médio" class="checkbox">
                            <label for="Médio">Médio</label><br>
                            <input type="checkbox" name="Difícil" id="Difícil" class="checkbox">
                            <label for="Difícil">Difícil</label><br>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="container_exams"></div>
        </div>
    </main>
    <?php
    include("../components/scripts.php");
    ?>
    <script>
        $(document).ready(function() {
            function updateExams(checkboxValues, searchBarValue) {
                var values = [];

                if (checkboxValues.length > 0) {
                    values = checkboxValues;
                }

                if (searchBarValue) {
                    values.push(searchBarValue);
                }

                if (values.length > 1) {
                    for (var counter = 1; counter < values.length; counter++) {
                        $.ajax({
                            url: "../../php/searchExams.php",
                            method: "POST",
                            data: {
                                searchExam: values[counter]
                            },
                            success: function(data) {
                                var container = $(".container_exams");
                                if (data.trim() === "") {
                                    container.html("<div class='container_exam'><h3 style='text-align: center;'>Sem resultados</h3></div>");
                                } else {
                                    container.append(data);
                                }
                            }
                        });
                    }
                } else {
                    $.ajax({
                        url: "../../php/searchExams.php",
                        method: "POST",
                        data: {
                            searchExam: values[0]
                        },
                        success: function(data) {
                            var container = $(".container_exams");
                            if (data.trim() === "") {
                                container.html("<div class='container_exam'><h3 style='text-align: center;'>Sem resultados</h3></div>");
                            } else {
                                container.html(data);
                            }
                        }
                    });
                }
            }

            updateExams([], "");

            $(".exams_searchbar").on("input", function() {
                var value = $(this).val();
                updateExams([], value);
            });

            $(".checkbox").on("change", function() {
                var checked = [];
                $(".checkbox:checked").each(function() {
                    checked.push($(this).attr("id"));
                });

                var searchBarValue = $(".exams_searchbar").val();
                updateExams(checked, searchBarValue);
            });
        });
    </script>
</body>

</html>