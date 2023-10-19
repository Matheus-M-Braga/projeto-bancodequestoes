<?php 

include_once('../PHP/Config.php');

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $conteudo=$_POST['conteudo'];
    $dificuldade=$_POST['dificuldade'];
    $serie=$_POST['serie'];
    $materia=$_POST['materia'];
    $correto=$_POST['correto'];
    $itemA=$_POST['itemA'];
    $itemB=$_POST['itemB'];
    $itemC=$_POST['itemC'];
    $itemD=$_POST['itemD'];
    $itemE=$_POST['itemE'];

    $sqlUpdate = "UPDATE questoes SET conteudo='$conteudo', dificuldade='$dificuldade',serie='$serie',materia='$materia',correto='$correto',itemA='$itemA',itemB='$itemB',itemC='$itemC',itemD='$itemD',itemE='$itemE' WHERE id='$id'";

    $result=$conexao->query($sqlUpdate);
}

header('Location: questao.php');
?>