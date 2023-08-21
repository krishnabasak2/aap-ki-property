@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
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
                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Owner Name</label>
                                        <input type="text" class="form-control" name="owner_name"
                                            placeholder="Owner Name" value="{{ old('owner_name', $property->owner_name) }}"
                                            required>
                                        @error('owner_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Owner Email</label>
                                        <input type="text" class="form-control" name="owner_email"
                                            placeholder="Owner Email"
                                            value="{{ old('owner_email', $property->owner_email) }}" required>
                                        @error('owner_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Owner Phone</label>
                                        <input type="text" class="form-control" name="owner_mobile"
                                            placeholder="Owner Phone"
                                            value="{{ old('owner_mobile', $property->owner_mobile) }}" required>
                                        @error('owner_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Property Name</label>
                                        <input type="text" class="form-control" name="property_name"
                                            placeholder="Property Name"
                                            value="{{ old('property_name', $property->property_name) }}" required>
                                        @error('property_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Property Address</label>
                                        <textarea type="text" class="form-control" name="property_address"
                                            placeholder="Property Address" rows="3" required>{{ old('property_address', $property->property_address) }}</textarea>
                                        @error('property_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Property City</label>
                                        <input type="text" class="form-control" name="property_location"
                                            placeholder="Property City"
                                            value="{{ old('property_location', $property->property_location) }}" required>
                                        @error('property_location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Property Size</label>
                                        <input type="text" class="form-control" name="size"
                                            placeholder="Property Size"
                                            value="{{ old('size', $property->size) }}" required>
                                        @error('size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Property Type</label>
                                        <select name="property_type" class="form-control">
                                            <option
                                                value="Residential" {{ $property->type == 'Residential' ? 'selected' : '' }}>
                                                Residential</option>
                                            <option value="Commercial" {{ $property->type == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                        </select>
                                        @error('property_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Listing For</label>
                                        <select name="listing_for" class="form-control">
                                            <option value="Rental" {{ $property->listing_for == 'Rental' ? 'selected' : '' }}>Rental</option>
                                            <option value="Selling" {{ $property->listing_for == 'Selling' ? 'selected' : '' }}>Selling</option>
                                        </select>
                                        @error('listing_for')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Property Price</label>
                                        <input type="text" class="form-control" name="property_price"
                                            placeholder="Monthly Rental / Selling Price (INR)"
                                            value="{{ old('property_price', $property->property_price) }}" required>
                                        @error('property_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2"
                                    style="font-weight:bold;">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
