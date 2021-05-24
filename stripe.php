<?php
require_once("include/init.php");
require_once("vendor/autoload.php");

$key = require_once('stripe-config.php');

Stripe\Stripe::setApiKey($key['key']);

Stripe\Customer::create(array(
    "description" => "client",
    "email" => "chendavyweb@gmail.com"
));

$charge = Stripe\Charge::create(array(
    "amount" => 6000,
    "currency" => "eur",
    "source" => $_POST['stripeToken'],
    "description" => "Client de dating-paris.one-website.com",
));

echo '<pre>'; print_r($charge->values()); echo '</pre>';

header("Location:" . URL . "/paiement");
?>