<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $this->pageTitle;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <?php include_once "/includes/include-head-libs.php";?>
  </head><?php
  /*==============================================*/
  /* VERIFICA AQUI Y REALIZA LOS CAMBIOS          */
  /*==============================================*/
  $usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  $usuario = $usuarioSession['datausuario'];
  $rol = $usuarioSession['usuario']['ide_rol'];

  /*==============================================*/
  /* VERIFICA HASTA AQUI                          */
  /*==============================================*/
  ?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo Yii::app()->createAbsoluteUrl("/");?>" class="logo"><b>SISMIMA</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <i class="fa fa-flag-o"></i>
                  <span class="label label-danger countAgotados"></span>
                </a>
                <ul class="dropdown-menu" >
                  <li class="header"><span class="countAgotados"></span> Productos Agotados</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" id="ListaProductoAgotados">                      
                    </ul>
                  </li>
                  <!-- <li class="footer"><a href="#">View all</a></li> -->
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=ucwords(strtolower($usuario['des_nombres']))." ".ucwords(strtolower($usuario['des_apepat']))?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?=ucwords(strtolower($usuario['des_nombres']))." ".ucwords(strtolower($usuario['des_apepat']))." ".ucwords(strtolower($usuario['des_apemat']))?> 
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <?php
                    /*==============================================*/
                    /* VERIFICA HASTA AQUI                          */
                    /*==============================================*/
                  ?>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo Yii::app()->createAbsoluteUrl("login/logOut");?>" class="btn btn-default btn-flat">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
       <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <?php
              /*==============================================*/
              /* VERIFICA AQUI Y REALIZA LOS CAMBIOS          */
              /*==============================================*/
            ?>
            <div class="pull-left info">
              <p><?=ucwords(strtolower($usuario['des_nombres']))." ".ucwords(strtolower($usuario['des_apepat']))?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            
          </div>
          <!-- ====================================================================================================================== -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <!-- LISTADO DE MENU POR SISTEMA-->
            <?php 
            $this->widget('zii.widgets.CMenu',array(
              'htmlOptions'=>array('class'=>'sidebar-menu'),
              'submenuHtmlOptions' => array('class' => 'treeview-menu'),
              'encodeLabel' => false,
              'items'=>Yii::app()->listaMenu->listadoPrincipal($rol),
            ));
            ?>
            <?php
              /*==============================================*/
              /* VERIFICA HASTA AQUI                          */
              /*==============================================*/
            ?>
            <!-- /. LISTADO DE MENU -->
          <!-- ====================================================================================================================== -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->moduleTitle;?>
            <small><?php echo $this->moduleSubTitle;?></small>
          </h1>
          <!--ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol-->
          <?php if(isset($this->breadcrumbs)):?>
          <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'htmlOptions'=>array ('class'=>'breadcrumb'),
            'homeLink' => CHtml::link('<i class="fa fa-home"></i> Inicio', Yii::app()->homeUrl),
            'links'=>$this->breadcrumbs,
          )); ?><!-- breadcrumbs -->
        <?php endif?>
        </section>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

        <!-- Main content -->
        <section class="content">
          
          <!--  AQUI VA EL CONTENIDO-->
          <?php echo $content;?>

        </section><!-- /.content -->

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->        
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a onclick="javascript:;">INDES GROUP Solution</a>.</strong> Todos los derechos reservados.
      </footer>
    </div><!-- ./wrapper -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/bootstrap-select.js"></script>
  </body>
</html>