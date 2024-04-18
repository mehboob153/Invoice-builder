@extends('base')
@section('content')

    <h2 class="col-md-8 ms-auto me-0">New client</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ms-auto me-0" style="width:82%;background-color:white;">
                <div class="mx-5 my-4 p-4">
                    <form action="" id="recipient_form">
                        @csrf
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="company_name">Company / Sender name</label>
                                    <input class="form-control" id="company_name" name="company_name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <i class="fas fa-pencil text-primary"></i>
                                    <label for="company_reg_number">Company Reg Number</label>
                                    <input class="form-control" id="company_reg_number" type="text" name="company_reg_number"/>
                                </div>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="vat_number">Vat Number</label>
                                    <input class="form-control" id="vat_number" type="text" name="vat_number"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="attention_to">Attention To</label>
                                    <input class="form-control" id="attention_to" type="text" name="attention_to"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input class="form-control" id="address" type="text" name="address"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone number</label>
                                    <div class="input-group">
                                        <select class="form-select country_code" aria-label="Default select example">
                                            <option selected disabled>Select Country</option>
                                        </select>
                                        <input type="text" class="form-control phone_number" id="phone_number" name="phone_number" placeholder="Enter phone number">
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
                                    <label for="contact_person">Contact Person</label>
                                    <input class="form-control" id="contact_person" type="text" name="contact_person" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-block">
                            <button type="button" class="btn btn-light border-dark me-3"
                                    data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="recipient_save_button">
                                <i class="fas fa-check me-2"></i>
                                Set Recipient Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
