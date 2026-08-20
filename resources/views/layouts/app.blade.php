<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin_Sena</title>

    {{-- Bootstrap y Font Awesome se cargan desde CDN; no requiere Vite. --}}
    @include('includes.dependencias')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <!-- Navbar -->
    {{-- Navbar y footer reutilizables para las vistas CRUD. --}}
    @include('includes.navbar')

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('includes.footer')

    @include('includes.dependenciasbody')


</body>

</html>
