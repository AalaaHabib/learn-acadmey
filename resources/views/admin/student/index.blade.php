@extends('admin.layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Admin<span>\</span>Students</h4>
    <a class="btn btn-primary" href="{{url('admin/student/create')}}">Add Student</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Speciality</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        @if($student->spec !== Null)
                            {{$student->spec}}
                        @else
                            Not Exist    
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/student/edit' , $student->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{url('admin/student/delete' , $student->id)}}">Delete</a>
                        <a class="btn btn-info" href="{{url('admin/student/showCourses' , $student->id)}}">ShowCourses</a>
                    </td>
                </tr>
            @endforeach
 
        </tbody>
    </table>

@endsection