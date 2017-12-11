<h1><?php //echo lang('login_heading');?></h1>
<p><?php //echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("crud/login");?>

  <p>
    <?php echo form_label('Username', 'username');?>
    <?php echo form_input($username);?>
  </p>

  <p>
    <?php echo form_label('Password', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo form_label('Remember me', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', 'Submit');?></p>

<?php echo form_close();?>

<p><a href="crud/lupa_password">Lupa Password?</a></p>