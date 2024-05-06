@extends('base')
@section('content')

    <form id="clientInfo" method="POST" action="{{ route('update_client', $client->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-10 ms-lg-5 ms-0 clients-content">
            <div class="container ml-220">
                <div class="row">
                    <div class="col-lg-8 pt-5 ms-5">
                        <h1>Edit Client</h1>
                    </div>
                </div>

                <div class="bg-white shadow pb-4 px-5 mx-lg-5 mx-0" style="">

                    <div class="mx-5 mb-4">
                        <div class="row">
                            <div class="col-lg-6 mt-5">

                                <label class="d-flex pb-2">Client Logo</label>
                                @if($client->logo)
                                    <div class="input-group style-input d-block" id="logo-container" style="justify-content: space-between;">
                                        <img id="logo-preview" src="{{ asset('images/'. $client->logo) }}" alt="Selected Logo" style="width: 120px; height: 120px;border-radius:0%;">
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
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Company name</label>
                                    <input class="form-control company_name" id="company_name" name="company_name" type="text" value="{{$client->company_name}}"/>
                                </div>
                                @error('company_name')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Email address</label>
                                    <input class="form-control email" id="email" type="email" name="email" value="{{$client->email}}"/>
                                </div>
                                @error('email')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Address</label>
                                    <input class="form-control address" id="address" type="text" name="address" value="{{$client->address}}"/>
                                </div>
                                @error('address')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="pb-2">Phone number</label>
                                    <div class="input-group">
                                        <select class="form-select country_code" aria-label="Default select example" name="country" >
                                            <option value="" disabled>Select Country</option>
                                        </select>
                                        <input type="text" class="form-control phone_number" id="phone_number_1" name="phone_number" placeholder="Enter phone number" value="{{ $client->phone_number ?? ''}}">
                                    </div>
                                </div>
                                @error('phone_number')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">VAT Number</label>
                                    <input class="form-control" id="vat_number" type="text" name="vat_number" value="{{$client->vat_number}}"/>
                                </div>
                                @error('vat_number')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Attention to</label>
                                    <input class="form-control" id="attention_to" type="text" name="attention_to" value="{{$client->attention_to}}"/>
                                </div>
                                @error('attention_to')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 pt-4">
                                <div class="form-group">
                                    <label class="">Company reg number</label>
                                    <input class="form-control" id="company_reg_number" type="text" name="company_reg_number" value="{{$client->company_reg_number}}"/>
                                </div>
                                @error('company_reg_number')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-4">
                                <label for="exampleFormControlInput1" class="form-label">Contact person
                                </label>
                                <input class="form-control" id="contact_person" type="text" name="contact_person" value="{{$client->contact_person}}"/>
                                @error('contact_person')
                                <div class="alert-danger" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <br>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    });

</script>

@endsection

