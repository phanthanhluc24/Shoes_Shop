@extends('Home.Layout.layoutProduct')

@section("content")
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
            <form action="" method="post">
              @csrf
            <input type="hidden" name="id_product" value="{{$item->id}}">
            <div class="form--two--botton">
                @if (session()->has("email"))
                <button class="btn btn-success">Mua Ngay</button>
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