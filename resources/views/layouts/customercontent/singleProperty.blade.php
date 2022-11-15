<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="glimmer is a modern presentation HTML5 Blog template.">
    <meta name="keywords" content="HTML5, Template, Design, Development, Blog" />
    <meta name="author" content="">

    <!-- Titles
    ================================================== -->
    <title>House Rent | Home 01</title>

    <!-- Favicons
    ================================================== -->

    <link rel="shortcut icon" href="{{asset('assets/images/house-logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset ('assets/images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" href="{{asset ('images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" href="{{asset ('images/apple-touch-icon-114x114.png') }}">

    <!-- Custom Font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i%7cPoppins:300,400,500,600,700" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset ('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/css/colors.css') }}">
    <link rel="stylesheet" href="{{asset ('style.css') }}">
    <!-- Modernizr
    ================================================== -->
    <script src="{{asset ('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    @include('layouts.partilas.header')
     <!-- ====== Page Header ====== -->
     <div class="page-header default-template-gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">House</h2>
                    <p class="page-description">More Details About Apartment</p>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->
    </div><!-- /.page-header -->

   <!-- ====== Breadcrumbs Area====== -->
   <div class="breadcrumbs-area">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="breadcrumbs">
                       <span class="first-item">
                        <a href="index01.html">Home</a></span>
                       <span class="separator">&gt;</span>
                       <span class="last-item">Apartment Single Page</span>
                   </div>
               </div><!-- /.col-md-12 -->
           </div><!-- /.row -->
       </div><!-- /.container -->
   </div><!-- /.breadcrumbs-area -->

   {{-- {{ dd($property) }} --}}

	<!-- ====== Apartments-Single-Area ======= -->
	<div class="apartment-single-area">
	  	<div class="container">
		  	<div class="row">
			    <div class="col-md-8">
    				<div class="corousel-gallery-content">
    					  <div class="gallery">
    					       {{-- <div class="full-view owl-carousel"> --}}
    					     	  <a class="item image-pop-up" href="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}">
    					     		  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel">
    					     	  </a>
    					     	  {{-- <a class="item image-pop-up" href="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}">
    					     		  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel">
    					     	  </a>
    					     	  <a class="item image-pop-up" href="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}">
    					     		  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel">
    					     	  </a>
    					     	  <a class="item image-pop-up" href="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}">
    					     		  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel">
    					     	  </a>
    					     	  <a class="item image-pop-up" href="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}">
    					     		  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel">
    					     	  </a>
                                  <a class="item image-pop-up" href="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}">
    					     		  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel">
    					     	  </a> --}}
    					       {{-- </div> --}}

    					      {{-- <div class="list-view owl-carousel">
    					          <div class="item">
    					        	  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel-image">
    					          </div>
    					          <div class="item">
    					        	  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel-image">
    					          </div>
    					          <div class="item">
    					        	  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel-image">
    					          </div>
    					          <div class="item">
    					        	  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel-image">
    					          </div>
    					          <div class="item">
    					        	  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel-image">
    					          </div>
    					          <div class="item">
    					        	  <img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="corousel-image">
    					          </div>
    					      </div>
    					  </div> <!-- /.gallery-two --> --}}
    				</div> <!-- /.corousel-gallery-content -->

    				<div class="family-apartment-content mobile-extend">
                        <div class="tb">
                            <div class="tb-cell">
        					   <h3 class="apartment-title">{{ $property->name }}</h3>
                            </div><!-- /.tb-cell -->
                            <div class="tb-cell">
        					   <p class="pull-right rent">$ {{ $property->rent }}</p>
                            </div><!-- /.tb-cell -->
                        </div><!-- /.tb -->
    					<div class="clearfix"></div><!-- /.clearfix -->
    					<p class="apartment-description default-gradient-before">{{ $property->address }}</p>

    					<div class="price-details">
    						<h3>Price Details-</h3>
    						<ul>
    							<li><span>Rent/Month: </span> $ {{ $property->rent }} (negotiable)</li>
    							<li><span>Service Charge :</span> 8,000/k per month, subject to change</li>
    							<li><span>Security Deposit :</span> 3 month’s rent</li>
    							<li><span>Flat Release Policy :</span> 3 months earlier notice required</li>
    						</ul>
    					</div><!-- /.price -->

    					<div class="property-details">
    						<h3>Property Details-</h3>
    						<ul>
    							<li><span>Address  &amp; Area :</span> {{ $property->address }}</li>
    							<li><span>Flat Size :</span> {{ $property->size }} Sq Feet.</li>
    							<li><span>Floor :</span> A5 (5th Floor) (6 storied Building ) (South Facing Unit)</li>
    							<li><span>Room Category :</span> {{ $property->room_category }}</li>
    							<li><span>Facilities :</span> {{ $property->additional_facilities }} </li>
    						</ul>
    					</div><!-- /.Property -->
    					<div class="apartment-overview">
    						<div class="row">
    							<div class="col-md-12">
    								<h3>Apartment Overview</h3>
    								<div class="overview">
                                        {{ $property->apt_overview }}
                                    </div><!-- /.apartment-overview -->
    							</div><!-- /.col-md-12 -->
    						</div><!-- /.row -->
    					</div><!-- /.overview -->
    					<div class="indoor-features">
    						<div class="row">
    							<div class="col-md-6">
    								<h3 class="features-title">Indoor features:</h3>
    								{{ $property->apt_overview }}
    							</div><!-- /.col-md-6 -->

    						</div><!-- /.row -->
    					</div><!-- /.indoor -->
    				</div><!-- /.family-apartment-content -->
                    <div class="hidden-md hidden-lg text-center extend-btn">
                        <span class="extend-icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </div>
			    </div> <!-- /.col-md-8 -->

    			<div class="col-md-4">
                    <div class="apartment-sidebar">
        				<div class="widget_rental_search clerafix">
        					<div class="form-border gradient-border">
        						<form action="booking.html" method="get" class="advance_search_query booking-form">
        							<div class="form-bg seven">
        								<div class="form-content">
                                            <h2 class="form-title">Book This Apartment</h2>
        									<div class="form-group">
        									   <label>Full Name</label>
        									   <input type="text" name="FirstName" placeholder="Full name">
        									</div><!-- /.form-group -->
        									<div class="form-group">
                            					<label>Phone Number</label>
                                                <input type="tel" name="phone number" placeholder="+99(99)9999-9999">
        									</div><!-- /.form-group -->
        									<div class="form-group">
        										<label>Email Address</label>
        										<input type="email" name="Email" placeholder="example@domain.com">
        									</div><!-- /.form-group -->
        									<div class="form-group">
        									    <label>Family Member</label>
                                                <input type="number" step="1" min="1" max="100" name="quantity" value="1" title="Qty" size="4" class="input-text">
        									</div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Children</label>
                                                <input type="number" step="1" min="1" max="100" name="quantity" value="1" title="Qty" size="4" class="input-text">
                                            </div><!-- /.form-group -->
        									<div class="form-group">
        									    <label>Your Message</label>
        		                                <textarea name="message" placeholder="Message" class="form-controller"></textarea>
        									</div><!-- /.form-group -->
        									<div class="form-group">
        										<button type="submit" class="button default-template-gradient button-radius">Request Booking</button>
        									</div><!-- /.form-group -->
        								</div><!-- /.form-content -->
        							</div><!-- /.form-bg -->
        						</form> <!-- /.advance_search_query -->
        					</div><!-- /.form-border -->
        				</div><!-- /.widget_rental_search -->

        				<div class="apartments-content seven post clerafix">
        					<div class="image-content">
        						<a href="#"><img class="overlay-image" src="assets/images/apartment-ad.png" alt="about" /></a>
        					</div><!-- /.image-content -->
        				</div><!-- /.partments-content -->
                    </div><!-- /.apartment-sidebar -->
    			</div> <!-- .col-md-4 -->
		  	</div> <!-- /.row -->
	  	</div> <!-- /.container -->
  	</div> <!-- /.appartment-single-area -->

	<!-- ====== Apartments-Related-area ====== -->
	<div class="apartments-related-area bg-gray-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-content-one">
					    <h2 class="title default-text-gradient">Related apartments</h2>
					</div><!-- /.Apartments-heading-content -->
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="apartments-content">
                        <div class="image-content">
                            <a href="#"><img src="assets/images/apartment/apartment-one.png" alt="apartment" /></a>
                        </div><!-- /.image-content -->

                        <div class="text-content">
                            <div class="top-content">
                                <h3><a href="#">Family Apartment</a></h3>
                                <span><a href="#"><i class="fa fa-map-marker"></i></a> <a href="#">Dhanmondi, Dhaka</a>  </span>
                            </div><!-- /.top-content -->
                            <div class="bottom-content clearfix">
                                <div class="meta-bed-room">
                                    <i class="fa fa-bed"></i> 3 Bedrooms
                                </div>
                                <div class="meta-bath-room">
                                    <i class="fa fa-bath"></i>2 Bathroom
                                </div>
                                <span class="clearfix"></span>
                                <div class="rent-price pull-left">
                                    $200
                                </div>
                                <div class="share-meta dropup pull-right">
                                    <ul>
                                        <li class="dropup">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.bottom-content -->
                        </div><!-- /.text-content -->
                    </div><!-- /.partments-content -->
                </div><!-- /.col-md-4 -->

				<div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="apartments-content">
                        <div class="image-content">
                            <a href="#"><img src="assets/images/apartment/apartment-two.png" alt="apartment" /></a>
                        </div><!-- /.image-content -->

                        <div class="text-content">
                            <div class="top-content">
                                <h3><a href="#">Family Apartment</a></h3>
                                <span><a href="#"><i class="fa fa-map-marker"></i></a> <a href="#">Dhanmondi, Dhaka</a>  </span>
                            </div><!-- /.top-content -->
                            <div class="bottom-content clearfix">
                                <div class="meta-bed-room">
                                    <i class="fa fa-bed"></i> 3 Bedrooms
                                </div>
                                <div class="meta-bath-room">
                                    <i class="fa fa-bath"></i>2 Bathroom
                                </div>
                                <span class="clearfix"></span>
                                <div class="rent-price pull-left">
                                    $200
                                </div>
                                <div class="share-meta dropup pull-right">
                                    <ul>
                                        <li class="dropup">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.bottom-content -->
                        </div><!-- /.text-content -->
                    </div><!-- /.partments-content -->
                </div><!-- /.col-md-4 -->

				<div class="clearfix hidden-md hidden-lg"></div>

				<div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="apartments-content">
                        <div class="image-content">
                            <a href="#"><img src="assets/images/apartment/apartment-three.png" alt="apartment" /></a>
                        </div><!-- /.image-content -->

                        <div class="text-content">
                            <div class="top-content">
                                <h3><a href="#">Family Apartment</a></h3>
                                <span><a href="#"><i class="fa fa-map-marker"></i></a> <a href="#">Dhanmondi, Dhaka</a>  </span>
                            </div><!-- /.top-content -->
                            <div class="bottom-content clearfix">
                                <div class="meta-bed-room">
                                    <i class="fa fa-bed"></i> 3 Bedrooms
                                </div>
                                <div class="meta-bath-room">
                                    <i class="fa fa-bath"></i>2 Bathroom
                                </div>
                                <span class="clearfix"></span>
                                <div class="rent-price pull-left">
                                    $200
                                </div>
                                <div class="share-meta dropup pull-right">
                                    <ul>
                                        <li class="dropup">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.bottom-content -->
                        </div><!-- /.text-content -->
                    </div><!-- /.partments-content -->
                </div><!-- /.col-md-4 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.Apartments-Related-area-->

    <!-- ====== Call To Action ======== -->
    <div class="call-to-action default-template-gradient">
        <div class="container">
            <div class="row tb">
                <div class="col-md-6 col-sm-6 tb-cell">
                    <div class="contact-left-content">
                        <h3>Do you want to Rent your House</h3>
                        <h4>Call us and list your property here</h4>
                    </div><!-- /.contact-left-content -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 tb-cell">
                    <div class="contact-right-content">
                        <h4><a href="#">+880123654987<span>company@gmail.com</span></a></h4>
                        <a href="#" class="button">Contact us</a>
                    </div><!-- /.contact-right-content -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.call-to-action -->

    <!-- ====== Contact Area ====== -->
    <div class="contact-area">
        <div class="container-large-device">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-content-two available">
                            <h2 class="title">We Are Available<br/> For You 24/7</h2>
                            <h5 class="sub-title">Our online support service is always 24 Hours</h5>
                        </div><!-- /.testimonial-heading-content -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-7">
                        <div class="map-left-content">
                            <iframe width="600" height="350" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC871wKM6aoCLSV_pT3xBVsYzNGXaDh7Pw&q=121King+St,Melbourne+VIC+3000,Australia" allowfullscreen="allowfullscreen"></iframe>
                        </div><!-- /.mapl-left-content -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="map-right-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-address-book"></i>Address</h4>
                                        <p>112/B - Road 121, King/St Melbourne Australia</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-envelope"></i>Mail</h4>
                                        <p>yourmail@domain.com houserent@domain.com</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-phone-square"></i>Call</h4>
                                        <p>+99 0215469875 <br/>666 35874692050</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-user-circle"></i>Social account</h4>
                                        <div class="social-icon">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </div><!-- /.Social-icon -->
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.map-right-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div><!-- /.contact-area -->
</body>
</html>
