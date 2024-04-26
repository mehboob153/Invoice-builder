@extends('base')
@section('content')


<div class="col-lg-10 mx-auto all-contenct">

            <div class="container">
                <div class="row" style="margin-left: 220px;">
                    <div class="col-lg-8 col-md-8 col-sm-4">
                        <select class="form-select mb-3 w-50 mt-4" aria-label="Large select example" id="template_id">
                            <option selected>Blank template</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div class="bg-white py-4 px-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group style-input">
                                        <input type="file" class="form-control" id="logo" name="logo">
                                        <label for="logo">
                                            <i class="fas fa-image fs-4 me-2"></i>
                                            Choose logo or drop it here
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-select" aria-label="Large select example">
                                        <option selected>Invoice</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" placeholder="0001" class="form-control" id="inovice_no">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 pt-3">
                                    <div class="d-flex align-items-center justify-content-end ">
                                        <label class="me-3" for="" style="font-weight: bold; font-size: 14px;">Issue
                                            date</label>
                                        <input class="form-control w-25" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center justify-content-end mt-3">
                                        <label class="me-3" for="" style="font-weight: bold; font-size: 14px;">Due
                                            date</label>
                                        <input class="form-control w-25" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-lg-6">
                                    <button type="button" class="btn modal-button text-start w-100 "
                                            data-bs-toggle="modal" data-bs-target="#senderModal">From
                                        <div class="d-flex mt-3 align-items-center">
                                            <i class="fas fa-building fs-1 me-3"></i>
                                            <div>
                                                <p id="sender_name" class="mb-0" style="font-size: 16px; color: #272b30;">Sender name</p>
                                                <span id="sender_contact_details" style="font-size: 14px; color: #6a7178;">Sender contact details</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn modal-button text-start w-100"
                                            data-bs-toggle="modal" @if(auth()->check()) data-bs-target="#toRecipientModalforLoggedIn" @else data-bs-target="#toRecipientModal" @endif>To
                                        <div class="d-flex mt-3 align-items-center">
                                            <i class="fas fa-user fs-1 me-3"></i>
                                            <div>
                                                <p id="recipient_name" class="mb-0" style="font-size: 16px; color: #272b30;">Recipient name</p>
                                                <span id="recipient_contact_details" style="font-size: 14px; color: #6a7178;">Recipient contact details</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <input type="text" placeholder="Enter company name" class="form-control py-2" id="add_company_info">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <input type="text" placeholder="Enter client name" class="form-control py-2" id="add_client_info">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <input type="text" placeholder="Invoice description" class="form-control py-2" id="add_description">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-4">
                                    <button type="button" class="btn btn-light py-3 w-100 mt-3" id="add_new_invoice_btn" >
                                        <i class="fas fa-plus"></i>
                                        </i>Add new invoice item</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table border" id="new_invoice_table" style="display: none;">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Unit price</th>
                                            <th scope="col">Tax</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-group-divider" style="border:none;" id="calculation">
                                        <tr>
                                            <td><input class="form-control" type="text" id="name" ></td>
                                            <td><input class="form-control" type="number" id="quantity" ></td>
                                            <td><input class="form-control" type="number" id="unit_price"></td>
                                            <td>
                                                <select class="form-select" style="width:150px" id="tax">
                                                    <option selected>Non Tax</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </td>
                                           <td class="subtotal" id="subtotal">0.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <textarea placeholder="Description" class="form-control" id="description" rows=""></textarea>
                                            </td>
                                            <td style="align-content: center;">
                                                <i class="fas fa-check fs-5 text-primary me-2 tick-icon"></i>
                                                <i class="fas fa-trash-alt fs-5 text-primary delete-icon"></i>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex py-3 px-3" style="background-color: #dee2e6;">
                                            <label class="me-3 fw-bold" for="currency-select" style="font-size: 14px; color: #4f575e;">Invoice summary</label>
                                            <select id="currency-select" class="form-select" aria-label="Small select example">
                                                <!-- Options will be dynamically populated here -->
                                                <option value="$">USD</option>
                                                <option value="€">EUR</option>
                                                <option value="₣">Franc</option>
                                                <option value="د.إ">Dirham</option>
                                                <option value="rs">PKR</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row span-style">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class="me-5 pe-3">Subtotal</span>
                                        <span class="ms-5 ps-5" id="invoice_subtotal">$ 0.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row span-style">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class="me-5 pe-3" >Tax</span>
                                        <span class="ms-5 ps-5" id="invoice_tax">$ 0.00</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row span-style payment_amount_div" style="display:none;">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class="me-5 pe-3">Payments</span>
                                        <span class="ms-5 ps-5" id="invoice_payment">$ 0.00</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row span-style">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class="me-5 pe-3" style="margin-right: 70px;">Total</span>
                                        <span class="ms-5 ps-5" id="invoice_total">$ 0.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="my-4">
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control py-2" id="invoice_item"
                                           placeholder="Invoice items">
                                </div>
                            </div>
                            <div class="my-4">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control py-2" id="invoice_item_description"
                                           placeholder="Invoice items description">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 btn-css pt-5 side-buttons" <hr class="row">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addCustomFieldModal"
                            class="btn btn-light text-primary border-primary w-100 mt-3"><i class="fas fa-cube"></i>
                        </i>Add custom field</button>

                    <button type="button" class="btn btn-light text-primary border-primary w-100 mt-3" id="company_info_btn">
                        <i class="fas fa-building"></i>
                        </i>Add company info</button>
                    <button type="button" class="btn btn-light text-primary border-primary w-100 mt-3" id="client_info_btn">
                        <i class="fas fa-user"></i>
                        </i>Add client info</button>
                    <button type="button" class="btn btn-light text-primary border-primary w-100 mt-3" id="add_description_btn">
                        <i class="fas fa-pencil"></i>
                        </i>Add description</button>
                    <button type="button" class="btn btn-light text-primary border-primary w-100 mt-3" id="add_payment_btn">
                        <i class="fas fa-usd"></i>
                        </i>Add payment</button>

                    <input type="text" placeholder="Enter amount" class="form-control mt-3 py-2" id="payment_amount">

                    <hr class="my-4">
                    </hr>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-trash-alt"></i>
                            Delete invoice
                        </button>
                    </form>
                    <button type="button" class="btn btn-primary w-100 mt-3"><i
                            class="fas fa-file file-icon" id="generateInvoiceBtn"></i>
                            </i>Download PDF</button>
                    <button type="button" id="save_button" class="btn btn-primary w-100 mt-3"><i class="fas fa-save"></i>
                        </i>Save</button>
                </div>

            </div>

        </div>
</div>


<!-- Add Custom Field Modal-->
<div class="modal fade" id="addCustomFieldModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " style="max-width: 700px; height: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add custom field</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body border border-secondary-subtle m-5 ">
                <div class="row">
                    <div class="col-lg-12 my-4">
                        <label for="exampleFormControlInput1" class="form-label">Display location</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>-</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="email" class="form-control">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12">
                        <label for="exampleFormControlInput1" class="form-label">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-trash-alt"></i>
                            Delete</button>
                    </div>
                </div>

            </div>
            <div class="modal-footer d-block">
                <button type="button" class="btn btn-light border-dark me-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">
                    Add Another Field<i class="fas fa-check ms-2"></i>
                </button>
                <button type="button" class="btn btn-primary">
                    Set Custom Field<i class="fas fa-building ms-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- From sender Modal -->
<div class="modal fade" id="senderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px; height: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body border border-secondary-subtle mx-5 my-4">
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
                            <div id="sender_phone_validation" class="text-danger"></div>
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
                    <div class="modal-footer d-block">
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
<!--To Recipient modal-->
<div class="modal fade" id="toRecipientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px; height: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body border border-secondary-subtle mx-5 my-4">
                <form action="" id="recipient_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
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
                    <div class="row pt-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="company_name">Company / Sender name</label>
                                <input class="form-control company_name" id="company_name" name="company_name" type="text" />
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
                                <input class="form-control address" id="address" type="text" name="address"/>
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
                            <div id="phone_number_validation" class="text-danger"></div>
                        </div>
                    </div>
                    <div class="row py-4 ">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="">Email</label>
                                <input class="form-control email" id="email" type="email" name="email" />
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

<!-- To Recipient Modal for logged in user -->
<div class="modal fade" id="toRecipientModalforLoggedIn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" style="max-width: 550px !important;" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select the client for the invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 440px; overflow-y: auto;">
                <div class="row p-0">
                    <div class="col-lg-8">
                        <input type="search" class="form-control" id=""
                               placeholder="Search by company name, client name or email">
                    </div>
                    <div class="col-lg-4 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#toRecipientModal"><i
                                class="fa-solid fs-5 fa-plus me-2"></i>Create Client</button>
                    </div>
                </div>

                <div class="row">
                    @if ($clients->isEmpty())
                        <div class="text-center pt-5">
                            <h6>Nothing to see here yet. Click 'Add Client' above to get started! </h6>
                        </div>
                    @else
                        @foreach($clients as $client)
                    <div class="col-lg-12 pt-3">
                        <div class="card" style="max-width: 540px;">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('images/'. $client->logo .'') }}" class="card-img-top ms-3"
                                         alt="..." style="width: 40px; height: 40px; border-radius: 50%; margin-top: 35px;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $client->company_name }}</h2>
                                        <p class="m-0">{{ $client->company_name }}</p>
                                        <span>{{ $client->email }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-5 text-center">
                                        <form id="deleteClient" action="{{ route('delete_client', $client->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="" id="deleteLink">
                                                <i id="deleteIcon" class="fa-solid fs-5 fa-trash-can text-danger"></i>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>

    $(document).ready(function() {
        $('#add_company_info').hide();
        $('#add_client_info').hide();
        $('#add_description').hide();
        $('#payment_amount').hide();

        $('#company_info_btn').click(function() {
            $('#add_company_info').toggle();
        });

        $('#client_info_btn').click(function() {
            $('#add_client_info').toggle();
        });

        $('#add_description_btn').click(function() {
            $('#add_description').toggle();
        });

        $('#add_payment_btn').click(function() {
            $('#payment_amount').toggle();
        });

        {{--$('#sender_save_button').click(function(event) {--}}
        {{--    event.preventDefault();--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ route("store_user_information") }}',--}}
        {{--        type: 'POST',--}}
        {{--        data: $('#sender_form').serialize(),--}}
        {{--    });--}}
        {{--});--}}

        {{--$('#recipient_save_button').click(function(event) {--}}
        {{--    event.preventDefault();--}}
        {{--    var formData = new FormData();--}}

        {{--    formData.append('company_name', $('.company_name').val());--}}
        {{--    formData.append('company_reg_number', $('#company_reg_number').val());--}}
        {{--    formData.append('vat_number', $('#vat_number').val());--}}
        {{--    formData.append('attention_to', $('#attention_to').val());--}}
        {{--    formData.append('address', $('.address').val());--}}
        {{--    formData.append('phone_number', $('#phone_number').val());--}}
        {{--    formData.append('email', $('.email').val());--}}
        {{--    formData.append('contact_person', $('#contact_person').val());--}}
        {{--    formData.append('logo', $('#logo')[0].files[0]);--}}
        {{--    formData.append('_token', '{{ csrf_token() }}');--}}

        {{--    $.ajax({--}}
        {{--        url: '{{ route("store_recipient") }}',--}}
        {{--        type: 'POST',--}}
        {{--        data: formData,--}}
        {{--        contentType: false, // Set contentType to false--}}
        {{--        processData: false,--}}
        {{--    });--}}
        {{--});--}}

            $.ajax({
                url: 'https://restcountries.com/v3.1/all',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('.country_code').empty();
                    $('.country_code').append($('<option>', {
                        value: '',
                        text: 'Select Country'
                    }));
                    var countryCodeDigitLimits = {};

                    $.each(response, function(index, country) {
                        var countryName = country.name.common;
                        var suffixes = Array.isArray(country.idd.suffixes) ? country.idd.suffixes.join('') : '';
                        var phoneCode = country.idd.root + suffixes;

                        var digitLimit = 20;
                        if (country.postalCode && country.postalCode.format) {
                            digitLimit = parseInt(country.postalCode.format.replace('#', '9'));
                        }

                        countryCodeDigitLimits[phoneCode] = digitLimit;
                        $('.country_code').append($('<option>', {
                            value: phoneCode,
                            text: countryName + ' (' + phoneCode + ')'
                        }));
                    });

                    $('.country_code').change(function() {
                        var countryCode = $(this).val();
                        var digitLimit = countryCodeDigitLimits[countryCode];
                        $(this).closest('.form-group').find('.phone_number').attr('maxlength', digitLimit);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching countries:', error);
                }
            });

        var RowCloned = false;

        $("#add_new_invoice_btn").click(function () {
            if (!RowCloned) {
                $("#new_invoice_table").show();
                RowCloned = true;
            } else {

                var nameValue = $("#name").val().trim();
                var quantityValue = $("#quantity").val().trim();
                var unitPriceValue = $("#unit_price").val().trim();

                if (nameValue === "") {
                    $("#name").addClass("input-error");
                } else {
                    $("#name").removeClass("input-error");
                }

                if (quantityValue === "") {
                    $("#quantity").addClass("input-error");
                } else {
                    $("#quantity").removeClass("input-error");
                }

                if (unitPriceValue === "") {
                    $("#unit_price").addClass("input-error");
                } else {
                    $("#unit_price").removeClass("input-error");
                }


                if (nameValue !== "" && quantityValue !== "" && unitPriceValue !== "") {

                    var clonedRow = $("#new_invoice_table tbody tr").eq(0).clone();

                    clonedRow.find('input, select').each(function () {
                        var value = $(this).val();
                        $(this).replaceWith('<span>' + value + '</span>');
                    });
                    var subtotalId = 'subtotal_' + ($("#new_invoice_table tbody tr").length + 1);
                    clonedRow.find('.subtotal').attr('id', subtotalId);

                    $("#new_invoice_table tbody").before(clonedRow);

                    var clonedSubtotal = parseFloat(quantityValue) * parseFloat(unitPriceValue);
                    clonedRow.find('.subtotal').text(clonedSubtotal.toFixed(2));

                    $("#new_invoice_table input[type='text']").val("");
                    $("#new_invoice_table input[type='number']").val("");
                    $("#new_invoice_table select").val("Non Tax");

                    $("#new_invoice_table textarea").val("");
                    $("#new_invoice_table tbody tr:not(:last-child) .subtotal").text("0.00");
                }
            }
        });

        $(document).on('input', '#unit_price', function () {
            var unitPrice = $(this).val();
            var quantity = $('#quantity').val();
            var subtotal = unitPrice * quantity;
            var currency = $('#currency-select').val();

            $('#subtotal').text(subtotal.toFixed(2));
            var sum = 0;
            $('.subtotal').each(function () {
                var subtotal = parseFloat($(this).text());
                if (!isNaN(subtotal)) {
                    sum += subtotal;
                }
            });

            $('#invoice_subtotal').text(currency + sum.toFixed(2));
            $('#invoice_total').text(currency + sum.toFixed(2));

        });


        $('#payment_amount').on('change', function() {
            $('.payment_amount_div').show();
            var previousPaymentAmount = 0;
            var paymentAmount = parseFloat($(this).val());
            console.log(paymentAmount);
            var difference = paymentAmount - previousPaymentAmount;
            var total = parseFloat($('#invoice_total').text().replace('$', ''));
            $('#invoice_payment').text('$ ' + paymentAmount.toFixed(2));
            $('#invoice_total').text('$ ' + (total - difference).toFixed(2));

                previousPaymentAmount = paymentAmount;

        });




        $(document).on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
        });

        $('#save_button').click(function(event) {
            event.preventDefault();

            var template = $('#template_id').val();
            var logo = $('#logo')[0].files[0];
            var invoiceType = $('#invoice_type').val();
            var invoice_date = $('[type="date"]').eq(0).val();
            var due_date = $('[type="date"]').eq(1).val();
            var senderName = $('#add_company_info').val();
            var recipientName = $('#add_client_info').val();
            var description = $('#add_description').val();
            var user_id = $('#user_id').val();
            var invoice_item = $('#invoice_item').val();
            var invoice_item_description =$('#invoice_item_description').val();

            var formData = new FormData();
            formData.append('user_id', user_id);
            formData.append('invoice_date', invoice_date);
            formData.append('due_date', due_date);
            formData.append('description', description);
            formData.append('senderName', senderName);
            formData.append('template', template);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('logo', logo);
            formData.append('invoice_item', invoice_item);
            formData.append('invoice_item_description', invoice_item_description);


            $.ajax({
                url: '{{ route("store_user_information") }}',
                type: 'POST',
                data: $('#sender_form').serialize(),
            });

            var form = new FormData();

            form.append('company_name', $('.company_name').val());
            form.append('company_reg_number', $('#company_reg_number').val());
            form.append('vat_number', $('#vat_number').val());
            form.append('attention_to', $('#attention_to').val());
            form.append('address', $('.address').val());
            form.append('phone_number', $('#phone_number').val());
            form.append('email', $('.email').val());
            form.append('contact_person', $('#contact_person').val());
            form.append('logo', $('#logo')[0].files[0]);
            form.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route("store_recipient") }}',
                type: 'POST',
                data: form,
                contentType: false, // Set contentType to false
                processData: false,
            });

            $.ajax({
                url: '/save-invoice',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Invoice saved successfully!');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('.tick-icon').click(function() {

            var name = $('#name').val();
            var quantity = $('#quantity').val();
            var unit_price = $('#unit_price').val();
            var tax = $('#tax').val();
            var description = $('#description').val();
            var sub_total = $('#subtotal').text();

            var formData = new FormData();
            formData.append('name', name);
            formData.append('quantity', quantity);
            formData.append('unit_price', unit_price);
            formData.append('tax', tax);
            formData.append('description', description);
            formData.append('sub_total', sub_total);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '/save-invoice-detail',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Invoice saved successfully!');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });


        $('#currency-select').select2({
            placeholder: 'Select currency',
            allowClear: true,
        });

        $('#currency-select').on('change', function() {
            var currencySymbol = $(this).val();
            updateCurrencySymbols(currencySymbol);
        });

        function updateCurrencySymbols(currencySymbol) {

            $('#invoice_subtotal').text(currencySymbol + ' 0.00');
            $('#invoice_tax').text(currencySymbol + ' 0.00');
            $('#invoice_total').text(currencySymbol + ' 0.00');
        }


        $('#generateInvoiceBtn').click(function() {
            var senderFormData = $('#sender_form').serialize();
            var recipientFormData = $('#recipient_form').serialize();
            var inoviceNo         = $('#inovice_no').val();
            var invoiceDate      = $('[type="date"]').eq(0).val();
            var dueDate          = $('[type="date"]').eq(1).val();
            var name             = $('#name').val();
            var quantity         = $('#quantity').val();
            var unit_price       = $('#unit_price').val();
            var tax              = $('#tax').val();
            var description      = $('#description').val();
            var sub_total        = $('#subtotal').text();


            $.ajax({
                url: '/download-invoice',
                type: 'POST',
                data: {
                    sender_data   : senderFormData,
                    recipient_data: recipientFormData,
                    invoice_no    : inoviceNo,
                    invoice_date  : invoiceDate,
                    due_date      : dueDate,
                    name          : name,
                    quantity      : quantity,
                    unit_price    : unit_price,
                    tax           : tax,
                    sub_total     : sub_total,
                    '_token': '{{ csrf_token() }}',
                },
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response) {
                    var blobUrl = window.URL.createObjectURL(response);
                    var link = document.createElement('a');
                    link.href = blobUrl;
                    link.download = 'invoice.pdf';

                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    window.URL.revokeObjectURL(blobUrl);
                }
            });
        });

        $("#sender_save_button").click(function() {

            var companyName = $("#company_name").val();
            var companyTaxId = $("#company_tax_id").val();
            var address = $("#address").val();
            var phoneNumber = $("#phone_number_1").val();
            var email = $("#email").val();
            var websiteUrl = $("#website_url").val();
            var bankDetails = $("#bank_details").val();
            var isValid = true;
            $(".form-error").remove();

            if (companyName.trim() === '') {
                $("#company_name").after('<div class="form-error text-danger">Company / Sender name is required.</div>');
                isValid = false;
            }

            if (companyTaxId.trim() === '') {
                $("#company_tax_id").after('<div class="form-error text-danger">Company / Sender name is required.</div>');
                isValid = false;
            }

            if (address.trim() === '') {
                $("#address").after('<div class="form-error text-danger">Address is required.</div>');
                isValid = false;
            }

            if (phoneNumber.trim() === '') {
                $("#sender_phone_validation").text('Phone number is required.');
                isValid = false;
            }

            if (email.trim() === '') {
                $("#email").after('<div class="form-error text-danger">Email is required.</div>');
                isValid = false;
            }

            if (websiteUrl.trim() === '') {
                $("#website_url").after('<div class="form-error text-danger">Website URL is required.</div>');
                isValid = false;
            }

            if (bankDetails.trim() === '') {
                $("#bank_details").after('<div class="form-error text-danger">Bank Details is required.</div>');
                isValid = false;
            }

            if (isValid) {
            var senderContactDetails = companyTaxId + " | " + address + " | " + phoneNumber + " | " + email + " | " + websiteUrl + " | " + bankDetails;
            $('#senderModal').modal('hide');
            $("#sender_name").text(companyName);
            $("#sender_contact_details").text(senderContactDetails);

            }
        });

        $("#recipient_save_button").click(function() {

            var companyName = $(".company_name").val();
            var companyRegNumber = $("#company_reg_number").val();
            var vatNumber = $("#vat_number").val();
            var attentionTo = $("#attention_to").val();
            var address = $(".address").val();
            var phoneNumber = $("#phone_number").val();
            var email = $(".email").val();
            var contactPerson = $("#contact_person").val();
            var isValid = true;
            $(".form-error").remove();

            if (companyName.trim() === '') {
                $(".company_name").after('<div class="form-error text-danger">Company / recipient name is required.</div>');
                isValid = false;
            }

            if (companyRegNumber.trim() === '') {
                $("#company_reg_number").after('<div class="form-error text-danger">Company reg number is required.</div>');
                isValid = false;
            }

            if (vatNumber.trim() === '') {
                $("#vat_number").after('<div class="form-error text-danger">Vat is required.</div>');
                isValid = false;
            }

            if (attentionTo.trim() === '') {
                $("#attention_to").after('<div class="form-error text-danger">This field is required.</div>');
                isValid = false;
            }

            if (address.trim() === '') {
                $(".address").after('<div class="form-error text-danger">Address is required.</div>');
                isValid = false;
            }

            if (phoneNumber.trim() === '') {
                $("#phone_number_validation").text('Phone number is required.');
                isValid = false;
            }

            if (email.trim() === '') {
                $(".email").after('<div class="form-error text-danger">Email is required.</div>');
                isValid = false;
            }

            if (contactPerson.trim() === '') {
                $("#contact_person").after('<div class="form-error text-danger">Contact person is required.</div>');
                isValid = false;
            }



            if (isValid) {
                var recipientContactDetails = companyRegNumber + " | " + vatNumber + " | " + attentionTo + " | " + address + " | " + phoneNumber + " | " + email + " | " + contactPerson;

                $('#toRecipientModal').modal('hide');
                $("#recipient_name").text(companyName);
                $("#recipient_contact_details").text(recipientContactDetails);
            }
        });

        $(document).on('click', '#deleteIcon', function(event) {
            event.preventDefault();
            $('#deleteClient').submit();
        });



    });

</script>

@endsection
