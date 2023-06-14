<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giày dép</title>
    <link rel="stylesheet" href="{{asset("css/headeProduct.css")  }}">
</head>
<body>
    <div>
        <div class="container--header--menu">
            <div class="nemu--logo">
                <img class="change--image" src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/slide-img1.jpg?1676651456872" alt="" />
            </div>
            <div class="menu--tapba">
                <ul class='tapba--word'>
                    <li><img style={height:72,width:165} src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/logo.png?1676651456872" alt="" /></li>
                    <li><a href="{{ route("/") }}"> Trang chủ</a></li>
                    <li>Giới thiệu</li>
                    <li>Tin tức</li>
                    <li><a>Cửa hàng</a></li>
                    <li>Liên hệ</li>
                </ul>
                <ul class="tapba--icon">
                    <li><a href="{{ route("user-shopping") }}">Giỏ hàng</a> </li>
                    @if(!session()->has("email"))
                    <li><a href="{{ route("login") }}">tài khoản</a></li>
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

</script>







</script>