<h1><?php echo $title; ?></h1>
<h4><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></h4>
<nav>
	<ul>
		<li><a href="<?php echo base_url(); ?>home/" class="btn btn-default" title="">Home</a></li>
		<li><a href="<?php echo base_url(); ?>home/about" class="btn btn-default" title="">About</a></li>
		<?php if( $this->session->userdata('first_name')==null ): ?>
			<li><a href="<?php echo base_url(); ?>login" class="btn btn-default" title="">Login</a></li>
		<?php else: ?>
			<li><a href="<?php echo base_url(); ?>users/logout" class="btn btn-default" title="">Logout</a></li>
		<?php endif; ?>
	</ul>
</nav>