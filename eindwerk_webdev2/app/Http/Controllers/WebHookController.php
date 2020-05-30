<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;

class WebHookController extends Controller
{
    public function handle (Request $r){
        if(!$r->has('id')){
            return;
        }

        $payment = Mollie::api()->payments()->get($r->id);

        if($payment->isPaid()){
            Log::info('payment is gelukt ');
        } else{
            Log::warning('Misluke betaling');
        }
    }
}
