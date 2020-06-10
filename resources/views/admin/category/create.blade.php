@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/category/store')}}" method="post">
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="name">
        </div>

        <input class="btn btn-info" type="submit" value="Create">

    </form>


@endsection