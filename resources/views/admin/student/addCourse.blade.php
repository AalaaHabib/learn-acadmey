@extends('admin.layout.master')

@section('content')

    @include('admin.includes.errors')

    <form action="{{url('/admin/student/'.$student_id.'/storeCourse')}}" method="post">
        @csrf

        <div class="form-group">
            <label>Courses:</label>
            <select class="custom-select" name="course_id">
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>
        

        <input class="btn btn-info" type="submit" value="Add Course">

    </form>


@endsection