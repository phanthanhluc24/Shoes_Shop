@extends("Home.Layout.layoutAdmin")
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      @section('content')
          <div class="container" style="margin-top: -250px">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Danh sách Sản phẩm
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('Adminadd')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giá mới</th>
                                <th>Ảnh</th>
                                <th>Giá cũ</th>
                                <th>Thương hiệu</th>
                                <th>Thao tác</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($product as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->price_new}}</td>
                                    <td><img style="height: 50px; width:50px;" src="{{asset('image/'.$item->image.".png")}}"></td>
                                    <td>{{$item->price_old}}</td>
                                    <td>{{$item->brand}}</td>
                                    <td>
                                        <form action="{{route('delete',$item->id)}}" method="post" style="display: flex">
                                            @csrf
                                            <a href="{{route('edit',$item->id)}}" class="btn btn-primary">Edit</a>
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
      @endsection
   
    
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </html>