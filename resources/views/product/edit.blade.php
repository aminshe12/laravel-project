@extends('layouts.layout')
@section('content')
    <!-- ============================================================== -->
    <!-- basic form  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Basic Form Elements</h3>
                <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>
            </div>
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">
                    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <select name="category_id" id="cars">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" type="text" value="{{ $product->name }}" class="form-control" required>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="inputEmail">Description</label>
                            <input id="inputEmail" name="description" value="{{ $product->description }}" placeholder="This is description..." class="form-control">
                        </div>
                        @error('Description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="inputEmail">Price</label>
                            <input id="inputEmail" name="price" value="{{ $product->price }}" placeholder="Enter the price...!" class="form-control">
                        </div>
                        @error('Price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form  -->
    <!-- ============================================================== -->
@endsection

