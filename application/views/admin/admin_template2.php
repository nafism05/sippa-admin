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
      <span class="logo-lg"><b>Admine</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
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
          <img src="<?php echo base_url($avatar).'100_'.$user_info->avatar;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_info->first_name.' '.$user_info->last_name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> 
        </div>
      </div>
      

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php if($active=='santri'){echo 'active';}?>">
          <a href="<?php echo base_url($index);?>">
            <i class="fa fa-dashboard"></i> <span>Data Santri</span>
          </a>
        </li>

        <!-- <li class="<?php if($active=='berita'){echo 'active';}?>">
          <a href="<?php echo base_url($berita);?>">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
          </a>
        </li> -->
<!-- 
        $user = $this->session->user; -->
        <?php if($this->session->user->group->id != 3) : ?>
        <li class="<?php if($active=='users'){echo 'active';}?>">
          <a href="<?php echo base_url($users_p);?>">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <?php endif; ?>

        <li class="header">ACCOUNT</li>

        <li class="<?php //if($active=='berita'){echo 'active';}?>">
          <a href="<?php echo base_url('login/logout');?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
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
        <?php //echo $breadcrumb;?>        
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