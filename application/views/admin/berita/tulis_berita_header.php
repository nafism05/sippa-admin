<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/ionicons/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/skins/_all-skins.min.css">

  <!-- tinymce -->
  <script src="<?=base_url('assets/');?>tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
        // General options
        selector : "textarea",
        theme : "modern",
        plugins: 'advlist autolink link image lists charmap print preview responsivefilemanager',
        height : 400,
        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code jbimages| inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      image_advtab: true ,
      relative_urls: false,

      external_filemanager_path:"<?=base_url('');?>filemanager/",
      // external_filemanager_path:"filemanager/",
     filemanager_title:"Responsive Filemanager" ,
     external_plugins: { "filemanager" : "<?=base_url('');?>filemanager/plugin.min.js"}
     // external_plugins: { "filemanager" : ""}

    });
  </script>


  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>