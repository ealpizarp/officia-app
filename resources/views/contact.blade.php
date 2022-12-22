<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    laravel: "#ef3b2d",
                },
            },
        },
    };
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('portal/css/style.css') }}">
    <title>Contact Us</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24 p-3" src={{ asset('images/app-logo.png') }} alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="register" class="hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="login" class="hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
        </ul>
    </nav>
    {{-- Contact US --}}
    <!--  Seccion que muestra el formulario y el mapa del lugar -->
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
                    <div class="col-md-12 order-md-last d-flex">
                        <div class="container mt-5">
                            <!-- Success message -->
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            <form action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 p-5 border-slate-100" method="post" action="{{ route('contact.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                                        name="name" id="name">
                                    <!-- Error -->
                                    @if ($errors->has('name'))
                                    <div class="error">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                        name="email" id="email">
                                    @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}"
                                        name="phone" id="phone">
                                    @if ($errors->has('phone'))
                                    <div class="error">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}"
                                        name="subject" id="subject">
                                    @if ($errors->has('subject'))
                                    <div class="error">
                                        {{ $errors->first('subject') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}"
                                        name="message" id="message" rows="4"></textarea>
                                    @if ($errors->has('message'))
                                    <div class="error">
                                        {{ $errors->first('message') }}
                                    </div>
                                    @endif
                                </div>
                                <input type="submit" name="send" value="Submit" class="bg-cyan-700 hover:bg-cyan-600 text-white w-full font-bold py-2 px-4 rounded">
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
        <!--  Seccion que muestra el footer con todas las opciones de contacto -->
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

</body>

</html>