@extends('layouts.app_admin')
@section('title', 'Manage Categories')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Customers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/customers') }}">Customers</a></li>
                            <li class="breadcrumb-item active">Manage</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title mb-0">All Customers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($customers as $customer)
                                    @if ($customer_dates[$customer->id])
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td>{{ Str::ucfirst($customer->name) }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->contact_no }}</td>
                                            <td>{{ date('M j, Y', strtotime($customer_dates[$customer->id])) }}</td>
                                            <td><span class="badge bg-primary">{{ __('Active') }}</span></td>
                                            <td>
                                                @if ($customer->order_status == 'Processing')
                                                    <span class="badge bg-danger">{{ __('Processing') }}</span>
                                                @elseif($customer->order_status == 'Delivered')
                                                    <span class="badge bg-success">{{ __('Delivered') }}</span>
                                                @elseif($customer->order_status == 'Cancelled')
                                                    <span class="badge bg-warning">{{ __('Cancelled') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
