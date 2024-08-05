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
                    <a href="{{ route('user.create') }}" class="btn btn-warning btn-sm rounded-pill custom-margin-top">create</a>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td>
                                        <input type="checkbox" data-id="{{ $user->id }}" name="status" class="js-switch" {{ $user->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td class="text-center">{{ $user->created_at }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-outline-primary mr-2">edit</a>
                                        <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST" class="form-inline m-0">
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
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
    @push('js')
        <script>
            let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
                let switchery = new Switchery(html,  { size: 'small' });
            });
            $(document).ready(function(){
                $('.js-switch').change(function () {
                    let status = $(this).prop('checked') === true ? 1 : 0;
                    let userId = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '{{ route('user.status', ':id') }}'.replace(':id', userId),
                        data: {'status': status, 'user_id': userId},
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Status Changed Successfully"
                    });
                });
            });
        </script>
    @endpush
@endsection
