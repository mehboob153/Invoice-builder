<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInformations;
use App\Models\RecipientInformations;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function invoiceDetails()
    {
        return view('home');
    }

    public function accountSettings()
    {
        return view('account-settings');
    }

    public function invoices()
    {
        return view('invoices');
    }

    public function clients()
    {
        return view('clients');
    }

    public function addClient()
    {
        return view('add-client');
    }


    public function storeUserInfo(Request $request)
    {
        $validatedData = $request->validate([
            'company_name'   => 'required',
            'company_tax_id' => 'required',
            'address'        => 'required',
            'phone_number'   => 'required',
            'email'          => 'required|email',
            'bank_details'   => 'required',
            'website_url'    => 'required',
            'user_id'        => 'required',
        ]);

        $userInformation = UserInformations::create($validatedData);

        return response()->json(['success' => true, 'message' => 'User information stored successfully.']);
    }

    public function storeRecipient(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_reg_number'     => 'required',
            'vat_number'             => 'required',
            'attention_to'           => 'required',
            'address'      => 'required',
            'phone_number' => 'required',
            'contact_person'         => 'required',
            'email'          => 'required|email',

        ]);

        $recipient = RecipientInformations::create($validatedData);

        return response()->json(['success' => true, 'message' => 'User information stored successfully.']);
    }

}
