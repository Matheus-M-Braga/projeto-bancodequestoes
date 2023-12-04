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
            </div>
            <div class="container_exams"></div>
        </div>
    </main>
    <?php
    include("../components/scripts.php");
    ?>
    <script>
        $(document).ready(function() {
            updateExams();

            $(".exams_searchbar").on("input", function() {
                updateExams($(this).val())
            });

            function updateExams(searchValue) {
                console.log(searchValue)
                $.ajax({
                    url: "../../php/searchExams.php",
                    method: "POST",
                    data: {
                        searchExam: searchValue
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
        });
    </script>
</body>

</html>