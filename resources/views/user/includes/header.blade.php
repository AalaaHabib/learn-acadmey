<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$setting->title}}</title>
    <link rel="icon" href="{{asset('assets/uploads/settings/'.$setting->titleicon)}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu @if(Route::currentRouteName()==('homePage')) home_menu @else single_page_menu @endif">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}"> <img src="{{asset('assets/uploads/settings/'.$setting->logo)}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Courses
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($categories as $category)
                                        <a class="dropdown-item" href="{{url('/user/courses/cat',$category->id)}}">{{$category->name}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{url('/user/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

