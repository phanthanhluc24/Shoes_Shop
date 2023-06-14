<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/headeProduct.css")  }}">
</head>
<body>
    <div class="container--header">
        @include('Home.Layout.headerProduct')
    </div>
    <div class="container--content">
        @yield("content")
    </div>
</body>
</html>