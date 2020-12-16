   <section class="login-block">
       <div class="container">
           <div id="login-row" class="row justify-content-center align-items-center">
               <div class="col-md-4 login-sec">
                   <form class="login-form" method="post" action="authenticar">
                       <h2 class="text-center">Acesso do Administrador</h2>
                       <?php
                        if ($this->session->flashdata('error')) :
                            ?>
                           <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                       <?php
                        endif;
                        ?>
                       <div class="form-group">
                           <label for="username" class="text-white">Usuário:</label>
                           <input class="form-control" type="text" name="login" placeholder="Usuário" required>
                       </div>
                       <div class="form-group">
                           <label for="password" class="text-white">Senha:</label>
                           <input class="form-control" type="password" name="senha" placeholder="Senha" required>
                       </div>
                       <div class="form-check">
                           <button class="btn btn-login float-right" type="submit" value="Verificar">Verificar</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>