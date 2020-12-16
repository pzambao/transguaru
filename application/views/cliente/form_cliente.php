
<section class="page-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <h2 class="section-heading text-uppercase text-center"><br><br>Solicitar Orçamento</h2>
                <h3 class="section-subheading text-center">Preencha os campos abaixo para realizar o seu pedido</h3>
                <br><br>
               
                <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>;

                
                <div class="col-lg-12">
                    <form method="POST" > 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2 m-1">
                                    <h6>Nome:</h6>
                                    <input value="<?= isset($user) ? $user['nome'] : '' ?>" type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome completo">
                                </div>
                                <div class="form-group mt-2 m-1">
                                    <h6>E-mail:</h6>
                                    <input value="<?= isset($user) ? $user['email'] : '' ?>" type="text" id="email" name="email" class="form-control" placeholder="Digite um e-mail válido">
                                </div>
                                <div class="form-group mt-2 m-1">
                                    <h6>Telefone:</h6>
                                    <input value="<?= isset($user) ? $user['telefone'] : '' ?>" type="number" id="telefone" name="telefone" class="form-control" placeholder="Digite um nº de telefone válido">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2 m-1">
                                    <h6>Endereço de partida:</h6>
                                    <input value="<?= isset($user) ? $user['partida'] : '' ?>" type="text" id="partida" name="partida" class="form-control" placeholder="Digite o endereço de partida da carga">
                                </div>
                                <div class="form-group mt-2 m-1">
                                    <h6>Endereço de chegada:</h6>
                                    <input value="<?= isset($user) ? $user['chegada'] : '' ?>" type="text" id="chegada" name="chegada" class="form-control" placeholder="Digite o endereço de chegada da carga">
                                </div>
                                <div class="form-group mt-2 m-1">
                                    <h6>Detalhes da carga:</h6>
                                    <input value="<?= isset($user) ? $user['detalhes'] : '' ?>" type="text" id="detalhes" name="detalhes" class="form-control" placeholder="Digite objetivamente, informações sobre a carga">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center"><br><br>
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar Solicitação</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</section>

