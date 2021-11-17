<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use MercadoPago\Payment;
use MercadoPago\SDK as MercadoPago;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\Item;

use vendor\autoload;

class PaymentController extends Controller
{
  public function __construct()
  {
    MercadoPago::setClientId(config('services.mercadopago.client_id'));
    MercadoPago::setClientSecret(config('services.mercadopago.client_secret'));
    MercadoPago::setAccessToken(config('services.mercadopago.token'));
  }
  public function process_payment(Request $request)
  {

    MercadoPago::setAccessToken(config('services.mercadopago.token'));

    // $payment->transaction_amount = $request->transactionAmount;
    // $payment->token = $request->token;
    // $payment->description = $request->description;
    // $payment->installments = $request->installments;
    // $payment->payment_method_id = $request->paymentMethodId;
    // $payment->issuer_id = $request->issuer;

    $payment = new Payment();
    $payment->transaction_amount = 1000;
    $payment->token = $request->token;
    $payment->description = $request->description;
    $payment->installments = (int)$request->installments;
    $payment->payment_method_id = $request->paymentMethodId;
    $payment->issuer_id = (int)$request->issuer;

    $payer = new Payer();
    $payer->email = $request->email;
    $payer->identification = array(
      "type" => $request->docType,
      "number" => $request->docNumber
    );
    $payment->payer = $payer;

    $payment->save();

    $response = array(
      'status' => $payment->status,
      'status_detail' => $payment->status_detail,
      'id' => $payment->id
    );
    // echo json_encode($response);
    // echo json_encode("hola");
    return $request;
  }



  // no olvidar crear las rutas   
  public function success(Request $request)
  {
    return 'success';
  }
  public function failure(Request $request)
  {
    return 'failure';
  }
  public function pending(Request $request)
  {
    return 'pending';
  }
}
