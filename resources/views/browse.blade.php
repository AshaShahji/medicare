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


    <!--scholarships starts-->
    <div class ="flat-row popular-course">
        <div class="container">
            <div class="flat-title-section">
                <h1 class="title">Browse Drugs</h1>


                <div class="navbar-search" style="width:60%; margin-top: 10px">
                    <form method="get" action="{{url('search-drug')}}">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="drug_name" placeholder="search by drug name" id="inputSuccess5">
                                </div>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-accent" type="submit">  <i class="fa fa-search"></i> Search</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>


            <div class="flat-course-grid button-right">
                @forelse($drugs as $drug)
                    <div class="flat-course" style="width: 300px !important; margin-right: 5px !important;">
                        <div class="featured-post">
                            <div class="overlay">
                                <div class="link"></div>
                            </div>


                            <a href="{{url('details/'.$drug->id)}}"><img src="{{Storage::url($drug->image_path)}}" alt=""></a>
                        </div><!-- /.featured-post -->

                        <div class="course-content">
                            <h4><a href="{{url('details/'.$drug->id)}}">{{$drug->drug_name}}</a> </h4>

                            {{--<p> &#8358;{{str_limit($drug->)}}</p>--}}

                            <ul class="course-meta desc list">
                                <li>
                                    <h6>€{{$drug->price}}</h6>
                                    <span> Price </span>
                                </li>



                                <li>
                                    <h6><span class="course-time">{{$drug->name}}</span></h6>
                                    <span>Listed by</span>
                                </li>
                            </ul>
                            <a class="btn btn-danger btn-sm" href="{{url('details/'.$drug->id)}}" role="button">View   <span class="ml-3 fa fa-angle-right"></span></a>

                            {{--<button class="btn btn-danger form-">view</button>--}}
                        </div><!-- /.course-content -->
                    </div>
                @empty
                    <div class="well">No drugs available on the site at the moment.</div>
                @endforelse


            </div><!-- /.flat-course grid -->
        </div>
    </div>

    <div class="text-center mb-5">

    </div>
    <!--scholarships ends-->

    <div class="bottom" style="margin-top: 40px !important;">
        <div class="container">

            <div class="row">
                <div class="container-bottom">
                    <div class="copyright">
                        <p>Medicare  © 2018</p>
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