<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Return all payment records as JSON.
     *
     * @return \Illuminate\Http\Response
     */
    public function json()
    {
        $payments = Payment::all();
        $response = array('data' => $payments);


        return response()->json($response);
    }
}
