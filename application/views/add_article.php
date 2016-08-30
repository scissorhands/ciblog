<div class="container" >
	<?php $this->load->view('template/nav'); ?>
	<article>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
		<?php echo form_open('articles/add'); ?>
		<?php echo form_label('Autor : ', 'author', " class='form-control' "); ?>
		<?php echo form_input('author', set_value("author"), " class='form-control' "); ?>
		<?php echo form_label('Texto : ', 'text', " class='form-control' "); ?>
		<?php echo form_textarea('text', set_value("text"), " class='form-control' "); ?>
		<?php echo form_submit('submit', 'Crear artículo'); ?>
		<?php echo form_close(); ?>
	</article>
</div>