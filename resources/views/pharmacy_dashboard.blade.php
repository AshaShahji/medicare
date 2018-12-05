<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicare | Patient Dashboard</title>

    <!-- CORE CSS -->
    <link href="{{url('')}}/assets/vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> -->

    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <!-- END CORE CSS -->

    <!-- PAGE CSS -->

    <link href="{{url('')}}/assets/plugins/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/css/slick.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/css/slick-theme.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/css/vegas.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/css/util.css" rel="stylesheet" type="text/css" />


    <!-- END PAGE CSS -->



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- GLOBAL CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/css/responsive.css">

    <!-- END GLOBAL CSS -->


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top navbar-jara nav-user">
    <div class="container">
        <a id="menu-toggle" href="#" class="hidden-sm navbar-toggler dark-toggle btn btn-menu btn-lg toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="navbar-brand" href="{{url('')}}"><h4 style="color: #fff;">Medicare Portal</h4></a>
        <button class="navbar-toggler btn-icon" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-ellipsis-v"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-custom ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="">Manage Drugs Listed</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Subscribed Patients</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">{{$user->name}}</a>
                </li>

            </ul>
        </div>
    </div>
</nav>



<!-- Page Content -->
<div id="wrapper" data-spy="scroll" data-target="#spy" class="">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="">
        <nav id="spy">

            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="{{url('')}}" class="active"> Home</a></li>
                <li class=""><a href=""  class="">My Profile</a></li>
                <li class=""><a href="{{url('logout')}}" class=""> Log Out</a></li>
            </ul>
        </nav>
    </div>
    <!-- Page content -->
    <div id="page-content-wrapper" class="">

        <div class="inset" style="padding-bottom:5px;padding-top:10px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title">
                        <h4>Dashboard</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-content inset">
            <div class="row">
                <div class="col-sm-12 col-lg-9">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="dashboard-content-wrapper">
                                <a href="" class="">
                                    <div class="dashboard-item bg-blue">
                                        <div class="item-name">
                                            <h5 class=""><i class="fa fa-tag"></i> Create new prescription</h5>
                                        </div>
                                        <div class="item-stat">
                                            <div class="stat no-br">

                                                <span class="">Create new</span>
                                            </div>
                                            <!--  <div class="stat">
                                               <p class="stat-count">Bronze</p>
                                               <span class="">8</span>
                                             </div> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>
        <div class="page-content inset">

        </div>
    </div>
</div>








<!-- CORE  JS -->
<script src="https://code.jquery.com/jquery-3.3.0.min.js" integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="{{url('')}}/assets/vendor/js/bootstrap.bundle.min.js"></script>
<!-- END GLOBAL CORE JS -->

<!-- PAGE PLUGINS -->
<script src="{{url('')}}/assets/plugins/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/plugins/js/slick.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/plugins/js/vegas.min.js" type="text/javascript"></script>


<!-- END PAGE PLUGINS -->

<!-- PAGE JS -->
<script src="{{url('')}}/assets/plugins/scripts/components-select2.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/plugins/scripts/slick-custom.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/plugins/scripts/vegas-custom.js" type="text/javascript"></script>


<!-- END PAGE JS -->



<!-- GLOBAL JS -->
<script src="{{url('')}}/assets/js/main.js" type="text/javascript"></script>
<!-- END GLOBAL JS -->



</body>

</html>