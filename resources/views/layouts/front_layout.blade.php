<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$settings->site_name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('app/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('app/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('app/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('app/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('app/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('app/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/style.css')}}">
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="colorlib-active"><a href="{{route('index')}}">Home</a></li>
                </ul>
            </nav>

            <div class="colorlib-footer">
                <p class="pfooter">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script>
                    Eng.Ahmad Marouf<br>
                    Email : {{$settings->contact_email}}<br>
                    Phone : {{$settings->contact_phone}}<br>
                    Address : {{$settings->address}}
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </aside> <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-xl-8 py-5 px-md-5">
                            <div class="row pt-md-4">
                                @yield('content')  
                            </div><!-- END-->
                        </div>
                        <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
                            <div class="sidebar-box pt-md-4">
                                <form action="{{route('search')}}" method="GET" class="search-form">
                                    <div class="form-group">
                                        <span class="icon icon-search"></span>
                                        <input type="text" name="keyword" class="form-control" placeholder="Type a keyword and hit enter">
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Categories</h3>
                                <ul class="categories">
                                    @foreach($categories as $category)
                                    <li><a href="{{route('category',['slug'=>$category->slug])}}">{{$category->name}} <span>( {{$category->posts->count()}} )</span></a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Popular Articles</h3>
                                <div class="block-21 mb-4 d-flex">
                                    <a class="blog-img mr-4" style="background-image: url({{asset('app/images/image_1.jpg')}});"></a>
                                    <div class="text">
                                        <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                                        <div class="meta">
                                            <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                            <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                        </div>
                                    </div>
                                </div>  
                            </div> -->

                            <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Tag Cloud</h3>
                                <ul class="tagcloud">
                                    @foreach($tags as $tag)
                                    <a href="{{route('tag',['slug'=>$tag->slug])}}" class="tag-cloud-link">{{$tag->tag}}</a>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Archives</h3>
                                <ul class="categories">
                                    <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
                                </ul>
                            </div> -->

                        </div><!-- END COL -->
                    </div>
                </div>
            </section>
        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

    <script src="{{asset('app/js/jquery.min.js')}}"></script>
    <script src="{{asset('app/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('app/js/popper.min.js')}}"></script>
    <script src="{{asset('app/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('app/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('app/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('app/js/aos.js')}}"></script>
    <script src="{{asset('app/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('app/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('app/js/google-map.js')}}"></script>
    <script src="{{asset('app/js/main.js')}}"></script>

</body>

</html>