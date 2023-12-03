<?php
include_once("Config.php");

$selectExam = "SELECT * FROM provas";

if (isset($_POST["searchExam"])) {
     $parameter = $_POST["searchExam"];
     if (!empty($parameter)) {
          $selectExam .= " WHERE nome LIKE '%$parameter%' OR questões LIKE '%$parameter%'";
     }
}

$result = $conexao->query($selectExam);

while ($prova_data = mysqli_fetch_assoc($result)) {
     $id = $prova_data['id'];
     echo "<div class='container_exam'>
         <h1>" . $prova_data['nome'] . "</h1>
         <p>vai encarar ???!!?!?</p><br>
         <a href='../fazeraprova.php?id=$id'><div class='ver-btn'>Resolver agora</div>
         </div></a>";
}
