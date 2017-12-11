<html>
<head>
<title>Upload Form</title>
</head>
<body>


<?php echo form_open_multipart('admin/ujiUpload');?>

<input type="file" name="thumbnail" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>