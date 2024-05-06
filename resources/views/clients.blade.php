@extends('base')
@section('content')

    <div class="col-lg-10 clients-content ms-lg-5 ms-0">
        <div class="container ml-220">
            <div class="row ms-5">
                <div class="col-lg-6 pt-5">
                    <h1>Clients</h1>
                </div>
                <div class="col-lg-6 pt-5">
                    <div class="d-flex justify-content-end">
                        <input type="text" id="" class="form-control w-50" placeholder="Search">
                        <a href="/invoice-builder/add-client" type="button" class="btn btn-primary ms-3">
                            <i class="fa fa-plus me-1"></i>Add Client
                        </a>
                    </div>
                </div>
            </div>
            <br>

            <div class="row ms-5">
                @if ($clients->isEmpty())
                    <div class="text-center pt-5">
                        <h6>Nothing to see here yet. Click 'Add Client' above to get started! </h6>
                    </div>
                @else
                @foreach($clients as $client)
                <div class="col-lg-4 client-div"  data-client-id="{{ $client->id }}">
                    <div class="card mb-3" style="max-width: 540px;cursor:pointer;">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset('images/'. $client->logo .'') }}" class="card-img-top mt-5 ms-3"
                                     alt="..." style="width: 40px; height: 40px;">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $client->company_name }}</h2>
                                    <div class="d-flex  align-items-baseline">
                                        <h6>Company Name:</h6> <span>{{ $client->company_name }}</span>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <h6>Email:</h6><span>{{ $client->email }}</span>
                                    </div>
                                    <div class="d-flex  align-items-baseline">
                                        <h6>Country:</h6> <span>{{ $client->phone_number }}</span>
                                    </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('.client-div').click(function() {
            var clientId = $(this).data('clientId');
            window.location.href = '/view-client-invoices/' + clientId;
        });
    });
</script>

@endsection
