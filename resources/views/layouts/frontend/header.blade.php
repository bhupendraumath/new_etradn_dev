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
				<li> <a href="{{route('login')}}"> My Account &nbsp;| </a></li>
				<li> <a href="#"> Blog &nbsp;|</a></li>
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
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 header-middle">
			<form action="#" method="post">
				<!-- <input type="search" name="search" placeholder="Search here..." required="">
            <button type="submit" class="searchbutton"><i class="fa fa-search"></i></button> -->
				<div class="search-input">
					<a href="" target="_blank" hidden></a>
					<input type="search" name="search" placeholder="Search here..." required="">
					<button type="submit" class="searchbutton icon"><i class="fa fa-search"></i></button>
					<div class="autocom-box">
						<!-- here list are inserted from javascript -->
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
		@if(empty(Auth::user()))
		<div class="col-md-1 col-sm-1 col-lg-1 col-xl-1 header-middle">
			<div class="rightpanel-for-mobile">
				<form action="#" method="post" class="last">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="w3view-cart circle left" type="submit" name="submit" value="">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</button>
					<div class="right">
						<span>Total</span> <br />
						<span style="font-weight: bold;">$600.00</span>
					</div>
				</form>
			</div>
		</div>
		@endif
		@if(!empty(Auth::user()))
		<div class="col-md-1 col-sm-1 col-lg-1 col-xl-1 header-middle">
			<div class="rightpanel-for-mobile Account header-user dropdown">
				<i class="fas fa-user-circle Account color-right-account" aria-hidden="true"></i>
				<div class="account-drop-down">
					<div class="">
						<span class="dropbtn"><b>Account</b></span>

						<div class="dropdown-content">
							<a href="{{route('seller.dashboard')}}">Dashboard</a>
							<!-- <a href="{{route('logout')}}">Logout</a> -->

							<div>
							<a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            	</form>
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
</div>
<!-- //header-bot -->

<!-- banner -->
<div class="ban-top">
	<div class="container-fluid">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
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
								
							<!-- <a class="menu__link" href="index.html"><i class="fa fa-list"></i> Categories <span class="sr-only">(current)</span></a> -->

							<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list"></i>
							Categories <span class="caret"></span></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="agile_inner_drop_nav_info">
										<div class="col-sm-12 multi-gd-img">
										@if(!empty($categories))
											<ul class="multi-column-dropdown">
											
												@foreach($categories as $cat)
												<li><a href="product-list/{{$cat->id}}">{{$cat->categoryName}}</a></li>
												@endforeach
												<!-- <li><a href="womens.html">Wallets</a></li>
												<li><a href="womens.html">Footwear</a></li>
												<li><a href="womens.html">Watches</a></li>
												<li><a href="womens.html">Accessories</a></li>
												<li><a href="womens.html">Bags</a></li>
												<li><a href="womens.html">Caps & Hats</a></li> -->
											</ul>
											@else
												Category list not avaiable now
											@endif

										</div>
										
										<!-- <div class="col-sm-6 multi-gd-img multi-gd-text ">
											<a href="womens.html"><img src="{{url('assets/images/frontend/top1.jpg')}}" alt=" " /></a>
										</div> -->
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class=" menu__item"><a class="menu__link" href="promotions.html">Promotions</a></li>
							<li class="dropdown menu__item">
								<a href="#" class="menu__link" >New Arrivals</a>
								<!-- <ul class="dropdown-menu multi-column columns-3">
									<div class="agile_inner_drop_nav_info">
										<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
											<a href="mens.html"><img src="{{url('assets/images/frontend/top2.jpg')}}" alt=" " /></a>
										</div>
										<div class="col-sm-3 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li><a href="mens.html">Clothing</a></li>
												<li><a href="mens.html">Wallets</a></li>
												<li><a href="mens.html">Footwear</a></li>
												<li><a href="mens.html">Watches</a></li>
												<li><a href="mens.html">Accessories</a></li>
												<li><a href="mens.html">Bags</a></li>
												<li><a href="mens.html">Caps & Hats</a></li>
											</ul>
										</div>
										<div class="col-sm-3 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li><a href="mens.html">Jewellery</a></li>
												<li><a href="mens.html">Sunglasses</a></li>
												<li><a href="mens.html">Perfumes</a></li>
												<li><a href="mens.html">Beauty</a></li>
												<li><a href="mens.html">Shirts</a></li>
												<li><a href="mens.html">Sunglasses</a></li>
												<li><a href="mens.html">Swimwear</a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul> -->
							</li>
							<li class="dropdown menu__item">
								<a href="#" class="menu__link">Ready to ship 
									<!-- <span class="caret"></span> -->
								</a>
								<!-- <ul class="dropdown-menu multi-column columns-3">
									<div class="agile_inner_drop_nav_info">
										<div class="col-sm-3 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li><a href="womens.html">Clothing</a></li>
												<li><a href="womens.html">Wallets</a></li>
												<li><a href="womens.html">Footwear</a></li>
												<li><a href="womens.html">Watches</a></li>
												<li><a href="womens.html">Accessories</a></li>
												<li><a href="womens.html">Bags</a></li>
												<li><a href="womens.html">Caps & Hats</a></li>
											</ul>
										</div>
										<div class="col-sm-3 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li><a href="womens.html">Jewellery</a></li>
												<li><a href="womens.html">Sunglasses</a></li>
												<li><a href="womens.html">Perfumes</a></li>
												<li><a href="womens.html">Beauty</a></li>
												<li><a href="womens.html">Shirts</a></li>
												<li><a href="womens.html">Sunglasses</a></li>
												<li><a href="womens.html">Swimwear</a></li>
											</ul>
										</div>
										<div class="col-sm-6 multi-gd-img multi-gd-text ">
											<a href="womens.html"><img src="{{url('assets/images/frontend/top1.jpg')}}" alt=" " /></a>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul> -->
							</li>
							<li class="menu__item dropdown">
								<a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Buyer central <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="icons.html">Web Icons</a></li>
									<li><a href="typography.html">Typography</a></li>
								</ul>
							</li>
							<li class=" menu__item"><a class="menu__link" href="contact.html">Sell on</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->