<div id="modal" class="modal">
  <div class="conteudo-modal">
    <div class="cabecalho-modal">
      <div class="close_modal"><img src="img/icons/fechar.png" alt="butão-fechar" id="close_modal" class="fechar-modal" /></div>
      <div class="logo"><img src="img/icons/Logo(oficial)menor.png" alt="logo" /></div>
    </div>
    <div class="corpo-modal">
      <form action="PHP/TesteLogin.php" method="POST">
        <p class="modal_title">LOGIN:</p>
        <div class="input-login" id="area-email">
          <input type="text" placeholder=" " name="email" required />
          <label for="email">E-mail:</label>
        </div>
        <br />
        <div class="input-login" id="area-senha">
          <input type="password" placeholder=" " name="senha" required />
          <label for="senha">Senha:</label>
        </div>
        <span>Login como:</span>
        <div class="radio_login">
          <div><input type="radio" name="usuario" value="professor" class="radiobt" /><label for="professor">Professor</label></div>
          <div><input type="radio" name="usuario" value="aluno" class="radiobt" /><label for="aluno">Aluno</label></div>
        </div>
        <br />
        <input name="submit" type="submit" value="ENTRAR" class="entrar-btn" />
      </form>
      <p><a href="recuperar-senha.php">Esqueceu a senha?</a></p>
      <br />
      <p>É novo por aqui? <a href="javascript:void(0);" id="cadast_btn">Cadastre-se</a></p>
    </div>
  </div>
</div>