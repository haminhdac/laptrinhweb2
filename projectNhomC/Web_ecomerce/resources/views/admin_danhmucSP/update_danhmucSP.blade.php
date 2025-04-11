@extends('admin_danhmucSP.layout_home')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Sửa Danh Mục</div>
  <div class="card-body">

    <form action="{{ route('admin_danhmucSP.update', ['id' =>  $categori->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ame"> Tên Danh Mục :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $dmsp->name }}" required>
        </div>


        <button type="submit" class="btn btn-success">Sửa Danh mục</button>
    </form>

  </div>
</div>
@endsection
