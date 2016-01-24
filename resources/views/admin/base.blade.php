<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page - Laravel Commerce - Code</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>