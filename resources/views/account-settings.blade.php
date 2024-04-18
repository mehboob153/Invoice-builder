@extends('base')
@section('content')

<h2 class="col-md-8 ms-auto me-0">My settings</h2>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 ms-auto me-0" style="width:82%;background-color:white;">
            <div class="mx-5 my-4 p-4">
                <form action="" id="sender_form">
                    @csrf
                    <div class="row pt-4">
                        <input class="form-control" id="user_id" value="1" name="user_id" hidden/>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="company_name">Company / Sender name</label>
                                <input class="form-control" id="company_name" type="text" name="company_name"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <i class="fas fa-pencil text-primary"></i>
                                <label for="company_tax_id">Company Tax Id</label>
                                <input class="form-control" id="company_tax_id" type="text" name="company_tax_id" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" id="address" type="text" name="address" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone_number_1">Phone number</label>
                                <div class="input-group">
                                    <select class="form-select country_code" aria-label="Default select example">
                                        <option selected disabled>Select Country</option>
                                    </select>
                                    <input type="text" class="form-control phone_number" id="phone_number_1" name="phone_number" placeholder="Enter phone number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4 ">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="">Email</label>
                                <input class="form-control" id="email" type="email" name="email" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="website_url">Web site</label>
                                <input class="form-control" id="website_url" type="text" name="website_url" />
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="bank_details" class="">Bank Details</label>
                                <input class="form-control" id="bank_details" type="text" name="bank_details" />
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-light border-dark me-3"
                                data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="sender_save_button">
                            <i class="fas fa-check me-2"></i>
                            Set Sender Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
