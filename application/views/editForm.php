<?php echo form_open_multipart('crud/formAksi'); ?>
<table>
	<tr>
		<td><label for="judul">Judul Artikel</label></td>
		<td>:</td>
		<td><input type="text" name="judul" placeholder="judul bos..." size='40' value="<?php echo $judul; ?>" required></td>

	<tr>
		<td><label for="isi">Isi Artikel</label></td>
		<td>:</td>
		<td><textarea name="isi" placeholder="isinya bos.." rows="4" cols="55" required><?php echo $isi; ?></textarea></td>

</table>
	
	<input type="hidden" name="konten_id" value="<?php echo $konten_id; ?>"> 
	<input type="hidden" name="gambar" value="<?php echo $gambar; ?>"> 
	<input type="hidden" name="keterangan" value="edit"> 
	<input type="file" name="gambar" size="20" /><br>
	<div style="color:red"><?php echo $error; ?></div>

	<input type='submit' value='Submit' name='submit' />

<?php echo form_close(); ?>