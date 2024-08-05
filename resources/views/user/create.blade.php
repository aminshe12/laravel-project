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
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input id="inputEmail" name="email" placeholder="This is description..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Password</label>
                            <input type="password" id="inputEmail" name="password" placeholder="8 characters minimum" minlength="8" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form  -->
    <!-- ============================================================== -->
@endsection

