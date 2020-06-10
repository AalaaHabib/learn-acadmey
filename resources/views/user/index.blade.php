@extends('user.layout.master')

@section('content')

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>{{json_decode($banner->content)->title}}</h5>
                            <h1>{{json_decode($banner->content)->subtitle}}</h1>
                            <p>{{json_decode($banner->content)->desc}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- member_counter counter start -->
    <section class="member_counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{$trainers_count}}</span>
                        <h4>All Trainers</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{$students_count}}</span>
                        <h4>All Students</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{$courses_count}}</span>
                        <h4>All Courses</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>{{json_decode($course->content)->title}}</p>
                        <h2>{{json_decode($course->content)->subtitle}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($courses as $course)

                    <div class="col-sm-6 col-lg-4 mb-5">
                        <div class="single_special_cource">
                        <img src="{{asset('assets/uploads/courses/'.$course->img)}}" class="special_img" alt="">
                            <div class="special_cource_text">
                                <a href="{{url('/user/courses/cat',$course->category_id)}}" class="btn_4">{{$course->category->name}}</a>
                                <h4>{{$course->price}}</h4>
                                <a href="{{url('/user/courses/cat/'.$course->category_id.'/course/'.$course->id)}}"><h3>{{$course->name}}</h3></a>
                                <p>{{$course->desc}}</p>
                            </div>

                        </div>
                    </div>

                @endforeach    

            </div>
        </div>
    </section>
    <!--::blog_part end::-->


    <!--::review_part start::-->
    <section class="testimonial_part my-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>{{json_decode($testmonial->content)->title}}</p>
                        <h2>{{json_decode($testmonial->content)->subtitle}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">


                        @foreach($testmonials as $testmonial)    

                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>{{$testmonial->desc}}</p>
                                        <h4>{{$testmonial->name}}</h4>

                                        @if($testmonial->spec !== Null)
                                        <h5>{{$testmonial->spec}}</h5>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset('assets/uploads/testmonials/'.$testmonial->img)}}" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>{{$testmonial->desc}}</p>
                                        <h4>{{$testmonial->name}}</h4>

                                        @if($testmonial->spec !== Null)
                                        <h5>{{$testmonial->spec}}</h5>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset('assets/uploads/testmonials/'.$testmonial->img)}}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--::blog_part end::-->


@endsection