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

@php

$details = getAddressUsingIP();
               
$order_list = DB::table('tbl_orders')
->select('tbl_orders.shipping_address','tbl_orders.order_number', 'tbl_order_items.*')
->join('tbl_order_items','tbl_order_items.order_number','=','tbl_orders.order_number')
->where('tbl_orders.shipping_address', 'like', '%' . $details->city . '%')
->get();

$idsArr=array(); //for category id
foreach($order_list as $order){
   $getid=idBasedOrderDetails($order->product_detail_1);
   array_push($idsArr,$getid);
}

$product=App\Models\Product::select('id','cat_id')->whereIn('id',$idsArr)->get();

$cat_id=array();
foreach($product as $prod){
array_push($cat_id,$prod->cat_id);
}

$popular_category=App\Models\Category::whereIn('id',$cat_id)->groupBy('id')->get();

@endphp
    @include('layouts/frontend/header',
    ['categories' => App\Models\Category::where('isActive','y')->limit(14)->get(),
    'brands' => App\Models\Brand::where('isActive','y')->orderBy('id','desc')->limit(14)->get(),
    'popular_category'=>$popular_category    
    ])

    <main class="py-4">
        @yield('content')
    </main>
    @include('layouts/frontend/footer')
    @include('layouts/frontend/script')
    @stack('scripts')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.24/jquery.autocomplete.min.js">
</script>
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


<script>
    @if(Session::has('success_message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('success_message') }}");
    @endif
    @if(Session::has('error_message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error_message') }}");
    @endif
    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif
    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
</html>