@extends('layouts.layout')
@section('content')
    <!-- ============================================================== -->
    <!-- basic form  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Create Category</h3>
                <p style="margin: 15px">Fill in the requested items carefully</p>
            </div>
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Description</label>
                            <input id="inputEmail" name="description" placeholder="This is description..." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
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

