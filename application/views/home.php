<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<!-- Icono del header -->
			<a class="navbar-brand" href="<?= base_url();?>">
				<img src="https://juststickers.in/wp-content/uploads/2017/10/baby-deadpool.png" width="80"/>
				<span>Where is the library?</span>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<!-- Enlaces a rutas -->
			<ul class="navbar-nav ms-auto">	
				<h3>Menu |</h3>
				<li class="nav-item"><?php echo anchor('home/section_load/books', 'Books', array('class' => 'nav-link active')); ?>
				</li>
				<li class="nav-item"><?php echo anchor('home/section_load/categories', 'categories', array('class' => 'nav-link')); ?>
				</li>
				<li class="nav-item"><?php echo anchor('home/section_load/users', 'Users', array('class' => 'nav-link')); ?>
				</li>
			
			</ul>
			</div>
		</div>
		</nav>
	</header>	
	<!-- Relleno para el Main -->
	<div class="contenedor">
			<main class="contenido">
				<?php if(!isset($section)){?>
					<img src="https://media.tenor.com/T4664VfiM0cAAAAC/asistente-robot.gif" alt="Gif animado de una flecha que señala a la izquierda">
					<h2>Selecciona una opcion del menu</h2>
					<?php }else{echo $section;}?>
			</main>
	</div>
	<?= $footer;?>
	<?= $scripts;?>

</body>
</html>