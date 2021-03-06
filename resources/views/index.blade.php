
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Medicare</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/stylesheets/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="{{url('')}}/stylesheets/shortcodes.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/stylesheets/mine.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/stylesheets/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/stylesheets/animate.css">
    <link href="{{url('')}}/images/favicon.png" rel="shortcut icon">
</head>
<body class="header-sticky">
<div class="boxed">
    <!-- Header -->
    <header id="header" class="header clearfix">
        <div class="container">
            <div class="header-wrap clearfix">
                <div id="logo" class="logo">
                    <a href="{{url('/')}}" rel="home">
                        <h4>Medicare</h4>
                    </a>
                </div><!-- /.logo -->
                <div class="nav-wrap">
                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
                    <nav id="mainnav" class="mainnav">
                        <ul class="menu">
                            <li><a href="{{url('')}}">Home</a></li>



                            <li ><a href="{{url('browse-drugs')}}">Browse Drugs</a>

                            </li>



                            </li>
                            <li class="has-sub"><a href="">SIGN UP</a>
                                <ul class="submenu">
                                    <li><a href="{{url('register?type=pharmacy')}}">Pharmacy</a></li>
                                    <li><a href="{{url('register?type=patient')}}">Patient</a></li>

                                </ul><!-- /.submenu -->
                            </li>
                            @if(Auth::check())
                                <li><a href="{{url('home')}}" class="">Dashboard</a></li>
                            @else
                                <li><a href="{{url('login')}}" class="btn btn-primary btn-join btn-create">Login</a></li>

                            @endif


                        </ul><!-- /.menu -->
                    </nav><!-- /.mainnav -->
                </div><!-- /.nav-wrap -->

            </div><!-- /.header-inner -->
        </div>
    </header><!-- /.header -->

    <!--banner starts-->
    <div class="jumbotron welcome text-white text-center">
        <h1 style="" class="display-5 text-center mt-5 mb-5">Welcome to Medicare</h1>
        <p class="mt-5 mb-5">
            <a class="btn btn-danger btn-lg" href="{{url('browse-drugs')}}" role="button">Start Searching   <span class="ml-3 fa fa-angle-right"></span></a>
        </p>
    </div>
    <!--banner ends-->








    <!-- Bottom -->
    <div class="bottom" style="margin-top: -67px; background-color: #d9534f;  !important;">
        <div class="container">

            <div class="row">
                <div class="container-bottom">
                    <div class="copyright">
                        <p style="color: #FFF">Medicare Copyright © 2018 </p>
                        <a style="color: #FFF" href="{{url('admin-login')}}">Admin Login</a></p>
                    </div>
                </div><!-- /.container-bottom -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
</div><!-- /. boxed -->


<!-- Javascript -->
<script type="text/javascript" src="{{url('')}}/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/jquery.easing.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/owl.carousel.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/jquery-waypoints.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/jquery-countTo.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/parallax.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/jquery.cookie.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/jquery-validate.js"></script>
<script type="text/javascript" src="{{url('')}}/javascript/main.js"></script>

</body>

</html>