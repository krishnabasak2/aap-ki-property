@extends('web.layout')
@section('content')
    <section class="inner-section single-banner" style="background: url(assests/img/single-banner.png) no-repeat center;">
        <div class="container">
            <h2>{{ $title }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </div>
    </section>

    <main id="main" style="overflow-x: hidden;">
        <div class="container">
            <div id="project" class="our_project row">
                <div class="text-center col-md-12">
                    <div class="wrap">
                        <form action="" method="POST">
                            @csrf
                            <div class="search">
                                <input type="text" class="searchTerm" name="search" placeholder="Enter Your City"
                                    value="{{ $search ? $search : '' }}">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-30">

                @php
                    $count = 0;
                @endphp

                @if ($property->isNotEmpty())
                    @foreach ($property as $index => $value)
                        <div class="col-md-4 m-2">
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <div id="carouselExampleIndicators-{{$index}}" class="carousel slide" data-ride="carousel">
                                            @php
                                                $images = json_decode($value['property_images']);
                                                $count = 0;
                                            @endphp
                                            <ol class="carousel-indicators">
                                                @foreach ($images as $key => $image)
                                                    <li data-target="#carouselExampleIndicators-{{$index}}"
                                                        data-slide-to="{{ $count }}"
                                                        class="{{ $key == 0 ? 'active' : '' }}">
                                                    </li>
                                                    @php
                                                        $count++;
                                                    @endphp
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
                                    <div class="text-right" style="margin-bottom: 10px;">
                                        <a href="javascript:void(0);" class="custom-btn"
                                            onclick="enquiry(
                                                `{{ $value['property_name'] }}`,
                                                `{{ $value['id'] }}`
                                                )">Enquiry
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center" style="font-weight: bold; color: #002250;">No Properties Found</p>
                @endif
            </div>

            <nav class="mb-30 mt-30" aria-label="Page navigation example">
                {{ $property->links() }}
                {{-- <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul> --}}
            </nav>
        </div>
        <!-- Modal -->
        <a href="javascript:void(0);" class="d-none" data-bs-toggle="modal" data-bs-target="#exampleModal"
            id="EnquiryBtn"></a>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div>
                            <div class="row">
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
    </main>
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
@endpush
