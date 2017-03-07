<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php $title = isset($title) ? $title : "Sistema" ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />


        <!--<script src="<?php echo URL_JS; ?>jquery-1.83.min.js"></script>-->
        <!-- Core stylesheets do not remove -->
        <link href="<?php echo URL_CSS; ?>bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_CSS; ?>bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_CSS; ?>supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL_CSS; ?>icons.css" rel="stylesheet" type="text/css" />

        <!-- Plugins stylesheets -->
        <link href="<?php echo URL_PLU; ?>misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_PLU; ?>misc/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_PLU; ?>misc/search/tipuesearch.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo URL_PLU; ?>forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
        <!--<link href="<?php echo URL_PLU; ?>forms/select/select2.css" type="text/css" rel="stylesheet" />-->
        <!--<link href="<?php echo URL_PLU; ?>tables/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />-->

        <!-- Main stylesheets -->
        <link href="<?php echo URL_CSS; ?>main.css" rel="stylesheet" type="text/css" /> 
        <link href="<?php echo URL_CSS; ?>cssGeneral.css" rel="stylesheet" type="text/css" /> 

        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="<?php echo URL_CSS; ?>custom.css" rel="stylesheet" type="text/css" /> 



        <!-- Validate para Formularios -->
<!--        <link href='<?php echo URL_PLU; ?>forms/validate/validate.css' rel="stylesheet" />
        <script src='<?php echo URL_PLU; ?>forms/validate/jquery.validate.js' type="text/javascript"></script>        

        <script src="<?php echo URL_JS; ?>jsGeneral.js" type="text/javascript"  charset=UTF-8"></script>
        <script src="<?php echo URL_JS; ?>jsValidacionGeneral.js" type="text/javascript" charset=UTF-8"></script>

        <link href="<?php echo URL_PLU; ?>plugins/misc/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
        <script src="<?php echo URL_PLU; ?>plugins/misc/pnotify/jquery.pnotify.min.js" type="text/javascript" ></script>

        <link href="<?php echo URL_PLU; ?>plugins/forms/color-picker/color-picker.css" type="text/css" rel="stylesheet" />
        <script src="<?php echo URL_PLU; ?>plugins/forms/color-picker/colorpicker.js" type="text/javascript" ></script>

        <script src="<?php echo URL_PLU; ?>plugins/forms/timeentry/jquery.timeentry.min.js" type="text/javascript" ></script>

        <script src="<?php echo URL_JS; ?>cargaInicio.js" type="text/javascript" ></script>

        <link href="<?php echo URL_CSS; ?>miCss/main.css" rel="stylesheet" type="text/css" />-->
        <script src="<?php echo URL_JS; ?>libs/modernizr.js" type="text/javascript" ></script>

        <script src="<?php echo URL_JS; ?>jquery.min.js" type="text/javascript" ></script>
        <script src="<?php echo URL_JS; ?>jquery-ui.min.js" type="text/javascript" ></script>
        <script src="<?php echo URL_JS; ?>jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="<?php echo URL_JS; ?>bootstrap/bootstrap.js" type="text/javascript" ></script>  
        <script src="<?php echo URL_JS; ?>jquery.mousewheel.js" type="text/javascript"></script>
        <script src="<?php echo URL_JS; ?>libs/jRespond.min.js"type="text/javascript"></script>
        <link href="<?php echo URL_PLU; ?>misc/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
        <script src="<?php echo URL_PLU; ?>misc/pnotify/jquery.pnotify.min.js" type="text/javascript"></script>
        <link href='<?php echo URL_PLU; ?>forms/validate/validate.css' rel="stylesheet" />
        <script src="<?php echo URL_PLU; ?>forms/validate/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo URL_PLU; ?>forms/validate/localization/messages_es.js" type="text/javascript" ></script>
        
        <script type="text/javascript">
            //adding load class to body and hide page
            document.documentElement.className += 'loadstate';
        </script>
        <script type="text/javascript">
            var txt=" ..::<?php echo $title; ?>::.. ";
            var espera=200;
            var refresco=null;
            function rotulo_title() {
                document.title=txt;
                txt=txt.substring(1,txt.length)+txt.charAt(0);
                refresco=setTimeout("rotulo_title()",espera);
            }
            rotulo_title();
        </script>
    </head>

    <body>
        <!-- loading animation -->
        <div id="qLoverlay"></div>
        <div id="qLbar"></div>

        <div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo URL_DASHBOARD; ?>">Supr.<span class="slogan">admin</span></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon16 icomoon-icon-arrow-4"></span>
                    </button>
                </div> 
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?php echo URL_DASHBOARD; ?>"><span class="icon16 icomoon-icon-screen-2"></span> <span class="txt">Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-envelop"></span><span class="txt">Messages</span><span class="notification">8</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="messages">    
                                        <li class="header"><strong>Messages</strong> (10) emails and (2) PM</li>
                                        <li>
                                            <span class="icon"><span class="icon16 icomoon-icon-user-plus"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Sammy Morerira</strong></a><span class="time">35 min ago</span></span>
                                            <span class="msg">I have question about new function ...</span>
                                        </li>
                                        <li>
                                            <span class="icon avatar"><img src="<?php echo URL_IMG; ?>avatar.jpg" alt="" /></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>George Michael</strong></a><span class="time">1 hour ago</span></span>
                                            <span class="msg">I need to meet you urgent please call me ...</span>
                                        </li>
                                        <li>
                                            <span class="icon"><span class="icon16 icomoon-icon-envelop"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Ivanovich</strong></a><span class="time">1 day ago</span></span>
                                            <span class="msg">I send you my suggestion, please look and ...</span>
                                        </li>
                                        <li class="view-all"><a href="#">View all messages <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-bell"></span><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-user-plus"></span></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-bubble-3"></span></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-new"></span></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo URL_IMG; ?>avatar_sara.jpg" alt="" class="image" /> 
                                <span class="txt"><?php echo $this->session->userdata('Nombres'); ?></span>
                                <b class="caret"></b>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>usuario/logout"><span class="icon16 icomoon-icon-exit"></span><span class="txt">Salir</span></a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </nav><!-- /navbar --> 

        </div><!-- End #header -->





        <div id="wrapper">

            <!--Responsive navigation button-->  
            <div class="resBtn">
                <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
            </div>

            <!--Left Sidebar collapse button-->  
            <div class="collapseBtn leftbar">
                <a href="#" class="tipR" title="Ocultar Menu"><span class="icon12 minia-icon-layout"></span></a>
            </div>

            <!--Sidebar background-->
            <div id="sidebarbg"></div>
            <!--Sidebar content-->
            <div id="sidebar">

                <div class="shortcuts">
                    <ul>
                        <li><a href="#" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                        <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                        <li><a href="#" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>
                        <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                    </ul>
                </div><!-- End search -->            

                <div class="sidenav">

                    <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                        <h5 class="title" style="margin-bottom:0">Ocultar Menu</h5>
                    </div><!-- End .sidenav-widget -->

                    <div class="mainnav">
                        <ul>
                            <!--
                            <li>
                                <a href="#"><span class="icon16 icomoon-icon-folder"></span>Other pages<span class="notification blue">11</span></a>
                                <ul class="sub">
                                    <li><a href="invoice.html"><span class="icon16 icomoon-icon-file"></span>Invoice page</a></li>
                                    <li><a href="profile.html"><span class="icon16 icomoon-icon-file"></span>User profile</a></li>
                                    <li><a href="search.html"><span class="icon16 icomoon-icon-search-3"></span>Search page</a></li>
                                    <li><a href="email.html"><span class="icon16 icomoon-icon-envelop"></span>Email page</a></li>
                                    <li><a href="support.html"><span class="icon16  icomoon-icon-support"></span>Support page</a></li>
                                    <li><a href="faq.html"><span class="icon16 icomoon-icon-attachment"></span>FAQ page</a></li>
                                    <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                    <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                    <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    <li><a href="two-sidebars.html"><span class="icon16 icomoon-icon-file"></span>Two sidebars</a></li>
                                    <li><a href="drag.html"><span class="icon16 icomoon-icon-move"></span>Drag &amp; Drop <span class="notification red">new</span></a></li>
                                </ul>
                            </li>
                            -->
                            <?php
                            $opciones = $this->loaders->get_menu();
                            // print_p($opciones);
                            $count = count($opciones);
                            for ($i = 0; $i < $count; $i++) {
                                // $OptSubmenu = ( !isset($opciones[$i]["active"])  ?"none":"block" );
                                $SubMenu = ( ( $opciones[$i]["active"] === 'block' ) ? " hasUl drop" : "" );
                                ?>
                                <li>
                                    <a href="#" class="<?php echo $SubMenu; ?> ">
                                        <span class="icon16 <?php echo $opciones[$i]["icon"]; ?>"></span>
                                    <?php echo $opciones[$i]["menu"]; ?>
                                    </a>
                                    <?php
                                    $count2 = count($opciones[$i]["datos"]);
                                    ?>
                                    <ul class="sub" style="display:<?php echo $opciones[$i]["active"]; ?>;">
                                        <?php for ($j = 0; $j < $count2; $j++) { ?>                             
                                            <li>
                                                <a href="<?php echo $opciones[$i]["datos"][$j]["url"]; ?>">
                                                    <span class="icon16 icomoon-icon-arrow-right-2" ></span>
                                                    <?php echo $opciones[$i]["datos"][$j]["value"]; ?>
                                                </a>
                                            </li>
                                        <?php }
                                        ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div><!-- End sidenav -->

                <div class="sidebar-widget">
                    <h5 class="title">Monthly Bandwidth Transfer</h5>
                    <div class="content">
                        <span class="icon16 icomoon-icon-loop left"></span>
                        <div class="progress progress-mini left tip" title="87%">
                            <div class="progress-bar progress-bar-danger" style="width: 87%;"></div>
                        </div>
                        <span class="percent">87%</span>
                        <div class="stat">19419.94 / 12000 MB</div>
                    </div>

                </div><!-- End .sidenav-widget -->

                <div class="sidebar-widget">
                    <h5 class="title">Disk Space Usage</h5>
                    <div class="content">
                        <span class="icon16  icomoon-icon-storage-2 left"></span>
                        <div class="progress progress-mini left tip" title="16%">
                            <div class="progress-bar progress-bar-success" style="width: 16%;"></div>
                        </div>
                        <span class="percent">16%</span>
                        <div class="stat">304.44 / 8000 MB</div>
                    </div>

                </div><!-- End .sidenav-widget -->

                <div class="sidebar-widget">
                    <h5 class="title">Ad sense stats</h5>
                    <div class="content">

                        <div class="stats">
                            <div class="item">
                                <div class="head clearfix">
                                    <div class="txt">Advert View</div>
                                </div>
                                <span class="icon16 icomoon-icon-eye left"></span>
                                <div class="number">21,501</div>
                                <div class="change">
                                    <span class="icon24 icomoon-icon-arrow-up-2 green"></span>
                                    5%
                                </div>
                                <span id="stat1" class="spark"></span>
                            </div>
                            <div class="item">
                                <div class="head clearfix">
                                    <div class="txt">Clicks</div>
                                </div>
                                <span class="icon16 icomoon-icon-thumbs-up left"></span>
                                <div class="number">308</div>
                                <div class="change">
                                    <span class="icon24 icomoon-icon-arrow-down-2 red"></span>
                                    8%
                                </div>
                                <span id="stat2" class="spark"></span>
                            </div>
                            <div class="item">
                                <div class="head clearfix">
                                    <div class="txt">Page CTR</div>
                                </div>
                                <span class="icon16 icomoon-icon-heart left"></span>
                                <div class="number">4%</div>
                                <div class="change">
                                    <span class="icon24 icomoon-icon-arrow-down-2 red"></span>
                                    1%
                                </div>
                                <span id="stat3" class="spark"></span>
                            </div>
                            <div class="item">
                                <div class="head clearfix">
                                    <div class="txt">Earn money</div>
                                </div>
                                <span class="icon16 icomoon-icon-coin left"></span>
                                <div class="number">$376</div>
                                <div class="change">
                                    <span class="icon24 icomoon-icon-arrow-up-2 green"></span>
                                    26%
                                </div>
                                <span id="stat4" class="spark"></span>
                            </div>
                        </div>

                    </div>

                </div><!-- End .sidenav-widget -->

                <div class="sidebar-widget">
                    <h5 class="title">Right now</h5>
                    <div class="content">
                        <div class="rightnow">
                            <ul class="list-unstyled">
                                <li><span class="number">34</span><span class="icon16 icomoon-icon-new"></span>Posts</li>
                                <li><span class="number">7</span><span class="icon16 icomoon-icon-file"></span>Pages</li>
                                <li><span class="number">14</span><span class="icon16 icomoon-icon-list-2"></span>Categories</li>
                                <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Tags</li>
                            </ul>
                        </div>
                    </div>

                </div><!-- End .sidenav-widget -->

            </div><!-- End #sidebar -->

            <!--Body content-->
            <div id="content" class="clearfix">
                <div class="contentwrapper"><!--Content wrapper-->

                    <div class="heading">

                        <h3>Dashboard</h3>                    



                        <ul class="breadcrumb">
                            <li>Tu te encuentras Aquí:</li>
                            <li>
                                <a href="#" class="tip" title="back to dashboard">
                                    <span class="icon16 icomoon-icon-screen-2"></span>
                                </a> 
                                <span class="divider">
                                    <span class="icon16 icomoon-icon-arrow-right-3"></span>
                                </span>
                            </li>
                            <!--<li class="active">Dashboard</li>-->
                            <li class="active"> 
                                <?php $modul = $this->uri->segment(1);
                                echo ucwords(strtolower(isset($modul) ? $modul : "-" )); ?>
                            </li>
                        </ul>

                    </div><!-- End .heading-->
