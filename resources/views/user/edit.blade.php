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
                    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" type="text" value="{{ $user->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input id="inputEmail" name="email" value="{{ $user->email }}" placeholder="!!!" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Password</label>
                            <input id="inputEmail" name="password" value="{{ $user->password }}" placeholder="!!!..." class="form-control">
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

