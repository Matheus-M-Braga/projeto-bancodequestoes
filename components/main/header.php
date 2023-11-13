<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<header>
  <div class="header_top">
    <a href="index.php" id="logo-oficial">
      <img src="img/logo/logo-oficial-g.png" alt="" />
    </a>
    <div id="login_btn">
      <img id="login" src="img/icons/user.png" alt="login" title="Login/Cadastro" />
    </div>
  </div>
  <nav>
    <a href="index.php" <?php echo ($current_page == 'index.php') ? 'class="selected"' : ''; ?>>Início</a>
    <a href="institucional.php" <?php echo ($current_page == 'institucional.php') ? 'class="selected"' : ''; ?>>Institucional</a>
    <a href="duvidas.php" <?php echo ($current_page == 'duvidas.php') ? 'class="selected"' : ''; ?>>Dúvidas</a>
    <a href="javascript:void(0);" id="tests_link">Provas</a>
  </nav>
</header>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var testsLink = document.getElementById("tests_link");
    if (testsLink && window.location.pathname.indexOf("provas.php") !== -1) {
      testsLink.classList.add("selected");
    }
  });
</script>