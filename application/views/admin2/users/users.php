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