	<!-- Inicio componente -->
	<div class="page-wrapper">
			<div class="page-content">
				<div class="container">
					<!-- Contenido Formulario de registrode datos -->
					<div class="row">
						<div class="col-md-8 mx-auto d-flex justify-content-center">
							<div class="w-100">		
								<header>
								<h2><?= $title?></h2>
								</header>
								<form id="formulario" method="post" action="<?php echo base_url('home/add_books'); ?>" >
									<div class="row mb-3">
										<label for="inputName" class="col-sm-2 col-form-label">Book Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control input" name="nameBook" />
											<div class="invalid-feedback">
												The input can only contain letters.
											</div>								
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputAutor" class="col-sm-2 col-form-label">Author Book</label>
										<div class="col-sm-10">
											<input type="text" class="form-control input" name="authorBook" />
											<div class="invalid-feedback">
												The input can only contain letters.
											</div>								
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputCategoria" class="col-sm-2 col-form-label">Book Category</label>
										<div class="col-sm-10">
											<!-- Input para buscar opciones -->
											<input type="text" id="autocomplete-category" class="form-control">
											<!-- Contenedor donde se mostrarán las opciones seleccionadas -->
											<div id="selected-options"></div>
											<div class="invalid-feedback">
												Use autocomplete and select a category.
											</div>								
										</div>
									</div>		
									<div class="row mb-3">
										<label for="inputFechaPublicacion" class="col-sm-2 col-form-label">Book Publishing</label>
										<div class="col-sm-10">
											<input type="date" class="form-control date" name="fechaBook">								
											<div class="invalid-feedback">
												Select a date.
											</div>								
										</div>
									</div>			
									<div class="row mb-3">
										<label for="inputFechaPublicacion" class="col-sm-2 col-form-label">Book User</label>
										<div class="col-sm-10">
											<input type="text" class="form-control input autocompleteUser"name="userBook"/>
											<div class="invalid-feedback">
												This field is required
											</div>								
										</div>
									</div>																	
									<div class="row mb-3">
									<div class="col-sm-10 offset-sm-2">
										<button type="submit" class="btn btn-primary">Enviar</button>
									</div>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<!-- Contenido Tabla con Formulario para actualizar datos -->
				<div class="table-responsive">
					<div class="bg-white p-3 mb-3">
						<div class="table">
							<div class="thead">
								<div class="row">
									<div class="col-sm-2">
										<strong>Name Book</strong>
									</div>
									<div class="col-sm-2">
										<strong>Author Book</strong>
									</div>
									<div class="col-sm-2">
										<strong>Category Book</strong>
									</div>										
									<div class="col-sm-2">
										<strong>Deate Book</strong>
									</div>									
									<div class="col-sm-2">
										<strong>User</strong>
									</div>
								</div>
							</div>
							<!-- Cuerpo de la tabla -->
							<div class="tbody">
								<?php foreach($table as $element): ?>
									<?= form_open('home/update_book/'.$element->id, ['class' => 'formulario-table'], ['method' => 'post'] ) ?>
										<div class="row">
											<div class="col-sm-2">
												<input type="text" class="form-control input" name="nameBook" value="<?= $element->name;?>"/>
											</div>
											<div class="col-sm-2">
												<input type="text" class="form-control input" name="authorBook" value="<?= $element->author;?>"/>	
											</div>
											<div class="col-sm-2">

												<div id="selected-options">
													<?php 
													$categories = json_decode($element->category, true);
													if(isset($categories) > 0){ 
														foreach($categories as $option):?>
														<div class="selected-option mb-1">
															<input type="text" class="btn btn-secondary" name="categoryBook[]" value="<?= $option;?>" readonly>
														</div>
													<?php 
														endforeach; 
													}?>										
												</div>
											</div>		
											<div class="col-sm-2">
												<input type="date" class="form-control input" name="fechaBook" value="<?= $element->published_date;?>"/>	
											</div>
											<div class="col-sm-2">
												<input type="text" class="form-control input autocompleteUser" name="userBook" value="<?= $element->user;?>"/>	
											</div>															
											<div class="col-sm-2">
												<?= form_submit('submit', 'Update', array('class' => 'btn btn-primary')) ?>
												<a class="btn btn-danger" href="<?php echo base_url('home/del_book/'.$element->id); ?>">Delete</a>        
												<div class="form-switch">
													<label class="form-check-label" for="checkSwitch"></label>
													<input class="form-check-input" type="checkbox" name="availabilityBook" checked>
												</div>												
											</div>
										</div>
									<?= form_close() ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Fin componente -->

