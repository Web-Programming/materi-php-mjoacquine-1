<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        @include('app.navbar')
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <aside class="col-md-3 col-lg-2 bg-light border-end min-vh-100 p-3">
            @yield('sidebar')
        </aside>

        <main class="col-md-9 col-lg-10 p-4">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>