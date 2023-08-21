@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">{{ $title }}</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Contacts ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($contacts)
                                        @foreach ($contacts as $value)
                                            <tr>
                                                <td>{{ $value['contact_id'] }}</td>
                                                <td>{{ $value['name'] }}</td>
                                                <td>{{ $value['phone'] }}</td>
                                                <td>{{ $value['email'] }}</td>
                                                <td>{{ date_format(date_create($value['created_at']), 'd-M-Y') }}</td>

                                                <td style="font-size: 24px">
                                                    <a href="javascript:void(0);"
                                                        onclick="modalActive(
                                                            `{{ $value['contact_id'] }}`,
                                                            `{{ $value['name'] }}`,
                                                            `{{ $value['email'] }}`,
                                                            `{{ $value['phone'] }}`,
                                                            `{{ $value['subject'] }}`,
                                                            `{{ $value['message'] }}`
                                                        )"><i
                                                            class="ti-eye" p-2></i></a>

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
                                                        @elseif($value['status'] == 'Resolved')
                                                        btn-success @endif                                                      
                                                        "
                                                            type="button" id="dropdownMenuSizeButton3"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            @if ($value['status'] == 'Pending')
                                                                Pending
                                                            @elseif($value['status'] == 'Resolved')
                                                                Resolved
                                                            @endif
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuSizeButton3">

                                                            @if ($value['status'] != 'Pending')
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="statusChange('{{ $value['id'] }}', 'pending')">Pending</a>
                                                            @endif

                                                            @if ($value['status'] != 'Resolved')
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="statusChange('{{ $value['id'] }}', 'resolved')">Resolved</a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $contacts->links() }}
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
        <div class="modal-dialog">
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
                                <h4 class="card-title">Contact Information</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <address class="text-primary">
                                            <p class="font-weight-bold" id="name"></p>
                                            <p class="font-weight-bold" id="email"></p>
                                            <p class="font-weight-bold" id="phone"></p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <h4 class="card-title">Contact Details</h4> --}}
                                <p class="card-description">
                                    <span class="font-weight-bold" id="subject"></span>
                                </p>
                                <p id="message"></p>
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
        const modalActive = (title, name, email, phone, subject, message) => {

            document.getElementById('exampleModalLabel').innerHTML = title;
            document.getElementById('name').innerHTML = 'Name: ' + name;
            document.getElementById('email').innerHTML = 'Email: ' + email;
            document.getElementById('phone').innerHTML = 'Phone: ' + phone;

            document.getElementById('subject').innerHTML = subject;
            document.getElementById('message').innerHTML = message;

            document.getElementById('modalBtn').click();
        }

        const statusChange = (id, status) => {

            if (status == 'delete' || status == 'trash') {
                var message = "Do You Want To Remove This Contact?";
                var btnColor = true;
            } else {
                var message = "Do You Want To Change This Contact Status?";
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
                        const url = baseUrl + `/admin/contacts/status/${id}/${status}`;
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
