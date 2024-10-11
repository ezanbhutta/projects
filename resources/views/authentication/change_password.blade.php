@extends('layouts.app_admin')
@section('title', 'Change Password')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/change_password') }}">Password</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title mb-0">Change Password</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_submit" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <label class="form-label">Old Password *</label>
                                <input type="hidden" id="get_url" value="{{ url('/update_password') }}">
                                <input type="hidden" id="module_name" value="Password">
                                <input type="text" class="form-control" name="old_password"
                                    placeholder="Enter Old Password" value="{{ $user->temp_password }}" disabled>
                                <strong class="text-danger" id="old_password"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">New Password *</label>
                                <input type="password" class="form-control" name="password" required placeholder="Enter Password">
                                <strong class="text-danger" id="password"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Confirm New Password *</label>
                                <input type="password" class="form-control" name="password_confirmation" required
                                    placeholder="Enter Confirm New Password">
                                <strong class="text-danger" id="password_confirmation"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="insert"><i class="fas fa-lock"></i> Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
