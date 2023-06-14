@extends('Home.Layout.layoutAdmin')
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @section('content')
        <div class="container" style="margin-top: -200px">
            <div class="card">
                <div class="card-haeder">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            Thêm sản phẩm
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route("update",$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="file_upload">
                                </div>
                                <div class="form-group">
                                    <label for="">New Price</label>
                                    <input type="number" class="form-control" name="price_new" value="{{ $product->price_new }}">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Old Price</label>
                                    <input type="number" class="form-control" name="price_old" value="{{ $product->price_old }}"">
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-select selectpicker" aria-label="Default select example">
                                        @php
                                        $brands = ['Nike', 'Adidas', 'Vans'];
                                        $selectedBrand = $product->brand; // Lấy giá trị từ cơ sở dữ liệu
                                        @endphp

                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand }}" {{ $selectedBrand == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                                        @endforeach

                                        {{-- @if ($product->brand=="Nike")
                                            <option value="Nike">Nike</option>
                                            <option value="Adidas">Adidas</option>
                                            <option value="Vans">Vans</option>
                                         @elseif($product->brand=="Adidas")
                                         <option value="Adidas">Adidas</option>
                                         <option value="Vans">Vans</option>
                                         <option value="Nike">Nike</option>
                                         @else
                                         <option value="Vans">Vans</option>
                                         <option value="Nike">Nike</option>
                                            <option value="Adidas">Adidas</option>
                                         @endif --}}
                                       
                                       
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select name="id_category" class="form-select selectpicker" aria-label="Default select example">
                                        @php
                                        $categories = [
                                            1 => 'Giày nam',
                                            2 => 'Giày nữ',
                                            4 => 'Giày bóng đá',
                                            3 => 'Giày chạy',
                                            5 => 'Giày bóng rỗ'
                                        ];
                                        $selectedCategory = $product->id_category; // Lấy giá trị từ cơ sở dữ liệu
                                        @endphp
                                
                                        @foreach ($categories as $key => $category)
                                        <option value="{{ $key }}" {{ $selectedCategory == $key ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>