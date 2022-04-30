@extends('layouts.frontend.app')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>{{lang('SHOPPING_CART')}}</h3>
    </div>
</div>

<div id="cart-listing">

</div>


<script>
/*
var value_quantity;


$("[id^='get_value_minus-']").click(function() {

    var num = this.id.split('-')[1];
    var value = $("#value_quantity-" + num).val();
    value_quantity = value > 1 ? value - 1 : value //minus one also

    return_values(num, value_quantity);
});


$("[id^='get_value_plus-']").click(function() {

    var num = this.id.split('-')[1];
    var value = $("#value_quantity-" + num).val(); //Add one also here
    value_quantity = parseInt(value) + 1
    return_values(num, value_quantity);

});


function return_values(num, value_plus_or_minus) {

    var value = $("#value_quantity-" + num).val(); //Add one also here
    value_quantity = value_plus_or_minus;

    var price_per_product = $("#price_per_product-" + num).val();
    var price_value = value_quantity * price_per_product;

    var price_value_with_doller = '$' + price_value;

    $("#price_with_respect_quantity-" + num).empty();
    $("#price_with_respect_quantity-" + num).html(price_value_with_doller);

    $amount = document.getElementById("price_with_quantity-" + num);
    $amount.value = price_value;
    var including_shipping_price = $("#shipping_price-" + num).val();

    var total_value = including_shipping_price + price_value;

    var including_shipping_price_dollor = "$" + parseFloat(total_value);

    $("#including_shipping-" + num).empty();
    $("#including_shipping-" + num).html(including_shipping_price_dollor);


}*/
</script>

<a href="#about" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
    </span></a>
@endsection