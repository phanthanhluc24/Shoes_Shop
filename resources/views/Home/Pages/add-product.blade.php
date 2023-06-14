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
        <div class="container" style="margin-top: -250px">
            <div class="card">
                <div class="card-haeder">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            Thêm sản phẩm
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route("store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="file_upload">
                                </div>
                                <div class="form-group">
                                    <label for="">New Price</label>
                                    <input type="number" class="form-control" name="price_new">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Old Price</label>
                                    <input type="number" class="form-control" name="price_old">
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-select selectpicker" aria-label="Default select example">
                                        <option value="Nike">Nike</option>
                                        <option value="Adidas">Adidas</option>
                                        <option value="Vans">Vans</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select name="id_category" class="form-select selectpicker" aria-label="Default select example">
                                        <option value="1">Giày nam</option>
                                        <option value="2">Giày nữ</option>
                                        <option value="4">Giày bóng đá</option>
                                        <option value="3">Giày chạy</option>
                                        <option value="5">Giày bóng rỗ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Thêm mới</button>
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