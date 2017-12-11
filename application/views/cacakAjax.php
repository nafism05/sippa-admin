<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>$title</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>
<body>

<!-- <button id="submit">Submit</button> -->
  <div id="myDiv">
      <!-- AJAX content will load here-->
  </div>
                        

<script src="<?=base_url('assets/');?>jquery-3.1.1.min.js"></script>
  <div id="jsku">
      <!-- AJAX content will load here-->
  </div>
<script type="text/javascript">

  $(document).ready(function(){
    $("#submit").click(function(){
    });
      $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', "<?=base_url('assets/');?>bootstrap/css/bootstrap.min.css") );
      $('#myDiv').load('<?=site_url('admin/myfile');?>');
        
});
</script>
</body>
</html>