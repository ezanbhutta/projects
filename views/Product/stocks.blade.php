@extends('layouts.app_admin')
@section('title', 'Product Stocks')
@section('main-content')
    <div class="container-fluid">
        <div id="editMinStockModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                            @method('PUT')
                            <div class="col-md-12">
                                <label class="form-label">Product Name *</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="{{ url('/update_min_stock') }}">
                                <input type="hidden" id="module_name" value="Product">
                                <input type="text" class="form-control" name="product_name"
                                    style="text-transform:capitalize" id="get_product_name" readonly
                                    value="{{ old('product_name') }}" placeholder="Enter Product Name" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="product_name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Stock Limit *</label>
                                <input type="number" class="form-control" name="product_min_limit"
                                    id="get_product_min_limit" value="{{ old('product_min_limit') }}"
                                    placeholder="Enter Product Stock Limit" autocomplete="off" required>
                                <strong class="text-danger" id="product_min_limit"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update">Edit Products > </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products Stock</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/stocks') }}">Products</a></li>
                            <li class="breadcrumb-item active">Stock</li>
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
                                <h5 class="card-title mb-0">Products Stock</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Product Name</th>
                                    <th>Product Stock</th>
                                    <th>Product Min Stock Limit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                    $backgroundColor = '';
                                    $textColor = '';
                                @endphp
                                @forelse ($allproducts as $product)
                                    @if ($array_data[$product->id])
                                        @if ($array_data[$product->id] != 'No Stock Yet')
                                            @if ($array_data[$product->id]['product_stock'] <= $product->product_min_limit)
                                                @php
                                                    $backgroundColor = '#ac3131';
                                                    $textColor = 'white';
                                                @endphp
                                            @else
                                                @php
                                                    $backgroundColor = '';
                                                    $textColor = '';
                                                @endphp
                                            @endif
                                        @endif
                                        <tr style="background-color: {{ $backgroundColor }}">
                                            <td style="color:{{ $textColor }}" data-ordering="false">{{ $num++ }}
                                            </td>
                                            <td style="color:{{ $textColor }}">{{ Str::ucfirst($product->product_name) }}
                                            </td>
                                            <td style="color:{{ $textColor }}">
                                                @if ($array_data[$product->id] != 'No Stock Yet')
                                                    {{ $array_data[$product->id]['product_stock'] }} {{ Str::ucfirst($product->product_unit) }}
                                                @else
                                                    <span
                                                        class="badge badge-soft-danger">{{ $array_data[$product->id] }}</span>
                                                @endif
                                            </td>
                                            <td style="color:{{ $textColor }}"
                                                id="product_min_stock_{{ $product->id }}">
                                                {{ $product->product_min_limit }}</td>
                                            <td><button class="btn btn-sm btn-primary" id="editMinStock"
                                                    data-id="{{ $product->id }}"><i class="fas fa-edit"></i> Edit</button>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" align="center" style="color:#004454;font-weight:bold;">No
                                            Data Avalable</td>
                                    </tr>
                                @endforelse
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
            $(document).on("click", "#editMinStock", function(stop) {
                stop.preventDefault();
                var productId = $(this).data("id");
                $.ajax({
                    url: `{{ url('/editMinStock/${productId}') }}`,
                    method: "GET",
                    success: function(response) {
                        $("#editMinStockModal").modal("show");
                        $("#get_product_name").val("");
                        $("#get_product_min_limit").val("");
                        $("#id").val("");
                        $("#id").val(response.id);
                        $("#get_product_name").val(response.product_name);
                        $("#get_product_min_limit").val(response.product_min_limit);
                    }
                })
            })
        })
    </script>
@endsection
