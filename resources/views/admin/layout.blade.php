<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }} | Aap Ki Property</title>
    <link rel="icon" href="{{ url('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/vertical-layout-light/style.css') }}">
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{ url('/') }}"><img
                        src="{{ asset('assets/img/logo.png') }}" class="mr-2" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img
                        src="{{ asset('assets/img/logo.png') }}" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                    data-toggle="minimize"><span class="icon-menu"></span></button>
                <ul class="navbar-nav mr-lg-2"></ul>
                <ul class="navbar-nav navbar-nav-right"></ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas"><span class="icon-menu"></span></button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#expense" aria-expanded="false"
                            aria-controls="expense">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">Manage All Properties</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="expense">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/all') }}">All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/pending') }}">Pending</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/approved') }}">Approved</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/rejected') }}">Rejected</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/processed') }}">Processed</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#expense-2" aria-expanded="false"
                            aria-controls="expense-2">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">All Selling Properties</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="expense-2">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/all/selling') }}">All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/pending/selling') }}">Pending</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/approved/selling') }}">Approved</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/rejected/selling') }}">Rejected</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/processed/selling') }}">Processed</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#expense-3" aria-expanded="false"
                            aria-controls="expense-3">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">All Rental Properties</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="expense-3">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/all/rental') }}">All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/pending/rental') }}">Pending</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/approved/rental') }}">Approved</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/rejected/rental') }}">Rejected</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/processed/rental') }}">Processed</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#expense-5" aria-expanded="false"
                            aria-controls="expense-5">
                            <i class="ti-headphone-alt menu-icon"></i>
                            <span class="menu-title">Manage All Enquiries</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="expense-5">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/enquiries/all') }}">All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/enquiries/pending') }}">Pending</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/enquiries/resolved') }}">Resolved</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#expense-6" aria-expanded="false"
                            aria-controls="expense-6">
                            <i class="ti-comment menu-icon"></i>
                            <span class="menu-title">Manage All Contacts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="expense-6">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/contacts/all') }}">All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/contacts/pending') }}">Pending</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/contacts/resolved') }}">Resolved</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#expense-1" aria-expanded="false"
                            aria-controls="expense-1">
                            <i class="ti-trash menu-icon"></i>
                            <span class="menu-title">Trash Can</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="expense-1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/properties/list/all/trash') }}">Properties</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/enquiries/trash') }}">Enqueries</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ url('admin/contacts/trash') }}">Contacts</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/settings') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title">Site Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/profile') }}">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/logout') }}">
                            <i class="ti-new-window menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">

                @yield('content')

                <footer class="footer">
                    {{-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            <?php echo date('Y'); ?> - <a href="{{ url('/') }}">Aap Ki Property</a></span>
                    </div> --}}

                    <div class="container text-center">
                        <div class="copyright">
                            Copyright &copy;
                            <?php echo date('Y'); ?> - <strong><span>Aap Ki Property</span></strong>. All Rights Reserved.
                        </div>
                        <div class="credits">
                            Designed & Developed by <a href="https://hitcsoftware.com" target="_blank"
                                style="font-weight: bold;">HITC Group</a>.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script>
        let baseUrl = '{{ url('/') }}'
    </script>

    <script src="{{ asset('assets/backend/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/backend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/backend/js/template.js') }}"></script>
    <script src="{{ asset('assets/backend/js/settings.js') }}"></script>
    <script src="{{ asset('assets/backend/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dashboard.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('script')
</body>

</html>
