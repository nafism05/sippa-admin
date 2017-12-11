<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="box">
	<div class="box-header">
		<!-- <h3 class="box-title">Data Users</h3> -->
		<a class="btn btn-default" href="<?php echo base_url('santri/tambah'); ?>" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
		
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
				<th></th>
				<th>Nama Lengkap</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
		        <th>Telepon</th>
			</tr>
		</thead>
		<tbody>
	        <?php foreach ($santri as $user){ 
		        if(!$this->ion_auth->is_admin($user->id)){ ?>
	    			<tr>
	    				<td>
	    					<div class="btn-group">
								  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    Action <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu">
								    <li><a href="<?php echo base_url('santri/edit/'.$user->id); ?>">Edit</a></li>
								    <li><a href="<?php echo base_url('santri/delete/'.$user->id); ?>" onclick="return confirm('Ingin menghapus data?')">Delete</a></li>
								  </ul>
								</div>
	    				</td>
	    				<td><?php echo $user->nama; ?></td>
	    				<td><?php echo $user->tmpt_lahir; ?></td>
	    				<td><?php echo $user->tgl_lahir; ?></td>
	    				<td><?php echo $user->alamat; ?></td>
	    				<td><?php echo $user->telepon; ?></td>
			            <!-- <td><?php echo ($user->active) ? 'Active' : 'Not Active'; ?></td> -->
	    				<!-- <td align="center">
	    					<?php echo ($this->session->user->group->id == 1) ? '<a href="<?=base_url($edit).$user->id;?>"><i class="fa fa-edit"></i></a>':''?>&nbsp;&nbsp;&nbsp;&nbsp;<a onClick="javascript: return confirm('Kamu Yakin?');" href="<?=base_url($delete).$user->id;?>"><i class="fa fa-trash"></i></a>
	    				</td> -->
	    			</tr>

		        <?php }
		      } ?>
			               
		</tbody>
	</table>
</div>
<!-- /.box-body -->
    <div class="box-footer">
        <!-- <a href="<?php //echo base_url($register);?>"><button type="button" class="btn btn-default btn-sm">Register New User</button></a> -->
    </div>
</div>
<!-- /.box -->