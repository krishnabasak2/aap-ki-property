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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="{{ old('email', Auth::user()->email) }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">New Password</label>
                                        <input type="text" class="form-control" name="password"
                                            placeholder="New Password" autocomplete="off">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Confirm Password</label>
                                        <input type="text" class="form-control" name="password_confirmation"
                                            placeholder="Confirm Password" autocomplete="off">
                                        @error('password_confirmation')
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
