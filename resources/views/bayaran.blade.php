<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
</head>
<body>
    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ config('services.stripe.key') }}"
            data-amount="500" <!-- The amount should be set dynamically based on your requirements -->
            data-name="Payment"
            data-description="Payment description"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="usd">
        </script>
    </form>
</body>
</html>
