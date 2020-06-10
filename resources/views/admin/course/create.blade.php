@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/course/store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Category:</label>
            <select class="custom-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Trainer:</label>
            <select class="custom-select" name="trainer_id">
                @foreach ($trainers as $trainer)
                    <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label>Desc:</label>
            <input class="form-control" type="text" name="desc">
        </div>
        <div class="form-group">
            <label>Content:</label>
            <input class="form-control" type="text" name="content">
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input class="form-control" type="text" name="price">
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>
        
        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection