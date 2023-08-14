@extends('Home.Layout.layoutProduct')
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
  <body>
    @section('content')
        
    <div class="container" style="margin-top: -200px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md text-center">
                      <h1>Giỏ hàng</h1>  
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên hàng</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $key=> $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->title}}</td>
                                <td><img width="50px" height="60px" src="{{ asset("image/".$item->image.".png") }}"></td>
                                <td>{{$item->price_new}}</td>
                                <td class="d-flex"> 
                                    <form action="{{ route("decrement",$item->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-success ml-4">-</button>
                                    </form>
                                   
                                    {{$item->quantity }}
                                    <form action="{{ route("increment",$item->id ) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-warning">+</button>
                                    </form>
                                </td>
                                <form action="{{ route("userDelete",$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <b>Thành tiền {{ $sum }}.000</b>
                <a href="{{ route("truncate") }}" onclick="Payment()" class="btn btn-success ml-4">Thanh toán</a>
            </div>
        </div>
    </div>
    @endsection

    
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    function Payment() {
        Swal.fire("Thành công","Thanh toán thành công","success")
    }
  </script>
    </html>