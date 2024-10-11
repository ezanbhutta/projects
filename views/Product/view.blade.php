@extends('layouts.app_admin')
@section('title', 'Manage Products')
@section('main-content')
    <div class="container-fluid">
        <div id="addProductModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_submit" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <label class="form-label">Category *</label>
                                <input type="hidden" id="get_url" value="{{ url('/product') }}">
                                <input type="hidden" id="module_name" value="Product">
                                <select class="form-control" name="category" required>
                                    <option value="" selected disabled>--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                                <strong class="text-danger" id="name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Name *</label>
                                <input type="text" class="form-control" name="product_name"
                                    value="{{ old('product_name') }}" placeholder="Enter Product Name" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="product_name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Unit *</label>
                                <select name="product_unit" class="form-control" required value="{{ old('product_unit') }}">
                                    <option value="" selected disabled>--Select Quantity Unit--</option>
                                    @foreach ($allquantityUnits as $quantityUnit)
                                        <option value="{{ $quantityUnit->quantity_unit }}">
                                            {{ $quantityUnit->quantity_unit }}</option>
                                    @endforeach
                                </select>
                                <strong class="text-danger" id="product_unit"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Weight(In Tola) *</label>
                                <input type="text" class="form-control" name="product_weight"
                                    value="{{ old('product_weight') }}"
                                    placeholder="Enter Product Weight(In Tola)" autocomplete="off" required>
                                <strong class="text-danger" id="product_weight"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Stock Limit *</label>
                                <input type="number" min="1" class="form-control" name="product_min_limit"
                                    value="{{ old('product_min_limit') }}" placeholder="Enter Product Stock Limit"
                                    autocomplete="off" required>
                                <strong class="text-danger" id="product_min_limit"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Avalible Stock *</label>
                                <input type="number" min="1" class="form-control" name="product_stock"
                                    value="{{ old('product_stock') }}" placeholder="Enter Avalible Stock" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="product_stock"></strong>
                            </div>
                            {{-- <div class="col-md-12">
                                <label class="form-label">Product Price *</label>
                                <input type="number" min="1" class="form-control" name="product_price"
                                    value="{{ old('product_price') }}" placeholder="Enter Product Price" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="product_price"></strong>
                            </div> --}}
                            <div class="col-md-12">
                                <label class="form-label">Image *</label>
                                <input type="file" class="form-control" id="previewImage" name="product_image[]" multiple
                                    value="{{ old('product_image') }}" placeholder="Enter Product Stock Limit"
                                    autocomplete="off" required>
                                <strong class="text-danger" id="product_image"></strong>
                            </div>
                            <div class="col-md-12" id="imageContainer">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Description *</label>
                                <textarea name="product_description" class="form-control" required rows="3" placeholder="Enter Product Description"></textarea>
                                <strong class="text-danger" id="product_price"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="insert">Add Product > </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
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
                                <label class="form-label">Category *</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="{{ url('/product') }}">
                                <input type="hidden" id="module_name" value="Product">
                                <select class="form-control" name="category" required id="get_category">
                                    <option value="" selected disabled>--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                                <strong class="text-danger" id="name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Name *</label>
                                <input type="text" class="form-control" name="product_name"
                                    style="text-transform:capitalize" id="get_product_name"
                                    value="{{ old('product_name') }}" placeholder="Enter Product Name"
                                    autocomplete="off" required>
                                <strong class="text-danger" id="product_name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Unit *</label>
                                <select name="product_unit" class="form-control" id="get_product_unit"
                                    value="{{ old('product_unit') }}">
                                    <option value="" selected disabled>--Select Quantity Unit--</option>
                                    @foreach ($allquantityUnits as $quantityUnit)
                                        <option value="{{ $quantityUnit->quantity_unit }}">
                                            {{ $quantityUnit->quantity_unit }}</option>
                                    @endforeach
                                </select>
                                <strong class="text-danger" id="product_unit"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Weight(In Tola) *</label>
                                <input type="number" min="1" class="form-control" name="product_weight"
                                    id="get_product_weight" value="{{ old('product_weight') }}"
                                    placeholder="Enter Product Weight(In Tola)" autocomplete="off" required>
                                <strong class="text-danger" id="product_weight"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Avalible Stock *</label>
                                <input type="number" min="1" class="form-control" name="product_stock"
                                    id="get_product_stock" value="{{ old('product_stock') }}"
                                    placeholder="Enter Avalible Stock" autocomplete="off" required>
                                <strong class="text-danger" id="product_stock"></strong>
                            </div>
                            {{-- <div class="col-md-12">
                                <label class="form-label">Product Price *</label>
                                <input type="number" min="1" class="form-control" name="product_price"
                                    id="get_product_price" value="{{ old('product_price') }}"
                                    placeholder="Enter Product Price" autocomplete="off" required>
                                <strong class="text-danger" id="product_price"></strong>
                            </div> --}}
                            <div class="col-md-12">
                                <label class="form-label">Image *</label>
                                <input type="file" class="form-control" id="updatepreviewImage"
                                    name="product_image[]" multiple value="{{ old('product_image') }}"
                                    placeholder="Enter Product Stock Limit" autocomplete="off">
                                <strong class="text-danger" id="product_image"></strong>
                            </div>
                            <div class="col-md-12" id="updateimageContainer">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Product Description *</label>
                                <textarea name="product_description" class="form-control" required rows="3" id="get_product_description"
                                    placeholder="Enter Product Description"></textarea>
                                <strong class="text-danger" id="product_price"></strong>
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
        <div id="myModalDescription" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">View Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <p id="view_description" style="font-size: 15px"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/product') }}">Products</a></li>
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
                            <div class="col-6">
                                <h5 class="card-title mb-0">Manage Products</h5>
                            </div>
                            <div class="col-6 text-end">
                                {{-- <a href="{{ url('/sync_products') }}" class="btn btn-success"><i class="fas fa-sync"></i> Sync Products</a> --}}
                                <button class="btn btn-primary" id="addproduct">+ Add Product</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Product Name</th>
                                    <th>Company</th>
                                    <th>Product Unit</th>
                                    <th>Product Weight(In Tola)</th>
                                    <th>Product Price</th>
                                    <th>Product Image</th>
                                    <th>Product Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productData">
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allproducts as $product)
                                    @if ($array_data[$product->id])
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td id="product_name_{{ $product->id }}">
                                                {{ Str::ucfirst($product->product_name) }}</td>
                                            <td id="category_{{ $product->id }}">
                                                {{ Str::ucfirst($array_data[$product->id]) }}</td>
                                            <td id="product_unit_{{ $product->id }}">
                                                {{ Str::ucfirst($product->product_unit) }}</td>
                                                <td id="product_weight_{{ $product->id }}">
                                                    {{ Str::ucfirst($product->product_weight) }}</td>
                                            <td id="product_price_{{ $product->id }}">
                                                {{ 'Rs.' . Str::ucfirst($product->product_price) }}</td>
                                            <td id="product_image_{{ $product->id }}">
                                                @php
                                                    $product_images = json_decode($product->product_image);
                                                @endphp
                                                @foreach ($product_images as $pimage)
                                                    <img src="{{ $pimage }}" alt="Img not found"
                                                        class="avatar-md">
                                                @endforeach

                                            </td>
                                            <td id="product_description_{{ $product->id }}" class="get_description"
                                                data-description="{{ $product->product_description }}"
                                                style="cursor: pointer">
                                                {{ implode(' ', array_slice(explode(' ', $product->product_description), 0, 4)) }}
                                                <span id="get_description"
                                                    data-description="{{ $product->product_description }}"
                                                    class="badge bg-light text-dark" style="cursor: pointer">...</span>
                                            </td>
                                            <td>
                                                <form>
                                                    <input type="hidden" id="get_url" value="{{ url('/product') }}">
                                                    <input type="hidden" id="module_name" value="Product">
                                                </form>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-item-btn update"
                                                                data-update="{{ $product->id }}"
                                                                style="cursor: pointer;"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn delete"
                                                                data-del="{{ $product->id }}" style="cursor: pointer;">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="9" align="center" style="color:#004454;font-weight:bold;">No
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
            $(document).on("change", "#previewImage", function(event) {
                event.preventDefault();
                var files = event.target.files;
                var imageContainer = $("#imageContainer");
                imageContainer.empty();
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
                    reader.onload = (function(file) {
                        return function(e) {
                            var img = $('<img>', {
                                src: e.target.result,
                                class: 'img-thumbnail mt-1 ms-1',
                                width: '60'
                            });
                            imageContainer.append(img);
                        };
                    })(file);
                    reader.readAsDataURL(file);
                }
            });

            $(document).on("change", "#updatepreviewImage", function(event) {
                event.preventDefault();
                var files = event.target.files;
                var imageContainer = $("#updateimageContainer");
                imageContainer.empty();
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
                    reader.onload = (function(file) {
                        return function(e) {
                            var img = $('<img>', {
                                src: e.target.result,
                                class: 'img-thumbnail mt-1 ms-1',
                                width: '60'
                            });
                            imageContainer.append(img);
                        };
                    })(file);
                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#addproduct", function(event) {
                event.preventDefault();
                var baseURL = '{{ asset('') }}';
                $("#addProductModal").modal("show");
                $("#image_thumbnail").attr("src", baseURL + 'admin/images/dummy.png');
            });

            $(document).on("click", ".get_description", function(event) {
                event.preventDefault();
                $("#myModalDescription").modal("show");
                var value = $(this).data("description");
                $("#view_description").html(value);
            });

            $(document).on("click", ".update", function(event) {
                event.preventDefault();
                var id = $(this).data("update");
                var baseURL = '{{ asset('logos/') }}';
                var imageContainer = $("#updateimageContainer");

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    url: `{{ url('/product/') }}/${id}/edit`,
                    method: "GET",
                    success: function(response) {
                        $("#id").val(response.message.id);
                        $("#get_category").val(response.message.category);
                        $("#get_product_name").val(response.message.product_name);
                        $("#get_product_min_limit").val(response.message.product_min_limit);
                        $("#get_product_unit").val(response.message.product_unit);
                        $("#get_product_weight").val(response.message.product_weight);
                        $("#get_product_price").val(response.message.product_price);
                        $("#get_product_stock").val(response.product_stock);
                        $("#get_product_description").val(response.message.product_description);
                        imageContainer.empty();
                        $.each(response.product_image, function(key, value) {
                            var img = $('<img>', {
                                src: value,
                                class: 'img-thumbnail mt-1 ms-1',
                                width: '60'
                            });
                            imageContainer.append(img);
                        });

                        $("#myModal").modal("show");
                    }
                });
            });
        });
    </script>

@endsection
