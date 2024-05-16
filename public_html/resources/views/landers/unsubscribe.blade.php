@extends('layouts.master')

@section('content')
    <div class="main_content centered declined template">
        <div class="header">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" />
            </div>
        </div>

        <div class="feature_section">
            <div class="text_cta">
                <h1>Unsubscribe</h1>
                <p>
                    Are you sure you want to unsubscribe? Don&#39;t miss out on
                    <b style="color: #ecb915">ten chances to win</b> in every Powerball
                    draw!
                </p>
                
                <form action="/dounsub">
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text rounded-0">
                                <small>+27 (0)</small>
                            </div>
                        </div> 
                        <input type="number" id="msisdn" name="msisdn" placeholder="Mobile Number" class="form-control form-control-sm rounded-0 phone-only">
                    </div>

                
                    <div class="CTA">
                        <button type="submit" class="btn btn-default">Unsubscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
