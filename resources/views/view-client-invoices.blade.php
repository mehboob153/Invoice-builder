@extends('base')
@section('content')


    <div class="col-lg-10 clients-content">
        <div class="container" style="margin-left: 210px;">
            <div class="row ms-5">
                <div class="col-lg-12 pt-5">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-1 pe-0">
                                <img src="{{ asset('images/'. $client->logo .'') }}" class="card-img-top mt-5 ms-3"
                                     alt="..." style="width: 40px; height: 40px;">
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
                                    <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#clientModal"><i
                                            class="fa-solid fa-pencil me-2"></i>Edit</button>
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
                <table class="table">
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
                        <tr>
                            <td>0001</td>
                            <td>Mark</td>
                            <td>24/04/2024</td>
                            <td>24/04/2024</td>
                            <td>$1050</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
