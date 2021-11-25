<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITB Game Store</title>
    <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}"/>
</head>
<body>


@include('layouts.navbar')
<div class="container my-5">
    @yield("konten")
</div>


<script type="text/javascript" src="{{asset("assets/js/bootstrap.bundle.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/bootstrap.min.js")}}"></script>
@stack("scripts")
</body>
</html>
