@extends('layouts.frontend.app')

@section('content')

<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required="">
                            <label>Email</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Sign In">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                        <li><a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            </a></li>
                        <li><a href="#" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            </a></li>
                        <li><a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            </a></li>
                        <li><a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            </a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p><a href="#" data-toggle="modal" data-target="#myModal2"> Don't have an account?</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{url('assets/images/frontend/log_pic.jpg')}}" alt=" " />
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required="">
                            <label>Email</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" name="password" required="">
                            <label>Password</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" name="Confirm Password" required="">
                            <label>Confirm Password</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Sign Up">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                        <li><a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            </a></li>
                        <li><a href="#" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            </a></li>
                        <li><a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            </a></li>
                        <li><a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            </a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p><a href="#">By clicking register, I agree to your terms</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{url('assets/images/frontend/log_pic.jpg')}}" alt=" " />
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->

<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        <li data-target="#myCarousel" data-slide-to="4" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h4 class="banner-save-50"> Order Consolidation </h4>
                    <h3 class="banner-save">Save 50% For</h3>
                    <span class="first-purchase">
                        First Purchase
                    </span>
                    <br />
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item2">
            <div class="container">
                <div class="carousel-caption">
                    <!-- <h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a> -->
                </div>
            </div>
        </div>
        <div class="item item3">
            <div class="container">
                <div class="carousel-caption">

                    <h3>New products </h3>
                    <p class="paraghraph">Apple Hand Pipe, Zig-zag original rolling tips</p>
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item4">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Summer <span>Collection</span></h3>
                    <p>New Arrivals On Sale</p>
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item5">
            <div class="container">
                <div class="carousel-caption">
                    <h3>The Biggest <span>Sale</span></h3>
                    <p>Special for today</p>
                    <a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div>
<!-- //banner -->
<div class="banner_bottom_agile_info">
    <div class="container-fluid  newclass">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3 col-12">
            <div class="card ">
                <div class="row">
                    <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">
                        <p class="font-family-change">HOT ITEMS</p>

                    </div>

                    <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                        <div class="buttons-left-right">
                            <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                            <i class="fa fa-chevron-circle-right" style="font-size:24px"></i>
                        </div>
                    </div>

                </div>
                <hr class="margin-top-bottom">
                <div>
                    <div class="row">

                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                            <div class="images image-left">
                                <div class="background-gray left-side">
                                    <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                </div>

                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-lg-9 col-xl-9 col-12">
            <div class="card">
                <!-- ghkhfghj	 -->

                <div class="row">

                    <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                        <p class="font-family-change">POPULAR ITEMS</p>

                    </div>

                    <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">

                        <div class="buttons-left-right">
                            <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                            <i class="fa fa-chevron-circle-right" style="font-size:24px"></i>
                        </div>
                        <ul class="popular-items tab">
                            <li>
                                <button class="tablinks" onclick="openCity(event, 'Fruits')">Fruits</button>
                            </li>
                            <li>
                                <button class="tablinks" onclick="openCity(event, 'Meet')">Meet</button>
                            </li>
                            <li>
                                <button class="tablinks" onclick="openCity(event, 'Vegetables')">Vegetables</button>
                            </li>
                            <li>
                                <button class="tablinks" onclick="openCity(event, 'All')" id="defaultOpen">
                                    All</button>
                            </li>

                        </ul>

                    </div>

                </div>
                <hr class="margin-top-bottom">


                <div id="All" class="tabcontent all">
                    <div class="row">

                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                </div>

                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/product-2-191x132_copy.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/pngkey.com-computer-png-44599.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/imgbin_home-appliance-washing-machine-refrigerator-png.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
								<div class="images">
									
									<img src="images/kindpng_1404282.png" alt="" srcset=""/>
									<br/>
									<br/>
								
								<h4>B2b Product Name</h4>
								<span>$100.00 &nbsp; <span> $90.00  </span></span>
								</div>
								
							</div>
							<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
								<div class="images">
									
									<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
									<br/>
									<br/>
								
								<h4>B2b Product Name</h4>
								<span>$100.00 &nbsp; <span> $90.00  </span></span>
								</div>
								
							</div> -->

                    </div>
                </div>

                <div id="Vegetables" class="tabcontent">
                    <div class="row">

                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div id="Meet" class="tabcontent">
                    <div class="row">

                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                </div>

                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/product-2-191x132_copy.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/pngkey.com-computer-png-44599.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">
                                <div class="background-gray">
                                    <img src="{{url('assets/images/frontend/imgbin_home-appliance-washing-machine-refrigerator-png.png')}}" alt="" srcset="" />
                                </div>
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
								<div class="images">
									
									<img src="images/kindpng_1404282.png" alt="" srcset=""/>
									<br/>
									<br/>
								
								<h4>B2b Product Name</h4>
								<span>$100.00 &nbsp; <span> $90.00  </span></span>
								</div>
								
							</div>
							<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
								<div class="images">
									
									<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
									<br/>
									<br/>
								
								<h4>B2b Product Name</h4>
								<span>$100.00 &nbsp; <span> $90.00  </span></span>
								</div>
								
							</div> -->

                    </div>
                </div>

                <div id="Fruits" class="tabcontent">
                    <div class="row">

                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                            <div class="images">

                                <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                <br />
                                <br />

                                <h4>B2b Product Name</h4>
                                <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o checked"></span>
                                    <span class="fa fa-star-o checked"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

        </div>
    </div>
</div>

<!-- Special  -->

<div class="banner_bottom_agile_info_bottom---5">
    <div class="container-fluid  newclass">


        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3 col-12 reducewidth nnnn">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card ">
                        <div class="row">
                            <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                                <p class="font-family-change">SPEACIAL ITEMS</p>

                            </div>

                            <div class="col-12 col-md-4 col-sm-4 col-lg-4 col-xl-4">
                                <div class="buttons-left-right">
                                    <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i>
                                </div>
                            </div>

                        </div>
                        <hr class="margin-top-bottom">
                        <div>
                            <div class="row">

                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                    <div class="images image-left">
                                        <div class="background-gray left-side">
                                            <img src="{{url('assets/images/frontend/pngkey.com-box-png-274941 (1).png')}}" alt="" srcset="" />
                                        </div>

                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card ">
                        <div class="row">
                            <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                                <p class="font-family-change">NEWSLETTERS</p>

                            </div>
                        </div>
                        <hr class="margin-top-bottom">
                        <div>
                            <div class="row">

                                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                    <div class="images image-left">
                                        <div class="background-white">
                                            <span class="newslatter">
                                                Sign Up for Our Newslatters!
                                            </span>
                                            <div class="inputfieldform">
                                                <input type="text" class="inputfield">
                                            </div>
                                            <div>
                                                <input type="button" value="SUBSCRIBE" class="buttonSubscribe">
                                            </div>
                                            <!-- <img src="images/pngkey.com-box-png-274941 (1).png" alt="" srcset=""/> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 adv-image-left" style="background: url('assets/images/frontend/Layer_63.png');
					margin-left: 15px;
					background-repeat: no-repeat;
				  ">

                </div>

            </div>

        </div>
        <div class="col-md-9 col-sm-9 col-lg-9 col-xl-9 col-12 reducewidth">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card">
                        <!-- ghkhfghj	 -->

                        <div class="row">

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">

                                <div class="module" style="background: url(assets/images/frontend/download.png);background-attachment: fixed;
									  background-position: center;
									">

                                    <header>
                                        <div class="rotationclass">
                                            <h1 class="yearColor">
                                                2021

                                            </h1>
                                            <span class="Deals">
                                                BEST DEAL<br />
                                            </span>
                                            <br /><br />
                                            <span class="anchor-tag">
                                                <a href="#" class="buynow">BUY NOW</a>
                                            </span>
                                            <p class="bottom-heading">
                                                *on selected items only
                                            </p>
                                        </div>
                                    </header>
                                </div>

                            </div>

                            <div class="col-12 col-md-6 col-sm-6 col-lg-6 col-xl-6">


                                <div class="module" style="background: url('assets/images/frontend/download (1).png');background-attachment: fixed;
									  background-position: center;
									">

                                    <header>
                                        <div class="rotationclass">
                                            <h1 class="yearColor">
                                                2021

                                            </h1>
                                            <span class="Deals">
                                                BEST DEAL<br />
                                            </span>
                                            <br /><br />
                                            <span class="anchor-tag">
                                                <a href="#" class="buynow">BUY NOW</a>
                                            </span>
                                            <p class="bottom-heading">
                                                *on selected items only
                                            </p>
                                        </div>
                                    </header>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card">
                        <!-- ghkhfghj	 -->

                        <div class="row">

                            <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                                <p class="font-family-change">LATEST PRODUCT</p>

                            </div>

                            <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">

                                <div class="buttons-left-right">
                                    <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i>
                                </div>
                                <ul class="popular-items tab">
                                    <li>
                                        <button class="tablinks2" onclick="open2(event, 'Fruits2')">Fruits</button>
                                    </li>
                                    <li>
                                        <button class="tablinks2" onclick="open2(event, 'Meet2')">Meet</button>
                                    </li>
                                    <li>
                                        <button class="tablinks2" onclick="open2(event, 'Vegetables2')">Vegetables</button>
                                    </li>
                                    <li>
                                        <button class="tablinks2" onclick="open2(event, 'All2')" id="defaultOpen2">
                                            All</button>
                                    </li>

                                </ul>

                            </div>

                        </div>
                        <hr class="margin-top-bottom">


                        <div id="All2" class="tabcontent2 all">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>

                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/product-2-191x132_copy.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-computer-png-44599.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/imgbin_home-appliance-washing-machine-refrigerator-png.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="images/kindpng_1404282.png" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div>
									<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div> -->

                            </div>
                        </div>

                        <div id="Vegetables2" class="tabcontent2">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div id="Meet2" class="tabcontent2">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>

                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/product-2-191x132_copy.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/pngkey.com-computer-png-44599.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">
                                        <div class="background-gray">
                                            <img src="{{url('assets/images/frontend/imgbin_home-appliance-washing-machine-refrigerator-png.png')}}" alt="" srcset="" />
                                        </div>
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="images/kindpng_1404282.png" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div>
									<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div> -->

                            </div>
                        </div>

                        <div id="Fruits2" class="tabcontent2">
                            <div class="row">

                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
                                    <div class="images">

                                        <img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset="" />
                                        <br />
                                        <br />

                                        <h4>B2b Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>



                    </div>

                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 adv-right-side">
                    <div class="adv-right">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                            <img src="{{url('assets/images/frontend/download (2).png')}}" class="ad-right" alt="">

                            <!-- <img src="images/Layer_63.png" alt=""> -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-12">
                            <div class="right-adv">
                                <h1 class="wholesale">WHOLESALE PRODUCTS</h1>
                                <h1 class="readytosell">READY TO SELL NOW 50% OFF!</h1>
                                <button class="colorBlack">SHOP NOW</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12">
                    <div class="card">
                        <!-- ghkhfghj	 -->

                        <div class="row">

                            <div class="col-12 col-md-5 col-sm-5 col-lg-5 col-xl-5">
                                <p class="font-family-change">FEATURED PRODUCTS</p>

                            </div>

                            <div class="col-12 col-md-7 col-sm-7 col-lg-7 col-xl-7">

                                <div class="buttons-left-right">
                                    <i class="fa fa-chevron-circle-left" style="font-size:24px"></i>
                                    <i class="fa fa-chevron-circle-right" style="font-size:24px"></i>
                                </div>
                                <ul class="popular-items tab">
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'Fruits3')">Fruits</button>
                                    </li>
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'Meet3')">Meet</button>
                                    </li>
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'Vegetables3')">Vegetables</button>
                                    </li>
                                    <li>
                                        <button class="tablinks3" onclick="open3(event, 'All3')" id="defaultOpen3">
                                            All</button>
                                    </li>

                                </ul>

                            </div>

                        </div>
                        <hr class="margin-top-bottom">


                        <div id="All3" class="tabcontent3 all">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/product-3-238x158_(1)_copy.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/ciyp-bulk-image1.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/istockphoto-1159952152-612x612.jpg')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="images/kindpng_1404282.png" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div>
									<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div> -->

                            </div>
                            <div class="row margin-top">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/besan-besan-fortune-original-imag4gb4hzv2qzvy.jpeg')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/dsc07685_1280.jpg')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="Vegetables3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="images/kindpng_1404282.png" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div>
									<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div> -->

                            </div>
                        </div>

                        <div id="Meet3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="images/kindpng_1404282.png" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div>
									<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div> -->

                            </div>
                        </div>

                        <div id="Fruits3" class="tabcontent3">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-xs-12 col-md-4 col-sm-4 col-lg-4 col-xl-4 reducewidth">

                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                                        <div class="background-gray new-size">
                                            <img src="{{url('assets/images/frontend/pngkey.com-surveillance-camera-png-1940678.png')}}" alt="" srcset="" />
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 reducewidth col-xs-6">
                                        <h4>Product Name</h4>
                                        <span><strike>$100.00</strike> &nbsp; <span> $90.00 </span></span>
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o checked"></span>
                                            <span class="fa fa-star-o checked"></span>

                                        </div>
                                    </div>

                                </div>

                                <!-- <div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="images/kindpng_1404282.png" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div>
									<div class="col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3">
										<div class="images">
											
											<img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" alt="" srcset=""/>
											<br/>
											<br/>
										
										<h4>B2b Product Name</h4>
										<span>$100.00 &nbsp; <span> $90.00  </span></span>
										</div>
										
									</div> -->

                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>

    </div>
</div>

<!-- Special  -->




<section class="trigger section gutter-horizontal bg-gray gutter-vertical--m gutter-horizontal">
    <div class="customer-logos slider">

        <!-- <div class="slide-in-right slide"><img src="images/brand4.png" alt="Kinderhotel Aschauerhof" height="150" width="150"></a></div> -->

        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/e4923bf90c04345e43aada42486ebc4f9a3e56eb/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f677265656e732d666f6f642d737570706c696572732e737667" alt="Kinderhotel Aschauerhof" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/1c89cd43ff20ebfdae6d7dfc615bed22897d4f2c/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f6175746f2d73706565642e737667" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/e7141f1aa02b6721a702b44a3b14b7383e4539ed/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f63726f6674732d6163636f756e74616e74732e737667" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/339edd4ba206d97f2bc7c03f7b7fd5a1b5c97111/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f63686573686972652d636f756e74792d68796769656e652d73657276696365732e737667" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/b9d65aaf5e5d1769f8bb0e04247ff6cfa0efa2ab/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f666173742d62616e616e612e737667" height="150" width="150" alt="Tannenmuehle"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/8d4fa451b4f47d2d10ff585a78f7fbd88f8f5530/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f73706163652d637562652e737667" height="150" width="150" alt="Loeffele"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/1e0d6f19906c869766d638227e7e3936aa9295c7/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f6265617574792d626f782e737667" alt="Krone" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/0072b8f37157c7e0238342d8105dcc2c9b1e2217/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f626162792d7377696d2e737667" alt="Obereggen" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/6b4aa115c3423ecbad9da2dba885d2d43084acfa/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f7468652d64616e63652d73747564696f2e737667" alt="Ortnerhof" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/b0e5c1e174dcb2911bc712f240f7163fe597628c/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f6a616d65732d616e642d736f6e732e737667" alt="Ottonenhof" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/370291c50b74eeab6fe66ccc9e6ca410fc117ed9/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f7468652d7765622d776f726b732e737667" alt="Leiners" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/0112d20015b4dad56fbb07088e76552042539151/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f70657465732d626c696e64732e737667" alt="Seitenalm" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img src="https://camo.githubusercontent.com/e4eb289d352d7c4cbb8493d6a212448036e3e2d2/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f796f67612d626162792e737667" alt="Testerhof" height="150" width="150"></a></div>
</section>




<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login">
                        <div class="login-bottom">
                            <h3>Sign up for free</h3>
                            <form>
                                <div class="sign-up">
                                    <h4>Email :</h4>
                                    <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                                </div>
                                <div class="sign-up">
                                    <h4>Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                </div>
                                <div class="sign-up">
                                    <h4>Re-type Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                </div>
                                <div class="sign-up">
                                    <input type="submit" value="REGISTER NOW">
                                </div>

                            </form>
                        </div>
                        <div class="login-right">
                            <h3>Sign in with your account</h3>
                            <form>
                                <div class="sign-in">
                                    <h4>Email :</h4>
                                    <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                                </div>
                                <div class="sign-in">
                                    <h4>Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="single-bottom">
                                    <input type="checkbox" id="brand" value="">
                                    <label for="brand"><span></span>Remember Me.</label>
                                </div>
                                <div class="sign-in">
                                    <input type="submit" value="SIGNIN">
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>

<!-- //cart-js -->
<script>
    $(document).ready(function() {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!-- //script for responsive tabs -->
<!-- stats -->

<script>
    $('.counter').countUp();
</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        function codeAddress() {
            document.getElementById('defaultOpen').click();
            document.getElementById('defaultOpen2').click();
            document.getElementById('defaultOpen3').click();
        }
        window.onload = codeAddress;
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>

<script>
    function openCity(evt, cityName = "All") {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    function open2(evt, cityName = "All2") {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent2");
        console.log("jhdfj ", tabcontent)

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks2");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function open3(evt, cityName = "All3") {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent3");
        console.log("jhdfj ", tabcontent)

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks2");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        	var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear' 
        	};
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //here ends scrolling icon -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: true,
            dots: false,
            pauseOnHover: false,
            prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
            nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
        });
    });
</script>
<!-- for bootstrap working -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

@endsection