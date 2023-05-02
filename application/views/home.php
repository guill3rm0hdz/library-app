<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= base_url();?>">
				<img src="https://juststickers.in/wp-content/uploads/2017/10/baby-deadpool.png" width="80"/>
				<span>Where is the library?</span>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="<?= base_url();?>">Home</a>
				</li>
			</ul>
			</div>
		</div>
		</nav>
	</header>	
	<div class="contenedor">
			<sidebar class="sidebar">
				<h2>Menu</h2>
				<ul class="menu">
					<li><?php echo anchor('home/cargar_seccion/libros', 'Libros', array('class' => '')); ?>
					</li>
					<li><?php echo anchor('home/cargar_seccion/categorias', 'Categorias', array('class' => '')); ?>
					</li>
					<li><?php echo anchor('home/cargar_seccion/usuarios', 'Usuarios', array('class' => '')); ?>
					</li>
				</ul>
			</sidebar>
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