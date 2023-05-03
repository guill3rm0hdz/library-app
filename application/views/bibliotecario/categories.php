	<!--start page wrapper -->
	<div class="page-wrapper">
			<div class="page-content">
				<div class="container ">
					<div class="row">
						<div class="col-md-8 mx-auto d-flex justify-content-center">
							<div class="w-100">					
								<header>
									<h2><?= $title?></h2>
								</header>
								<form id="formulario" method="post" action="<?php echo base_url('home/add_categories'); ?>" >
									<div class="row mb-3">
										<label for="inputCategories" class="col-sm-4 col-form-label">Name categories</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input" name="nameCategories" />
											<div class="invalid-feedback">
												The input can only contain letters.
											</div>								
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputDescription" class="col-sm-4 col-form-label">Description</label>
										<div class="col-sm-8">
											<input type="text" class="form-control email" name="descriptionCategories"/>
											<div class="invalid-feedback">
												The email is not a valid one.
											</div>								
										</div>
									</div>
									<div class="row mb-3">
									<div class="col-sm-10 offset-sm-2">
										<button type="submit" class="btn btn-primary">Send</button>
									</div>
									</div>
								</form>	
							</div>
						</div>	
					</div>
				</div>
				<hr/>
				<div class="table-responsive">
					<div class="bg-white p-3 mb-3">
						<div class="table">
							<div class="thead">
								<div class="row">
									<div class="col-sm-4">
										<strong>Name</strong>
									</div>
									<div class="col-sm-4">
										<strong>Email</strong>
									</div>
									<div class="col-sm-4">
										<strong>Actions</strong>
									</div>
								</div>
							</div>
							<div class="tbody">
								<?php foreach($table as $element): ?>
									<form method="post" action="<?php echo base_url('home/update_categories/'.$element->id); ?>" >
										<div class="row">
											<div class="col-sm-4">
												<input type="text" class="form-control input" name="nameCategories" value="<?= $element->name;?>"/>
											</div>
											<div class="col-sm-4">
												<input type="text" class="form-control input" name="descriptionCategories" value="<?= $element->description;?>"/>	
											</div>
											<div class="col-sm-4">
												<button class="btn btn-warning">Update</button>
												<a class="btn btn-danger" href="<?php echo base_url('home/del_categories/'.$element->id); ?>">Delete</a>        
											</div>
										</div>
									</form>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!--end page wrapper -->