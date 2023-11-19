<div class="container">
     <div class="form-image">
          <img src="img/imgparacadastro.png" alt="negro apontando para logo">
     </div>
     <div class="form">
          <form action="<?php echo $currentPage ?>" method="POST">
               <div class="form-header">
                    <div class="title">
                         <h1>Cadastre-se</h1>
                    </div>
                    <a href="javascript:history.back()">
                         <div class="login-button"><button type="button">Voltar</button></div>
                    </a>
               </div>
               <div class="input-group">
                    <div class="input-box">
                         <label for="nome">Primeiro Nome</label>
                         <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                    </div>
                    <div class="input-box">
                         <label for="sobrenome">Sobrenome</label>
                         <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                         <label for="email">E-mail</label>
                         <input id="email" type="text" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                         <label for="cpf">CPF</label>
                         <input id="cpf" type="text" name="cpf" placeholder="000000000-00" required>
                    </div>
                    <div class="input-box">
                         <label for="senha">Senha</label>
                         <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="input-box">
                         <label for="confirmsenha">Confirme sua Senha</label>
                         <input id="confirmsenha" type="password" name="confirmsenha" placeholder="Digite sua senha novamente" required>
                    </div>
               </div>
               <?php echo $ownPart; ?>
               <div class="continue-button">
                    <input name="submit" type="submit" value="Continuar">
               </div>
          </form>
     </div>
</div>