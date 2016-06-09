<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page - Laravel Commerce - Code</title>

    <link href="{{elixir('css/all.css')}}" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <div class="navbar-brand">ADMIN</div>
    </div>
    <div class="navbar-text"><a href="{{route('admin.categories')}}">Categories</a></div>
    <div class="navbar-text"><a href="{{route('admin.products')}}">Products</a></div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="{{elixir('js/all.js')}}"></script>
</body>
</html>