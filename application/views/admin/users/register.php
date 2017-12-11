<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Horizontal Form -->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Form Register</h3>
    </div>
    <!-- /.box-header -->
    
    <!-- form start -->
    <?=form_open_multipart($register);?>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="box-body">
            <div class="form-group <?php echo (form_error('first_name')!=null) ? 'has-error' : ''; ?>">
              <label for="first_name">First Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John" value="<?=set_value('first_name'); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('first_name'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('last_name')!=null) ? 'has-error' : ''; ?>">
              <label for="last_name">Last Name<font color="red">*</font></label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" value="<?=set_value('last_name'); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('last_name'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('username')!=null) ? 'has-error' : ''; ?>">
              <label for="username">Username<font color="red">*</font></label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Digunakan untuk login" value="<?=set_value('username'); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('username'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('email')!=null) ? 'has-error' : ''; ?>">
              <label for="email">Email<font color="red">*</font></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" value="<?=set_value('email'); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('password')!=null) ? 'has-error' : ''; ?>">
              <label for="password">Password<font color="red">*</font></label>
              <input type="password" class="form-control" name="password" id="password" placeholder="*******">
              <span id="helpBlock2" class="help-block"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('password_confirm')!=null) ? 'has-error' : ''; ?>">
              <label for="password_confirm">Confirm Password<font color="red">*</font></label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="*******">
              <span id="helpBlock2" class="help-block"><?php echo form_error('password_confirm'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('phone')!=null) ? 'has-error' : ''; ?>">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="085xxx" value="<?=set_value('phone'); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('phone'); ?></span>
            </div>
            <div class="form-group">
              <label>Level User</label>
              <select class="form-control" name="leveluser">
                <?php foreach($groups as $group): ?>
                  <?php if($group->id!=1): ?>
                  <option value="<?=$group->id;?>"><?=$group->description;?></option>
                  <?php endif;?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="foto_profil">Foto Profil<font color="red">*</font></label>
              <input type="file" id="foto_profil" name="foto_profil">
              <p class="help-block">File jpg, png, atau gif.</p>
              <span id="helpBlock2" class="help-block"><font color="red"><?php echo (isset($unggah_error)) ? $unggah_error : ''; ?></font></span>
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


