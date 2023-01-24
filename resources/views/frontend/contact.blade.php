@extends('layouts.frontend')

@section('home_content')

	
 <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Contact Us</h2>
                    <div class="page_link">
                        <a href="#">Home</a>
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
     @include('includes.message')
    <!--================Contact Area =================-->
    <section class="contact_area p_120">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>{{ $company->company_address }}</h6>
                            <br>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a href="#">{{ $company->company_phone }}</a>
                            </h6>
                           <br>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>
                                <a href="#">{{ $company->company_email }}</a>
                            </h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="{{ route('save-contact') }}" method="post" id="contactForm" novalidate="novalidate">
                    	@csrf
                        <div class="col-md-6">
                            @if(!Auth::guard('customer')->user())
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="user_name" placeholder="Enter your name" required="">
                            </div>
                            @endif
                             @if(Auth::guard('customer')->user())
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="user_name" placeholder="Enter your name" required="" value="{{ Auth::guard('customer')->user()->name }}">
                            </div>
                            @endif

                            @if(!Auth::guard('customer')->user())
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="user_email" placeholder="Enter email address" required="">
                            </div>
                            @endif

                            @if(Auth::guard('customer')->user())
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="user_email" placeholder="Enter email address" required="" value="{{ Auth::guard('customer')->user()->email }}">
                            </div>
                            @endif

                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

  
    <!--================ End footer Area  =================-->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->


	<!--================End Category Product Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

@endsection