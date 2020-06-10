@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/student/update' , $student->id)}}" method="post">
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input class="form-control" value="{{$student->name}}" type="text" name="name">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" value="{{$student->email}}" type="text" name="email">
        </div>
        <div class="form-group">
            <label>Speciality:</label>
            <input class="form-control" value="{{$student->spec}}" type="text" name="spec">
        </div>

        <input class="btn btn-info" type="submit" value="Update">

    </form>


@endsection