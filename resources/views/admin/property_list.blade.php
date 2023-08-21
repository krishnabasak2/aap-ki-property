@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button> --}}
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">{{ $title }}</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Property ID</th>
                                        <th>List For</th>
                                        <th>Owner Name</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                        <th>Status</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($properties)
                                        @foreach ($properties as $value)
                                            <tr>
                                                <td>{{ $value['property_id'] }}</td>
                                                <td>
                                                    @if ($value['listing_for'] == 'Selling')
                                                        <div class="badge badge-info">Selling</div>
                                                    @else
                                                        <div class="badge badge-warning">Rental</div>
                                                    @endif
                                                </td>
                                                <td>{{ $value['owner_name'] }}</td>
                                                <td class="font-weight-bold">₹{{ number_format($value['property_price']) }}
                                                </td>

                                                @php
                                                    $date = date_create($value['created_at']);
                                                    $datetime = date_format($date, 'd-M-Y');
                                                @endphp

                                                <td>{{ $datetime }}</td>
                                                <td style="font-size: 24px">
                                                    <a href="javascript:void(0);"
                                                        onclick="modalActive(
                                                            `{{ $value['property_name'] }}`,
                                                            `{{ $value['owner_name'] }}`,
                                                            `{{ $value['owner_mobile'] }}`,
                                                            `{{ $value['owner_email'] }}`,
                                                            `{{ $value['property_location'] }}`,
                                                            `{{ number_format($value['property_price']) }}`,
                                                            `{{ $value['listing_for'] }}`,
                                                            `{{ $value['type'] }}`,
                                                            `{{ $value['property_address'] }}`,
                                                            `{{ $value['property_images'] }}`,
                                                            `{{ $value['size'] }}`,
                                                        )"><i
                                                            class="ti-eye" p-2></i></a>

                                                    <a
                                                        href="{{ url('admin/properties/edit-property') }}/{{ $value['id'] }}"><i
                                                            class="ti-pencil-alt pl-3"></i></a>

                                                    @if ($value['deleted_at'])
                                                        <a href="javascript:void(0);"
                                                            onclick="statusChange('{{ $value['id'] }}', 'restore')"><i
                                                                class="ti-reload p-1"></i></a>
                                                        <a href="javascript:void(0);"
                                                            onclick="statusChange('{{ $value['id'] }}', 'delete')"><i
                                                                class="ti-trash p-1"></i></a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            onclick="statusChange({{ $value['id'] }}, 'trash')"><i
                                                                class="ti-trash p-3"></i></a>
                                                    @endif

                                                </td>
                                                <td class="font-weight-medium">
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sm dropdown-toggle
                                                        
                                                        @if ($value['status'] == 'Pending') btn-warning
                                                        @elseif($value['status'] == 'Approve')
                                                        btn-success
                                                        @elseif($value['status'] == 'Reject')
                                                        btn-danger
                                                        @elseif($value['status'] == 'Process')
                                                        btn-info @endif                                                      
                                                        "
                                                            type="button" id="dropdownMenuSizeButton3"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            @if ($value['status'] == 'Pending')
                                                                Pending
                                                            @elseif($value['status'] == 'Approve')
                                                                Approved
                                                            @elseif($value['status'] == 'Reject')
                                                                Rejected
                                                            @elseif($value['status'] == 'Process')
                                                                Processed
                                                            @endif
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuSizeButton3">

                                                            @if ($value['status'] != 'Pending')
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="statusChange('{{ $value['id'] }}', 'pending')">Pending</a>
                                                            @endif

                                                            @if ($value['status'] != 'Approve')
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="statusChange('{{ $value['id'] }}', 'approve')">Approve</a>
                                                            @endif

                                                            @if ($value['status'] != 'Reject')
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="statusChange('{{ $value['id'] }}', 'reject')">Reject</a>
                                                            @endif

                                                            @if ($value['status'] != 'Process')
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="statusChange('{{ $value['id'] }}', 'process')">Processed</a>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h5 class="text-center">No Data Found.</h5>
                                    @endif

                                </tbody>
                            </table>
                            {{ $properties->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a class="d-none" data-toggle="modal" data-target="#exampleModal" id="modalBtn"></a>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody" style="padding: 0">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <address class="text-primary">
                                            <h4 class="card-title">Owner Information</h4>
                                            <p class="font-weight-bold" id="name"></p>
                                            <p class="font-weight-bold" id="phone"></p>
                                            <p class="font-weight-bold" id="email"></p>
                                        </address>
                                    </div>
                                    <div class="col-md-4">
                                        <address class="">
                                            <h4 class="card-title">Property Information</h4>
                                            <p class="font-weight-bold" id="location"></p>
                                            <p class="font-weight-bold" id="type"></p>
                                            <p class="font-weight-bold" id="list_for"></p>
                                            <p class="font-weight-bold" id="size"></p>
                                            <p class="font-weight-bold" id="price"></p>
                                        </address>
                                    </div>
                                    <div class="col-md-4">
                                        <address class="">
                                            <p class="font-weight-bold">Property Address</p>
                                            <p id="address"></p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="imageBody">
                                <h4 class="card-title">Images</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        const modalActive = (title, name, phone, email, location, price, list_for, type, address, images, size) => {
            document.getElementById('exampleModalLabel').innerHTML = title;
            document.getElementById('name').innerHTML = 'Name: ' + name;
            document.getElementById('phone').innerHTML = 'Phone No.: ' + phone;
            document.getElementById('email').innerHTML = 'E-mail: ' + email;

            document.getElementById('location').innerHTML = 'City: ' + location;
            document.getElementById('price').innerHTML = 'Price: ₹' + price;
            document.getElementById('list_for').innerHTML = 'Listing For: ' + list_for;
            document.getElementById('type').innerHTML = 'Property Type: ' + type;
            document.getElementById('size').innerHTML = 'Property Size: ' + size;
            document.getElementById('address').innerHTML = address;
            document.getElementById('imageBody').innerHTML = '';

            let allimage = JSON.parse(images);
            allimage.map((element) => {
                let imageTag =
                    `<img src="{{ asset('storage/images/properties/${element}') }}" alt="..."                 class="img-thumbnail m-1" width="200px">`;
                document.getElementById('imageBody').innerHTML += imageTag;
            })
            document.getElementById('modalBtn').click();
        }

        const statusChange = (id, status) => {

            if (status == 'delete' || status == 'trash') {
                var message = "Do You Want To Remove This Property?";
                var btnColor = true;
            } else {
                var message = "Do You Want To Change This Property Status?";
                var btnColor = false;
            }

            swal({
                    title: "Are you sure?",
                    text: message,
                    icon: "warning",
                    buttons: true,
                    dangerMode: btnColor,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        const url = baseUrl + `/admin/properties/status/${id}/${status}`;
                        fetch(url).then((res) => res.json())
                            .then((change) => {
                                if (change.status === true) {
                                    swal("Done!", change.message, "success").then(() => {
                                        window.location.reload();
                                    })
                                } else {
                                    swal("Opps!", change.message, "error").then(() => {
                                        window.location.reload();
                                    })
                                }
                            })
                    }
                });
        }
    </script>
@endpush
