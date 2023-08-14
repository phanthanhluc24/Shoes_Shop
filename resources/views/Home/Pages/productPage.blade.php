@extends("Home.Layout.layoutProduct")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Google tag (gtag.js) -->

    <title>Document</title>
</head>
<body>
    @section("content")
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-XNB2QLWFRN"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-XNB2QLWFRN');
        </script>
    <div class="container--grid--cart">
        <div class="left-top-image">
            <img src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/banner_1.jpg?1676651456872" alt="">
            <div class="product-name">
               <p>GIÀY NAM</p> 
               <p>{{ $manshoes }} sản phẩm</p>
            </div>
        </div>
        <div class="left-bottom-image">
            <img src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/banner_2.jpg?1676651456872" alt="">
            <div class="product-name">
               <p>GIÀY NỮ</p> 
               <p>{{ $girlshoes }} sản phẩm</p>
            </div>
        </div>
        <div class="content-image">
            <img src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/banner_3.jpg?1676651456872" alt="">
            <div class="product-name">
               <p>GIÀY BÓNG RỖ</p> 
               <p>{{ $runshoes }} sản phẩm</p>
            </div>
        </div>
        <div class="right-top-image">
            <img src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/banner_4.jpg?1676651456872" alt="">
            <div class="product-name">
               <p>GIÀY BÓNG ĐÁ</p> 
               <p>{{ $footballshoes }} sản phẩm</p>
            </div>
        </div>
        <div class="right-bottom-image">
            <img src="https://bizweb.dktcdn.net/100/415/502/themes/804563/assets/banner_5.jpg?1676651456872" alt="">
            <div class="product-name">
               <p>GIÀY CHẠY</p> 
               <p>{{ $volleballshoes }} sản phẩm</p>
            </div>
        </div>
    </div>
    <div class="container--product-card">  
        <div class="row product--card--div">
              @foreach ($product as $item)
            <div class="col-md-3 cover--product--card">
                @if (session()->has("email"))
                <a href="{{ route("detail",$item->id) }}"><img src="{{asset('image/'.$item->image.".png")}}"></a>  
                @else
                <img src="{{asset('image/'.$item->image.".png")}}">
                @endif
               
                <p><b>{{$item->title}}</b></p> 
                <div class="card--price">
                    <p>{{$item->price_new}}0 VND</p>
                    <del>{{$item->price_old}}0 VND</del>
                </div>
                <form action="{{ route("payment") }}"  method="post">
                  @csrf
                <input type="hidden" name="id_product" value="{{$item->id}}">
                <div class="form--two--botton">
                    @if (session()->has("email"))
                    <button type="submit" class="btn btn-success" name="redirect" >Mua Ngay</button>
                    <button onclick="Shopping()" class="btn btn-warning" type="submit"><a href="{{ route("add-to-card",$item->id) }}"> Thêm giỏ hàng</a></button>    
                    @else
                    <button onclick="Warning()" class="btn btn-success" type="button">Mua Ngay</button>
                    <button onclick="Warning()" class="btn btn-warning" type="button"> Thêm giỏ hàng</button>     
                    @endif
                   
                    
                </div>
               
              </form>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
    <script>
        function Buynow() {
            
            Swal.fire("Tuyệt vời","Cảm ơn bạn đã mua hàng","success");
        }
        function Shopping() {
            Swal.fire("Tuyệt vời","Thêm giỏ hàng thành công","success");
        }

        function Warning() {
                    Swal.fire("Tiếc quá","Bạn chưa đăng nhập","warning");
                }
    </script>
</body>
</html>
