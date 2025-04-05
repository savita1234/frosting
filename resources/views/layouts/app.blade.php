<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body><button class="btn btn-block d-md-none" id="toggleSidebar">
    <i class="bi bi-list"></i>
</button>

    <div class="d-flex">
        @include('layouts.sidebar') {{-- Include Sidebar --}}
        <div class="content p-4 w-100" id="main-content">

            @yield('content')
        </div>
    </div>
</body>

</html>
