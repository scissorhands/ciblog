<div class="container" >
	<?php $this->load->view('template/nav'); ?>
	<article>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
		<?php echo form_open('users/add'); ?>
		<?php echo form_label('Nombre : ', 'first_name', " class='form-control' "); ?>
		<?php echo form_input('first_name', set_value("first_name"), " class='form-control' "); ?>
		<?php echo form_label('Apellido : ', 'last_name', " class='form-control' "); ?>
		<?php echo form_input('last_name', set_value("last_name"), " class='form-control' "); ?>
		<?php echo form_label('Email : ', 'email', " class='form-control' "); ?>
		<?php echo form_input('email', set_value("email"), " class='form-control' "); ?>
		<?php echo form_label('Contraseña : ', 'password', " class='form-control' "); ?>
		<?php echo form_password('password', set_value("password"), " class='form-control' "); ?>
		<?php echo form_submit('submit', 'Crear usuario'); ?>
		<?php echo form_close(); ?>
	</article>
</div>