<!DOCTYPE html5>
<html lang="pt-br">
<?php
include("components/main/head.php");
?>

<body>
  <?php
  include("components/main/header.php");
  include("components/main/modalLogin.php");
  include("components/main/cadast_choice.php");
  ?>
  <main>
    <div class="container-slider">
      <button id="prev-button">
        <img src="img/img_slide/pngwing.com.png" alt="prev-button" />
      </button>
      <div class="container-images">
        <img src="img/img_slide/slide1.png" alt="slide1" class="slider on" />
        <img src="img/img_slide/slide2.png" alt="slide2" class="slider" id="img2" />
        <img src="img/img_slide/slide3.png" alt="slide3" class="slider" id="img3" />
      </div>
      <button id="next-button">
        <img src="img/img_slide/pngwing.com.png" alt="next-button" />
      </button>
    </div>
    <h1>Olá, caro usuário</h1>
    <p>
      Inicialmente, seja muito bem-vindo ao nosso ambiente de estudos. Aqui,
      você poderá adquirir, desenvolver, ampliar e avaliar os seus
      conhecimentos como desejar. Faça seu
      <a href="javascript:void(0)" disabled id="login_link">Login</a> ou se é novo por
      aqui, <a href="cadastro00.php">Cadastre-se</a>.
    </p>
    <p>
      O site oferecerá um conjunto de ferramentas necessárias no qual você,
      que esteja cadastrado como aluno, poderá fazer da sua experiência a mais
      proveitosa possivel, acompanhando seu progresso de aprendizado e
      melhorando conhecimentos.
    </p>
    <p>
      Para você que será um usuário professor, reservamos ferramentas que lhe
      auxilie a gerenciar e trabalhar de uma maneira agradável.
    </p>
    <p>
      Nós, da equipe <strong>Estuda.Já</strong>, agradecemos a sua preferência
      pelo que podemos oferecer em nosso site.
    </p>
  </main>
  <?php
  include("components/main/footer.php");
  include("components/main/scripts.php");
  ?>
</body>

</html>