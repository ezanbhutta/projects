<?php $__env->startSection('title', 'Manage Quantity Units'); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container-fluid">
        <div id="addquantityunitModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Quantity Unit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_submit" class="row g-3 needs-validation_submit" novalidate>
                            <div class="col-md-12">
                                <label class="form-label">Quantity Unit *</label>
                                <input type="hidden" id="get_url" value="<?php echo e(url('/quantity')); ?>">
                                <input type="hidden" id="module_name" value="Unit">
                                <input type="text" class="form-control" id="title" name="quantity_unit"
                                    value="<?php echo e(old('quantity_unit')); ?>" placeholder="Enter Quantity Unit" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="quantity_unit"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="insert_quantity_unit">Add Unit > </button>
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
                        <h5 class="modal-title" id="myModalLabel">Update Quantity Unit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation_update" novalidate>
                            <?php echo method_field('PUT'); ?>
                            <div class="col-md-12">
                                <label class="form-label">Quantity Unit *</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="<?php echo e(url('/quantity')); ?>">
                                <input type="hidden" id="module_name" value="Unit">
                                <input type="text" class="form-control" name="quantity_unit" id="get_quantity_unit"
                                    value="<?php echo e(old('quantity_unit')); ?>" placeholder="Enter Quantity Unit" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="quantity_unit"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update_quantity_unit">Edit Unit > </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quantity Units</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/quantity')); ?>">Quantity Units</a></li>
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
                                <h5 class="card-title mb-0">Manage Quantity Units</h5>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-primary" id="addquantityunit">+ Add Unit</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Quantity Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="quantityUnitData">
                                <?php
                                    $num = 1;
                                ?>
                                <?php $__empty_1 = true; $__currentLoopData = $allquantitiesunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantityunit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-ordering="false"><?php echo e($num++); ?></td>
                                        <td id="quantity_unit_<?php echo e($quantityunit->id); ?>">
                                            <?php echo e(Str::ucfirst($quantityunit->quantity_unit)); ?></td>
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="<?php echo e(url('/quantity')); ?>">
                                                <input type="hidden" id="module_name" value="Unit">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn update"
                                                            data-update="<?php echo e($quantityunit->id); ?>"
                                                            style="cursor: pointer;"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete"
                                                            data-del="<?php echo e($quantityunit->id); ?>" style="cursor: pointer;">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="9" align="center" style="color:#004454;font-weight:bold;">No
                                            Data Avalable</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        (function() {
            "use strict";
            var forms = document.querySelectorAll(".needs-validation_submit");
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener(
                    "submit",
                    function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                        "content"
                                    ),
                                },
                            });
                            var formData = new FormData(form_submit);
                            var get_url = $("#insert_quantity_unit")
                                .closest("#form_submit")
                                .find("#get_url")
                                .val();
                            var module_name = $("#insert_quantity_unit")
                                .closest("#form_submit")
                                .find("#module_name")
                                .val();
                            // --------------------------loading button coading-------------------
                            const button = document.getElementById("insert_quantity_unit");
                            button.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button.setAttribute("disabled", "disabled");
                            // --------------------------loading button coading-------------------
                            const titleCase = (s) => s.replace(/\b\w/g, c => c.toUpperCase());
                            $.ajax({
                                url: get_url,
                                method: "POST",
                                contentType: false,
                                processData: false,
                                data: formData,
                                dataType: "json",
                                success: function(response) {
                                    if (response.message == 200) {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "New " +
                                                module_name +
                                                " Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                    } else if (response.message == "purchase") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "Purchase Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Purhcase Prouct >";
                                        location.reload(true);
                                    } else if (response.message == "sale") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "Sale Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Purhcase Prouct >";
                                        location.reload(true);
                                    } else if (response.message == "low_stock") {
                                        $(".text-danger").text("");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: "Given Quantity is Greater than Stock..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                    } else if (response.message == "debit_add") {
                                        $(".text-danger").text("");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "Debit Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        location.reload(true);
                                    } else if (response.message == "company") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "New " + module_name +
                                                " Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        $("#addCompanyModal").modal("hide");
                                        $("#companyData").empty();
                                        var baseURL = get_url;
                                        var count = 0;
                                        $.each(response.data, function(key, value) {
                                            count++;
                                            $("#companyData").append(
                                                `<tr>
                                            <td data-ordering="false">${count}</td>
                                            <td id="company_name_${value.id}">${titleCase(value.name)}</td>
                                            <td id="company_contact_no_${value.id}">${value.contact_no}</td>
                                            <td>
                                                <form>
                                                    <input type="hidden" id="get_url" value="${baseURL}">
                                                    <input type="hidden" id="module_name" value="Company">
                                                </form>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-item-btn update" data-update="${value.id}" style="cursor: pointer;">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-item-btn delete" data-del="${value.id}" style="cursor: pointer;">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>`
                                            );
                                        });
                                    } else if (response.message == "quantityunit") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "New " + module_name +
                                                " Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        $("#addquantityunitModal").modal("hide");
                                        $("#quantityUnitData").empty();
                                        var baseURL = get_url;
                                        var count = 0;
                                        $.each(response.data, function(key, value) {
                                            count++;
                                            $("#quantityUnitData").append(
                                                `<tr>
                                            <td data-ordering="false">${count}</td>
                                            <td id="quantity_unit_${value.id}">${titleCase(value.quantity_unit)}</td>
                                            <td>
                                                <form>
                                                    <input type="hidden" id="get_url" value="${baseURL}">
                                                    <input type="hidden" id="module_name" value="Unit">
                                                </form>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-item-btn update" data-update="${value.id}" style="cursor: pointer;">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-item-btn delete" data-del="${value.id}" style="cursor: pointer;">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>`
                                            );
                                        });
                                    } else if (response.message == "product") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "New " + module_name +
                                                " Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        $("#addProductModal").modal("hide");
                                        $("#productData").empty();
                                        var baseURL = get_url;
                                        var count = 0;
                                        $.each(response.allproducts, function(key, value) {
                                            count++;
                                            if (response.array_data[value.id]) {
                                                $("#productData").append(
                                                    `<tr>
                                                <td data-ordering="false">${count}</td>
                                                <td id="product_name_${value.id}">${titleCase(value.product_name)}</td>
                                                <td id="company_${value.id}">${titleCase(response.array_data[value.id])}</td>
                                                <td id="product_unit_${value.id}">${titleCase(value.product_unit)}</td>
                                                <td>
                                                    <form>
                                                        <input type="hidden" id="get_url" value="${baseURL}">
                                                        <input type="hidden" id="module_name" value="Product">
                                                    </form>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item edit-item-btn update" data-update="${value.id}" style="cursor: pointer;">
                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit</a></li>
                                                            <li><a class="dropdown-item remove-item-btn delete" data-del="${value.id}" style="cursor: pointer;">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>`
                                                );
                                            }
                                        });
                                    } else if (response.error == "already exists") {
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: "Company Already Exists..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                    } else if (response.error == "already exists quantity") {
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: "Quantity Unit Already Exists..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                    } else if (response.message == "query") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "New " +
                                                module_name +
                                                " Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        window.location.href = "/inquiry"
                                    } else if (response.message == "teacher") {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "New " +
                                                module_name +
                                                " Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        window.location.href = "/teacher"
                                    } else {
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Add " + module_name + " >";
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: module_name +
                                                " Not Added Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                    }
                                    $("form").trigger("reset");
                                    form.classList.remove("was-validated");
                                },
                                error: function(error) {
                                    button.removeAttribute("disabled");
                                    button.innerHTML = "Add " + module_name + " >";
                                    var error = error.responseJSON;
                                    $.each(error.errors, function(index, value) {
                                        $("#" + index).html(value);
                                    });
                                },
                            });
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        })();
        (function() {
            "use strict";
            var forms = document.querySelectorAll(".needs-validation_update");
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener(
                    "submit",
                    function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                        "content"
                                    ),
                                },
                            });
                            var formData = new FormData(form_update);
                            var id = $("#update_quantity_unit")
                                .closest("#form_update")
                                .find("#id")
                                .val();
                            var get_url = $("#update_quantity_unit")
                                .closest("#form_update")
                                .find("#get_url")
                                .val();
                            var module_name = $("#update_quantity_unit")
                                .closest("#form_update")
                                .find("#module_name")
                                .val();
                            // --------------------------loading button coading-------------------
                            const button = document.getElementById("update_quantity_unit");
                            button.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button.setAttribute("disabled", "disabled");
                            // --------------------------loading button coading-------------------
                            const titleCase = (s) => s.replace(/\b\w/g, c => c.toUpperCase());
                            $.ajax({
                                url: get_url + "/" + id,
                                method: "POST",
                                contentType: false,
                                processData: false,
                                data: formData,
                                dataType: "json",
                                success: function(response) {
                                    if (response.message == 200) {
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: module_name +
                                                " Updated Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Update " + module_name + " >";
                                        location.reload(true);
                                    } else if (response.module == "company") {
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: module_name +
                                                " Updated Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Update " + module_name + " >";
                                        $("#myModal").modal("hide");
                                        $(".text-danger").text("");
                                        $("#company_name_" + response.module_data.id).empty();
                                        $("#company_contact_no_" + response.module_data.id)
                                            .empty();
                                        $("#company_name_" + response.module_data.id).append(
                                            titleCase(response.module_data.name));
                                        $("#company_contact_no_" + response.module_data.id)
                                            .append(response.module_data.contact_no);
                                    } else if (response.module == "quantityunitupdate") {
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: module_name +
                                                " Updated Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Update " + module_name + " >";
                                        $("#myModal").modal("hide");
                                        $(".text-danger").text("");
                                        $("#quantity_unit_" + response.module_data.id).empty();
                                        $("#quantity_unit_" + response.module_data.id).append(
                                            titleCase(response.module_data.quantity_unit));
                                    } else if (response.module == "product") {
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: module_name +
                                                " Updated Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Update " + module_name + " >";
                                        $("#myModal").modal("hide");
                                        $(".text-danger").text("");
                                        $("#company_" + response.module_data.id).empty();
                                        $("#product_name_" + response.module_data.id).empty();
                                        $("#product_unit_" + response.module_data.id).empty();
                                        $("#company_" + response.module_data.id).append(
                                            titleCase(response.company));
                                        $("#product_name_" + response.module_data.id).append(
                                            titleCase(response.product_name));
                                        $("#product_unit_" + response.module_data.id).append(
                                            titleCase(response.product_unit));
                                    } else if (response.message == "update_min_stock") {
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "Min Stock Updated Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $("form").trigger("reset");
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Update " + module_name + " >";
                                        $("#editMinStockModal").modal("hide");
                                        $(".text-danger").text("");
                                        $("#product_min_stock_" + response.data.id).empty();
                                        $("#product_min_stock_" + response.data.id).append(
                                            response.data.product_min_limit);
                                        location.reload(true);
                                    } else {
                                        button.removeAttribute("disabled");
                                        button.innerHTML = "Update " + module_name + " >";
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: module_name +
                                                " not Updated Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                    }
                                    $("form").trigger("reset");
                                    form.classList.remove("was-validated");
                                },
                                error: function(error) {
                                    button.removeAttribute("disabled");
                                    button.innerHTML = "Update " + module_name + " >";
                                    var error = error.responseJSON;
                                    $.each(error.errors, function(index, value) {
                                        $("#" + index).html(value);
                                    });
                                },
                            });
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        })();

        $(document).ready(function() {
            $(document).on("click", "#addquantityunit", function(stop) {
                stop.preventDefault();
                $("#addquantityunitModal").modal("show");
            })
            $(document).on("click", ".update", function(stop) {
                stop.preventDefault();
                var id = $(this).data("update");
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: `<?php echo e(url('/quantity/${id}/edit')); ?>`,
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#get_quantity_unit").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#get_quantity_unit").val(response.message.quantity_unit);
                    }
                });
            });

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\channdi\resources\views/Quantity/view.blade.php ENDPATH**/ ?>