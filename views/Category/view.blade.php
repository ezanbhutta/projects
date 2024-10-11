@extends('layouts.app_admin')
@section('title', 'Manage Categories')
@section('main-content')
    <div class="container-fluid">
        <div id="addCategoryModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_submit" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <label class="form-label">Category Name *</label>
                                <input type="hidden" id="get_url" value="{{ url('/category') }}">
                                <input type="hidden" id="module_name" value="Category">
                                <input type="text" class="form-control" id="title" name="name"
                                    value="{{ old('name') }}" placeholder="Enter Category Name" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description *</label>
                                <textarea name="description" class="form-control" required rows="3" placeholder="Enter Cateogry Description"></textarea>

                                <strong class="text-danger" id="description"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="insert">Add Category > </button>
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
                        <h5 class="modal-title" id="myModalLabel">Update Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                            @method('PUT')
                            <div class="col-md-12">
                                <label class="form-label">Category Name *</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="{{ url('/category') }}">
                                <input type="hidden" id="module_name" value="Category">
                                <input type="text" class="form-control" name="name" id="get_name"
                                    style="text-transform: capitalize" value="{{ old('name') }}"
                                    placeholder="Enter Category Name" autocomplete="off" required>
                                <strong class="text-danger" id="name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description *</label>
                                <textarea name="description" id="get_description" class="form-control" required rows="3" placeholder="Enter Cateogry Description"></textarea>
                                <strong class="text-danger" id="description"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update">Edit Category > </button>
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
                        <p id="view_description"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Categories</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/category') }}">Categories</a></li>
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
                                <h5 class="card-title mb-0">Manage Categories</h5>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-primary" id="addCategory">+ Add Category</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="categoryData">
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allcategories as $category)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td id="category_name_{{ $category->id }}">{{ Str::ucfirst($category->name) }}</td>
                                        <td id="category_description_{{ $category->id }}">{{ $category->description }}
                                        </td>
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="{{ url('/category') }}">
                                                <input type="hidden" id="module_name" value="Category">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn update"
                                                            data-update="{{ $category->id }}" style="cursor: pointer;"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete"
                                                            data-del="{{ $category->id }}" style="cursor: pointer;">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
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
            $(document).on("click", "#addCategory", function(stop) {
                stop.preventDefault();
                $("#addCategoryModal").modal("show");
            })
            $(document).on("click", ".update", function(stop) {
                stop.preventDefault();
                var id = $(this).data("update");
                var baseURL = `{{ asset('logos/') }}`;
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: `{{ url('/category/${id}/edit') }}`,
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#get_name").empty();
                        $("#get_description").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#get_name").val(response.message.name);
                        $("#get_description").val(response.message.description);
                    }
                });
            });

        })
    </script>
@endsection
