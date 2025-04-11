<!DOCTYPE html>
<html>

<head>
    <title>CRUD Danh Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    /* Tùy chỉnh thanh điều hướng */
    .navbar {
        background-color: #a6e978;
        /* Màu nền */
        border-radius: 5px;
        padding: 10px;
        border: none;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .navbar-brand {
        font-weight: bold;
        color: #212529;
        font-size: 1.5rem;
        /* Độ lớn chữ */
    }

    .navbar-nav .nav-item {
        margin-left: 20px;
    }

    .navbar-nav .nav-link {
        color: #212529;
        font-weight: bold;
    }

    .navbar-toggler-icon {
        color: #212529;
    }

    /*
    /* Form tìm kiếm */

    .d-flex {
        margin-left: auto;
        display: flex;
        align-items: center;
        margin-right: 10px;
        border: none;
        color: #e0868b;
        font-weight: bold;

    }

    .btn-outline-success {
        align-items: center;
        margin-right: 10px;
        font-weight: bold;
        margin-left: auto;
    }

    .d-flex {
        margin-left: 30px;
    }

    .form-control {
        border-radius: 10px;
        /* Bo góc */
    }

    .nav-link {
        color: #f13602;
    }
    .navbar-nav {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */

}

    .nav-item {
        align-items: center;
    }

    .search-form input[type="search"] {
        width: 200px;
        margin-right: 10px;
        border-radius: 5px;
    }

    .bottom-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        z-index: 9999;
    }

    /* .bottom-button:hover {
        background-color: #0056b3;

    } */

    .nav-item:hover {
        background-color: #007bff;
        border-radius: 10%;

    }

    /* Nút đăng xuất */
    .logout-btn {
        width: 100px;
        margin-right: 10px;
        background: #f13602;
        font-weight: bold;
        border-radius: 5px;
        right: 20px;
        position: absolute;
        /* Đảm bảo nút button không di chuyển khi cuộn trang */
        bottom: 20px;
        padding: 5px;
        border: none;
    }

    .logout-btn:hover {
        background-color: #0056b3;
        /* Màu nền khi di chuột qua */
    }
    body{
         background-color: #4098b1ad;
    }


</style>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Quản Lý </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_product.trangchu') }}">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_product.index') }}">Danh mục sản phẩm</a>
                        </li>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_category.index') }}">Danh mục logo</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin_user') }}">User</a>
                        </li>

                        <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>

                        </form> -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="logout-btn " type="submit"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Đăng Xuất') }}
                            </button>
                        </form>
                    </ul>

                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    </div>

</body>

</html>
