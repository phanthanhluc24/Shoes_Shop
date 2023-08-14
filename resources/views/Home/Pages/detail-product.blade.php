@extends('Home.Layout.layoutProduct')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/detail.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    @section('content')
        <div class="container--detail">
            <div class="detail--image">
                <img src="{{ asset("image/".$product->image.".png") }}" alt="">
            </div>
            <div class="detail--text">
                <h3>{{ $product->title }}</h3>
                <p> <b>Giá:</b>{{ $product->price_new }}</p>
                <p><b>Giảm:</b><del>{{ $product->price_old }}</del></p>
                <p><b>Thương hiệu:</b>{{ $product->brand }}</p>
                @if($sumRating!=0)
                <b>
                    {{ $sumRating }}
                    @for ($i=1; $i <=$sumRating; $i++)
                    <i class="fa-regular fa-star"></i>
                    @endfor
                </b>
                @else
                <b>0</b>
                @endif
            </div>
            <div class="rating--star">
                <p class="fiver--star">
                    <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                </p>
                <p class="four--star">
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                </p>
                <p class="three--star">
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                </p>
                <p class="two--star">
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                </p>
                <p class="one--star">
                   <i class="fa-regular fa-star"></i>
                </p>
            </div>
        </div>
        <div class="user--comment">
            <div class="text--comment">
                <form action="{{ route("detail-page") }}" method="post">
                    @csrf
                    <textarea name="text" id="" cols="30" rows="10">
                    </textarea>
                    <input type="hidden" name="rating" class="number_star">
                    <input type="hidden" name="id_product" value="{{ $product->id }}">
                    <button type="submit" class="comment--product">Bình luận</button>
                </form>
            </div>
            <div class="evaluate--star">
                <p class="fivers--star">
                    <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                   <i class="fa-regular fa-star"></i>
                </p>
                <p>Vui lòng đánh giá sao</p>
            </div>
        </div>
        <div class="user--evaluate--coment">
            @forEach($user_comment as $comment)
            <div class="content">
                <h3>{{ $comment->fullname }}</h3>
                <p>{{ $comment->text }}</p>
                <p>
                    @for ($i=1;$i<=$comment->rating;$i++)
                        <i class="fa-regular fa-star"></i>
                    @endfor
                </p>
            </div>
            @endforEach
        </div>
        
</body>
<script>
   const starContainer = document.querySelector('.fivers--star');
const stars = starContainer.querySelectorAll('i');
var number=0;
stars.forEach((star, index) => {
    star.addEventListener('mouseover', () => {
        for (let i = 0; i <= index; i++) {
            stars[i].classList.add('gold');
        }
        
    });

    star.addEventListener("click",()=>{
            number=index+1
            document.querySelector('.number_star').value=number
      
    })
    

    star.addEventListener('mouseout', () => {
        stars.forEach((star) => {
            star.classList.remove('gold');
        });
    });
});
</script>
@endsection
</html>