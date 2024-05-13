<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Book Marketing Wizard (BMW) - <?php echo $__env->yieldContent('title'); ?></title>

    <!--=== CSS ===-->

    <!-- Bootstrap -->
    <link href="<?php echo e(URL::asset('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- Theme -->
    <link href="<?php echo e(URL::asset('assets/css/main.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/css/plugins.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/css/responsive.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/css/basic.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/css/dropzone.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/css/custom.css')); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo e(URL::asset('plugins/fontawesome/css/font-awesome.css')); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/datatables.min.css" />
    <style>
        .navbar-brand img {
            max-width: 20% !important;
        }

        .navbar-brand strong {
            font-size: 13px !important;
        }

        .multichosen-with-scroll {
            overflow-y: auto;
            max-height: 100px;
            padding-right: 0;
        }

        .makepickadate[readonly] {
            cursor: default !important;
        }

        .makepickadate[disabled] {
            cursor: not-allowed !important;
        }
    </style>

    <!--=== JavaScript ===-->

    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/libs/jquery-1.10.2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(URL::asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/libs/lodash.compat.min.js')); ?>"></script>

    <!-- Smartphone Touch Events -->
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/touchpunch/jquery.ui.touch-punch.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/event.swipe/jquery.event.move.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/event.swipe/jquery.event.swipe.js')); ?>"></script>

    <!-- General -->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/libs/breakpoints.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/respond/respond.min.js')); ?>"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/cookie/jquery.cookie.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/slimscroll/jquery.slimscroll.horizontal.min.js')); ?>">
    </script>

    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/daterangepicker/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/blockui/jquery.blockUI.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/pickadate/picker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/pickadate/picker.date.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/pickadate/picker.time.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js')); ?>">
    </script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/fullcalendar/fullcalendar.min.js')); ?>"></script>

    <!-- Noty -->
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/noty/jquery.noty.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/noty/layouts/top.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/noty/layouts/topRight.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/noty/themes/default.js')); ?>"></script>

    <!-- Forms -->
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/uniform/jquery.uniform.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/select2/select2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/fileinput/fileinput.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/bootstrap-inputmask/jquery.inputmask.min.js')); ?>">
    </script>

    <!-- Form Validation -->
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/validation/jquery.validate.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/validation/additional-methods.min.js')); ?>"></script>

    <!-- DataTables -->
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/datatables/jquery.dataTables.1.10.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/datatables/DT_bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('plugins/datatables/responsive/datatables.responsive.js')); ?>">
    </script> <!-- optional -->

    <!-- App -->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/plugins.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/plugins.form-components.js')); ?>"></script>

    <!-- Extras -->
    <script src="<?php echo e(URL::asset('plugins/highcharts/highcharts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('plugins/highcharts/modules/exporting.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js">
    </script>

    <script>
        $(document).ready(function() {
            "use strict";

            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- Demo JS -->
    <script type="text/javascript" src="<?php echo e(URL::asset('assets/js/custom.js')); ?>"></script>

    <script>
        "use strict";
        jQuery(document).ready(function($) {

            $.extend($.validator.defaults, {
                invalidHandler: function(form, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = errors == 1 ?
                            '1 field missing' :
                            errors + ' fields missing.';
                        noty({
                            layout: 'topRight',
                            text: message,
                            type: 'error',
                            timeout: 2000
                        });
                    }
                }
            });

            if ($("#main-form")) {
                $("#main-form").validate();
            }

        });
    </script>

    <?php $__env->startSection('javascript'); ?>

    <?php echo $__env->yieldSection(); ?>

    <?php $__env->startSection('css'); ?>

    <?php echo $__env->yieldSection(); ?>

</head>

<body>
    <!-- Header -->
    <header class="header navbar navbar-fixed-top" role="banner" <?php if (Session::has('new_user')) { ?>
        style="background-color: darkorange">
        <?php } ?>
        <!-- Top Navigation Bar -->
        <div class="container">

            <!-- Only visible on smartphones, menu toggle -->
            <ul class="nav navbar-nav">
                <li class="nav-toggle">
                    <a href="javascript:void(0);" title="">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>

            <!-- Logo -->
            <a class="navbar-brand" href="<?php echo url('/'); ?>">
                <strong>Book Marketing Wizard</strong>
            </a>
            <!-- /logo -->

            <!-- Sidebar Toggler -->
            <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom"
                data-original-title="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <!-- /Sidebar Toggler -->

            <!-- Top Right Menu -->
            <ul class="nav navbar-nav navbar-right">
                <!-- User Login Dropdown -->
                <?php if (Session::has('new_user')) { ?>
                <li class="user" style="padding-top: 8px">
                    <?php echo Form::open(['route' => ['user.quit_view'], 'method' => 'POST', 'class' => 'form-action-buttons']); ?>

                    <button type="submit" class="btn btn-info">Return</button>
                    <?php echo Form::close(); ?>

                </li>
                <?php } ?>
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
                        <i class="fa fa-male" aria-hidden="true"></i>
                        <span class="username">
                            <?php if (Session::has('new_user')) {
                                echo 'Viewing as: ';
                            } ?>
                            <?php echo e(Auth::user()->name); ?>

                        </span>
                        <i class="fa fa-caret-down small" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php $user_url = action('UserController@edit', ['user' => Auth::user()->id]); ?>
                        <li>
                            <a href="<?php echo $user_url; ?>">
                                <i class="icon-user"></i>
                                My Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/logout')); ?>">
                                <i class="icon-key"></i>
                                Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /user login dropdown -->
            </ul>
            <!-- /Top Right Menu -->
        </div>

    </header> <!-- /.header -->

    <div id="preview" style="display: none;">

        <div class="dz-preview dz-file-preview">
            <div class="dz-image">
                <img data-dz-thumbnail />
            </div>

            <div class="dz-details">
                <div class="dz-size">
                    <span data-dz-size></span>
                </div>
                <div class="dz-filename">
                    <span data-dz-name></span>
                </div>
            </div>
            <div class="dz-progress">
                <span class="dz-upload" data-dz-uploadprogress></span>
            </div>
            <div class="dz-error-message">
                <span data-dz-errormessage></span>
            </div>



            <div class="dz-success-mark">

                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>Check</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path
                            d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                            id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475"
                            fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>

            </div>
            <div class="dz-error-mark">

                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>error</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158"
                            fill="#FFFFFF" fill-opacity="0.816519475">
                            <path
                                d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                id="Oval-2" sketch:type="MSShapeGroup"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>

    <div id="container">
        <div id="sidebar" class="sidebar-fixed">
            <div id="sidebar-content">
                <!--=== Navigation ===-->
                <ul id="nav">
                    <?php if(Auth::user()->permission < 5) { ?>

                    <li class="<?php echo Request::is('user*') ? 'current open' : ''; ?>">
                        <a href="javascript:void(0);">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            Administration
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php echo Request::is('user') ? 'current open' : ''; ?>">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Users
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo e(url('/user/create')); ?>">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            New User
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/user')); ?>">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            User List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <?php } ?>

                    <?php if(Auth::user()->permission < 7) { ?>
                    <li class="<?php echo Request::is('serie*') ? 'current open' : ''; ?>">
                        <a href="<?php echo e(url('/')); ?>">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Calendar
                        </a>
                        <a href="javascript:void(0);">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                            Series
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <?php // if(Auth::user()->permission <= 5) {
                            ?>
                            <li class="<?php echo Request::is('serie') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/serie/create')); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Series
                                </a>
                            </li>
                            <? // } ?>
                            <li class="<?php echo Request::is('serie/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/serie')); ?>">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Series List
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo Request::is('book*') ? 'current open' : ''; ?>">
                        <a href="javascript:void(0);">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            Books
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <?php // if(Auth::user()->permission <= 5) {
                            ?>
                            <li class="<?php echo Request::is('book/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/book/create')); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Book
                                </a>
                            </li>
                            <? // } ?>
                            <li class="<?php echo Request::is('book') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/book')); ?>">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Book List
                                </a>
                            </li>
                            <li class="<?php echo Request::is('book/track') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/book/track')); ?>">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Promo Track
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo Request::is('promotion') || Request::is('promotion/create') ? 'current open' : ''; ?>">
                        <a href="javascript:void(0);">
                            <i class="fa fa-cloud" aria-hidden="true"></i>
                            Promotions
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <?php // if(Auth::user()->permission <= 5) {
                            ?>
                            <li class="<?php echo Request::is('promotion/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/promotion/create')); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Promotion
                                </a>
                            </li>
                            <? // } ?>
                            <li class="<?php echo Request::is('promotion') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/promotion')); ?>">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Promotion List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo Request::is('promotionsite*') ? 'current open' : ''; ?>">
                        <a href="javascript:void(0);">
                            <i class="fa fa-cloud" aria-hidden="true"></i>
                            Promotion Sites
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <?php // if(Auth::user()->permission <= 5) {
                            ?>
                            <li class="<?php echo Request::is('promotion/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/promotionsite/create')); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Promotion Site
                                </a>
                            </li>
                            <? // } ?>
                            <li class="<?php echo Request::is('promotionsite') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/promotionsite')); ?>">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Promotion Site List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo Request::is('purchase*') ? 'current open' : ''; ?>">
                        <a href="javascript:void(0);">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            Purchases
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <?php // if(Auth::user()->permission <= 5) {
                            ?>
                            <li class="<?php echo Request::is('purchase/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/purchase/create')); ?>">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Purchase
                                </a>
                            </li>
                            <? // } ?>
                            <li class="<?php echo Request::is('purchase') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/purchase')); ?>">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    Purchase List
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo Request::is('report*') ? 'current open' : ''; ?>">
                        <a href="javascript:void(0);">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                            Reports
                            <!--<span class="label label-info pull-right">6</span>-->
                        </a>
                        <ul class="sub-menu">
                            <?php if(Auth::user()->permission <= 5) { ?>
                            <li class="<?php echo Request::is('report/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/report/bookhistory')); ?>">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    Book History
                                </a>
                            </li>
                            <li class="<?php echo Request::is('report/create') ? 'current open' : ''; ?>">
                                <a href="<?php echo e(url('/report/promotionhistory')); ?>">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    Promotion History
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>

            </div>
            <div id="divider" class="resizeable"></div>
        </div>
        <!-- /Sidebar -->

        <div id="content">
            <div class="container">
                <!-- Breadcrumbs line -->
                <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <!--<li>
                        <i class="icon-home"></i>
                        <a href="index.html">Dashboard</a>
                        </li>
                        <li class="current">
                        <a href="pages_calendar.html" title="">Calendar</a>
                        </li>-->
                    </ul>
                </div>
                <!-- /Breadcrumbs line -->

                <!--=== Page Header ===-->
                <div class="page-header">
                    <div class="page-title">
                        <h3><?php echo $__env->yieldContent('title'); ?></h3>
                        <span><?php echo $__env->yieldContent('subtitle'); ?></span>
                    </div>
                </div>
                <!-- /Page Header -->

                <?php if(session('flash_message')): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-<?php echo e(session('flash_type')); ?>">
                                <?php echo e(session('flash_message')); ?>

                            </p>
                        </div>
                    </div>
                <?php endif; ?>

                <!--=== Page Content ===-->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- /Page Content -->
            </div>
            <!-- /.container -->
        </div>
    </div>

</body>

<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/dropzone.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/dropzone-config.js')); ?>"></script>
<script>
    //JS utils
    //TODO: Move the content to a separate file
    var MAX_ITEMS_PER_PAGE = 50;
    var buildTableOptions = function(fileName, rest = {}) {
        return {
            dom: 'Bt',
            pageLength: MAX_ITEMS_PER_PAGE,
            ordering: false,
            buttons: [{
                    extend: 'copy',
                    text: 'Copiar'
                },
                {
                    extend: 'excel',
                    title: fileName
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                },
            ],
            ...rest
        };
    };
    jQuery('.makepickadate').mousedown(e => e.preventDefault());
    jQuery('.makepickadate').pickadate({
        format: 'mm/dd/yyyy'
    });
</script>

</html>
<?php /**PATH /home/authorsxp/bmw/resources/views/layouts/master.blade.php ENDPATH**/ ?>