<?php

//Autoload
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote'=>true]);

$dados ="<!DOCTYPE html>";
$dados.="<html lang='pt-br' style='background-image: none;'>";
$dados.="<head>";
$dados.="<meta charset='UTF-8'>";
$dados.="<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
$dados.="<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$dados.="<link rel='stylesheet' href='http://localhost/projeto-bancodequestoes/estilos/style.css' media='all'>";
$dados.="<link rel='stylesheet' href=http://localhost/projeto-bancodequestoes/estilos/mediaquery.css'>";
$dados.="<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";
$dados.="<style>";
$dados.="<title>Estuda.ja</title>";
$dados.="</head>";
$dados.="<body style='background-image: none; background-color:white; '>";
    $dados.="<header style='background-color:rgb(255, 112, 35);'>";
    $dados.="<h1 style='font-size:40px; color:white; margin-top:16px;' >Estuda<span style='color: rgb(0, 106, 186); font-size:40px'>.ja</span></h1>";
    $dados.="</header>";
    $dados.="<hr style='border:none; background-color:rgb(207, 87, 23); height:20px;'>";
    $dados.="<main style='background-color:white;'>";
 
    if(!empty($_GET['id'])){

      include_once('../PHP/Config.php');
    
      $id = $_GET['id'];
    
      $sqlSelect = "SELECT * FROM provas WHERE id=$id";
      $result=$conexao->query($sqlSelect);
    
    
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $nome = $row['nome'];
            $questoes = $row['questões'];
    
            $queryQuestoes = "SELECT * FROM questoes WHERE id IN ($questoes)";
            $resultQuestoes = mysqli_query($conexao, $queryQuestoes);
    
            $dados.= "  <h1 style='text-align: center; margin-left: -6%;'>$nome</h1>";
            
            $dados.="Nome:<br>";
            $dados.="Turma:<br>";
            $dados.="Número:<br>";
            $dados.="<hr>";
            
            while ($questao = mysqli_fetch_assoc($resultQuestoes)) {
              
           
    
              $idQuestao = $questao['id'];
              $conteudo = $questao['conteudo'];
              $itemA = $questao['itemA'];
              $itemB = $questao['itemB'];
              $itemC = $questao['itemC'];
              $itemD = $questao['itemD'];
              $itemE = $questao['itemE'];
              // $correta = $questao['correta'];
              $dificuldade = $questao['dificuldade'];
              $serie = $questao['serie'];
              $materia = $questao['materia'];
              
              
              
              $dados.='<div class="container_questao" style="background-color:white;">';
        
              //ibir os detalhes da questão
              $dados.='<h3>' . $conteudo . '</h3>';
              $dados.= '<div class="radios_form"  style="background-color:white;">';
              $dados.= '<p>A) ' . $itemA . '</p>';
              $dados.= '<p>B) ' . $itemB . '</p>';
              $dados.='<p>C) ' . $itemC . '</p>';
              $dados.='<p>D)  ' . $itemD . '</p>';
              $dados.='<p>E) ' . $itemE . '</p>';
              // echo '<b>Item correto: </b>';
              // echo $correta;
              $dados.= '</div>';
              $dados.= '<br>';
              $dados.= '</div>';
              
            }
          }     
      }
    $dados.="</main>";

    $dados.=" <footer>";
    $dados.="<p id='frasef'>© 2023 Copyright - TechnoLords</p>";
    $dados.="</footer>";
    $dados.="</body>";
    $dados.="</html>"; 

$dompdf -> loadHtml($dados);

$dompdf->setPaper('A4','portrait');

$dompdf->render();
header('Content-type: application/pdf');
 echo $dompdf->output();


 



 






?>


<!-- 
-->