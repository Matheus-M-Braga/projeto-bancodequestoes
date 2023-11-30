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
  $current_page = "editar-perfil.php";
  include_once('../components/header.php');
  ?>
  <main>
    <div class="container_title">
      <label class="mini_title">Editar Cadastro</label>
      <hr>
    </div>
    <div class="container_title">
      <label class="title">Dados Cadastrais</label>
      <hr>
    </div>
    <form method="POST" action="save-edit.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <section>
        <div class="input_group">
          <div>
            <div class="input_area">
              <label for="Nome" class="inputs-text">Nome:</label>
              <input type="text" placeholder="Nome" id="Nome" value="<?php echo $nome; ?>" name="nome">
            </div>
            <div class="input_area">
              <label for="Sobrenome" class="inputs-text">Sobrenome:</label>
              <input type="text" placeholder="Sobrenome" id="Sobrenome" value="<?php echo $sobrenome; ?>" name="sobrenome">
            </div>
          </div>
          <div>
            <div class="input_area">
              <label for="Email" class="inputs-text">Email:</label>
              <input type="text" placeholder="Email" id="Email" value="<?php echo $email; ?>" name="email"></div>
            <div class="input_area">
              <label for="Serie" class="inputs-text">Série:</label>
              <select name="serie" id="serie_select">
                <?php
                if ($serie === "1º ano") {
                  echo "
                      <option value='1º ano' selected>1º ano</option>
                      <option value='2º ano'>2º ano</option>
                      <option value='3º ano'>3º ano</option>
                      ";
                } else if ($serie === "2º ano") {
                  echo "
                      <option value='1º ano'>1º ano</option>
                      <option value='2º ano' selected>2º ano</option>
                      <option value='3º ano'>3º ano</option>
                      ";
                }  else if ($serie === "3º ano") {
                  echo "
                      <option value='1º ano'>1º ano</option>
                      <option value='2º ano'>2º ano</option>
                      <option value='3º ano' selected>3º ano</option>
                      ";
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="buttons">
          <input type="submit" name="Mudar" value="Mudar" class="buttons-form">
          <input type="button" value="Limpar" onclick="limparCampos()" class="buttons-form">
        </div>
      </section>
      <section>
        <div class="container_title">
          <label class="title">Mudar senha</label>
          <hr>
        </div>
        <div class="input_group">
          <div class="input_area">
            <label for="nSenha">Nova Senha:</label>
            <input type="password" placeholder="" name="senha" id="senha">
          </div>
          <div class="input_area">
            <label for="nSenha2">Confirmar nova senha:</label>
            <input type="password" placeholder="" name="confirmsenha" id="confirmsenha">
          </div>
        </div>
        <div class="buttons">
          <input type="submit" value="Mudar" class="buttons-form" name="MudarSenha">
          <input type="button" value="Limpar" onclick="limparCamposSenha()" class="buttons-form">
        </div>
      </section>
    </form>
  </main>
  <!-- Área de scripts -->
  <script>
    function limparCampos() {
      document.getElementById("Nome").value = '';
      document.getElementById("Sobrenome").value = '';
      document.getElementById("Email").value = '';
      document.getElementById("Serie").value = '';
    }

    function limparCamposSenha() {
      document.getElementById("senha").value = '';
      document.getElementById("confirmsenha").value = '';
    }
  </script>
</body>

</html>