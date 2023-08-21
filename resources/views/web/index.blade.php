@extends('web.layout')
@section('content')
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/3.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/2.jpg" alt="Third slide">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->
    <main id="main" style="overflow-x: hidden;">

        @if ($rental_property->isNotEmpty())
            <div id="project" class="our_project text-center">
                <div class="text-center">
                    <h1 style="color: #fb7800; margin: 30px;">Properties Ror Rent</h1>
                </div>
            </div>
            <div class="container">
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left carousel_02" style="z-index: 2;"></i>
                    <ul class="carousel_2">
                        @foreach ($rental_property as $index => $value)
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <div id="carouselExampleIndicators-1-{{ $index }}" class="carousel slide"
                                            data-ride="carousel">
                                            @php
                                                $images = json_decode($value['property_images']);
                                            @endphp

                                            <ol class="carousel-indicators">
                                                @foreach ($images as $key => $image)
                                                    <li data-target="#carouselExampleIndicators-1-{{ $index }}"
                                                        data-slide-to="{{ $key }}"
                                                        class="{{ $key == 0 ? 'active' : '' }}">
                                                    </li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner">

                                                @foreach ($images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <img class="d-block w-100"
                                                            src="@php echo asset('storage/images/properties').'/'.$image @endphp"
                                                            alt="First slide">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">
                                        {{ $value['property_name'] }}
                                    </h2>
                                    <p class="description">
                                        {{ $value['property_address'] }}
                                    </p>

                                    <h5 class="location"><strong>Size: </strong>{{ $value['size'] }}</h5>

                                    <h5 class="location"><strong>Type: </strong>{{ $value['type'] }}</h5>

                                    <h5 class="location"><strong>City: </strong>{{ $value['property_location'] }}</h5>
                                    <h5 class="price"><strong>Price:
                                            ₹</strong>{{ number_format($value['property_price']) }}
                                        {{ $value['listing_for'] == 'Rental' ? '/ Month' : '' }}
                                    </h5>
                                    <div class="text-right" style="margin-bottom: 3px;">
                                        <a href="javascript:void(0);" class="custom-btn"
                                            onclick="enquiry(
                                                `{{ $value['property_name'] }}`,
                                                `{{ $value['id'] }}`
                                                )">Enquiry
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right carousel_02"></i>
                </div>
                <div class="text-center my-4" style="margin-bottom: 3px;">
                    <a href="{{ url('properties/rental') }}" class="custom-btn"
                        style="@if ($selling_property->isNotEmpty()) {{ 'margin-bottom: 50px;' }} @endif">Show More</a>
                </div>
            </div>
        @endif
        <!--- ========= Gallery Section ======= -->
        @if ($selling_property->isNotEmpty())
            <div id="gallery" id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <h1 style="text-align: center;margin: 30px; color: #fb7800;">Properties For Sale</h1>
            </div>
            <div class="container">
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left carousel_01" style="z-index: 1;"></i>
                    <ul class="carousel_1">
                        @foreach ($selling_property as $index => $value)
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <div id="carouselExampleIndicators-2-{{ $index }}" class="carousel slide"
                                            data-ride="carousel">
                                            @php
                                                $images = json_decode($value['property_images']);
                                                $count = 0;
                                            @endphp
                                            <ol class="carousel-indicators">
                                                @foreach ($images as $key => $image)
                                                    <li data-target="#carouselExampleIndicators-2-{{ $index }}"
                                                        data-slide-to="{{ $count }}"
                                                        class="{{ $key == 0 ? 'active' : '' }}">
                                                    </li>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endforeach

                                                {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                    class="active">
                                                </li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach ($images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <img class="d-block w-100"
                                                            src="@php echo asset('storage/images/properties').'/'.$image @endphp"
                                                            alt="First slide">
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">
                                        {{ $value['property_name'] }}
                                    </h2>
                                    <p class="description">
                                        {{ $value['property_address'] }}
                                    </p>

                                    <h5 class="location"><strong>Size: </strong>{{ $value['size'] }}</h5>

                                    <h5 class="location"><strong>Type: </strong>{{ $value['type'] }}</h5>
                                    <h5 class="location"><strong>City: </strong>{{ $value['property_location'] }}</h5>
                                    <h5 class="price"><strong>Price:
                                            ₹</strong>{{ number_format($value['property_price']) }}{{ $value['listing_for'] == 'Rental' ? '/Month' : '' }}
                                    </h5>
                                    <div class="text-right" style="margin-bottom: 3px;">
                                        <a href="javascript:void(0);"
                                            class="custom-btn"onclick="enquiry(
                                            `{{ $value['property_name'] }}`,
                                            `{{ $value['id'] }}`
                                            )">Enquiry
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right carousel_01"></i>
                </div>
                <div class="text-center my-4" style="margin-bottom: 3px;">
                    <a href="{{ url('properties/selling') }}" class="custom-btn">Show More</a>
                </div>
            </div>
        @endif

        <!-- upcomming-event-carousel - end -->
        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100" style="padding: 25px;">
                        <!-- <h1 style="color: #ffffff; margin: 0 0 20px 0;">ABOUT US</h1> -->
                        <div class="section-title" style="margin-bottom: 20px;">
                            <p style="color:#fb7800;">About Us</p>
                        </div>
                        <p style="color:#000;">We are India's leading property sales and rental company with a strong presence in India's top 10 largest cities and beyond, we take pride in being your trusted partner on your property journey. For years, Aap Ki Property has been synonymous with excellence and customer satisfaction in the real estate industry. As the largest property sales and rental company in India, we have transformed countless dreams into reality, helping individuals and businesses find their ideal spaces. Your satisfaction is at the heart of our operations. We tailor our services to meet your unique requirements, making property buying, selling, and renting a seamless experience. As we continue to redefine India's property landscape, we remain committed to integrity and customer satisfaction. Choose Aap Ki Property for all your property needs and let's embark on a journey towards exceptional real estate experiences.</p>
                    </div>
                    <div class="image col-lg-6 min-h" style='background-image: url("assets/img/house5.jpg");'
                        data-aos="fade-right"></div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        <!-- ======= Cta Section ======= -->
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End Testimonials Section -->
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" style="padding-top: 50px;padding-bottom: 50px;">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <p style="color:#fb7800;">Contact Us</p>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h4>Address:</h4>
                                <p>
                                    {{ $details['address'] }}
                                </p>
                            </div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h4>Call Us:</h4>
                                <p>
                                    +91 {{ $details['contact_no'] }}
                                </p>
                            </div>
                            <div class="email">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h4>Email Us:</h4>
                                <p>
                                    {{ $details['email_id'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <div class="">
                            <form action="{{ url('/contact-form') }}" method="POST" role="form"
                                class="php-email-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Your Name *" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group ">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Your Email *" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Phone No. *" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group ">
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="Subject *" required>
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="3" placeholder="Your Message *" required></textarea>
                                    @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button class="custom-btn" style="padding: 12px 35px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
        <!-- Modal -->
        <a href="javascript:void(0);" class="d-none" data-bs-toggle="modal" data-bs-target="#exampleModal"
            id="EnquiryBtn"></a>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquiry Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group d-none" id="property_id"></div>
                                <div class="col-md-12 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name *" required>
                                </div>
                                <div class="col-md-12 form-group ">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" name="phone" class="form-control" id="name"
                                        placeholder="Phone No. *" required>
                                </div>

                                {{-- <div class="col-md-12 form-group ">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject *" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="3" placeholder="Message *" required></textarea>
                            </div> --}}

                                <div class="modal-footer" style="margin-right: -15px; margin-bottom: -15px;">
                                    <button type="submit" class="custom-btn" style="padding: 12px 35px;">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
@endsection
@push('script')
    <script>
        const enquiry = (title, p_id) => {
            document.getElementById('exampleModalLabel').innerHTML = title;
            document.getElementById('property_id').innerHTML =
                `<input type="text" name="property_id" class="form-control d-none" value="${p_id}">`;

            document.getElementById('EnquiryBtn').click();
        }

        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            const url = baseUrl + `/enquiries`;

            const options = {
                method: 'POST',
                body: formData
            };

            fetch(url, options)
                .then(response => response.json())
                .then(data => {
                    if (data.status === true) {
                        document.getElementById("myForm").reset();
                        swal("Done!", data.message, "success").then(() => window.location.reload());
                    } else {
                        swal("Oops!", data.message[0], "error");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        });
    </script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const message = urlParams.get('message');
        if (status == 'success') {
            swal("Done!", message, "success").then(() => window.location.href = window.location.origin);
        } else {
            swal("Oops!", message, "error").then(() => window.location.href = window.location.origin);
        }
    </script>
@endpush
