<h1>Iniciar sesion</h1>
<div class="container" >
	<article>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
		<?php echo form_open('login'); ?>
		<?php echo form_label('usuario : ', 'user', " class='form-control' "); ?>
		<?php echo form_input('user', set_value("user"), " class='form-control' "); ?>
		<?php echo form_label('contraseña : ', 'password', " class='form-control' "); ?>
		<?php echo form_password('password', set_value("password"), " class='form-control' "); ?>
		<?php echo form_submit('submit', 'Iniciar sesión'); ?>
		<?php echo form_close(); ?>
	</article>
</div>