<!-- header -->


<div class="header" id="home">
	@if(empty(Auth::user()))
	<div class="container-fluid">

		<div class="col-12 col-sm-6 col-md-6 col-lg-6">
			<div class="money-back">
				<span class="yellow-color"> MONEY BACK </span>30 Days Money Back Guaraniee
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-6 col-lg-6">
			<ul class="right-menu">
				<li> <a href="{{route('about')}}"> About Us &nbsp;| </a></li>
				<li> <a href="{{route('request')}}">Request &nbsp;|</a></li>

				<li> <a href="{{route('login')}}"> My Account &nbsp;| </a></li>
				<li> <a href="{{route('blog')}}"> Blog &nbsp;|</a></li>
				<li> <a href="{{route('contact')}}">Contact Us </a></li>
				<!-- <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li> -->
			</ul>
		</div>

	</div>
	@endif
</div>
<!-- //header -->


<!-- {{$categories}} -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<!-- header-bot -->
		<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 logo_agile">
			<a href="{{route('home')}}"> <img src="{{url('assets/images/frontend/logo.png')}}" alt="" srcset=""></a>
		</div>
		<!-- header-bot -->
		<div class="col-md-1 col-sm-1 col-lg-1 col-xl-1"></div>
		<div class="<?php if(!empty(Auth::user())) { echo 'col-md-5 col-sm-5 col-lg-5 col-xl-5'; }else{echo 'col-md- col-sm-6 col-lg-6 col-xl-6'; }?> header-middle">
			<form action="#" method="post">
				<div class="search-input">
					<a href="" target="_blank" hidden></a>
					<input type="search" name="search" placeholder="Search here..." required="">
					<button type="submit" class="searchbutton icon"><i class="fa fa-search"></i></button>
					<div class="autocom-box">
					</div>
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 header-middle">

			<div class="rightpanel-for-mobile header-user dropdown">
				<i class="fa fa-globe color-right-account" aria-hidden="true"></i>
				<div class="language-drop-down">

					<!-- <span><b>Language</b></span> <br/> -->
					<div class="">
						<span class="dropbtn"><b>Language</b></span>

						<div class="dropdown-content">
							<a href="#"><img src="{{url('assets/images/frontend/british.png')}}" class="flag" alt="" srcset=""> English</a>
							<a href="#"><img src="{{url('assets/images/frontend/arabic.png')}}" class="flag" alt="" srcset="">Arabic</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		@if(empty(Auth::user()) ||!empty(Auth::user()))
		<div class="col-md-1 col-sm-1 col-lg-1 col-xl-1 header-middle">
			<div class="rightpanel-for-mobile">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<a href="{{url('shopping-cart')}}">
						<button class="mybutton w3view-cart circle left" type="submit"  name="submit" value="">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						</button>
						<div class="right" >
							<span>Total</span> <br />
							<span style="font-weight: bold;" id="total_header_cart">$00.00</span>
						</div>
					</a>
					
			</div>
		</div>
		@endif
		@if(!empty(Auth::user()))
		<div class="col-md-1 col-sm-1 col-lg-1 col-xl-1 header-middle">
			<div class="rightpanel-for-mobile Account header-user dropdown">
				<i class="fas fa-user-circle Account color-right-account" aria-hidden="true"></i>
				<div class="account-drop-down">


					<?php $user = Auth::user(); ?>

					<div class="">
						<span class="dropbtn"><b>Account</b></span>

						<div class="dropdown-content">

							@if($user->user_type=='s')
							<a href="{{route('seller.dashboard')}}">Dashboard</a>
							@elseif($user->user_type=='b')
							<a href="{{route('buyer.dashboard')}}">Dashboard</a>
							@endif
							<a href="{{route('logout')}}">Logout</a>

							<div>
								<!-- <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            	</form> -->
							</div>

						</div>
					</div>
				</div>



				<!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div> -->

			</div>

		</div>
		@endif

		<div class="clearfix"></div>

	</div>

	@php
	//$favoriteProduct=new App\Models\FavoriteProduct;
    //$value= $favoriteProduct->where('user_id',Auth::user()->id)->get();

	@endphp

			<div class="addtocard">
				<div class="modal  background-change fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					
					<header id="site-header">
						<div class="container">
						<h3>Shopping cart</h3>
						</div>
						<hr/>
					</header>

					<div class="">

						<section id="cart"> 
							<article class="row">
								<div class="product-add-to-card col-12 col-md-4 col-sm-4 col-xl-4 col-xs-12">
									<header>
										<a class="remove-add-to-card">
											<img src="http://www.astudio.si/preview/blockedwp/wp-content-add-to-card/uploads/2012/08/1.jpg" alt="">

											<h3>Remove</h3>
										</a>
									</header>
								</div>
								<div class="col-12 col-md-8 col-sm-8 col-xl-8 col-xs-12">
										<div class="content-add-to-card">

											<h4>Lorem ipsum</h4>
											Lorem ipsum dolor sit amet, 
											consectetur adipisicing elit.
										</div>
										<div class="row">
											<div class="col-12 col-md-12 col-sm-12 col-xl-12 col-xs-12">
												<footer class="content-add-to-card">
													<span class="qt-minus">-</span>
													<span class="qt">2</span>
													<span class="qt-plus">+</span>									&nbsp;&nbsp;
														<span class="price">
															14.99€
														</span>
														<span class="full-price">
															29.98€
														</span>
													
												</footer>
											</div>
										</div>

								</div>
								
								
							</article>
						</section>						
					</div>
				</div>
				<div class="modal-footer">
						

				<div class="left margin-left">
					<h4 class="subtotal">Subtotal: <span>163.96</span>€</h4>
					<h4 class="tax">Taxes (5%): <span>8.2</span>€</h4>
					<h4 class="shipping">Shipping: <span>5.00</span>€</h4>
				</div>

				<div class="right">
					<h3 class="total">Total: <span>177.16</span>€</h3>
					<a class="btn">Checkout</a>
				</div>

				</div>
				</div>
			</div>
</div>
			

</div>
<!-- //header-bot -->

<!-- banner -->
<div class="ban-top">
	<div class="container-fluid">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav menu__list">
							<li class="active menu__item menu__item--current">


								<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list"></i>
									Categories <span class="caret"></span></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="agile_inner_drop_nav_info">
										<div class="col-sm-12 multi-gd-img">
											@if(!empty($categories))
											<ul class="multi-column-dropdown">

												@foreach($categories as $cat)
												<li><a href="{{url('product-list/'.$cat->id)}}">{{$cat->categoryName}}</a></li>
												@endforeach

											</ul>
											@else
											Category list not avaiable now
											@endif

										</div>

										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class=" menu__item"><a class="menu__link" href="promotions.html">Promotions</a></li>
							<li class="dropdown menu__item">
								<a href="#" class="menu__link">New Arrivals</a>

							</li>
							<li class="dropdown menu__item">
								<a href="#" class="menu__link">Ready to ship
									<!-- <span class="caret"></span> -->
								</a>

							</li>
							<li class="menu__item dropdown">
								<a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Buyer central <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="icons.html">Web Icons</a></li>
									<li><a href="typography.html">Typography</a></li>
								</ul>
							</li>
							<li class=" menu__item"><a class="menu__link" href="contact.html">Sell on</a></li>
							<li class="menu__item dropdown languag-acoount">
								<a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Language <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="#">English</a></li>
									<li><a href="#">Arabic</a></li>
								</ul>
							</li>

							<!-- //rinky -->
							<li class="menu__item dropdown languag-acoount">
								<a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>

								<ul class="dropdown-menu agile_short_dropdown">
								@if(!empty(Auth::user()))
									<li>
										@if($user->user_type=='s')
										<a href="{{route('seller.dashboard')}}">Dashboard</a>
										@elseif($user->user_type=='b')
										<a href="{{route('buyer.dashboard')}}">Dashboard</a>
										@endif
									</li>
									<li><a href="{{route('logout')}}">Logout</a></li>
								@else
								<li><a href="{{route('login')}}">Login</a></li>

								@endif
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->


<script>
	function showModal() {
  $('#myModal').modal('show');
}


var check = false;

function changeVal(el) {
 var qt = parseFloat(el.parent().children(".qt").html());
 var price = parseFloat(el.parent().children(".price").html());
 var eq = Math.round(price * qt * 100) / 100;
 
 el.parent().children(".full-price").html( eq + "€" );
 
 changeTotal();      
}

function changeTotal() {
 
 var price = 0;
 
 $(".full-price").each(function(index){
   price += parseFloat($(".full-price").eq(index).html());
 });
 
 price = Math.round(price * 100) / 100;
 var tax = Math.round(price * 0.05 * 100) / 100
 var shipping = parseFloat($(".shipping span").html());
 var fullPrice = Math.round((price + tax + shipping) *100) / 100;
 
 if(price == 0) {
   fullPrice = 0;
 }
 
 $(".subtotal span").html(price);
 $(".tax span").html(tax);
 $(".total span").html(fullPrice);
}

$(document).ready(function(){
 
 $(".remove-add-to-card").click(function(){
   var el = $(this);
   el.parent().parent().addClass("removed");
   window.setTimeout(
	 function(){
	   el.parent().parent().slideUp('fast', function() { 
		 el.parent().parent().remove(); 
		 if($(".product-add-to-card").length == 0) {
		   if(check) {
			 $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
		   } else {
			 $("#cart").html("<h1>No products!</h1>");
		   }
		 }
		 changeTotal(); 
	   });
	 }, 200);
 });
 
 $(".qt-plus").click(function(){
   $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
   
   $(this).parent().children(".full-price").addClass("added");
   
   var el = $(this);
   window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
 });
 
 $(".qt-minus").click(function(){
   
   child = $(this).parent().children(".qt");
   
   if(parseInt(child.html()) > 1) {
	 child.html(parseInt(child.html()) - 1);
   }
   
   $(this).parent().children(".full-price").addClass("minused");
   
   var el = $(this);
   window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
 });
 
 window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
 
 $(".btn").click(function(){
   check = true;
   $(".remove-add-to-card").click();
 });
});
</script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
