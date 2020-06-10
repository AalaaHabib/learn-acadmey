@extends('user.layout.master')

@section('content')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Courses</h2>
                        <p>Home<span>/</span>Courses<span>/</span>{{$category->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
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
                
                <div class="d-flex justify-content-center mb-5  w-100 ">
                    {!! $courses->render() !!}
                </div>    

            </div>
        </div>
    </section>
    <!--::blog_part end::-->




@endsection