@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/trainer/update' , $trainer->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" value="{{$trainer->name}}" type="text" name="name">
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input class="form-control" value="{{$trainer->name}}" type="text" name="phone">
        </div>
        <div class="form-group">
            <label>Speciality:</label>
            <input class="form-control" value="{{$trainer->name}}" type="text" name="spec">
        </div>

        <img class="img-fluid my-3" src="{{asset('assets/uploads/trainers/'.$trainer->img)}}" />

        <div class="form-group">
            <label>Image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>

        <input class="btn btn-info" type="submit" value="Update">

    </form>


@endsection