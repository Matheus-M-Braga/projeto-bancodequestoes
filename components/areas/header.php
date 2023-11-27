<header>
     <div id="login-user">
          <div id="texto-user" style="display: flex;">
               <a href="../editar-perfil.php" title="Clique para editar seu perfil,  seu vagabudno">
                    <div class="perfiluser" style="margin-right: 20px;">
                         <img src="../../img/user.svg" alt="boneco_user">
                    </div>
               </a>
               <p>Olá, <?php echo $nome; ?>!<br> Seja Bem-vindo <br>Série: <?php echo $serie; ?></p>
          </div>
     </div>
     </div>
     <div id="sair">
          <a href="../PHP/sair.php" id="sair"><input type="submit" value="Sair" id="sair-btn"></a>
     </div>
</header>
<nav id="linha">
     <a href="inicio.php" style="text-decoration: underline;">Início</a>
     <a href="provas.php">Questões</a>
     <a href="minha_turma.php">Minha turma</a>
     <a href="ajuda.php">Ajuda</a>
</nav>