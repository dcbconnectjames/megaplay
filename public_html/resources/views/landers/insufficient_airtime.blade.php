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
                <div class="icon">
                    <img src="assets/img/warning.png" alt="check mark" />
                </div>
                <p>
                    Sorry! You have <b>insufficient airtime</b> to perform this action.
                </p>

                <a href="/">
                    <div class="CTA">
                        <b>Return to Home <i class="fas fa-caret-right"></i></b>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
