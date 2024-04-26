@extends('base')
@section('content')

<form id="clientInfo" method="POST" action="{{ route('store_recipient') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-10 clients-content">
        <div class="container" style="margin-left: 220px;">
            <div class="row">
                <div class="col-lg-8 pt-5 ms-5">
                    <h1>New Client</h1>
                </div>
            </div>

            <div class="bg-white shadow pb-4 px-5" style="margin-left: 50px; margin-right: 50px;">

                <div class="mx-5 mb-4">
                        <div class="row">
                            <div class="col-lg-6 mt-5">
                                <label class="d-flex pb-2">Client Logo</label>
                                <div class="input-group style-input d-block">
                                    <input type="file" class="form-control" id="logo" name="logo">
                                    <label for="logo">
                                        <i class="fas fa-image fs-4 me-2"></i>
                                        Choose logo or drop it here
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Company name</label>
                                    <input class="form-control company_name" id="company_name" name="company_name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Country</label>
                                    <select class="form-select" aria-label="Default select example" name="country">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Email address</label>
                                    <input class="form-control email" id="email" type="email" name="email" />
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Phone number</label>
                                    <select class="form-select" aria-label="Default select example" name="phone_number">
                                        <option selected>+92</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Address</label>
                                    <input class="form-control address" id="address" type="text" name="address"/>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Attention to</label>
                                    <input class="form-control" id="attention_to" type="text" name="attention_to"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Company reg number</label>
                                    <input class="form-control" id="company_reg_number" type="text" name="company_reg_number"/>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">VAT Number</label>
                                    <input class="form-control" id="vat_number" type="text" name="vat_number"/>
                                </div>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-lg-12">
                                <label for="exampleFormControlInput1" class="form-label">Contact person
                                </label>
                                <input class="form-control" id="contact_person" type="text" name="contact_person" />
                            </div>
                        </div>
                        <div class="modal-footer d-block">
                            <button type="button" class="btn btn-light border-dark me-3"
                                    data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk me-2"></i>
                                save
                            </button>
                        </div>
                </div>
            </div>




        </div>
    </div>
</form>

@endsection
