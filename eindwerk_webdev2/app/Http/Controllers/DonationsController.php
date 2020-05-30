<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;


class DonationsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getAllDonations(){
        $donations = Donation::orderby('amount', 'desc')->get();
        return view('admin.pages.donations', [
            'donations' => $donations
        ]);
    }

    public function getIndex() {
        $donations = Donation::where('visible', true)->orderby('amount', 'desc')->get();
        return view('pages.donations', [
            'donations' => $donations,
        ]);
    }

    public function postPreparePayment(Request $r)
    {

        $validationRules = [
            'email' => 'required|email',
            'name' => 'required',
            'amount' => 'required',
        ];
        if($r->visible == null)
        {
            $r->visible = 0;
        }

        $r->validate($validationRules);

        $payment = Mollie::api()->payments()->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $r->amount .'.00' // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => $r->message,
            "redirectUrl" => route('paymentSucces'),
            "webhookUrl" => 'https://dfb845b29066.ngrok.io/webhooks/mollie',
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);


        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'amount' => $r->amount,
            'message' => $r->message,
            'visible' => $r->visible,
        ];

        Donation::create($data);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }
}
