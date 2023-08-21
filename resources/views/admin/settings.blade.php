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
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            value="{{ old('address', $settings['address']) }}" required>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no">Contact No.</label>
                                        <input type="number" class="form-control" name="contact_no"
                                            placeholder="Contact No."
                                            value="{{ old('contact_no', $settings['contact_no']) }}" required>
                                        @error('contact_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_id">Email ID</label>
                                        <input type="email" class="form-control" name="email_id" placeholder="Email ID"
                                            value="{{ old('email_id', $settings['email_id']) }}" required>
                                        @error('email_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook Link</label>
                                        <input type="text" class="form-control" name="facebook"
                                            placeholder="Company Address"
                                            value="{{ old('facebook', $settings['facebook']) }}">
                                        @error('facebook')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instagram">Instagram Link</label>
                                        <input type="text" class="form-control" name="instagram"
                                            placeholder="Instagram Link"
                                            value="{{ old('instagram', $settings['instagram']) }}">
                                        @error('instagram')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter Link</label>
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter Link"
                                            value="{{ old('twitter', $settings['twitter']) }}">
                                        @error('twitter')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="youtube">Youtube Link</label>
                                        <input type="text" class="form-control" name="youtube" placeholder="Youtube Link"
                                            value="{{ old('youtube', $settings['youtube']) }}">
                                        @error('youtube')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="maps">Google Maps Link</label>
                                        <input type="text" class="form-control" name="maps" placeholder="Youtube Link"
                                            value="{{ old('maps', $settings['maps']) }}">
                                        @error('maps')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2"
                                        style="font-weight:bold;">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
