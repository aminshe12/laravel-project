@extends('layouts.layout')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Table</h5>

                <style>
                    .custom-margin-top {
                        margin-top: 20px;
                        margin-left: 30px;
                    }
                </style>

                <form class="d-flex">
                    <a href="{{ route('category.create') }}" class="btn btn-warning btn-sm rounded-pill custom-margin-top">create</a>
                </form>

                {{--                <a href="{{ route('category.create') }}" class="btn btn-outline-success">create</a>--}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->id }}</td>
                                    <td class="text-center">{{ $category->name }}</td>
                                    <td class="text-center">{{ $category->description }}</td>
                                    <td class="text-center">{{ $category->created_at }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-outline-primary mr-2">edit</a>
                                        <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST" class="form-inline m-0">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Settings</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
