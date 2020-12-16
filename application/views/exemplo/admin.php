<br><br><br><br>
<section class="bg page-section" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="text-uppercase">Painel Administrativo</h2>
                <h3 class="section-subheading ">Selecione a opção na qual deseja acessar seu painel:</h3>

                <div class="container">
                    <div class="row justify-content-center">
                        <?php
                        foreach ($links as $link) :
                            ?>
                            <div class="col-md-3">
                                <a id="pa" href="<?= base_url('' . $link['url']) ?>"><?= $link['title'] ?></a>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="far fa-file-alt"></i>
                <span class="count-numbers">Orçamentos</span>
                <span class="count-name">Administrar pedidos<br> de orçamento</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="far fa-images"></i>
                <span class="count-numbers">Imagens</span>
                <span class="count-name">Administrar imagens<br> da frota</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="far fa-envelope"></i>
                <span class="count-numbers">Newsletter</span>
                <span class="count-name">Visualizar emails<br> cadastrados</span>
            </div>
        </div>


    </div>
</div>
                    -->