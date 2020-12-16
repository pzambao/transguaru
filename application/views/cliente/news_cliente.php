<div class="container text-center ">
    <div class="col-lg-12">
        <h2>Newsletter</h2>
        <h6 class="section-subheading" >Assine nossa Newsletter para ficar por dentro das novidades da empresa.</h6><br>
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>;
        
        <form method="POST">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group mt-2 ">
                        <h6>Nome:</h6>
                        <input value="<?= isset($user) ? $user['nome'] : '' ?>" type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu primeiro nome">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group mt-2 ">
                        <h6>E-mail:</h6>
                        <input value="<?= isset($user) ? $user['email'] : '' ?>" type="text" id="email" name="email" class="form-control" placeholder="Digite um e-mail válido">
                    </div>
                </div>
                <div class="col-md-2">
                    <br>
                    <div class="form-group mt-1">
                        <h6></h6>
                        <button class="btn btn-primary btn-primary " type="submit">Receber Novidades</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> 
<br><br> 