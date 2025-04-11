@extends('admin_category.layout_home')
@section('content')

<head>
<style>
        .card {
            border-radius: 30px; /* Bo góc khung */
            border: 5px solid transparent;
            animation: borderAnimation 3s linear infinite;
            position: relative; /* Đặt vị trí tương đối để chứa ngôi sao */
            background-color: #cf544b; /* Đổi màu nền của form */
            padding: 20px; /* Tăng khoảng cách nội dung và viền */
        }

        .card-header {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            position: relative;
            color: white;
            padding: 20px;
        }

        .card-body label {
            font-size: 18px;
            color: white;
        }

        @keyframes borderAnimation {
            0% { border-color: yellow; }
            50% { border-color:blue; }
            100% { border-color:pink; }
        }
    </style>
</head>

<div class="card" style="margin:20px;">
    <div class="card-header">
        Sửa Danh Mục
     
    </div>
    <div class="card-body">
        <form action="{{ route('admin_category.update', ['id' => $category->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"> Tên Danh Mục :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div><br>
            <div class="form-group">
                <label for="type_id"> type_id :</label>
                <input type="text" name="type_id" id="type_id" class="form-control" value="{{ $category->type_id }}"
                    required>
            </div><br>
            <div class="form-group">
                <label for="type_name"> type_name :</label>
                <input type="text" name="type_name" id="type_name" class="form-control"
                    value="{{ $category->type_name }}" required>
            </div><br>
            <div class="form-group">
                <label for="type_logo"> type_logo :</label>
                <input type="text" name="type_logo" id="type_logo" class="form-control"
                    value="{{ $category->type_logo }}" required>
            </div><br>
            <div class="form-group">
                <label for="type_idlogo"> type_idlogo :</label>
                <input type="text" name="type_idlogo" id="type_idlogo" class="form-control"
                    value="{{ $category->type_idlogo }}" required>
            </div>
            <br><br>
            <button type="submit" class="btn btn-success">Sửa Danh mục</button>
        </form>
    </div>
</div>

@endsection
