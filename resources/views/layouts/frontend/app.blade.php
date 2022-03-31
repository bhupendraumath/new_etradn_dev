<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

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

<script>
    $(function() {
        var availableTags = [
            "Mobile Phone Repair",
            "Sport Fields & Halls Contracting",
            "Audio Records Trading",
            "Sunglasses Trading",
            "Spectacles & Contact Lenses Trading",
            "Beauty & Personal Care Equipment Trading",
            "Parties & Entertainments Services",
            "Art Production Services",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#searchProduct").autocomplete({
            source: availableTags
        });
    });
</script>

</html>