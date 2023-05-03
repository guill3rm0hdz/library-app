	<!--start page wrapper -->
	<div class="page-wrapper">
			<div class="page-content">
				<div class="container">
                    <header>
                    <h2><?= $title?></h2>
                    </header>
					<form id="formulario">
						<div class="row mb-3">
							<label for="inputName" class="col-sm-2 col-form-label">Nombre Libro</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input" name="nameLibro" />
								<div class="invalid-feedback">
									El input solo puede contener letras.
								</div>								
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputAutor" class="col-sm-2 col-form-label">Autor</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input" name="autor"/>
								<div class="invalid-feedback">
									El input solo puede contener letras.
								</div>								
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputCategoria" class="col-sm-2 col-form-label">Categoria</label>
							<div class="col-sm-10">
								<label for="fruits" >Elige una categoria:</label>
								<!-- Input para buscar opciones -->
								<input type="text" id="autocomplete-category" class="form-control">
								<!-- Contenedor donde se mostrarán las opciones seleccionadas -->
								<div id="selected-options"></div>

								<div class="invalid-feedback">
									Selecciona una categoria.
								</div>								
							</div>
						</div>		
						<div class="row mb-3">
							<label for="inputFechaPublicacion" class="col-sm-2 col-form-label">Fecha Publicacion</label>
							<div class="col-sm-10">
								<input type="date" class="form-control date" name="fechaPublicacion">								
								<div class="invalid-feedback">
									Selecciona una fecha.
								</div>								
							</div>
						</div>			
						<div class="row mb-3">
							<label for="inputFechaPublicacion" class="col-sm-2 col-form-label">Usuario</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="autocompleteUser" name="usuario"/>
								<div class="invalid-feedback">
									El input solo puede contener letras.
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

				<table class="table">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">First</th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
						</tr>
						<tr>
						<th scope="row">2</th>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
						</tr>
						<tr>
						<th scope="row">3</th>
						<td colspan="2">Larry the Bird</td>
						<td>@twitter</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!--end page wrapper -->