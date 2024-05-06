@extends('base')
@section('content')

        <div class="col-lg-10 col-12 ms-lg-5 ms-0">
            <div class="container ml-220">
                <div class="row mx-5">
                    <div class=" pt-5 d-flex align-items-center">
                        <h1 class="d-inline ">Recent invoices</h1>
                        <a href="/invoice-builder/invoice-details" type="button" class="btn btn-primary ms-3"> <i class="fas fa-plus"></i>
                            </i>New</a>
                    </div>
                </div>
                <div class="row mx-5">
                    @if ($invoices->isEmpty())
                    <div class="text-center pt-5">
                        <h6>Nothing to see here yet. Click 'New' above to get started! </h6>
                    </div>
                    @else
                    @foreach($invoices->take(4) as $invoice)
                    <div class="col-lg-3 pt-3 invoice-div" data-invoice-id="{{ $invoice->id }}" style="cursor:pointer;">
                        <div class="card w-100">
                            <img src="{{ asset('images/'. $invoice->logo .'') }}" class="card-img-top mt-3 ms-3" alt="..."
                                 style="width: 40px; height: 40px;">
                            <div class="card-body">
                                <h5 class="card-title text-center">Total</h5>
                                <h2 class="text-center">${{ $invoice->total_amount }}</h2>
                                <span class="card-text">Invoice: {{ $invoice->id }}</span>
                                <p class="card-text">Issue Date: {{ $invoice->invoice_date }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="pt-3 mx-5">
                    <hr>
                </div>
                <div class="row mx-5">
                    <h1>All invoices</h1>
                </div>
                <div class="row ms-5">
                    <div class="col-lg-2 d-flex align-items-center p-0">
                        <!-- <i class="fa fa-search "></i> -->
                        <input type="Search" id="inputSearch" class="form-control filter-inputs" placeholder="Search">
                    </div>
                    <div class="col-lg-2">
                        <input type="date" id="inputStartDate" class="form-control filter-inputs" placeholder="Start Issue Date">
                    </div>
                    <div class="col-lg-2">
                        <input type="Date" id="inputEndData" class="form-control filter-inputs" placeholder="End Issue Date">
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-light text-primary border-primary filter-inputs">
                            <i class="fa fa-undo me-2"></i>Reset
                        </button>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-2 ps-">
                        <button type="button" class="btn btn-light text-primary border-primary" id="btnShowFilters">
                            <i class="fa fa-filter me-2"></i>Show Filters
                        </button>
                    </div>
                </div>
                <div class="row mx-5 mt-4">
                    <table class="table invoice-table">
                        <thead class="border border-1">
                        <tr class="">
                            <th scope="col">Invoice No# <i class="fas ms-1 fa-sort sortable-icon"></i>
                            </th>
                            <th scope="col">Invoice Type <i class="fas ms-1 fa-sort sortable-icon"></i>
                            </th>
                            <th scope="col">Client <i class="fas ms-1 fa-sort sortable-icon"></i>
                            </th>
                            <th scope="col">Issue Date <i class="fas ms-1 fa-sort sortable-icon"></i>
                            </th>
                            <th scope="col">Due Date <i class="fas ms-1 fa-sort sortable-icon"></i>
                            </th>
                            <th scope="col">Total Value <i class="fas ms-1 fa-sort sortable-icon"></i>
                            </th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $index => $invoice)
                            <tr class="invoice-row" data-client="{{$invoice->id}}">
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $invoice->invoice_type }}</td>
                            <td>Otto</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->due_date }}</td>
                            <td>${{ $invoice->total_amount }}</td>
                            <td class="">
                                <a href="#">
                                    <i class="fa-solid fa-file-pdf me-2"></i>
                                </a>
                                <form id="deleteForm" action="{{ route('delete_invoice', $invoice->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" id="deleteLink">
                                        <i id="deleteIcon" class="fa-solid fa-trash me-2"></i>
                                    </a>
                                </form>
                                <a href="#" class="clone-invoice" data-invoice-id="{{ $invoice->id }}">
                                    <i class="fa-regular fa-clone"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

$(document).ready(function() {
    $(".filter-inputs").hide();

    $("#btnShowFilters").click(function() {
        $(".filter-inputs").toggle();
    });

    $("#btnReset").click(function() {
        $("#inputSearch").val('');
        $("#inputStartDate").val('');
        $("#inputEndData").val('');
    });

    $(document).on('click', '#deleteIcon', function(event) {
        event.preventDefault();
        $('#deleteForm').submit();
    });

    $('.clone-invoice').click(function(e) {
        e.preventDefault();
        var invoiceId = $(this).data('invoice-id');

        $.ajax({
            url: '/duplicate-invoice/' + invoiceId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    function filterData() {
        var searchData = $('#inputSearch').val().toLowerCase();

        $('.data-row').each(function() {
            var row = $(this);
            var rowSearch = row.find('.search-data').text().toLowerCase();

            if (rowSearch.includes(searchData)) {
                row.show();
            } else {
                row.hide();
            }
        });
    }

    $('.filter-inputs').on('input', function() {
        filterData();
    });

    $('#resetFilters').click(function() {
        $('.filter-inputs').val('');
        filterData();
    });

    $('.invoice-div').click(function() {
        var invoiceId = $(this).data('invoiceId');
        window.location.href = '/invoice-builder/invoice-details/' + invoiceId;
    });

    if ($('.invoice-row').length > 0) {
    $('.invoice-row').click(function(event) {
        if (!$(event.target).closest('.no-click').length) {
            var clientId = $(this).data('client');
            var url      = '{{ route('edit-invoice-details', ':clientId') }}'.replace(':clientId', clientId);
            window.location = url;
        }
    });
    }


});

</script>
@endsection
