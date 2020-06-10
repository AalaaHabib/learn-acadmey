@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/course/update' , $course->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Category:</label>
            <select class="custom-select" name="category_id">
                @foreach ($categories as $category)
                    <option @if($course->category_id == $category->id) selected @endif
                    value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Trainer:</label>
            <select class="custom-select" name="trainer_id">
                @foreach ($trainers as $trainer)
                    <option @if($course->trainer_id == $trainer->id) selected @endif
                    value="{{$trainer->id}}">{{$trainer->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" value="{{$course->name}}" type="text" name="name">
        </div>
        <div class="form-group">
            <label>Desc:</label>
            <input class="form-control" value="{{$course->desc}}" type="text" name="desc">
        </div>
        <div class="form-group">
            <label>Content:</label>
            <textarea class="form-control" name="content" rows="6">{{$course->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input class="form-control" value="{{$course->price}}" type="text" name="price">
        </div>

        <img class="img-fluid my-3" src="{{asset('assets/uploads/courses/'.$course->img)}}" />

        <div class="form-group">
            <label>Image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>

        <input class="btn btn-info" type="submit" value="Update">

    </form>


@endsection