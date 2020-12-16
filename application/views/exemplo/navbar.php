<!-- Navigation -->

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
	<div class="container">
	<a class="navbar-brand js-scroll-trigger" href="<?= base_url('cliente/inicio') ?>"><img src=<?= base_url('assets/mdb/img/header/test.png') ?> width="180"></a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		Menu
		<i class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav text-uppercase ml-auto">
		<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="<?= base_url('cliente/empresa') ?>">A Empresa</a>
		</li>
		<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="<?= base_url('cliente/historia') ?>">História</a>
		</li>

		<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="<?= base_url('imagens/frota') ?>">Nossa Frota</a>
		</li>
		<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="<?= base_url('cliente/cadastro') ?>">Solicitar Orçamento</a> 
		</li>
		</ul>
		<?php
			if ($this->session->userdata('usuario_logado')) :
				?>

				<div class="dropdown ">
					<button class="dropdown-toggle text-muted" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user text-muted"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?= base_url('cliente/admin') ?>">Administração</a>
						<a class="dropdown-item" href="<?= base_url('cliente/logout') ?>">Deslogar</a>
					</div>
				<?php
				endif;
				?>
	</div>
	</div>
</nav> 