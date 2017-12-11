<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Horizontal Form -->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Form Edit</h3>
    </div>
    <!-- /.box-header -->
    
    <?php //echo validation_errors(); ?>
    <!-- form start -->
    <?=form_open('santri/edit/'.$id_santri);?>
      <!-- <input type="hidden" name="id_santri" value="<?php echo $id_santri; ?>" /> -->
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="box-body">
            <div class="form-group <?php echo (form_error('first_name')!=null) ? 'has-error' : ''; ?>">
              <label for="nama">Nama Lengkap<font color="red">*</font></label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?=set_value('nama', $santri->nama); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('nama'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('tmpt_lahir')!=null) ? 'has-error' : ''; ?>">
              <label for="tmpt_lahir">Tempat Lahir<font color="red">*</font></label>
              <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?=set_value('tmpt_lahir', $santri->tmpt_lahir); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('tmpt_lahir'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('tgl_lahir')!=null) ? 'has-error' : ''; ?>">
              <label for="tgl_lahir">Tanggal Lahir<font color="red">*</font></label>
              <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=set_value('tgl_lahir', $santri->tgl_lahir); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('tgl_lahir'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('alamat')!=null) ? 'has-error' : ''; ?>">
              <label for="alamat">Alamat<font color="red">*</font></label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?=set_value('alamat', $santri->alamat); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('alamat'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('telepon')!=null) ? 'has-error' : ''; ?>">
              <label for="telepon">Telepon<font color="red">*</font></label>
              <input type="text" class="form-control" name="telepon" id="telepon" value="<?=set_value('telepon', $santri->telepon); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('telepon'); ?></span>
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


