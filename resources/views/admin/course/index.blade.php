@extends('admin.layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Admin<span>\</span>Courses</h4>
    <a class="btn btn-primary" href="{{url('admin/course/create')}}">Add Course</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Desc</th>
            <th scope="col">Content</th>
            <th scope="col">Price</th>
            <th scope="col">Img</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$course->name}}</td>
                    <td>{{$course->desc}}</td>
                    <td>{{$course->content}}</td>
                    <td>{{$course->price}}</td>
                    <td><img class="img-fluid w-20" src="{{asset('assets/uploads/courses/'.$course->img)}}" alt="course"></td>
                    <td>
                        <a class="btn btn-success mb-2" href="{{url('admin/course/edit' , $course->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{url('admin/course/delete' , $course->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection