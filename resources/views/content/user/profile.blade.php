@extends('layouts/contentNavbarLayout')

@section('title', 'My Profile')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('content')
    <style>
        .work-font {
            font-size: 0.8rem
        }
    </style>
    <div class="row g-4">
        <div class="col-lg-5 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="m-0">My Profile</h5>
                </div>
                <hr>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>About</span>
                        <span class="m-0 {{ Auth::user()->status == 'pending' ? 'text-secondary' : '' }}"
                            style="cursor: pointer; color: #0000EE; {{ Auth::user()->status == 'pending' ? 'pointer-events:none' : '' }}"
                            data-bs-toggle="modal" data-bs-target="#editAboutModal">Edit</span>
                    </div>
                    <ul class="list-group mb-3" id="profile-list">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Full Name:</span>
                            <span>{{ Auth::user()->firstName . ' ' . substr(Auth::user()->middleName, 0, 1) . '. ' . Auth::user()->lastName }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Course:</span>
                            <span>{{ Auth::user()->course }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Year Graduated:</span>
                            <span>{{ Auth::user()->yearGrad }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Address:</span>
                            <span id="profile-address">{{ Auth::user()->address }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between">
                        <span>Contact</span>
                        <span class="m-0 {{ Auth::user()->status == 'pending' ? 'text-secondary' : '' }}"
                            style="cursor: pointer; color: #0000EE; {{ Auth::user()->status == 'pending' ? 'pointer-events:none' : '' }}"
                            data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Facebook Account:</span>
                            <span id="profile-facebook">{{ Auth::user()->facebook }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Contact No:</span>
                            <span id="profile-contact">{{ Auth::user()->contactNo }}</span>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-between mt-3">
                        <span>Account</span>
                        <span class="m-0 {{ Auth::user()->status == 'pending' ? 'text-secondary' : '' }}"
                            style="cursor: pointer; color: #0000EE; {{ Auth::user()->status == 'pending' ? 'pointer-events:none' : '' }}"
                            data-bs-toggle="modal" data-bs-target="#editAccountModal">Edit</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Email:</span>
                            <span id="profile-email">{{ Auth::user()->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Password:</span>
                            <span id="" class="m-0" data-bs-toggle="modal"
                                data-bs-target="#editPasswordModal">************</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="card overflow-auto" style="height: 600px">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Work History</h5>
                    <button class="btn badge text-bg-secondary m-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        {{ Auth::user()->status == 'pending' ? 'disabled' : '' }}>+</button>
                </div>
                <hr>
                <div class="card-body" id="history-record">
                    <div class="table-responsive">
                        <ul class="list-group">
                            @foreach ($works as $work)
                                <li class="list-group-item d-flex justify-content-between align-items-center list-work">
                                    <div class="d-flex align-items-center gap-5 p-2">
                                        <span>{{ $work->year }} •</span>
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="d-flex gap-3"><span class="work-font"><b>Work Title:</b></span><span
                                                    class="m-0 work-font">{{ Str::title($work->name) }}</span></div>
                                            <div class="d-flex gap-3"><span class="work-font"><b>Company
                                                        Name:</b></span><span
                                                    class="m-0 work-font">{{ Str::title($work->company_name) }}</span>
                                            </div>
                                            <div class="d-flex gap-3"><span class="work-font"><b>Address:
                                                    </b></span><span class="work-font">{{ Str::title($work->country) }}
                                                    {{ Str::title($work->province) }}
                                                    {{ Str::title($work->municipality) }}
                                                    {{ Str::title($work->barangay) }}</span></div>
                                            <div class="d-flex gap-3"><span class="work-font"><b>Company Contact:
                                                    </b></span><span class="work-font">
                                                    {{ Str::title($work->company_contact) }}</span></span></div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <i class="fa fa-trash text-danger btn-delete" sid="{{ $work->id }}"
                                            style="cursor: pointer"></i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @include('content.user.profile-modal')


@endsection

@section('page-script')
    <script src="{{ asset('storage/js/user/profile.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
