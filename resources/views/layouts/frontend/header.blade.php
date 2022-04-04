<!-- header -->
<style>
#autocomplete {
    width: 300px;
    padding: 7px;
    text-align: left;
}

.autocomplete-suggestions {
    text-align: left;
    border: 1px solid #999;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    background: #FFF;
    overflow: auto;
}

.autocomplete-suggestion {
    padding: 5px 5px;
    white-space: nowrap;
    overflow: hidden;
    cursor: pointer;
}

.autocomplete-selected {
    background: #F0F0F0;
}

.autocomplete-suggestions strong {
    font-weight: normal;
    color: #3399FF;
}

.autocomplete-group {
    padding: 2px 5px;
}

.autocomplete-group strong {
    display: block;
    border-bottom: 1px solid #000;
}
</style>

<!-- //Top header -->
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
<!-- top header end here -->

<!-- header-bot -->

<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">

        <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 logo_agile">
            <a href="{{route('home')}}"> <img src="{{url('assets/images/frontend/logo.png')}}" alt="" srcset=""></a>
        </div>

        <div class="col-md-1 col-sm-1 col-lg-1 col-xl-1"></div>
        <div class="<?php if (!empty(Auth::user())) {
						echo 'col-md-5 col-sm-5 col-lg-5 col-xl-5';
					} else {
						echo 'col-md-6 col-sm-6 col-lg-6 col-xl-6';
					} ?> header-middle">
            <form action="#" method="post">
                <div class="search-input">
                    <a href="" target="_blank" hidden></a>
                    <input type="search" name="search" placeholder="Search here..." id="autocomplete">
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

                    <div class="">
                        <span class="dropbtn"><b>Language</b></span>

                        <div class="dropdown-content">
                            <a href="#"><img src="{{url('assets/images/frontend/british.png')}}" class="flag" alt=""
                                    srcset=""> English</a>
                            <a href="#"><img src="{{url('assets/images/frontend/arabic.png')}}" class="flag" alt=""
                                    srcset="">Arabic</a>
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
                    <button class="mybutton w3view-cart circle left" type="submit" name="submit" value="">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    <div class="right">
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

                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif

        <div class="clearfix"></div>

    </div>

    @php
    //$favoriteProduct=new App\Models\FavoriteProduct;
    //$value= $favoriteProduct->where('user_id',Auth::user()->id)->get();

    @endphp


    <!-- <div class="ban-top">
        <div class="container-fluid">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                       
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li class="active menu__item menu__item--current">


                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list"></i>
                                        Categories <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-12 multi-gd-img">
                                                @if(!empty($categories))
                                                <ul class="multi-column-dropdown">

                                                    @foreach($categories as $cat)
                                                    <li><a
                                                            href="{{url('product-list/'.$cat->id)}}">{{$cat->categoryName}}</a>
                                                    </li>
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
                                      
                                    </a>

                                </li>
                                <li class="menu__item dropdown">
                                    <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Buyer
                                        central <b class="caret"></b></a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="icons.html">Web Icons</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                    </ul>
                                </li>
                                <li class=" menu__item"><a class="menu__link" href="contact.html">Sell on</a></li>
                                <li class="menu__item dropdown languag-acoount">
                                    <a class="menu__link" href="#" class="dropdown-toggle"
                                        data-toggle="dropdown">Language <b class="caret"></b></a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Arabic</a></li>
                                    </ul>
                                </li>

                               
                                <li class="menu__item dropdown languag-acoount">
                                    <a class="menu__link" href="#" class="dropdown-toggle"
                                        data-toggle="dropdown">Account <b class="caret"></b></a>

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
				-->

    <!-- //header-bot -->

    <!-- banner -->
    <div class="ban-top">
        <div class="container-fluid">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">

							<div class="dropdown changes-background-light-yellow">
								<a class="dropdown-toggle menu__link"  data-toggle="dropdown">
									<span class="changes-font-color">
										<i class="fa fa-list"></i>
										Explore all products
										<span class="caret"></span>
									</span>									
								</a>

								<ul class="dropdown-menu agile_short_dropdown">
								@if(!empty($categories) && count($categories)!=0)
									@foreach($categories as $cat)
									<li class="dropdown-submenu subchildmenus" id="cat_li-{{$loop->index}}">
										<a class="test" tabindex="-1">{{$cat->categoryName}} <span class="caret menus"></span></a>
										<ul class="dropdown-menu subchild-menus-over" id="sub_ul-{{$loop->index}}">
                                        @if(!empty($cat->sub_category) && count($cat->sub_category)!=0)
                                            @foreach($cat->sub_category as $subcat)
                                            <li><a tabindex="-1"  href="{{url('product-list/noav/'.$subcat->id.'/noav/noav')}}">{{$subcat->subCategoryName}}</a></li>
                                            @endforeach
                                        @else
                                        <li>&nbsp;&nbsp;Subcategories Not Available</li>
                                        @endif
										</ul>
									</li>
									@endforeach
                                @else
                                    <li>&nbsp;&nbsp;Categories Not Available</li>
								@endif
								
								</ul>
							</div>

                               <!-- <li class="active menu__item menu__item--current">


                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list"></i>
                                        Explore all products <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-12 multi-gd-img">
                                                @if(!empty($categories))
                                                <ul class="multi-column-dropdown">

                                                    @foreach($categories as $cat)
                                                    <li><a
                                                            href="{{url('product-list/'.$cat->id)}}">{{$cat->categoryName}}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                @else
                                                Category list not avaiable now
                                                @endif

                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>-->
                                <!-- <li class=" menu__item"><a class="menu__link" href="promotions.html">Products  By brand</a></li> -->

								<li class="menu__item dropdown">
                                    <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Products By brand </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
										@if(!empty($brands) && count($brands)!=0)
										@foreach($brands as $brand)
                                       		<li><a href="{{url('product-list/noav/noav/'.$brand->id.'/noav')}}">
												{{$brand->brandName}}
											</a></li>
										@endforeach
                                        @else
                                        <li>&nbsp;&nbsp;Brands Not Available</li>
                                        @endif
										
                                    </ul>
                                </li>

                                <li class="dropdown menu__item">
                                <a href="{{url('product-list/noav/noav/noav/popular')}}">Popular products</a>

                                </li>




								<li class="menu__item dropdown">
                                    <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Popular category<b class="caret"></b></a>
                                    <ul class="dropdown-menu agile_short_dropdown">
									@if(!empty($popular_category) && count($popular_category)!=0)
										@foreach($popular_category as $category)
                                        <li><a href="{{url('product-list/'.$category->id.'/noav/noav/noav')}}">{{$category->categoryName}}</a></li>
										@endforeach
                                        @else
                                        <li>&nbsp;&nbsp;Popular category Not Available</li>
                                        @endif
                                    </ul>
                                </li>

                                <li class="menu__item dropdown">
                                    <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Ending Soon <b class="caret"></b></a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="icons.html">Web Icons</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                    </ul>
                                </li>
                             
                                <!-- //rinky -->
                                <li class="menu__item dropdown languag-acoount">
                                    <a class="menu__link" href="#" class="dropdown-toggle"
                                        data-toggle="dropdown">Account <b class="caret"></b></a>

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




    <script type="text/javascript">

	$(document).ready(function(){
		$("[id^='cat_li-']").on("click", function(e){
			var num = this.id.split('-')[1];
			$('li.subchildmenus>ul.dropdown-menu').css( "display", "none" );
			$("[id^='cat_li-'] a.test").next("ul #sub_ul-" + num).toggle();
			e.stopPropagation();
			// e.preventDefault();
		});
	});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>

