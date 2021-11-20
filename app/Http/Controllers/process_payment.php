
<?php
require base_path('/vendor/autoload.php');

MercadoPago\SDK::setAccessToken("TEST-2023366079313931-111503-2c63a5126f825b511e8754d309b2dadc-1019298670");

$payment = new MercadoPago\Payment();
$payment->transaction_amount = (float)$_POST['transactionAmount'];
$payment->token = $_POST['token'];
$payment->description = $_POST['description'];
$payment->installments = (int)$_POST['installments'];
$payment->payment_method_id = $_POST['paymentMethodId'];
$payment->issuer_id = (int)$_POST['issuer'];

$payer = new MercadoPago\Payer();
$payer->email = $_POST['email'];
$payer->identification = array(
    "type" => $_POST['docType'],
    "number" => $_POST['docNumber']
);
$payment->payer = $payer;

$payment->save();

$response = array(
    'status' => $payment->status,
    'status_detail' => $payment->status_detail,
    'id' => $payment->id
);
echo json_encode($response);

?>
