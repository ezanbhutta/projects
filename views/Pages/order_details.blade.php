@extends('layouts.app_admin')
@section('title', 'Order Details')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">{{ __('Order Details') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/orders') }}">Orders</a></li>
                            <li class="breadcrumb-item active">{{ $order->order_key }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">{{ $order->order_key }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Product Details</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col" class="text-end">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order_items as $item)
                                        @php
                                            $itemTotalPrice = $item->product_quantity * $item->product_price;
                                            $totalPrice += $itemTotalPrice;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                        <img src="{{ json_decode($item->product_image)[0] }}"
                                                            alt="Img not Found" class="d-block" width="100%"
                                                            height="100%">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-15">
                                                            {{ Str::ucfirst($item->product_name) }}
                                                        </h5>
                                                        <p class="text-muted mb-0">Category: <span
                                                                class="fw-medium">{{ Str::ucfirst($item->name) }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ 'Rs.' . $item->product_price }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                            <td>
                                                <div class="text-warning fs-15">
                                                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                                                        class="ri-star-half-fill"></i><i class="ri-star-line"></i><i
                                                        class="ri-star-line"></i>
                                                </div>
                                            </td>
                                            <td class="fw-medium text-end">
                                                {{ 'Rs.' . $itemTotalPrice }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end">{{ 'Rs.' . number_format($totalPrice, 0) }}
                                                        </td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total (RS) :</th>
                                                        <th class="text-end">{{ 'Rs.' . number_format($totalPrice, 0) }}
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0"><i
                                    class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> Logistics Details
                            </h5>
                            <div class="flex-shrink-0">
                                <a href="{{ url('javascript:void(0);') }}"
                                    class="badge bg-primary-subtle text-primary fs-11">Track Order</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px"></lord-icon>
                            <h5 class="fs-16 mt-2">RQK Logistics</h5>
                            <p class="text-muted mb-0">ID: MFDS1400457854</p>
                            <p class="text-muted mb-0">Payment Mode : Debit Card</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('admin/assets/images/users/dummy.jpg') }}" alt=""
                                            class="avatar-sm rounded material-shadow">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ Str::ucfirst($order->name) }}</h6>
                                        <p class="text-muted mb-0">Customer</p>
                                    </div>
                                </div>
                            </li>
                            <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $order->email }}</li>
                            <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $order->contact_no }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing
                            Address</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                            <li class="fw-medium fs-14">{{ Str::ucfirst($order->name) }}</li>
                            <li>{{ $order->contact_no }}</li>
                            <li>{{ $order->street_address }}</li>
                            <li>{{ $order->state }} - {{ $order->city }} - {{ $order->zip_code }}</li>
                            <li>{{ $order->country }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>
                            Payment Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Payment Method:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0"><span
                                        class="badge bg-primary">{{ $order->payment_method == 'COD' ? 'Cash On Delivery' : $order->payment_method }}</span>
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Total Amount:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">{{ 'Rs.' . number_format($totalPrice, 0) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
