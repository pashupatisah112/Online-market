<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haatnepal | Admin</title>
    @include('admin.layouts.head')
    @section('head')
    <style>
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link {
    background-color: #FE980F;
    color: #fff;
}
    </style>
    @show
</head>
<body>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2">
        <h3 class="text-center"> Welcome Admin</h3>
    </nav>

    @include('admin.layouts.sidebar')

    @section('content')
    @show

    @include('admin.layouts.footer')
    @include('admin.layouts.script')
    @section('script')
    @show
</body>
</html>