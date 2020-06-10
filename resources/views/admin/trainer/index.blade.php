@extends('admin.layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Admin<span>\</span>Trainers</h4>
    <a class="btn btn-primary" href="{{url('admin/trainer/create')}}">Add Trainer</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Spec</th>
            <th scope="col">Img</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($trainers as $trainer)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$trainer->id}}</td>
                    <td>{{$trainer->name}}</td>
                    <td>
                        @if($trainer->phone !== Null)
                        {{$trainer->phone}}
                        @else
                        Not exist
                        @endif
                    </td>
                    <td>{{$trainer->spec}}</td>
                    <td><img class="img-fluid rounded-circle" src="{{asset('assets/uploads/trainers/'.$trainer->img)}}" alt="trainer"></td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/trainer/edit' , $trainer->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{url('admin/trainer/delete' , $trainer->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection