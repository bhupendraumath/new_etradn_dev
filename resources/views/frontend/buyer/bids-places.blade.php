@extends('layouts.frontend.app')

@section('content')

<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l-seller-dashboard">
    <div class="container">
        <h3>MY PLACED BIDS</h3>

    </div>
</div>
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container-fluid dashboard-container">

        @include('frontend/include/buyer-side-bar')
        <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-12">
            <div class="card-dashboard  col-12uy">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <div class="inner-addon left-addon search-bar">
                            <i class="fa fa-search glyphicon"></i>
                            <input type="text" class="form-control 60per lock change-style-search" name="payment-id" placeholder="Searching..." />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12 float-right">
                        <!-- filter section    -->
                        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="filter-button">Pending Result <i class="fas fa-filter" style="color:black"></i></button>

                        <div id="id01" class="modal">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                            <h3>Filter using...</h3>
                            <div class="products-wrap">
                                <p><strong>Filter products by colour:</strong></p>
                                <form>
                                    <label><input type="checkbox" name="fl-colour" value="red" id="red" /> Red</label><br>
                                    <label><input type="checkbox" name="fl-colour" value="yellow" id="yellow" /> Yellow</label><br>
                                    <label><input type="checkbox" name="fl-colour" value="pink" id="pink" /> Pink</label><br>
                                    <label><input type="checkbox" name="fl-colour" value="purple" id="purple" /> Purple</label><br>
                                    <label><input type="checkbox" name="fl-colour" value="green" id="green" /> Green</label><br>
                                    <label><input type="checkbox" name="fl-colour" value="other" id="other" /> Other</label>
                                </form>
                                <p><strong>Filter products by size:</strong></p>
                                <form>
                                    <label><input type="checkbox" name="fl-size" value="tiny" id="tiny" /> Tiny</label><br>
                                    <label><input type="checkbox" name="fl-size" value="small" id="small" /> Small</label><br>
                                    <label><input type="checkbox" name="fl-size" value="medium" id="medium" /> Medium</label><br>
                                    <label><input type="checkbox" name="fl-size" value="large" id="large" /> Large</label><br>
                                    <label><input type="checkbox" name="fl-size" value="giant" id="giant" /> Giant</label>
                                </form>
                                <p><strong>Filter products by continents:</strong></p>
                                <form>
                                    <div><input type="checkbox" name="fl-cont" value="africa" id="africa" /> Africa </div>
                                    <div><input type="checkbox" name="fl-cont" value="europe" id="europe" />
                                        Europe</div>
                                    <div><input type="checkbox" name="fl-cont" value="asia" id="asia" />
                                        Asia</div>
                                    <div><input type="checkbox" name="fl-cont" value="north-america" id="north-america" />
                                        North America</div>
                                    <div><input type="checkbox" name="fl-cont" value="south-america" id="south-america" />
                                        South America </div>
                                    <label><input type="checkbox" name="fl-cont" value="antarctica" id="antarctica" />
                                        Antarctica</label>
                                    <div><input type="checkbox" name="fl-cont" value="australasia" id="australasia" />
                                        Australasia</div>
                                </form>
                            </div>


                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Submit</button>
                            </div>

                        </div>


                        <!-- filter section    -->


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <!-- <p class="no-results">No more results found</p> -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-12">
                        <!-- <div class="inner-addon left-addon">
                        <i class="fab fa-paypal glyphicon"></i>
                        <input type="text" class="form-control 60per lock" name="Current-password" placeholder="Payment gateway ID*" />
                        </div> -->
                    </div>
                </div>

                <br /><br />


                <div class="products row">

                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="aloe" data-category="green small medium africa">
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
                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="gorse" data-category="green yellow large europe">
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

                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="hemp" data-category="green large asia">
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
                    <div class="product col-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" data-id="lavendar" data-category="purple green medium africa europe">
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
                </div>
                <br /><br />
            </div>
        </div>
    </div>
</div>

@endsection