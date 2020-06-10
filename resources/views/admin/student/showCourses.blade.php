@extends('admin.layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Admin<span>\</span>ShowCourses</h4>
    <a class="btn btn-info" href="{{url('admin/student/'.$student_id.'/addCourse')}}">Add To Course</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Course Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$course->name}}</td>
                    <td>{{$course->pivot->stats}}</td>
                    <td>
                        @if($course->pivot->stats !== 'approve')
                            <a class="btn btn-success" href="{{url('admin/student/'.$student_id.'/Courses/'.$course->id.'/approve')}}">Approve</a>
                        @endif

                        @if($course->pivot->stats !== 'reject')
                            <a class="btn btn-danger" href="{{url('admin/student/'.$student_id.'/Courses/'.$course->id.'/reject')}}">Reject</a>
                        @endif

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection