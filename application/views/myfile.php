<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Users</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Users</h3>
		
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<?php if(isset($_SESSION['notifikasi'])){ ?>
		<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> <?=$_SESSION['notifikasi']; ?>
        </div>
        <?php  } ?>
        <?php if(isset($_SESSION['register_error'])){ ?>
		<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> <?=$_SESSION['register_error']; ?>
        </div>
        <?php  } ?>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Group</th>
		        <th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	        <?php foreach ($users as $user){ 
		        if(!$this->ion_auth->is_admin($user->id)){ ?>
	    			<tr>
	    				<td><?php echo $user->first_name; ?></td>
	    				<td><?php echo $user->last_name; ?></td>
	    				<td><?php echo $user->email; ?></td>
	    				<td>
			              <?php foreach ($user->groups as $group):?>
			                <?php echo $group->description; ?>
			              <?php endforeach?>
		            	</td>
			            <td><?php echo ($user->active) ? 'Active' : 'Not Active'; ?></td>
	    				<td align="center">
	    					<a href="<?=base_url($edit).$user->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onClick="javascript: return confirm('Kamu Yakin?');" href="<?=base_url($delete).$user->id;?>"><i class="fa fa-trash"></i></a>
	    				</td>
	    			</tr>

		        <?php }
		      } ?>
			               
		</tbody>
	</table>
</div>
<!-- /.box-body -->
    <div class="box-footer">
        <a href="<?php echo base_url($register);?>"><button type="button" class="btn btn-default btn-sm">Register New User</button></a>
    </div>
</div>
<!-- /.box -->