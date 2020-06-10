@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/trainer/store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input class="form-control" type="text" name="phone">
        </div>
        <div class="form-group">
            <label>Speciality:</label>
            <input class="form-control" type="text" name="spec">
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input class="form-control-file" type="file" name="img">
        </div>
        
        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection