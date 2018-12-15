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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
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


    <section class="main-content blog-posts course-single" style="padding: 0px 0 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-title-single">
                        <h1 class="bold">{{$drugs[0]->drug_name}}</h1>


                        <div class="course-widget-price">

                            <div class="feature-post">
                                <img src="{{Storage::url($drugs[0]->image_path)}}" alt="image">
                            </div><!-- /.feature-post -->
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span> Store: </span>
                                    <span class="time">{{$drugs[0]->name}}</span>
                                </li>

                                <li>
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                    <span>Price</span>
                                    <span class="time">€{{$drugs[0]->price}}</span>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>Expiry Date</span>
                                    <span class="time">{{$drugs[0]->expiry_date}}</span>
                                </li>
                                <li>
                                    <div class="well">You can book this drug by making payment online and just walk in to the store at your convenience to pick up</div>

                                </li>

                                @if(Auth::check())
                                    <li>
                                        <p>
                                        <div id="paypal-button"></div>
                                        <p>
                                    </li>
                                @else
                                    <li>
                                    <li><a href="{{url('login')}}" class="btn btn-primary btn-join btn-create">Login to purchase</a></li>

                                    </li>
                                @endif



                            </ul>
                        </div>
                        <div class="entry-content">
                            <h4 class="title-1 bold">Dosage Description</h4>
                            {!! $drugs[0]->dosage !!}

                        </div><!-- /.entry-post -->
                    </div><!-- /.main-post -->
                </div><!-- /col-md-8 -->

            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /main-content -->

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

<script>
    paypal.Button.render({

        env: 'sandbox',
        commit: true,

        payment: function() {
            var CREATE_URL = '{{url('paypal/checkout')}}';
            return paypal.request.post(CREATE_URL)
                .then(function(res) {
                    return res.id;
                });
        },

        onAuthorize: function(data, actions) {
            var EXECUTE_URL = '{{url('paypal/execute')}}';
            var data = {
                paymentID: data.paymentID,
                payerID: data.payerID
            };
            return paypal.request.post(EXECUTE_URL, data)
                .then(function (res) {
                    window.location = "{{url('home?payment=success')}}";

                });
        }

    }, '#paypal-button');
</script>


</body>

</html>