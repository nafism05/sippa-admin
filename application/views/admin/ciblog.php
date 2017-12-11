<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="<?=base_url('assets/');?>bootstrap/css/bootstrap.min.css">
          <!-- Font Awesome -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
          <!-- Ionicons -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Morris chart belum --> 
        <link href="<?=base_url('assets/');?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap belum -->
        <link href="<?=base_url('assets/');?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar belum -->
        <link href="<?=base_url('assets/');?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker belum -->
        <link href="<?=base_url('assets/');?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor belum -->
        <link href="<?=base_url('assets/');?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/AdminLTE.min.css">


        <!-- Line Control WYSIWYG -->
        <link href="<?=base_url('assets/');?>plugins/line_control_editor/editor.css" type="text/css" rel="stylesheet"/>

        <!-- Bootstrap Datepicker belum -->
        <link href="<?=base_url('assets/');?>plugins/datepicker/css/datepicker.css" type="text/css" rel="stylesheet"/>

        <!-- Select2 belum -->
        <link href="<?=base_url('assets/');?>plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
        

        <link href="<?=base_url('assets/');?>css/custom.css" rel="stylesheet" type="text/css" />


        <script type="text/javascript">
            var SERVER = '<?php echo site_url("/")?>';
            var BASE_URI = '<?php echo BASE_URI;?>';
        </script>
        <!-- jQuery 2.2.3 -->
<script src="<?=base_url('assets/');?>plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.10.3 belum -->
        <script src="<?=base_url('assets/');?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('assets/');?>bootstrap/js/bootstrap.min.js"></script>

        <script src="<?=base_url('assets/');?>js/custom.js" type="text/javascript"></script>   
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <?php //echo $header;?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <?php //echo $sidebar;?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">






                    <div class="row">
    <div class="col-md-12">
         <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">New Post</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/posts/add')?>" method="post">
                <div class="box-body">
                    <?php //echo message_box(validation_errors(),'danger'); ?>
                    <div class="form-group">
                        <label for="post_name">Title</label>
                        <input type="text" name="title" class="form-control" id="post_name" placeholder="Title" value="<?php echo set_value('title');?>">
                    </div>
                    <div class="form-group">
                        <label for="post_body">Body</label>
                        <textarea name="body" class="form-control txteditor" id="post_body" placeholder="Body" rows="10"><?php echo set_value('body');?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="post_status">Featured Image</label>
                        <input type="hidden" name="featured_image" value="<?php echo set_value('featured_image');?>" id="featured_image">
                        <div class="preview_featured_image"></div>
                        <div class="set_featured_image">
                            <a type="button" style="cursor:pointer" class="btnShowAssets" data-toggle="modal" data-target="#assetsModal">Set Featured Image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="post_name">Publish Date</label>
                        <input type="text" name="published_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="publish_date" placeholder="Publish Date" value="<?php echo set_value('published_at');?>">
                    </div>
                    <?php if($this->ion_auth->is_admin()):?>
                    <div class="form-group">
                        <label for="post_status">Status</label>
                        <?php
                            echo form_dropdown('status',$post_status,set_value('status'),array('class' => 'form-control'));
                        ?>
                    </div>
                    <?php endif;?>
                    <div class="form-group">
                        <label for="post_status">Categories</label>
                        <?php
                            echo form_dropdown('category[]',$categories,null,array('class' => 'select2 form-control','multiple' => true));
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="post_status">Tags</label>
                        <?php
                            echo form_dropdown('tag[]',$tags,null,array('class' => 'select2-tags form-control','multiple' => true));
                        ?>
                    </div>
                    
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button> 
                    <button type="button" class="btn btn-default" onclick="javascript:history.back()">Back</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="assetsModal" tabindex="-1" role="dialog" aria-labelledby="assetsModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="assetsModalLabel">Assets Manager</h4>
      </div>
        <div class="modal-body">
            <div class="row">
            <ul class="thumbnails padding-top list-unstyled" id="assetsList">

            </ul>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
  </div>
</div>
<!-- Line Control WYSIWYG -->
<script src="<?php echo base_url();?>assets/plugins/line_control_editor/editor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("button:submit").click(function(){
        $('.txteditor').text($('.txteditor').Editor("getText"));
    });

    var editor = $(".txteditor").Editor();
    $('.txteditor').Editor("setText", "<?php echo !empty($post['body']) ? addslashes($post['body']) :'';?>");        
})
    
</script>










                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        
        <!-- Morris.js charts belum -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?=base_url('assets/');?>js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline belum -->
        <script src="<?=base_url('assets/');?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap belum -->
        <script src="<?=base_url('assets/');?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar belum -->
        <script src="<?=base_url('assets/');?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart belum -->
        <script src="<?=base_url('assets/');?>js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker belum -->
        <script src="<?=base_url('assets/');?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 belum -->
        <script src="<?=base_url('assets/');?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck belum -->
        <script src="<?=base_url('assets/');?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- Bootstrap Datepicker belum -->
        <script src="<?=base_url('assets/');?>plugins/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
<script src="<?=base_url('assets/');?>dist/js/app.min.js"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) belum -->
        <script src="<?=base_url('assets/');?>js/AdminLTE/dashboard.js" type="text/javascript"></script>   

        <!-- Select2 belum -->
        <script src="<?=base_url('assets/');?>plugins/select2/js/select2.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.datepicker').datepicker();
                $('.select2').select2();
                $(".select2-tags").select2({
                  tags: true
                })
            })
        </script>

    </body>
</html>