@extends('layouts/adminContentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('content')
    @include('loading.spinner')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Pending Accounts</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mt-5" id="pending-accounts">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-nowrap">name</th>
                                    <th class="text-nowrap">email</th>
                                    <th class="text-nowrap">course</th>
                                    <th class="text-nowrap">graduated</th>
                                    <th class="text-nowrap">contact no.</th>
                                    <th class="text-nowrap">facebook</th>
                                    <th class="text-nowrap">address</th>
                                    <th class="text-nowrap">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingAccounts as $pending)
                                    <tr class="text-center table-row">
                                        <td class="text-nowrap">{{ $pending->firstName }} {{ $pending->lastName }}</td>
                                        <td class="text-nowrap">{{ $pending->email }}</td>
                                        <td class="text-nowrap">{{ $pending->course }}</td>
                                        <td class="text-nowrap">{{ $pending->yearGrad }}</td>
                                        <td class="text-nowrap">{{ $pending->contactNo }}</td>
                                        <td class="text-nowrap">{{ $pending->facebook }}</td>
                                        <td class="text-nowrap">{{ $pending->address }}</td>
                                        <td class="text-nowrap">
                                            <button class="btn btn-success btn-sm btn-approve"
                                                sid="{{ $pending->id }}">Approve</button>
                                            <button class="btn btn-danger btn-sm btn-disapprove"
                                                sid="{{ $pending->id }}">Disapprove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset('storage/js/admin/pending.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
