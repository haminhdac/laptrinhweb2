@extends('admin_category.layout_home')

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
    font-size: 18px;
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
                <div class="card-body">
                    <a href="{{ route('admin_category.create') }}" class="btn btn-success btn-sm" title="Add danh muc">Add Danh Mục</a>

                    <form class="d-flex" method="GET" action="#">
                        <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                    </form>
                    <br /><br />


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>type_id</th>
                                    <th>type_name</th>
                                    <th>type_logo</th>
                                    <th>type_idlogo</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->type_id }}</td>
                                        <td>{{ $category->type_name }}</td>
                                        <td><img src="{{ asset('img/' . $category->type_logo) }}" alt="" width="100px" height="100px"></td>
                                        <td>{{ $category->type_idlogo }}</td>
                                        <td>
                                            <a href="{{ route('admin_category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form method="POST" action="{{ route('admin_category.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                         <!-- ( $categories->links())  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

