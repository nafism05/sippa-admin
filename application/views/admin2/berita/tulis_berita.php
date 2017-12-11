<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Horizontal Form -->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Form Tulis Berita</h3>
    </div>
    <!-- /.box-header -->
    
    <!-- form start -->
    <?=form_open($tulis_berita);?>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="box-body">
            <div class="form-group <?php echo (form_error('judul')!=null) ? 'has-error' : ''; ?>">
              <label for="judul">Judul Berita<font color="red">*</font></label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Judulnya bos" value="<?=set_value('judul'); ?>">
              <span id="helpBlock2" class="help-block"><?php echo form_error('judul'); ?></span>
            </div>
            <div class="form-group <?php echo (form_error('isi')!=null) ? 'has-error' : ''; ?>">
              <label for="isi">Isi Berita<font color="red">*</font></label>
              <textarea class="tinymce" id="isi" name="isi"><?=set_value('isi'); ?></textarea>
              <span id="helpBlock2" class="help-block"><?php echo form_error('isi'); ?></span>
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