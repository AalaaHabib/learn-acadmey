@extends('user.layout.master')

@section('content')


    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            <p>Home<span>/</span>courses<span>/</span>{{$courseDet->category->name}}<span>/</span>{{$courseDet->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="w-100 img-fluid" src="{{asset('assets/uploads/courses/'.$courseDet->img)}}"  alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">Objectives</h4>
                        <div class="content">
                            {{$courseDet->content}}                       
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">
                                        {{$courseDet->trainer->name}}                       
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>
                                        {{$courseDet->price}}                       
                                    </span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>

                    <h4 class="title">enroll now</h4>
                    <div class="content">
                        <div class="review-top row pt-40">
                            <div class="col-lg-12">
                                <h6 class="mb-15">Provide Your info</h6>
                               
                                @include('user.includes.errors')
                                
                                <form action="{{url('/message/enroll')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="course_id" value="{{$courseDet->id}}">

                                    <div class="form-group">
                                        <label for="my-input">Name:</label>
                                        <input id="my-input" class="form-control" type="text" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Email:</label>
                                        <input id="my-input" class="form-control" type="text" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Speciality:</label>
                                        <input id="my-input" class="form-control" type="text" name="spec">
                                    </div>
    
                                    <input class="btn_1 d-block" type="submit" value="Enroll the course">
                                </form>
                                
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->




@endsection