<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserInformations;
use App\Models\RecipientInformations;
use App\Models\Invoice;
use App\Models\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function accountSettings()
    {
        $user = User::find(auth()->id());
        $userInformation = UserInformations::where('user_id', auth()->id())->first();
        return view('account-settings', compact('user', 'userInformation'));
    }

    public function invoices()
    {
        $invoices = Invoice::all();
        return view('invoices', ['invoices' => $invoices]);
    }

    public function clients()
    {
        $clients = RecipientInformations::all();
        return view('clients', ['clients' => $clients]);
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
        $user = Auth::user();
        $validatedData = $request->validate([
            'company_name'           => 'required',
            'company_reg_number'     => 'required',
            'vat_number'             => 'required',
            'attention_to'           => 'required',
            'address'                => 'required',
            'phone_number'           => 'required',
            'contact_person'         => 'required',
            'email'                  => 'required|email',
            'logo'                   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $imageName = time() . '.' . $request->file('logo')->extension();
        $request->file('logo')->move(public_path('images'), $imageName);

        $client                     = new RecipientInformations();
        $client->user_id            = $user->id;
        $client->company_name       = $validatedData['company_name'];
        $client->company_reg_number = $validatedData['company_reg_number'];
        $client->vat_number         = $validatedData['vat_number'];
        $client->attention_to       = $validatedData['attention_to'];
        $client->address            = $validatedData['address'];
        $client->phone_number       = $validatedData['phone_number'];
        $client->contact_person     = $validatedData['contact_person'];
        $client->email              = $validatedData['email'];
        $client->logo               = $imageName;
        $client->country            = "pakistan";

        $client->save();

        return redirect('/invoice-builder/clients')->with('success', 'Data edited successfully.');
    }

    public function viewClientInvoices($id)
    {
        $client = RecipientInformations::find($id);
        return view('view-client-invoices', ['client' => $client]);
    }


}
