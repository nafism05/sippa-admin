<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($header);?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-motorcycle" aria-hidden="true"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admine</b>mbahmu</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url($avatar).$user_info->avatar;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user_info->first_name.' '.$user_info->last_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url($avatar).$user_info->avatar;?>" class="img-circle" alt="User Image">

                <p>
                  <?=$user_info->first_name.' '.$user_info->last_name; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url($logout);?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url($avatar).$user_info->avatar;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$user_info->first_name.' '.$user_info->last_name; ?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!-- <li class="header">MAIN NAVIGATION</li> -->

        <li class="<?php if($active=='dashboard'){echo 'active';}?>">
          <a href="<?php echo base_url();?>admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="<?php if($active=='berita'){echo 'active';}?>">
          <a href="<?php echo base_url($berita);?>">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
          </a>
        </li>

        <li class="<?php if($active=='users'){echo 'active';}?>">
          <a href="<?php echo base_url($users_p);?>">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $headline;?>
      </h1>
      <ol class="breadcrumb">
        <?php echo $breadcrumb;?>        
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- tabel artikel -->
      <div class="row">
        <div class="col-xs-12">
          <?php $this->load->view($include);?>
        </div>
          
      </div>
      <!-- /.row (tabel artikel) -->

    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->


<?php $this->load->view($footer);?>