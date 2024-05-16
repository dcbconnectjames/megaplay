@extends('layouts.master')

@section('content')
    <div class="main_content subscribe">
        <div class="header">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" />
            </div>
        </div>
        
        <div class="row pt-5">
            <div class="col-12 col-lg-6">
                <div class="text_cta">
                    <h1>Play to Win!</h1>
                    <p>
                        Subscribers get <b style="color: #ecb915">ten chances to win</b> in
                        every Powerball draw!
                    </p>

                    <a href="http://sdp.smartcalltech.co.za/traffic/8ca10a73-1c0c-40a6-8c66-27fdc52016d7?tag={{ $tag }}&ref={{ $ref }}">
                        <div class="CTA">
                            <b>Subscribe <i class="fas fa-caret-right"></i></b>
                        </div>
                    </a>
                    <p style="font-size: 16px; padding-top: 10px; padding-left: 2px;">
                        Subscription R5/day.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="hero_img">
                    <img src="assets/img/hero_img.webp" />
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
                        <div class="col-12 col-lg-4">
                            <h3>1.</h3>
                            <h4>&nbsp;Subscribe</h4>
                            <p>Click on "subscribe" above to subscribe to MegaPlay.</p>
                        </div>

                        <div class="col-12 col-lg-4">
                            <h3>2.</h3>
                            <h4>&nbsp;Automatic Entry</h4>
                            <p>
                                You're now part of our subscriber loyalty competition, with 10
                                chances to win every draw!
                            </p>
                        </div>

                        <div class="col-12 col-lg-4">
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
