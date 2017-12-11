<h1><?php //echo lang('create_group_heading');?></h1>
<p><?php //echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php //echo $message;?></div>

<?php echo form_open("crud/buat_group");?>

      <p>
            <?php echo form_label('Nama Grup : ', 'group_name'); ?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo form_label('Deskripsi : ', 'description'); ?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', 'Submit');?></p>

<?php echo form_close();?>

<a href="cacak">to pdf</a>