@extends('layouts.master')

@section('content')
    <div class="main_content subscribe">
        <div class="header">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" />
            </div>
        </div>

        <div class="feature_section">
            <div class="row pt-5">
                <div class="col-12 col-lg-6">
                    <div class="text_cta">
                        @if (isset($status) && $status == 'notsent')
                            <h1>{{ $message ?? '' }}</h1>
                        @elseif (isset($status) && $status == 'sent')
                            <h1>An SMS has been sent to {{ $msisdn ?? '' }}</h1>
                        @else
                            <h1>Enter Your Mobile Number to Subscribe Now!</h1>
                            <form action="/handlewireless">
                                <div class="form-group mb-1">
                                    <label for="mobile_number">
						                Mobile Number
					                </label> 
					                <div class="input-group">
					                    <div class="input-group-prepend">
					                        <div class="input-group-text rounded-0 mobile-prefix">
					                            <small>+27 (0)</small>
				                            </div>
			                            </div> 
			                            <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile Number" class="form-control form-control-sm rounded-0 phone-only">
		                            </div> 
	                            </div>
                                <button type="submit" class="CTA">
                                    <b>Subscribe <i class="fas fa-caret-right"></i></b>
                                
                                
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="hero_img">
                        <img src="assets/img/hero_img.webp" />
                    </div>
                </div>
            </div>
        </div>

        <div class="steps">
            <div class="divider">
                <img src="assets/img/divider.png" />
            </div>

            <div class="numbered_list">
                <div class="numbered_list_wrap">
                    <h2>How Does it Work?</h2>

                    <div class="columns row">
                        <div class="col-4">
                            <h3>1.</h3>
                            <h4>&nbsp;Subscribe</h4>
                            <p>Click on "subscribe" above to subscribe to MegaPlay.</p>
                        </div>

                        <div class="col-4">
                            <h3>2.</h3>
                            <h4>&nbsp;Automatic Entry</h4>
                            <p>
                                You're now part of our subscriber loyalty competition, with 10
                                chances to win every draw!
                            </p>
                        </div>

                        <div class="col-4">
                            <h3>3.</h3>
                            <h4>&nbsp;Check Your Results</h4>
                            <p>
                                Check back often to see the Powerball results and your
                                competition entries!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
