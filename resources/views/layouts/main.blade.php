<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 4/27/17
 * Time: 12:30 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{url('css/app.css')}}" rel="stylesheet">
    <title>MD5IT.COM - MD5 Hash Generator and Lookup Utility</title>
</head>

<body>

@yield('nav')

<div class="container">
    @if($errors->count() > 0)
        @include('errors.common', ['errors'=>$errors->all()])
    @endif
    @yield('content')
</div>

<script src="{{url('js/app.js')}}"></script>
</body>

</html>
