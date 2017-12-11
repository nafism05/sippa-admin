<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Profil</h3>
    </div>
    <!-- /.box-header -->

	<div class="row">
	  <div class="col-sm-4 col-sm-offset-1">
	    <div class="box-body">
	    	<?php if(isset($_SESSION['notifikasi'])){ ?>
					<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> <?=$_SESSION['notifikasi']; ?>
	        </div>
        <?php  } ?>
	    	<div class="row">
	    	<div class="col-sm-4">
	    		<img src="<?=base_url($avatar).'100_'.$user->avatar;?>" class="img-circle" alt="User Image">
	    	</div><br><br>
	    	</div><br><br>
	    	<div class="col-sm-4">
	    		<b>First Name</b>
	    	</div>
	    	<div class="col-sm-4">
	    		<?=$user->first_name;?>
	    	</div><br><br>
	    	<div class="col-sm-4">
	    		<b>Last Name</b>
	    	</div>
	    	<div class="col-sm-4">
	    		<?=$user->last_name;?>
	    	</div><br><br>
	    	<div class="col-sm-4">
	    		<b>Username</b>
	    	</div>
	    	<div class="col-sm-4">
	    		<?=$user->username;?>
	    	</div><br><br>
	    	<div class="col-sm-4">
	    		<b>Email</b>
	    	</div>
	    	<div class="col-sm-4">
	    		<?=$user->email;?>
	    	</div><br><br>
	    	<div class="col-sm-4">
	    		<b>Phone</b>
	    	</div>
	    	<div class="col-sm-4">
	    		<?=$user->phone;?>
	    	</div><br><br>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  <!-- /.col-sm-4 col-sm-offset-1 -->
	</div>
	<!-- /.row -->
	<?php //$user1 = $this->ion_auth->user()->row() ?>
	<div class="box-footer">
		<?php if($this->ion_auth->user()->row()->id==$user->id): ?>
	    <a href="<?=base_url($edit_profil);?>"><button class="btn btn-primary">Edit</button></a>
		<?php endif; ?>
  </div>
</div>
<!-- /.box -->