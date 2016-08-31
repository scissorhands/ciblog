<div class="container" >
	<?php $this->load->view('template/nav'); ?>
	<article>
		<a href="<?php echo base_url(); ?>articles/add" title="add" class="btn btn-primary">Add an article</a>
	</article>
	<?php if( $this->session->userdata('first_name')!==null && $this->session->userdata('type')==1 ): ?>
	<article>
		<a href="<?php echo base_url(); ?>users/add" title="add" class="btn btn-primary">Add user</a>
	</article>
	<?php endif; ?>
	<?php foreach ($articles as $article): ?>
		<article>
			<h4> <?php echo $article->author; ?> </h4>
			<p> <?php echo $article->text; ?> </p>
			<i> <?php echo $article->creation_date; ?> </i>
		</article>
	<?php endforeach; ?>
</div>