@extends('layout.app')
<header class=" p-3 mb-3 border-bottom ">
    <div class=" container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <img src="https://static.kfcvietnam.com.vn/images/web/kfc-logo.svg?v=5.0" alt="mdo" width="50" height="50"
                class="rounded-circle ">

            <ul class="nav col-19 col-lg-auto me-lg-auto mb-5 justify-content-center mb-md-0 " id="menu">
                <li><a href="#" class="nav-link px-5 link-secondary  bg-info rounded-pill fw-bold">Thực đơn</a></li>
                <li><a href="#" class="nav-link px-5 link-dark  rounded-pill fw-bold rounded-pill">Khuyến mãi</a>
                </li>
                <li><a href="#" class="nav-link px-5 link-dark   rounded-pill fw-bold rounded-pill">Tin tức</a></li>
                <li><a href="#" class="nav-link px-5 link-dark  rounded-pill fw-bold rounded-pill">Dịch vụ</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="z-index: 100">
                    <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                    <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="{{ route('account-index') }}">Trang cá nhân</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Thoát</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
@include("layout.carousel")
<script>
    menu = document.querySelector("#menu")
        menu.addEventListener("click", function(event) {
            if ((event.target.tagName === 'A' && event.target.parentNode.tagName === 'LI')) {
                // Get the text content of the clicked <li> element
                var clickedItemText = event.target;
                document.querySelector(".bg-info").classList.remove("bg-info")
                clickedItemText.classList.add("bg-info")

            }
        })
</script>