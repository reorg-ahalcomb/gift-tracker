<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>
        @section('full_title')
        @yield('title', 'Basic Page') | Gift Tracker
        @show
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />


        @section('styles')
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/template/font-awesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/template/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/template/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/template/uniform/uniform.default.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/template/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @show
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('css/template/components-md.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('css/template/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('css/template/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/template/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('css/template/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" /> </head>

    <!-- END HEAD -->

    <body class="page-container-bg-solid page-boxed page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ url('/') }}">
                            <i class="fa fa-gift"></i> Gift Tracker
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">

                    @include('components.menu')

                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                            @yield('page_title')
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->


                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            @yield('breadcrumbs')
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            @yield('content')
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->

        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
            <div class="container"> 2016 &copy; Gift Tracker App by Njong Abang.
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->

        @section('plugins')
        <!--[if lt IE 9]>
        <script src="{{ asset('js/template/jquery/respond.min.js') }}"></script>
        <script src="{{ asset('js/template/jquery/excanvas.min.js') }}"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ asset('js/template/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @show
        <!-- END PAGE LEVEL PLUGINS -->

        @section('scripts')
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('js/template/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @show
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('js/template/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/template/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
    </body>

</html>