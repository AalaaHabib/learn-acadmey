@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/category/update' , $category->id)}}" method="post">
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" value="{{$category->name}}" type="text" name="name">
        </div>

        <input class="btn btn-info" type="submit" value="Update">

    </form>


@endsection