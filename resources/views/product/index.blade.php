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
                    <a href="{{ route('product.create') }}" class="btn btn-warning btn-sm rounded-pill custom-margin-top">create</a>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-center">{{ $product->category ? $product->category->name : 'No Category' }}</td>  {{--What is the problem--}}
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->description }}</td>
                                    <td class="text-center">{{ $product->price }}</td>
                                    <td class="text-center">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 32px; height: auto;">
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-outline-primary mr-2">edit</a>
                                        <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST" class="form-inline m-0">
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
                                <th class="text-center">Category</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Image</th>
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
