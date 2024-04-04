<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container-fluid">
    <div class="row" style="background-color: #f6f5f9;">
        <div class="col-lg-2 aside-bar position-fixed">
            <nav class="navbar mt-5 ps-3">
                <div class="nav-item">
                    <a class="navbar-brand nav-link text-white" href="#">
                        <i class="fa-solid fa-credit-card fs-5 me-2"></i>International payments
                    </a>
                </div>
                <div class="nav-itempt-3">
                    <a class="navbar-brand nav-link  text-white" href="#">
                        <i class="fa-solid fa-envelope fs-5 me-2"></i> Contact us
                    </a>
                </div>
                <div class="nav-itempt-3 ps-3 signin-position">
                    <a class="navbar-brand nav-link text-white" href="#">
                        <i class="fa-solid fa-sign-in fs-5 me-2"></i>Login
                    </a>
                </div>
            </nav>
        </div>
        <div class="col-lg-10 mx-auto all-contenct">
            <div class="container">
                <div class="row" style="margin-left: 220px;">
                    <div class="col-lg-8 col-md-8 col-sm-4">
                        <select class="form-select mb-3 w-50 mt-4" aria-label="Large select example">
                            <option selected>Blank template</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div class="bg-white py-4 px-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group style-input">
                                        <input type="file" class="form-control" id="file" accept="image/*">
                                        <label for="file">
                                            <i class="fas fa-image fs-4 me-2"></i>
                                            Chose logo or drop it here
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
                                    <input type="text" class="form-control" id="formGroupExampleInput">
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
                                                <p class="mb-0" style="font-size: 16px; color: #272b30;">Sender name
                                                </p>
                                                <span style="font-size: 14px; color: #6a7178;">Sender contact
                                                        details</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn modal-button text-start w-100"
                                            data-bs-toggle="modal" data-bs-target="#toRecipientModal">To
                                        <div class="d-flex mt-3 align-items-center">
                                            <i class="fas fa-user fs-1 me-3"></i>
                                            <div>
                                                <p class="mb-0" style="font-size: 16px; color: #272b30;">Recipient
                                                    name</p>
                                                <span style="font-size: 14px; color: #6a7178;">Recipient contact
                                                        details</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <input type="text" class="form-control py-2" id="add_company_info">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <input type="text" class="form-control py-2" id="add_client_info">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <input type="text" placeholder="Invoice description" class="form-control py-2" id="add_description">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-4">
                                    <button type="button" class="btn btn-light py-3 w-100 mt-3"><i
                                            class="fas fa-plus"></i>
                                        </i>Add new invoice item</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table border">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Unit price</th>
                                            <th scope="col">Tax</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-group-divider" style="border:none;">
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text"
                                                       aria-label="readonly input example" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text"
                                                       aria-label="readonly input example" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text"
                                                       aria-label="readonly input example" readonly>
                                            </td>
                                            <td>
                                                <select class="form-select mx-3"
                                                        aria-label="Default select example">
                                                    <option selected>Non Tax</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                        <textarea placeholder="Description" class="form-control"
                                                                  id="exampleFormControlTextarea1" rows=""></textarea>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="float-end positions ">
                                        <i class="fas fa-check fs-5 text-primary me-2"></i>
                                        <i class="fas fa-trash-alt fs-5 text-primary me-5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex py-3 px-3" style="background-color: #dee2e6;">
                                            <label class="me-3 fw-bold" for=""
                                                   style="font-size: 14px; color: #4f575e;  ">Invoice summary</label>
                                            <select class="form-select" aria-label="Small select example">
                                                <option selected>USD</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row span-style">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class="me-5 pe-3">Subtotal</span>
                                        <span class="ms-5 ps-5 ">0.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row span-style">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class=" pe-3" style="margin-right: 80px;">Tax</span>
                                        <span class="ms-5 ps-5 ">0.00</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row span-style">
                                <div class="col-lg-12 pt-2">
                                    <div class="float-end">
                                        <span class="pe-3" style="margin-right: 70px;">Total</span>
                                        <span class="ms-5 ps-5 ">0.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="my-4">
                                <hr>
                            </div>
                            <div class="rew">
                                <div class="col-lg-12">
                                    <input type="email" class="form-control py-2" id="exampleFormControlInput1"
                                           placeholder="Invoice items">
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
                    <button type="button" class="btn btn-primary w-100"><i class="fas fa-trash-alt"></i>
                        </i>Delete invoice</button>
                    <button type="button" class="btn btn-primary w-100 mt-3"><i
                            class="fas fa-file file-icon"></i>
                        </i>Download PDF</button>
                    <button type="button" class="btn btn-primary w-100 mt-3"><i class="fas fa-save"></i>
                        </i>Save</button>
                </div>
            </div>

        </div>
    </div>
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
                <form action="">
                    <div class="row pt-4">
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
                                    <input type="text" class="form-control phone_number" id="phone_number_1" name="phone_number_1" placeholder="Enter phone number">
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
                <form action="">
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
                                <label for="phone_number_2">Phone number</label>
                                <div class="input-group">
                                    <select class="form-select country_code" aria-label="Default select example">
                                        <option selected disabled>Select Country</option>
                                    </select>
                                    <input type="text" class="form-control phone_number" id="phone_number_2" name="phone_number_2" placeholder="Enter phone number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-4 ">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

        $('#sender_save_button').click(function() {
            $.ajax({
                url: '{{ route("store_user_information") }}',
                type: 'POST',
                data: $('form').serialize(),
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while saving user information.');
                    console.error(xhr.responseText);
                }
            });
        });

        $('#recipient_save_button').click(function() {
            $.ajax({
                url: '{{ route("store_recipient") }}',
                type: 'POST',
                data: $('form').serialize(),
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while saving user information.');
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).ready(function() {
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
        });


    });

</script>
</body>

</html>
