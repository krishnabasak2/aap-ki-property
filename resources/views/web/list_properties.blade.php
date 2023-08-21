@extends('web.layout')
@section('content')
    <main id="main" style="overflow-x: hidden;">
        <section id="seller" class="seller">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5 mb-5">
                    <div class="col-lg-8">
                        <div>
                            <h1 style="color: #01367e;">Hi, List Your Property Now!</h1>

                        </div>
                        <div>
                            <img src="assets/img/desktop.gif">
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="">
                            <form action="" method="POST" class="php-email-form" enctype="multipart/form-data">
                                @csrf

                                @if (Session::has('message'))
                                    @php
                                        $message = explode('|', Session::get('message'));
                                    @endphp
                                    <div class=" alert {{ $message[0] == 'success' ? 'alert-success' : 'alert-danger' }}  alert-dismissible fade show "
                                        role="alert">
                                        <div class="alert-content">
                                            <p>{{ $message[1] }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" name="owner_name" class="form-control" placeholder="Your Name"
                                            value="{{ old('owner_name') }}" required>
                                        @error('owner_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group ">
                                        <input type="email" class="form-control" name="owner_email"
                                            placeholder="Your Email" value="{{ old('owner_email') }}" required>
                                        @error('owner_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="number" name="owner_mobile" class="form-control"
                                            placeholder="Phone No." value="{{ old('owner_mobile') }}" required>
                                        @error('owner_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group ">
                                        <input type="text" class="form-control" placeholder="Property Name"
                                            name="property_name" value="{{ old('property_name') }}" required>
                                        @error('property_name')
                                            <small class="text-danger" required>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="property_address" rows="3" placeholder="Property Address" required>{{ old('property_address') }}</textarea>
                                    @error('property_address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group ">
                                        <input type="file" class="form-control" name="images[]" id="imageInput"
                                            accept=".png,.jpeg,.png,.webp" multiple required>

                                        @if ($errors->has('images.*'))
                                            @foreach ($errors->get('images.*') as $error)
                                                <small class="text-danger">{{ $error[0] }}</small>
                                            @endforeach
                                        @endif

                                        {{-- @if ($errors->has('images.*'))
                                            <div class="help-block">
                                                <ul role="alert">
                                                    <small class="text-danger">{{ $errors->first('images.*') }}</small>
                                                </ul>
                                            </div>
                                        @endif --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group ">
                                        <input type="text" class="form-control" placeholder="Property Size"
                                            name="size" value="{{ old('size') }}" required>
                                        @error('size')
                                            <small class="text-danger" required>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group ">
                                        <input class="form-control" name="property_location" placeholder="Property City"
                                            value="{{ old('property_location') }}" required />
                                        @error('property_location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <p style="margin-bottom: 5px;">Property Type</p>
                                    <div class="col-md-6 form-group ">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="html" name="type"
                                                value="Residential" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Residential
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group ">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="html" name="type"
                                                value="Commercial">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Commercial
                                            </label>
                                        </div>
                                    </div>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <p style="margin-bottom: 5px;">Listing For</p>
                                    <div class="col-md-6 form-group ">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="html"
                                                name="listing_for" value="Rental" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Rental
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group ">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="html"
                                                name="listing_for" value="Selling">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Selling
                                            </label>
                                        </div>
                                    </div>
                                    @error('listing_for')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group ">
                                        <input type="number" class="form-control"
                                            placeholder="Monthly Rental / Selling Price (INR)" name="property_price"
                                            value="{{ old('property_price') }}" required>
                                        @error('property_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center my-1">
                                    <button class="custom-btn" style="padding: 12px 35px;" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- <script>
        document.getElementById("imageInput").addEventListener("change", function() {
            // Get the selected files
            const selectedFiles = Array.from(this.files);
            // You can do further processing with the selectedFiles array, like previewing the images.
            console.log(selectedFiles);
        });
    </script> --}}
@endsection
