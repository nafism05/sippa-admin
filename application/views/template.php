<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title><?php echo $title;?></title>
</head>
<body>

<a href='<?php echo base_url("read"); ?>'>Home</a> | 
<?php if($this->ion_auth->is_admin()){ ?>
	<a href='<?php echo base_url("insert"); ?>'>Insert</a> | 
	<a href='<?php echo base_url("users"); ?>'>Users</a> |  
<?php } ?>
<a href='<?php echo base_url("logout"); ?>'>Logout</a>

<h1><?php echo $headline;?></h1>

<?php $this->load->view($include);?>

</body>
</html>