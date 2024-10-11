@extends('layouts.app_admin')
@section('title', 'Manage Orders')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Orders</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/orders') }}">Orders</a></li>
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
                                <h5 class="card-title mb-0">Filtertation By Date</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_filteration" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                @php
                                    $today = \Carbon\Carbon::now();
                                    $currentWeek = \Carbon\Carbon::parse($today);
                                    $startOfWeek = $currentWeek->startOfWeek()->format('m/d/y');
                                    $endOfWeek = $currentWeek->endOfWeek()->format('m/d/y');
                                    $dateRange = $startOfWeek . ' - ' . $endOfWeek;
                                @endphp
                                <label class="form-label">Select Range *</label>
                                <input type="text" name="daterange" class="form-control" value="{{ $dateRange }}"
                                    placeholder="Select Range">
                                <strong class="text-danger" id="daterange"></strong>
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid gap-2 mt-4">
                                    <button class="btn btn-warning waves-effect waves-light" type="submit"
                                        id="apply_filter"><i class="fas fa-filter"></i> Apply Filteration</button>
                                </div>
                            </div>
                        </form>
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
                                <h5 class="card-title mb-0">All Orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Order Key</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Payment Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($orders as $order)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td><a
                                                href="{{ url('/order/details/' . $order->order_key) }}">{{ str_replace('order_key_', '', $order->order_key) }}</a>
                                        </td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->contact_no }}</td>
                                        <td>{{ date('M j, Y', strtotime($order->created_at)) }}</td>
                                        <td>
                                            @if ($order->order_status == 'Processing')
                                                <span class="badge bg-danger">{{ __('Processing') }}</span>
                                            @elseif($order->order_status == 'Delivered')
                                                <span class="badge bg-success">{{ __('Delivered') }}</span>
                                            @elseif($order->order_status == 'Cancelled')
                                                <span class="badge bg-warning">{{ __('Cancelled') }}</span>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-info">{{ $order->payment_method }}</span></td>
                                        <td><a href="{{ url('/order/details/' . $order->order_key) }}"
                                                class="btn btn-primary text-white btn-sm"><i class="fas fa-eye"></i>
                                                Details</a></td>
                                    </tr>
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
@section('script')
    <script>
        $(document).ready(function() {
            var salesTable = $('#example2').DataTable();

            $(document).on("click", "#apply_filter", function(event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
                const button = this;
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                var formData = new FormData(document.getElementById('form_filteration'));
                $.ajax({
                    url: `{{ url('/orders_filteration') }}`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        $(".text-danger").html("");
                        button.removeAttribute("disabled");
                        button.innerHTML = '<i class="fas fa-filter"></i> Apply Filteration';
                        if (response && response.data) {
                            salesTable.clear().draw();
                            var count = 0;
                            $.each(response.data, function(key, value) {
                                count++;
                                salesTable.row.add([
                                    count,
                                    value.order_key,
                                    value.name,
                                    value.email,
                                    value.contact_no,
                                    value.date,
                                    value.status,
                                    value.payment_method,
                                    value.delete_button,
                                ]).draw(false);
                            });
                            $("#grand_amount").empty();
                            $("#grand_amount").append("Rs. " + response.grand_amount)
                        }
                    },
                    error: function(xhr, status, error) {
                        button.removeAttribute("disabled");
                        button.innerHTML = '<i class="fas fa-filter"></i> Apply Filteration';
                        console.error('Error occurred: ', error);
                    }
                });
            });

            function numberFormat(number, decimals = 0) {
                const factor = Math.pow(10, decimals);
                return (Math.round(number * factor) / factor).toLocaleString();
            }
        });
    </script>
@endsection
