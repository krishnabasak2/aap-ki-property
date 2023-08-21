@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome Admin!</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="row">

                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-light-green">
                            <div class="card-body">
                                <p class="mb-4">Total Approved Properties</p>
                                <p class="fs-30 mb-2">{{ $total_approve_property }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Total Processed Properties</p>
                                <p class="fs-30 mb-2">{{ $total_processed_property }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Pending Properties</p>
                                <p class="fs-30 mb-2">{{ $total_pending_property }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Rental Properties</p>
                                <p class="fs-30 mb-2">{{ $total_rental_property }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4  stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Selling Properties</p>
                                <p class="fs-30 mb-2">{{ $total_selling_property }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4  stretch-card transparent">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <p class="mb-4">Total Pending Enquiries</p>
                                <p class="fs-30 mb-2">{{ $total_pending_enquiry }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4  stretch-card transparent">
                        <div class="card card-light-green">
                            <div class="card-body">
                                <p class="mb-4">Total Resolved Enquiries</p>
                                <p class="fs-30 mb-2">{{ $total_resolve_enquiry }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4  stretch-card transparent">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <p class="mb-4">Total Pending Contacts</p>
                                <p class="fs-30 mb-2">{{ $total_pending_contact }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4  stretch-card transparent">
                        <div class="card card-light-green">
                            <div class="card-body">
                                <p class="mb-4">Total Resolved Contacts</p>
                                <p class="fs-30 mb-2">{{ $total_resolve_contact }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        window.setInterval(ut, 1000);

        function ut() {
            var d = new Date();
            document.getElementById("time").innerHTML = d.toLocaleTimeString();
        }
    </script>
@endsection
