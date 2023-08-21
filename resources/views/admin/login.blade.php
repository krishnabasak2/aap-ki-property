<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                            </div>
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
                            <h4>Hello! Sign in to continue.</h4>
                            <form class="pt-3" action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/backend/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/backend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/backend/js/template.js') }}"></script>
    <script src="{{ asset('assets/backend/js/settings.js') }}"></script>
    <script src="{{ asset('assets/backend/js/todolist.js') }}"></script>
</body>

</html>
