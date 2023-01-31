
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style_paiement.css">

  <title>Page de paiement</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">Insérez vos informations bancaires</h2>
    <form action="./charge.php" method="post" id="payment-form">
      <div class="form-row">
       <input type="text" name="usersFName" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
       <input type="text" name="usersLName" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
       <input type="email" name="usersEmail" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
       <input type="password" name="usersPwd" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="password">

        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Procéder au paiement</button>
    </form>
  </div>

  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>