    {{-- Contact US --}}
   
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/style.css') }}" />


    <section class="relative">
        <section class="ftco-section contact-section ftco-no-pb" data-section="contact">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Contact</span>
                        <h2 class="mb-4">Contact Us</h2>
                        <p>Never leave a question without answer</p>
                    </div>
                </div>
                <div class="row no-gutters block-9">
                    <div class="col-md-6 order-md-last d-flex">
                        <form action="" method="post" class="bg-light p-5 contact-form"
                            action="{{ route('contact.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" id="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email" id="email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" id="subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="message" cols="30" rows="7" class="form-control"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
                            </div>
                        </form>


                    </div>

                    <div class="col-md-6 d-flex">
                        <div id="map" class="bg-white">

                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- contact person --}}
        <section class="ftco-section contact-section">
            <div class="container">
                <div class="row d-flex contact-info">
                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-map-signs"></span>
                            </div>
                            <h3 class="mb-4">Address</h3>
                            <p>250mts north in Santa Ana infront of Terramix</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-phone2"></span>
                            </div>
                            <h3 class="mb-4">Contact Number</h3>
                            <p><a href="tel://+50685706412">(+506) 85706412</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <h3 class="mb-4">Email Address</h3>
                            <p><a href="mailto:circlewood@realstate.com">circlewood@realstate.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-globe"></span>
                            </div>
                            <h3 class="mb-4">Website</h3>
                            <p><a href="#">circlewood@realstate.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00" />
            </svg></div>


        <script type="text/javascript" src="{{asset('portal/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/jquery.easing.1.3.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/jquery.waypoints.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/jquery.stellar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/jquery.magnific-popup.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/aos.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/jquery.animateNumber.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/scrollax.min.js')}}"></script>
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
        </script>
        <script type="text/javascript" src="{{asset('portal/js/google-map.js')}}"></script>
        <script type="text/javascript" src="{{asset('portal/js/main.js')}}"></script>

    </section>