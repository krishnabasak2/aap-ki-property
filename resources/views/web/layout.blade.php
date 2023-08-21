<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }} | Aap Ki Property</title>
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.png') }}">
    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
    <!-- icon css include -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/flaticon.css') }}">
    <!-- carousel css include -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/owl.theme.default.min.css') }}">
    <!-- others css include -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/calendar.css') }}">
    <!-- color switcher css include -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/colors/style-switcher.css') }}">
    <link id="color_theme" rel="stylesheet" type="text/css" href="{{ url('assets/css/colors/default.css') }}">
    <!-- custom css include -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">
    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        .wpcf7-response-output {
            color: white;
            font-size: 18px;
        }

        .screen-reader-response {
            display: none;
        }

        .wpcf7-submit {
            background: #ffc451;
            border: 0;
            padding: 10px 24px;
            color: #151515;
            transition: 0.4s;
            border-radius: 4px;
            font-weight: bold;
        }

        .wpcf7-not-valid-tip {
            color: #d24c4c;
        }

        .sli_btn {
            top: 50%;
            height: 50px;
            width: 50px;
            cursor: pointer;
            font-size: 20px;
            position: absolute;
            text-align: center;
            line-height: 50px;
            background: #ffc551;
            border-radius: 50%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
            transform: translateY(-50%);
            transition: transform 0.1s linear;
        }

        .contact .php-email-form input {
            height: 44px;
        }

        /* .form-group p:first-child {
            margin-bottom: 0;
        } */
    </style>
</head>

<body>
    <header id="header-section" class="header-section default-header-section auto-hide-header clearfix">
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="site-logo-wrapper">
                            <a href="{{ url('/') }}" class="logo">
                                <img src="{{ url('assets/img/logo.png') }}" alt="logo_not_found">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9" style="    align-self: center;">
                        <div class="mainmenu-wrapper">
                            <div class="row">
                                <!-- menu-item-list - start -->
                                <div class="col-lg-12">
                                    <div class="menu-item-list ul-li clearfix">
                                        <ul>
                                            <li class="menu-item-has-children">
                                                <a href="{{ url('/') }}">Home</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="{{ url('properties/rental') }}">Rental Properties</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="{{ url('properties/selling') }}">Selling Properties</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="{{ url('/') }}#about">About Us</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="{{ url('/') }}#contact">Contact Us</a>
                                            </li>
                                            <li>
                                                <button class="custom-btn" style="padding: 6px 20px;"
                                                    onclick="window.location.href = '{{ url('list-your-properties') }}'">List
                                                    My
                                                    Property</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header-altranative">
        <div class="container">
            <div class="logo-area float-left">
                <a href="{{ url('/') }}">
                    <img src="{{ url('assets/img/logo.png') }}" alt="logo_not_found">
                </a>
            </div>
            <button type="button" id="sidebarCollapse" class="alt-menu-btn float-right">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="sidebar-menu-wrapper">
            <div id="sidebar" class="sidebar">
                <span id="sidebar-dismiss" class="sidebar-dismiss">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <div class="sidebar-header">
                    <a href="#!">
                        <img src="{{ url('assets/img/logo-w.png') }}" alt="logo_not_found">
                    </a>
                </div>
                <div class="menu-link-list other-pages-links">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                <span class="icon"><i class="fas fa-home icon-color"></i></span>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('properties/rental') }}">
                                <span class="icon"><i class="fas fa-box icon-color"></i></span>
                                Rental Properties
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('properties/selling') }}">
                                <span class="icon"><i class="fas fa-box icon-color"></i></span>
                                Selling Properties
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#about">
                                <span class="icon"><i class="fas fa-circle-info icon-color"></i></span>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#contact">
                                <span class="icon"><i class="fas fa-envelope icon-color"></i></span>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <button class="custom-btn" style="padding: 6px 20px; font-size: 12px; margin-top: 10px;"
                                onclick="window.location.href = '{{ url('list-your-properties') }}'">List My
                                Property</button>
                        </li>
                    </ul>
                </div>
                <div class="social-links">
                    <h2 class="menu-title">get in touch</h2>
                    <div class="mb-15">
                        <h3 class="contact-info">
                            <i class="fas fa-phone"></i>
                            +91 {{ $details['contact_no'] }}
                        </h3>
                        <h3 class="contact-info" style="text-transform: lowercase">
                            <i class="fas fa-envelope"></i>
                            {{ $details['email_id'] }}
                        </h3>
                    </div>
                    <ul>
                        <li>
                            <a href="{{ $details['facebook'] }}" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="{{ $details['instagram'] }}" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="{{ $details['twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="{{ $details['youtube'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>

    @yield('content')


    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <a href="{{ url('/') }}" class="logo me-auto me-lg-0"><img
                                    src="{{ url('assets/img/logo-w.png') }}" alt="" class="img-fluid"></a>
                            <p style="margin: 20px 0; padding-right: 50px;">
                                <strong>Address:</strong>
                                <span style="line-height: 1">
                                    {{ $details['address'] }}
                                </span>
                                <br>
                                <br class="br-style">
                                <strong>Phone:</strong>
                                +91 {{ $details['contact_no'] }}
                                <br>
                                <strong>Email:</strong>
                                {{ $details['email_id'] }}
                            </p>
                            <div class="social-links mt-3">
                                <a href="{{ $details['facebook'] }}" class="facebook" target="_blank"><i
                                        class="fab fa-facebook" aria-hidden="true"></i></a>
                                <a href="{{ $details['instagram'] }}" class="instagram" target="_blank"><i
                                        class="fab fa-instagram" aria-hidden="true"></i></a>
                                <a href="{{ $details['twitter'] }}" class="twitter" target="_blank"><i
                                        class="fab fa-twitter" aria-hidden="true"></i></a>
                                <a href="{{ $details['youtube'] }}" class="youtube" target="_blank"><i
                                        class="fab fa-youtube" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 5px;"></i><a
                                    href="{{ url('/') }}">Home</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 5px;"></i><a
                                    href="{{ url('properties/rental') }}">Rental Properties</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 5px;"></i><a
                                    href="{{ url('properties/selling') }}">Selling Properties</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 5px;"></i><a
                                    href="#about">About Us</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 5px;"></i><a
                                    href="#contact">Contact Us</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 5px;"></i><a
                                    href="{{ url('list-your-properties') }}">List My Property</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Location</h4>
                        <!-- <form onsubmit="return false;">
                            <input type="email" name="email" placeholder="Email ID" required>
                            <input type="submit" value="Subscribe" style="font-weight: bold;">
                        </form> -->
                        <div style="width: 100%"><iframe width="100%" height="200" frameborder="0"
                                scrolling="no" marginheight="0" marginwidth="0" src="{{ $details['maps'] }}"><a
                                    href="https://www.maps.ie/population/">Population mapping</a></iframe></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                Copyright &copy;
                <?php echo date('Y'); ?> - <strong><span>Aap Ki Property</span></strong>. All Rights Reserved.
            </div>
            <div class="credits">
                Designed & Developed by <a href="https://hitcsoftware.com" target="_blank"
                    style="font-weight: bold;">HITC Group</a>.
            </div>
        </div>
    </footer><!-- End Footer -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-angle-up"
            aria-hidden="true"></i></a>
    <script>
        let baseUrl = '{{ url('/') }}'
    </script>
    <script>
        const panels = document.querySelectorAll(".panel");

        panels.forEach((panel) => {
            panel.addEventListener("click", () => {
                removeActiveClasses();
                panel.classList.add("active");
            });
        });

        function removeActiveClasses() {
            panels.forEach((panel) => {
                panel.classList.remove("active");
            });
        }
    </script>
    <!-- fraimwork - jquery include -->
    <script src="{{ url('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <!-- carousel jquery include -->
    <script src="{{ url('assets/js/slick.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <!-- map jquery include -->
    <script src="{{ url('assets/js/gmap3.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>
    <!-- calendar jquery include -->
    <script src="{{ url('assets/js/atc.min.js') }}"></script>
    <!-- others jquery include -->
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/js/jarallax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- gallery img loaded - jqury include -->
    <script src="{{ url('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- multy count down - jqury include -->
    <script src="{{ url('assets/js/jquery.countdown.js') }}"></script>
    <!-- color panal - jqury include -->
    <!-- custom jquery include -->
    <script src="{{ url('assets/js/custom.js') }}"></script>
    <script src="{{ url('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ url('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="{{ url('assets/js/slider.js') }}"></script>
    <script src="{{ url('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        if (window.self == window.top) {
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-P7JSYB1CSP');
        }
    </script>
    @stack('script')
</body>

</html>
