<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php 
foreach($grocery->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($grocery->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div class="box">
	<!-- <div class="box-header"> -->
		<!-- <h3 class="box-title">Data Berita</h3> -->
		
	<!-- </div> -->
	<!-- /.box-header -->
	<div class="box-body">
		<?php echo $grocery->output; ?>
	</div>
</div>

<?php foreach($grocery->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>