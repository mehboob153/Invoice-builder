@extends('base')
@section('content')


    <div class="col-lg-10 clients-content ms-lg-5 ms-0">

        <div class="container ml-220">
            <div class="row ms-5">
                <div class="col-lg-12 pt-5">
                    @if(session('success'))
                        <h1 class="success-message">{{session('success')}}</h1>
                    @endif
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-1 pe-0">
                                @if($client->logo)
                                    <img src="{{ asset('images/'. $client->logo .'') }}" class="card-img-top mt-5 ms-3"
                                         alt="..." style="width: 40px; height: 40px;">
                                @else
                                    <img src="{{ asset('images/1713199857.jpg') }}" class="card-img-top mt-5 ms-3"
                                         alt="..." style="width: 40px; height: 40px;">
                                @endif
                            </div>
                            <div class="col-md-8 ps-0">
                                <div class="card-body ps-0">
                                    <h2 class="card-title">{{ $client->company_name }}</h2>
                                    <div class="d-flex  align-items-baseline">
                                        <h6>Company Name:</h6> <span>{{ $client->company_name }}</span>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <h6>email:</h6><span>{{ $client->email }}</span>
                                    </div>
                                    <div class="d-flex  align-items-baseline">
                                        <h6>Country:</h6> <span>{{ $client->phone_number }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-5 text-end">
                                    <a href="/edit-client/{{$client->id}}" type="button" class="btn btn-primary ms-3"> <i class="fas fa-edit"></i>
                                        </i>Edit</a>
                                    <form id="deleteForm" action="{{ route('delete_client', ['id' => $client->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-3">
                                            <i class="fa-solid fa-trash-can me-2"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ms-5 pt-5">
                <div class="col-lg-6">
                    <h1>Invoices</h1>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="/invoice-builder/invoice-details"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>New</button></a>
                </div>
            </div>
            <div class="row ms-5 mt-4 px-3">
                <table class="table invoice-table">
                    <thead class="border border-1">
                    <tr class="">
                        <th scope="col">Invoice No# <i class="fas ms-1 fa-sort sortable-icon"></i>
                        </th>
                        <th scope="col">Invoice Type <i class="fas ms-1 fa-sort sortable-icon"></i>
                        </th>
                        <th scope="col">Issue Date <i class="fas ms-1 fa-sort sortable-icon"></i>
                        </th>
                        <th scope="col">Due Date <i class="fas ms-1 fa-sort sortable-icon"></i>
                        </th>
                        <th scope="col">Total Value <i class="fas ms-1 fa-sort sortable-icon"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $index => $invoice)
                        <tr class="invoice-row" data-client="{{$invoice->id}}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $invoice->invoice_type }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->due_date }}</td>
                            <td>{{ $invoice->currency }}{{ $invoice->total_amount }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        if ($('.invoice-row').length > 0) {
            $('.invoice-row').click(function(event) {
                if (!$(event.target).closest('.no-click').length) {
                    var clientId = $(this).data('client');
                    var url      = '{{ route('edit-invoice-details', ':clientId') }}'.replace(':clientId', clientId);
                    window.location = url;
                }
            });
        }

        setTimeout(function() {
            $(".success-message").fadeOut();
        }, 3000);

    });
</script>

@endsection
