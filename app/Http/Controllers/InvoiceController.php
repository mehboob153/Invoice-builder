<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\User;
use App\Models\UserInformations;
use App\Models\RecipientInformations;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;



class InvoiceController extends Controller
{

    public function invoiceDetails()
    {
        $user            = User::find(auth()->id());
        $userInformation = UserInformations::where('user_id', auth()->id())->first();
        $clients         = RecipientInformations::all();

        return view('home', ['clients' => $clients, 'userInformation' => $userInformation, 'user' => $user]);
    }
    public function storeInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'       => 'required',
            'invoice_date'  => 'required',
            'due_date'      => 'required',
            'description'    => 'required',
            'logo'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'senderName'   => 'required',
            'template'      => 'required',
            'invoice_item'  => 'required',
            'invoice_item_description'  => 'required',

        ]);

        $imageName = time() . '.' . $request->file('logo')->extension();
        $request->file('logo')->move(public_path('images'), $imageName);

        $invoice = new Invoice();
        $invoice->user_id               = $validatedData['user_id'];
        $invoice->invoice_date          = $validatedData['invoice_date'];
        $invoice->due_date              = $validatedData['due_date'];
//        $invoice->net_due               = $validatedData['logo'];
        $invoice->total_amount          = "123";
        $invoice->status                = "1";
        $invoice->invoice_description   = $validatedData['description'];
        $invoice->line_item             = $validatedData['invoice_item'];
        $invoice->line_item_description = $validatedData['invoice_item_description'];
        $invoice->hours_worked          = "1";
        $invoice->rate                  = "123";
        $invoice->logo                  = $imageName;
        $invoice->company_name          = $validatedData['senderName'];
        $invoice->template_id           = $validatedData['template'];

        $invoice->save();
    }

    public function storeInvoiceDetail(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required',
            'quantity'     => 'required',
            'unit_price'   => 'required',
            'tax'          => 'required',
            'description'  => 'required',
            'sub_total'    => 'required',
        ]);

        $invoice = new InvoiceDetail();
        $invoice->name            = $validatedData['name'];
        $invoice->invoice_id      = "2";
        $invoice->quantity        = $validatedData['quantity'];
        $invoice->rate            = $validatedData['unit_price'];
        $invoice->description     = $validatedData['description'];
        $invoice->tax_rate        = $validatedData['tax'];
        $invoice->discount        = "1";
        $invoice->service_or_good = "1";
        $invoice->subtotal        = $validatedData['sub_total'];

        $invoice->save();
    }

    public function downloadInvoice(Request $request)
    {
        $senderData    = $request->input('sender_data');
        $recipientData = $request->input('recipient_data');
        $invoice_no    = $request->input('invoice_no');
        $invoice_date  = $request->input('invoice_date');
        $due_date      = $request->input('due_date');
        $name          = $request->input('name');
        $unit_price    = $request->input('unit_price');
        $quantity      = $request->input('quantity');
        $tax           = $request->input('tax');
        $sub_total     = $request->input('sub_total');

        $senderArray = [];
        $recipientArray = [];

        parse_str(urldecode($senderData), $senderArray);
        parse_str(urldecode($recipientData), $recipientArray);


        $view = View::make('download-invoice', [
            'sender_data'    => $senderArray,
            'recipient_data' => $recipientArray,
            'invoice_no'     => $invoice_no,
            'invoice_date'   => $invoice_date,
            'due_date'       => $due_date,
            'name'           => $name,
            'unit_price'     => $unit_price,
            'quantity'       => $quantity,
            'tax'            => $tax,
            'sub_total'      => $sub_total,
        ]);

        $htmlContent = $view->render();

        var_dump($htmlContent);

        $pdf = new Dompdf();
        $pdf->loadHtml($htmlContent);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return response($pdf->output())->header('Content-Type', 'application/pdf');
    }


    public function duplicateInvoice($id)
    {
        $originalInvoice = Invoice::findOrFail($id);
        $newInvoice = $originalInvoice->replicate();
        $newInvoice->save();

        return response()->json(['success' => true, 'message' => 'Invoice duplicated successfully']);

    }

    public function deleteInvoice($id)
    {
        Invoice::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Invoice deleted successfully');
    }

    public function updateUserInfo(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $getUserId                       = $request->input('user_id');
        $userInformation                 = UserInformations::where('user_id', $getUserId)->first();
        $getUser                         = User::find($getUserId);

        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('images'), $imageName);
            $userInformation->logo = $imageName;
        } else {
            $userInformation->logo = null;
        }

        $getUser->first_name             = $request->input('name');
        $getUser->account_type           = $request->input('account_type');
        $getUser->email                  = $request->input('email');
        $userInformation->company_name   = $request->input('name');
        $userInformation->company_tax_id = $request->input('company_tax_id');
        $userInformation->address        = $request->input('address');
        $userInformation->website_url    = $request->input('website_url');
        $userInformation->bank_details   = $request->input('bank_details');
        $userInformation->phone_number   = $request->input('phone_number');
        $userInformation->country        = $request->input('country');
        $getUser->save();
        $userInformation->save();

        return redirect('/account-settings')->with('success', 'Data edited successfully');
    }

    public function deleteClient(Request $request, $id)
    {
        $previousUrl = url()->previous();
        $routeName = Route::getRoutes()->match(app('request')->create($previousUrl))->getName();

        RecipientInformations::findOrFail($id)->delete();

        if ($routeName === 'invoice-details') {
            return redirect()->route('invoice-details')->with('success', 'Data edited successfully.');
        } else {
            return redirect()->route('clients')->with('success', 'Data edited successfully.');
        }

    }

    public function editInvoiceDetails($id)
    {
        $getInvoice            = Invoice::find($id);
        $user                  = User::find($getInvoice->user_id);
        $userInformation       = UserInformations::where('user_id', $getInvoice->user_id)->first();
        $getInvoiceDetail      = InvoiceDetail::where('invoice_id', $id)->get();
        $clients               = RecipientInformations::find($getInvoice->recipient_id);
        return view('edit-invoices', ['user' => $user, 'userInformation'=> $userInformation, 'clients' => $clients, 'getInvoice' => $getInvoice, 'getInvoiceDetail' => $getInvoiceDetail]);
    }







}
