
<?php foreach ($result as $row){ ?>
	
	<b><h4><?php echo $row->judul; ?></h4></b>
	<img src="<?php echo base_url('uploads/thumbs/100_'.$row->gambar); ?>" alt="<?php echo $row->gambar; ?>">
	<p><?php echo $row->isi; ?></p>

	<?php if($this->ion_auth->is_admin()){ ?> 
		<a href='<?php echo base_url("crud/editForm/".$row->konten_id); ?>'>Edit</a> | 
	    <a onClick="javascript: return confirm('Kamu Yakin?');" href='<?php echo base_url("crud/delete/".$row->konten_id); ?>'>Delete</a>
    <?php } ?>
    
    <br>
    <br>
<?php } ?>
