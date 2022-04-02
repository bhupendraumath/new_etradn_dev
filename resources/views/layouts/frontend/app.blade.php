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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.24/jquery.autocomplete.min.js"></script>
<script>
    /*http://laravel.io/forum/02-08-2014-ajax-autocomplete-input*/
    var countries = {
        "AD": "Andorra",
        "A2": "Andorra Test",
        "AE": "United Arab Emirates",
        "AF": "Afghanistan",
        "ZM": "Zambia",
        "ZW": "Zimbabwe",
        "ZZ": "Unknown or Invalid Region"
    }
    var countriesString = [
        "Andorra",
        "Andorra Test",
        "United Arab Emirates"
    ];
    var countriesArray = $.map(countries, function(value, key) {
        return {
            value: value,
            data: key
        };
    });

    // Initialize ajax autocomplete:
    $('#autocomplete').autocomplete({
        // serviceUrl: '/autosuggest/service/url',
        //lookup: countriesString,
        lookup: countriesArray,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
        },
        onHint: function(hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
</script>

</html>