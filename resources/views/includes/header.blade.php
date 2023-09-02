<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DBBL OMS</title>

    {{-- STYLE CSS LINK --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('') }}css/style.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}css/form.css" type="text/css" />

    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.summer.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.fresh.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.light.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.ui-sunny.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}jqwidgets/styles/jqx.darkblue.css" type="text/css" />

    <link rel="stylesheet" href="{{ asset('') }}css/multiple-select.css" type="text/css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/ionicons.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/linearicons.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/open-iconic.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/shreerang-material.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="{{ asset('') }}assets/libs/perfect-scrollbar/perfect-scrollbar.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



    {{-- STYLE CSS LINK --}}

    {{-- STYLE JS LINK --}}



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('') }}scripts/simple-chart.js"></script>
    <script type="text/javascript" src="{{ asset('') }}js/moment.js"></script>
    <script type="text/javascript" src="{{ asset('') }}js/rpie.js"></script>
    <script type="text/javascript" src="{{ asset('') }}js/jquery.multiple.select.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxchart.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxexpander.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxvalidator.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxmaskedinput.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxswitchbutton.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxdata.export.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxgrid.export.js"></script>
    <script type="text/javascript" src="{{ asset('') }}scripts/gettheme.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="{{ asset('') }}jqwidgets/jqxtabs.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- STYLE JS LINK --}}


</head>

<body>

    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        <img src="assets/img/logo.png" alt="Brand Logo" class="img-fluid">
                    </span>
                    <a href="/" class="app-brand-text demo sidenav-text font-weight-normal ml-2">EBBL</a>

                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <!-- Dashboards -->
                    <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>

                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item active">
                                <a href="index-2.html" class="sidenav-link">
                                    <div>Default</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <!-- Layouts -->
                    <li class="sidenav-divider mb-1"></li>

                </ul>
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x"
                    id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="index-2.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">

                        <span class="app-brand-text demo font-weight-normal ml-2">Empire</span>
                    </a>




                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center ml-auto">


                            <!-- Divider -->
                            <div
                                class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">
                                |</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        <img src="assets/img/avatars/1.png" alt
                                            class="d-block ui-w-30 rounded-circle">
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">Cindy Deitch</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-user text-muted"></i> &nbsp; My profile</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-mail text-muted"></i> &nbsp; Messages</a>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-settings text-muted"></i> &nbsp; Account settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                </div>
                            </div>



                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">


                        {{-- <h4 class="font-weight-bold py-3 mb-0">Navs & Tabs</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">basic Ui</li>
                                <li class="breadcrumb-item active">Navs & Tabs</li>
                            </ol>
                        </div> --}}



                        @yield('content')


                    </div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    <nav class="layout-footer footer footer-light">
                        <div
                            class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">

                            <div>

                                <table class="table" border="0">
                                    <tr>
                                        <td style="color:#000000">
                                            Millat Hussain (7777777)
                                        </td>
                                        <td style="color:#000000">{{ date('Y-m-d H:i:s') }}<span
                                                id="autotimechange"></span></td>
                                        <td style="color:#000000">Group :add
                                        </td>

                                        <td>
                                            Zone : Dhaka
                                        </td>


                                    </tr>
                                </table>

                            </div>
                            <div class="pt-3">
                                <span class="float-md-right d-none d-lg-block">&copy; Develop By Millat Hussain<i
                                        class="fas fa-heart text-danger mr-2"></i></span>
                            </div>


                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
