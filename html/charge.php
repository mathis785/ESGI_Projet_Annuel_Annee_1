<?php

session_start();


  require_once('vendor/autoload.php');
  require_once('includes/db_paiement.php');
  require_once('pdo_db.php');
  require_once('Customer.php');
  require_once('Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_51Ksl5GBt6bsniN8gI9LGM0ur0ImNcXowuIkydLp7Y9sUFVl96S5WVUlsRUsY306tjWCGr38zQnOcwfpnPuIhme3v0052Jp52sC');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


 $first_name = $POST['usersFName'];
 $last_name = $POST['usersLName'];
 $email = $POST['usersEmail'];
 $password = $POST['usersPwd'];
 $token = $POST['stripeToken'];





// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "en ligne",
  "customer" => $customer->id
));


try {
    $bdd = new PDO('mysql:host=164.132.55.186;port=3306;dbname=EWHOLE; charset=utf8', 'Admin', 'MDP.De.Qualite', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$res = 0;
$q = $bdd->query('SELECT usersId FROM users WHERE usersEmail ="' . $POST['usersEmail'] . '"');
$res = $q->fetch(PDO::FETCH_ASSOC);

$usersId = $res['usersId'];





// Customer Data
$customerData = [
  'usersId' => $usersId,
  'usersFName' => $first_name,
  'usersLName' => $last_name,
  'usersEmail' => $email,
  'usersPwd' => $password,
];

// Instantiate Customer
$customer = new Customer();




// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $usersId,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);