@extends('admin.layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Admin<span>\</span>Categories</h4>
    <a class="btn btn-primary" href="{{url('admin/category/create')}}">Add Category</a>
</div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/category/edit' , $category->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{url('admin/category/delete' , $category->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection