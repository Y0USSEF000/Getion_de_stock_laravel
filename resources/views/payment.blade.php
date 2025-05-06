<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Selected Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stockshopmaster.css') }}">
</head>
<body>
    <header>
        <h1>Selected Products for Payment</h1>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/products') }}">Products</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/payment') }}">Buy</a>
        </nav>
    </header>

    <main>
        <h2 class="section-title">Your Selected Products</h2>
        @if($selectedProducts->isEmpty())
            <p>No products selected for payment.</p>
        @else
            <div class="product-container">
                @foreach($selectedProducts as $selectedProduct)
                    <div class="product">
                        <h3>{{ $selectedProduct->product_name }}</h3>
                        <p><strong>Price:</strong> ${{ $selectedProduct->product_price }}</p>
                        <a href="{{ url('/remove-from-payment/' . $selectedProduct->id) }}" class="remove-button">Remove</a>
                    </div>
                @endforeach
            </div>
            <h2 class="section-title">Total Price</h2>
            <p><strong>Total:</strong> ${{ $selectedProducts->sum('product_price') }}</p>
        @endif
    </main>

    <footer>
        <p>© 2025 Your PFE Project. All rights reserved.</p>
        <div>
            <a href="{{ url('/privacy') }}">Privacy</a>
            <a href="{{ url('/contact') }}">Contact</a>
        </div>
    </footer>
</body>
</html>