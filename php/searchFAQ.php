<?php
include_once("Config.php");

$selectFAQ = "SELECT * FROM duvidas";

if (isset($_POST["searchTopic"])) {
     $parameter = $_POST["searchTopic"];
     if (!empty($parameter)) {
          $selectFAQ .= " WHERE titulo LIKE '%$parameter%' OR conteudo LIKE '%$parameter%'";
     }
}

$result = $conexao->query($selectFAQ);

while ($data = mysqli_fetch_assoc($result)) {
     echo "<div data-id={$data['id']}>
          <h3>{$data['titulo']}</h3>
          <span>{$data['conteudo']}</span>
        </div>";
}
