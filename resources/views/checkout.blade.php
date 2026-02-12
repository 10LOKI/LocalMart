<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Stripe Checkout</h1>
    <form action="{{ route('checkout.payment') }}" method="POST">
        @csrf
        <button type="submit">Pay $20</button>
    </form>
</body>
</html>
