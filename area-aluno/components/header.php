<header>
     <div id="login-user">
          <div id="texto-user" style="display: flex;">
               <a href="../services/editar-perfil.php" title="Clique para editar seu perfil,  seu vagabudno">
                    <div class="perfiluser" style="margin-right: 20px;">
                         <img src="../../img/user.svg" alt="boneco_user">
                    </div>
               </a>
               <p>Olá, <?php echo $nome; ?>!<br> Seja Bem-vindo <br>Série: <?php echo $serie; ?></p>
          </div>
     </div>
     </div>
     <a href="../../php/sair.php" id="sair">
          <div class="sair material-symbols-outlined">logout</div>
     </a>
</header>
<nav id="linha">
     <a href="<?php echo ($current_page == 'editar-perfil.php') ? '../view/' : ''; ?>inicio.php" class="<?php echo ($current_page == 'inicio.php') ? 'selected' : ''; ?>">Início</a>
     <a href="<?php echo ($current_page == 'editar-perfil.php') ? '../view/' : ''; ?>provas.php" class="<?php echo ($current_page == 'provas.php') ? 'selected' : ''; ?>">Provas</a>
     <a href="<?php echo ($current_page == 'editar-perfil.php') ? '../view/' : ''; ?>minha_turma.php" class="<?php echo ($current_page == 'minha_turma.php') ? 'selected' : ''; ?>">Minha turma</a>
</nav>