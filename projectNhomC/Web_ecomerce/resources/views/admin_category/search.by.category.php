{{-- resources/views/search_results.blade.php --}}
@extends('admin_category.layout_home')

@section('content')
    <div class="container">
        <h2>Kết quả tìm kiếm</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="{{ asset('img/' . $product->type_logo) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->type_name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
