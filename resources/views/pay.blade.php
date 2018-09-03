<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://js.stripe.com/v3/"></script>
    <style type="text/css">
.asda{

}
    </style>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post" id="payment-form">
    <div class="container">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-12">
            <label for="card-element22">
                Credit or debit card
            </label>
        </div>
        <div class="col-12">
            <div id="stripe_id">
                <div id="card-element" class="row justify-content-center">
                </div>
            </div>
        </div>
            <div id="card-errors" role="alert"></div>
        </div>
        <button>Submit Payment</button>
    </div>
</form>

<script type="text/javascript">
        var stripe = Stripe("{{ env('STRIPE_PUB_KEY') }}");
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        var style = {
          base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: "#32325d",
          }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
        }
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();

          stripe.createToken(card).then(function(result) {
            if (result.error) {
              // Inform the customer that there was an error.
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
            } else {
              // Send the token to your server.
              stripeTokenHandler(result.token);
            }
          });
        });
    });


</script>
<script type="text/javascript">

</script>

</body>
</html>