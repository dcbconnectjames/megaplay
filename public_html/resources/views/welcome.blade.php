<!DOCTYPE html>
@include('partials.head')
<body class="d-flex flex-column h-100">
    <div class="main_content subscribe">
        <div class="header">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" />
            </div>
        </div>

        <div class="feature_section">
            <div class="text_cta">
                <h1>Play to Win!</h1>
                <p>
                    Subscribers get <b style="color: #ecb915">ten chances to win</b> in
                    every Powerball draw!
                </p>

                <a href="#">
                    <div class="CTA">
                        <b>Confirm <i class="fas fa-caret-right"></i></b>
                    </div>
                </a>
            </div>

            <div class="hero_img">
                <img src="assets/img/hero_img.webp" />
            </div>
        </div>

        <div class="steps">
            <div class="divider">
                <img src="assets/img/divider.png" />
            </div>

            <div class="numbered_list">
                <div class="numbered_list_wrap">
                    <h2>How Does it Work?</h2>

                    <div class="columns">
                        <div class="step_1">
                            <h3>1.</h3>
                            <h4>&nbsp;Subscribe</h4>
                            <p>Click on "subscribe" above to subscribe to MegaPlay.</p>
                        </div>

                        <div class="step_2">
                            <h3>2.</h3>
                            <h4>&nbsp;Automatic Entry</h4>
                            <p>
                                You're now part of our subscriber loyalty competition, with 10
                                chances to win every draw!
                            </p>
                        </div>

                        <div class="step_3">
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

        <footer>
            <div class="footer_logo">
                <img src="assets/img/logo.png" alt="logo" />
            </div>
            <p>
                MegaPlay.<br />
                Customer Care: 011 507 4630.<br />
                Service T&Cs.
            </p>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/de86e763d4.js"crossorigin="anonymous"></script>
    <!-- Footer-->
    @include('partials.footer')
</body>
</html>
