<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="d-flex justify-conten-center align-items-center">
        <div class="container">
           <div class="card">
            <h3 class="text-center">Register</h3>
            <div class="card-header">
                    <form action="{{route('storeuser')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <strong>Full name</strong>
                            <input type="text" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Phone</strong>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Password</strong>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Register</button>
                            <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                        </div>
                    </form>
                  
            </div>
           </div>
        </div>
    </div>
    
   
   
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>