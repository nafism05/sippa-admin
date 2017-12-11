<html>
<head>
<title>Upload Form</title>
</head>
<body>


	<?php echo form_open_multipart('tes/insertloop');?>

		<input type="file" name="thumbnail" size="20" />
		<input type="text" name="abc" size="20" value="abc" />

		<br /><br />

		<input type="submit" value="upload" />

	</form>

</body>
</html>