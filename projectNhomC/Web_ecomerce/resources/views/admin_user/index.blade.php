@extends('admin_user.layout_home')
@section('content')
<head>
    <style>
       .table {
    background-color: #e99226; /* Màu nền của bảng */
    border-radius: 10%;
}

.table th,
.table td {
    border-radius: 10%;
    background-color: #a24949; /* Màu nền của các ô trong bảng */
    font-size: 13px;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f1f1f1; /* Màu nền xen kẽ cho các dòng trong bảng */
}

.table-hover tbody tr:hover {
    background-color: #e9ecef; /* Màu nền khi di chuột qua các dòng trong bảng */
}
.table th,
.table td,
.table a {
    color: #ffffff; /* Màu chữ cho các ô và tiêu đề trong bảng */
}
.table a:hover {
    color: #ffff; /* Màu chữ khi rê chuột qua nút */
}
    </style>
</head>
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">

                @if (Session::has('success'))
                    <p class="text-success">
                        {{ Session::get('success') }}
                    </p>
                @else
                    <p class="text-danger">
                        {{ Session::get('failed') }}
                    </p>
                @endif
                <div class="card-body">
                    <div class="card-body">
                        <a href="{{ url('/admin_user/create') }}" class="btn btn-success btn-sm" title="Add User">Add
                            User</a>

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Thao Tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($User as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><img src="{{ asset('images/' . $user->avatar) }}" alt="" with="50px"
                                                    height="50px"></td>

                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                <a href="{{ url('/admin_user/' . $user->id . '/edit') }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ url('admin_user/' . $user->id) }}" accept-charset="UTF-8"
                                                    style="display:inline" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không ?')">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {!! ($User->links()) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
