@extends('main')
@section('container')




    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Employee /</span>
            @if(isset($employee))
                Edit
            @else
                Create
            @endif

        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                    {{--                    <li class="nav-item"><a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i> Notifications</a></li>--}}
                    {{--                    <li class="nav-item"><a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i> Connections</a></li>--}}
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details
                    </h5>

                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{url('public')}}/assets/img/avatars/1.png"  alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"  />
{{--                            <img id="output"/>--}}
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" onchange="loadFile(event)" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{route('employees.store')}}" >
                            @csrf
                            @isset($employee)
                                <input type="hidden" name="id" value="{{$employee->id}}">
                            @endisset
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Employee Name</label>
                                    <input class="form-control" type="text" id="name" name="name" @isset($employee) value="{{$employee->name}}" @endisset placeholder="John" autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" id="dob" @isset($employee) value="{{$employee->dob}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Father's Name</label>
                                    <input class="form-control" type="text" id="fatherName" name="fatherName"   @isset($employee) value="{{$employee->fatherName}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Mother's Name</label>
                                    <input class="form-control" type="text" id="motherName" name="motherName"  @isset($employee) value="{{$employee->motherName}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" class="select2 form-select" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="m" @isset($employee) @if($employee->gender== 'm') selected @endif @endisset>Male</option>
                                        <option value="f" @isset($employee) @if($employee->gender== 'f') selected @endif @endisset>Female</option>
                                        <option value="o" @isset($employee) @if($employee->gender== 'o') selected @endif @endisset>Other</option>

                                    </select>
                                </div>
{{--                                <div class="mb-3 col-md-6">--}}
{{--                                    <label for="organization" class="form-label">Organization</label>--}}
{{--                                    <input type="text" class="form-control" id="organization" name="organization" placeholder="ThemeSelection" />--}}
{{--                                </div>--}}

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" placeholder="john.doe@example.com" @isset($employee) value="{{$employee->email}}" @endisset placeholder="john.doe@example.com" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">BD (+88)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" @isset($employee) value="{{$employee->phoneNumber}}" @endisset placeholder="01*******" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" @isset($employee) value="{{$employee->address}}" @endisset />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">Division</label>
                                    <input class="form-control" type="text" id="division" name="division" placeholder="Dhaka"  @isset($employee) value="{{$employee->division}}" @endisset/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465" maxlength="6" @isset($employee) value="{{$employee->zipCode}}" @endisset />
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h5 class="card-header">Company Details</h5>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="emp_id" class="form-label">Employee ID <span class="required">* </span></label>
                                    <input class="form-control" type="text" id="emp_id" name="emp_id"   @isset($official) value="{{$official->emp_id}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Department <span class="required">* </span></label>
                                    <input class="form-control" type="text" id="department" name="department"  @isset($official) value="{{$official->department}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="designation" class="form-label">Designation <span class="required">* </span></label>
                                    <input class="form-control" type="text" id="designation" name="designation"  @isset($official) value="{{$official->designation}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="join_dt" class="form-label">Date of Joining</label>
                                    <input class="form-control" type="date" name="join_dt" id="join_dt" @isset($official) value="{{$official->join_dt}}" @endisset/>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h5 class="card-header">Bank Account Details</h5>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="ac_holder_name" class="form-label">Account Holder Name</label>
                                    <input class="form-control" type="text" id="ac_holder_name" name="ac_holder_name" @isset($bank) value="{{$bank->ac_holder_name}}" @endisset  placeholder="Account Holder Name" />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="ac_number" class="form-label">Account Number</label>
                                    <input class="form-control" type="text" id="ac_number" name="ac_number"  placeholder="Account Holder Name" @isset($bank) value="{{$bank->ac_number}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input class="form-control" type="text" id="bank_name" name="bank_name"  placeholder="Account Holder Name" @isset($bank) value="{{$bank->bank_name}}" @endisset/>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="branch_name" class="form-label">Branch Name</label>
                                    <input class="form-control" type="text" id="branch_name" name="branch_name"  placeholder="Account Holder Name" @isset($bank) value="{{$bank->branch_name}}" @endisset/>
                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>


                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                {{--                <div class="card">--}}
                {{--                    <h5 class="card-header">Delete Account</h5>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <div class="mb-3 col-12 mb-0">--}}
                {{--                            <div class="alert alert-warning">--}}
                {{--                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>--}}
                {{--                                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <form id="formAccountDeactivation" onsubmit="return false">--}}
                {{--                            <div class="form-check mb-3">--}}
                {{--                                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />--}}
                {{--                                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>--}}
                {{--                            </div>--}}
                {{--                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>--}}
                {{--                        </form>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>



    </div>




@endsection

@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('uploadedAvatar');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

@endsection
