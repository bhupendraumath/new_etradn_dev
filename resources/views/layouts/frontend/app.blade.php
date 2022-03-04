<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Etradn') }}</title>
    @include('layouts/frontend/link')
</head>

<body>
    @include('layouts/frontend/header', ['categories' => App\Models\Category::limit(14)->get()])
    <main class="py-4">
        @yield('content')
    </main>
    @include('layouts/frontend/footer')
    @include('layouts/frontend/script')
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</body>

</html>