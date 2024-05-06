@extends('base')
@section('content')

    <form id="userInfoForm" method="POST" action="{{ route('update_user_information') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
    <div class="col-lg-10 setting-content ms-lg-5 ms-0">
        <div class="container ml-220">
            <div class="row">
                <div class="col-lg-8 pt-5 ms-5">
                    <h1>My settings</h1>
                </div>
            </div>
            @if(session('success'))
                <h1 class="success-message" style="margin-left: 50px;margin-right: 50px;">{{session('success')}}</h1>
            @endif
            <div class="bg-white shadow pb-4 px-5 mx-lg-5 mx-0" style="">
                <div class="mx-5 mb-4">
                        <div class="row">
                            <div class="col-lg-6 mt-5">

                                <label class="d-flex pb-2">User Image</label>
                                @if($userInformation->logo)
                                    <div class="input-group style-input d-block" id="logo-container" style="justify-content: space-between;">
                                        <img id="logo-preview" src="{{ asset('images/'. $userInformation->logo) }}" alt="Selected Logo" style="width: 120px; height: 120px;border-radius: 0%;">
                                        <span id="display-logo" style="display:none;">
                                        <input type="file" class="form-control" id="logo" name="logo" >
                                        <label for="logo">
                                            <i class="fas fa-image fs-4 me-2"></i>
                                            Choose logo or drop it here
                                        </label>
                                        </span>
                                        <a href="#" id="delete-logo">
                                            <i class="fas fa-trash-alt fs-4"></i>
                                        </a>
                                    </div>
                                @else
                                    <div class="input-group style-input d-block">
                                        <input type="file" class="form-control" id="logo" name="logo">
                                        <label for="logo">
                                            <i class="fas fa-image fs-4 me-2"></i>
                                            Choose logo or drop it here
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row pt-4">
                            <hr />
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="d-flex pb-2">I am</label>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input type="radio" class="btn-check" name="account_type" id="btnradio1" value="individual"
                                            {{ $user->account_type == 'individual' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary px-5"
                                               for="btnradio1">Individual</label>
                                        <input type="radio" class="btn-check" name="account_type" id="btnradio2" value="company" {{ $user->account_type == 'company' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary px-5"
                                               for="btnradio2">Company</label>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Sender name</label>
                                    <input class="form-control" id="" type="text"  name="name" value="{{ $user->first_name ?? ''}} {{ $user->last_name ?? ''}}" />
                                </div>
                                @error('name')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Address</label>
                                    <input class="form-control" id="" type="text" name="address" value="{{ $userInformation->address ?? ''}}"/>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Comapany Tax Id</label>
                                    <input class="form-control" id="" type="number" name="company_tax_id" value="{{ $userInformation->company_tax_id ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Email address</label>
                                    <input class="form-control" id="" type="email" name="email" value="{{ $user->email ?? '' }}"/>
                                    @error('email')
                                    <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Web site</label>
                                    <input class="form-control" id="" type="" name="website_url" value="{{ $userInformation->website_url ?? ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Phone number</label>
                                    <div class="input-group">
                                        <select class="form-select country_code" aria-label="Default select example" name="country" >
                                            <option value="{{ $userInformation->country ?? ''}}" disabled>Select Country</option>
                                        </select>
                                        <input type="text" class="form-control phone_number" id="phone_number_1" name="phone_number" placeholder="Enter phone number" value="{{ $userInformation->phone_number ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Default Invoice currency</label>
                                    <select id="currency-select" class="form-select" name="currency" aria-label="Default select example">
                                        <option value="$">USD</option>
                                        <option value="€">EUR</option>
                                        <option value="₣">Franc</option>
                                        <option value="د.إ">Dirham</option>
                                        <option value="PKR">PKR</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Bank account details</label>
                                    <textarea class="form-control" id="" type="number" name="bank_details"/>{{ $userInformation->bank_details ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 pt-4">
                                <div class="d-block">
                                    <button type="button" class="btn btn-light border-dark me-3 py-2"
                                            data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary py-2"><i
                                            class="fas fa-floppy-disk me-2"></i>
                                        save
                                    </button>
                                    <button type="button"
                                            class="btn btn-light text-primary border-primary ms-3 py-2 px-4"
                                            data-bs-toggle="modal" data-bs-target="#changePasswordModal"><i
                                            class="fas fa-key me-2"></i>
                                        </i>Change password</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="bg-white shadow pb-4">
                    <div class="modal-header ">
                        <button type="button" class="btn-close " data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="row ms-2">
                        <div class="col-lg-12 text-center">
                            <h2>Change password</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-4">
                                <label for="inputPassword5" class="form-label">Current Password</label>
                                <input type="password" id="currentPassword" class="form-control w-100"
                                       aria-describedby="passwordHelpBlock">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-4">
                                <label for="inputPassword5" class="form-label">New Password</label>
                                <input type="password" id="newPassword" class="form-control w-100"
                                       aria-describedby="passwordHelpBlock">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-4">
                                <label for="inputPassword5" class="form-label">Confirm Password</label>
                                <input type="password" id="confirmPassword" class="form-control w-100"
                                       aria-describedby="passwordHelpBlock">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-4">
                                <button type="button" class="btn btn-primary w-100" id="changePasswordBtn">Change password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {

        $('#logo-preview').click(function(event) {
            event.preventDefault();
            $('#logo').click();
        });


        $('#delete-logo').click(function(event) {
            event.preventDefault();
            $('#logo-preview').hide();
            $('#delete-logo').hide();
            $('#display-logo').show();
        });


            function changePassword() {

                var currentPassword = $('#currentPassword').val();
                var newPassword = $('#newPassword').val();
                var confirmPassword = $('#confirmPassword').val();

                if (newPassword !== confirmPassword) {
                    alert('New password and confirm password must match');
                    return;
                }

            $.ajax({
                url: '{{ route("change_password") }}',
                method: 'POST',
                data: {
                    current_password: currentPassword,
                    new_password: newPassword,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#changePasswordModal').modal('hide');
                },
            });
        }

        $('#changePasswordBtn').click(function() {
            changePassword();

        });

        var selectedCurrency = "{{ $userInformation->currency ?? '' }}";
        $("#currency-select").val(selectedCurrency);

        setTimeout(function() {
            $(".success-message").fadeOut();
        }, 3000);

    });



</script>
@endsection
