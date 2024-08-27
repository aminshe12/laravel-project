@extends('layouts.layout')
@section('content')
    <!-- ============================================================== -->
    <!-- basic form  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Edit Category</h3>
                <p style="margin: 15px">Only the items you want to edit</p>
            </div>
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">
                    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" type="text" value="{{ $category->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Description</label>
                            <input id="inputEmail" name="description" value="{{ $category->description }}" placeholder="This is description..." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form  -->
    <!-- ============================================================== -->
@endsection

