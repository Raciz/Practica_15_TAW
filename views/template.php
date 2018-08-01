<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
?>

<?php
if(!empty($_SESSION["nombre"]))
{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>CAI</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="views/media/images/favicon.ico">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="views/media/plugins/morris/morris.css">

        <!-- Bootstrap core CSS -->
        <link href="views/media/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="views/media/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="views/media/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="views/media/css/style.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="views/media/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="views/media/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="views/media/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="views/media/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="views/media/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="views/media/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="views/media/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- Plugins css-->
        <link href="views/media/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link rel="stylesheet" href="views/media/plugins/switchery/switchery.min.css">
        <link href="views/media/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="views/media/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="views/media/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="views/media/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="views/media/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="views/media/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Summernote css -->
        <link href="views/media/plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Sweet Alert -->
        <link href="views/media/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <script src="views/media/plugins/sweet-alert2/sweetalert2.min.js"></script>
    </head>
    <body>

        <div id="page-wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <a href="index.php?section=dashboard" class="logo">
                            <img src="views/media/images/logo.png" alt="logo" class="logo-lg" />
                        </a>
                    </div>
                </div>

                <!-- Top navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">

                            <!-- Mobile menu button -->
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile visible-xs visible-sm">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <!-- Top nav left menu -->
                            <?php
                            if($_SESSION["tipo"]=="Administrator")
                            {
                            ?>
                            <ul class="nav navbar-nav hidden-sm hidden-xs top-navbar-items">
                               <!-- <li><a href="#" style="color: #fff">About</a></li>
                                <li><a href="#" style="color: #fff">Help</a></li>
                                <li><a href="#" style="color: #fff">Contact</a></li>-->
                                <li><a href="index.php?section=dashboard" style="color: #fff">Home</a></li>
                                <li><a href="index.php?section=sessions&action=actual" style="color: #fff">CAI sessions</a></li>
                                <li><a href="index.php?section=record" style="color: #fff">CAI sessions queries</a></li>
                            </ul>
                            <?php
                            }
                            ?>
                            <!-- Top nav Right menu -->
                            <ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">
                               <!-- <li class="dropdown top-menu-item-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle menu-right-item" data-toggle="dropdown" aria-expanded="true">
                                        <i class="mdi mdi-bell text-white"></i> <span class="label label-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu p-0 dropdown-menu-lg">
                                        <!--<li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                        <li class="list-group notification-list" style="height: 267px;">
                                            <div class="slimscroll">
                                                <!-- list item
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left p-r-10">
                                                            <em class="fa fa-diamond bg-primary"></em>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                            <p class="m-0">
                                                                <small>There are new settings available</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- list item
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left p-r-10">
                                                            <em class="fa fa-cog bg-warning"></em>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">New settings</h5>
                                                            <p class="m-0">
                                                                <small>There are new settings available</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- list item
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left p-r-10">
                                                            <em class="fa fa-bell-o bg-custom"></em>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">Updates</h5>
                                                            <p class="m-0">
                                                                <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- list item
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left p-r-10">
                                                            <em class="fa fa-user-plus bg-danger"></em>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">New user registered</h5>
                                                            <p class="m-0">
                                                                <small>You have 10 unread messages</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- list item
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left p-r-10">
                                                            <em class="fa fa-diamond bg-primary"></em>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                            <p class="m-0">
                                                                <small>There are new settings available</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- list item
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left p-r-10">
                                                            <em class="fa fa-cog bg-warning"></em>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="media-heading">New settings</h5>
                                                            <p class="m-0">
                                                                <small>There are new settings available</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <!--<li>
                                        <!--<a href="javascript:void(0);" class="list-group-item text-right">
                                        <!--<small class="font-600">See all notifications</small>
                                        <!--</a>
                                        <!--</li>
                                    </ul>
                                </li>-->

                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true"><img src="views/media/images/users/user1.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10"></i> Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="index.php?section=logout"><i class="ti-power-off m-r-10"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end container -->
                </div> <!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- Page content start -->
            <div class="page-contentbar">
              <!-- Se verifica que la sección no sea la de las sesiones de cai porque esa no lleva menú -->
                <?php if(($_GET["section"] != "sessions") && ($_GET["section"] != "record")): ?>
                  <!--left navigation start-->
                  <aside class="sidebar-navigation">
                      <div class="scrollbar-wrapper">
                          <div>
                              <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                  <i class="mdi mdi-close"></i>
                              </button>
                              <!-- User Detail box -->
                              <div class="user-details">
                                  <div class="pull-left">
                                      <img src="views/media/images/users/user1.png" alt="" class="thumb-md img-circle">
                                  </div>
                                  <div class="user-info">
                                      <a href="#"><?php echo $_SESSION["nombre"]; ?></a>
                                      <p class="text-white m-0"><?php echo $_SESSION["tipo"] ?></p>
                                  </div>
                              </div>
                              <!--- End User Detail box -->

                              <?php
                                require_once("views/modules/menu.php");
                              ?>
                          </div>
                      </div>
                      <!--Scrollbar wrapper-->

                  </aside>
                  <!--left navigation end-->
              <?php endif ?>

                <!-- START PAGE CONTENT -->
                <?php if(($_GET["section"] != "sessions") && ($_GET["section"] != "record")): ?>
                  <div id="page-right-content">
                <?php else: ?>
                  <div id="page-right-content" style="margin-left: -5px !important">
                <?php endif ?>
                    <?php
}
                    ?>
                    <?php
                    //creamos un objeto de mvcController
                    $mvc = new mvcController();
                    //y obtenemos el controlador para el redireccionamiento
                    $mvc -> urlController();
                    ?>
                    <?php
                    if(!empty($_SESSION["nombre"]))
                    {
                    ?>
                    <div class="footer">
                        <div>
                            <strong>Angela Carrizales, Brian Becerra y Francisco Perales</strong> - Copyright &copy; 2018
                        </div>
                    </div> <!-- end footer -->

                </div>
                <!-- End #page-right-content -->

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="views/media/js/jquery-2.1.4.min.js"></script>
        <script src="views/media/js/bootstrap.min.js"></script>
        <script src="views/media/js/metisMenu.min.js"></script>
        <script src="views/media/js/jquery.slimscroll.min.js"></script>

        <script src="views/media/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="views/media/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="views/media/plugins/switchery/switchery.min.js"></script>
        <script type="text/javascript" src="views/media/plugins/parsleyjs/parsley.min.js"></script>
        <script src="views/media/plugins/moment/moment.js"></script>
        <script src="views/media/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="views/media/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="views/media/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="views/media/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="views/media/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="views/media/plugins/summernote/summernote.min.js"></script>

        <!-- Datatable js -->
        <script src="views/media/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="views/media/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="views/media/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="views/media/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="views/media/plugins/datatables/jszip.min.js"></script>
        <script src="views/media/plugins/datatables/pdfmake.min.js"></script>
        <script src="views/media/plugins/datatables/vfs_fonts.js"></script>
        <script src="views/media/plugins/datatables/buttons.html5.min.js"></script>
        <script src="views/media/plugins/datatables/buttons.print.min.js"></script>
        <script src="views/media/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="views/media/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="views/media/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="views/media/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="views/media/plugins/datatables/dataTables.colVis.js"></script>
        <script src="views/media/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="views/media/plugins/select2/js/select2.min.js" type="text/javascript"></script>

        <!--Morris Chart-->
        <script src="views/media/plugins/morris/morris.min.js"></script>
        <script src="views/media/plugins/raphael/raphael-min.js"></script>

        <!-- App Js -->
        <script src="views/media/js/jquery.app.js"></script>

    </body>

    <script type="text/javascript">
        $('#example1').DataTable
        (
            {
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            }
        );

        $('.data').DataTable
        (
            {

                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            }
        );

        $(".select2").select2
        (
            {
                placeholder: "Choose ...",
                allowClear: true
            }
        );
    </script>
    <style>
        .repairtext
        {
            color: #000000;
        }

        span
        {
            color: #000000;
        }
    </style>
</html>
<?php
                    }
?>
