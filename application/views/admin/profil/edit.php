<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Horizontal Form -->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Form Edit User</h3>
    </div>
    <!-- /.box-header -->
    
    <!-- form start -->
    <?=form_open_multipart($edit_profil);?>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="box-body">
            <div class="form-group">
    					<font color="red"><?php echo validation_errors(); ?></font>
            </div>
            <div class="form-group">
              <label for="first_name">First Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John" value="<?=set_value('first_name', $user->first_name); ?>">
            </div>
            <div class="form-group <?php //echo (form_error('last_name')!=null) ? 'has-error' : ''; ?>">
              <label for="last_name">Last Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" value="<?=set_value('last_name', $user->last_name); ?>">
            </div>
            <div class="form-group <?php //echo (form_error('username')!=null) ? 'has-error' : ''; ?>">
              <label for="username">Username<font color="red">*</font></label>
              <input type="text" class="form-control" id="username" name="username" value="<?=$user->username; ?>" disabled>
            </div>
            <div class="form-group <?php //echo (form_error('email')!=null) ? 'has-error' : ''; ?>">
              <label for="email">Email<font color="red">*</font></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" value="<?=set_value('email', $user->email); ?>">
            </div>
            <div class="form-group ">
              <label for="password">Password<font color="red">*</font></label>
              <input type="password" class="form-control" name="password" id="password" placeholder="*******">
            	<p class="help-block">Kosongi jika tidak ingin di update.</p>
            </div>
            <div class="form-group ">
              <label for="password_confirm">Confirm Password<font color="red">*</font></label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="*******">
            	<p class="help-block">Kosongi jika tidak ingin di update.</p>
            </div>
            <div class="form-group ">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="085xxx" value="<?=set_value('phone', $user->phone); ?>">
            </div>
            <div class="form-group">
              <label for="foto_profil">Foto Profil<font color="red">*</font></label>
              <input type="file" id="foto_profil" name="foto_profil">
              <p class="help-block">File jpg, png, atau gif. <br>Kosongi jika tidak ingin di update.</p>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.col-sm-4 col-sm-offset-1 -->
      </div>
      <!-- /.row -->
      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <!-- /.box-footer -->
    </form>
</div>
<!-- /.box -->


