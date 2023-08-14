<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Giày dép</title>
    <link rel="stylesheet" href="{{ asset('css/headeProduct.css') }}">
</head>

<body>
    <div>
        <div class="container--header--menu">
            <div class="nemu--logo">
                <img class="change--image"
                    src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/slide-img1.jpg?1676651456872"
                    alt="" />
            </div>
            <div class="header--research">
                <form action="" id="search-form">
                    @csrf
                    <input type="text" id="search" name="category">
                    <button class="btn btn-warning" type="submit">Tìm kiếm</button>
                </form>
                <ul id="search-results"></ul>
            </div>
            <div class="menu--tapba">
                <ul class='tapba--word'>
                    <li><img style={height:72,width:165}
                            src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/logo.png?1676651456872"
                            alt="" /></li>
                    <li><a href="{{ route('index') }}"> Trang chủ</a></li>
                    <li>Giới thiệu</li>
                    <li>Tin tức</li>
                    <li><a>Cửa hàng</a></li>
                    <li><a href="{{ route('logout') }}"> Đăng xuất</a></li>
                </ul>
                <ul class="tapba--icon">
                    @if (!session()->has('email'))
                        <li onclick="Shoppings()">Giỏ hàng </li>
                    @else
                        <li class="shopping--cart">
                            <a href="{{ route('user-shopping') }}">Giỏ hàng {{ $cart }}</a>
                            <ul class="cart-product">
                                @foreach ($product as $item)
                                    <div class="product--list">
                                        <img width="50px" height="50px"
                                            src="{{ asset('image/' . $item->image . '.png') }}" alt="">
                                        <p>{{ $item->title }}</p>
                                        <p>{{ $item->quantity }}</p>
                                    </div>
                                @endforeach

                            </ul>
                        </li>
                    @endif

                    @if (!session()->has('email'))
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
        </div>

    </div>
</body>
<script>
    var changeImage = document.querySelector(".change--image");
    var index = 0;
    var images = [
        "https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/slide-img1.jpg?1676651456872",
        "https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/slide-img2.jpg?1676651456872"
    ];

    changeImage.addEventListener("click", function() {
        changeImage.src = images[index];
        index++;

        if (index >= images.length) {
            index = 0;
        }
    });

    setInterval(function() {
        changeImage.click();
    }, 3000);

    function Shoppings() {
        Swal.fire("Xin lỗi", "Đăng nhập để đến giỏ hàng", "warning")
    }
</script>


<script>
    $(document).ready(function() {
        $('#search-form').submit(function(event) {
            event.preventDefault();
            var query = $('#search').val();
            $.ajax({
                url: '/research',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    query: query
                },
                success: function(response) {
                    var result = $("#search-results");
                    result.empty();
                    if (response.length > 0) {
                        $.each(response, function(index, product) {
                            var listItem = $('<li>').text(product.title);
                            result.append(listItem);
                        });
                    } else {
                        var noResult = $("<li>").text("No results");
                        result.append(noResult);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
