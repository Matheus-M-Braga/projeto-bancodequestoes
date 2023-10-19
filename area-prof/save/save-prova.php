<?php
include_once('../PHP/Config.php');

if (isset($_POST['selecionar'])) {
    $id = $_POST['id'];
    $id_prova = $_POST['id_prova'];

    // Consulta SQL para obter as questões já existentes na prova
    $query = "SELECT questões FROM provas WHERE id = $id_prova ";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_fetch_assoc($result);
    $questoesExistentes = $row['questões'];

    // Verifica se já existem questões na prova
    if (!empty($questoesExistentes)) {
        $questoesAtualizadas = $questoesExistentes . ',' . $id;
    }if(empty($questoesExistentes)){
        $questoesAtualizadas = $id;
    }
echo $questoesAtualizadas;
    // Atualiza o campo 'questões' na tabela 'provas'
    $sqlUpdate = "UPDATE provas SET questões = '$questoesAtualizadas' WHERE id = '$id_prova'";
    $result = mysqli_query($conexao, $sqlUpdate);
}
echo "<script>alert('Questão adicionada a prova com sucesso com sucesso!');window.location.href = './questao.php';</script>";