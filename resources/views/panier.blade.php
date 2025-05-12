<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/stockshopmaster.css">
    <style>
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .cart-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .cart-items {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr 150px 120px 100px;
            align-items: center;
            gap: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        
        .cart-item img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }
        
        .cart-item-info h3 {
            margin: 0;
            font-size: 1.2rem;
        }
        
        .cart-item-price {
            font-weight: bold;
            color: #00ff73;
        }
        
        .cart-item-quantity input {
            width: 60px;
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .cart-item-remove {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .cart-item-remove:hover {
            background-color: #cc0000;
        }
        
        .cart-summary {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: right;
        }
        
        .cart-total {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00ff73;
        }
        
        .checkout-btn {
            background-color: #00ff73;
            color: #111;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s;
        }
        
        .checkout-btn:hover {
            background-color: #00cc5c;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px;
            font-size: 1.2rem;
        }
        
        .continue-shopping {
            display: inline-block;
            margin-top: 20px;
            color: #00ff73;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Your Shopping Cart</h1>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('stockshopmaster') }}">Products</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/page1') }}">Last page</a>
            <a href="{{ url('/panier') }}" class="cart-icon" title="Voir le panier">🛒</a>
        </nav>
    </header>

    <main class="cart-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->count() > 0)
            <div class="cart-items">
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <img src="{{ asset('storage/' . $item->product->product_img) }}" alt="{{ $item->product->product_name }}">
                        
                        <div class="cart-item-info">
                            <h3>{{ $item->product->product_name }}</h3>
                            <p>{{ $item->product->product_description }}</p>
                        </div>
                        
                        <div class="cart-item-price">
                            MAD {{ number_format($item->product->product_price, 2) }}
                        </div>
                           
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="cart-item-remove">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>
            
            <div class="cart-summary">
                <h3>Cart Summary</h3>
                <p>Total Items: {{ $cartItems->sum('quantity') }}</p>
                <p class="cart-total">
                    Total Price: MAD {{ number_format($cartItems->sum(function($item) {
                        return $item->quantity * $item->product->product_price;
                    }), 2) }}
                </p>
                <button class="checkout-btn">Proceed to Checkout</button>
            </div>
        @else
            <div class="empty-cart">
                <p>Your cart is empty</p>
                <a href="{{ route('stockshopmaster') }}" class="continue-shopping">Continue Shopping</a>
            </div>
        @endif
    </main>

    <footer>
        <p>© {{ date('Y') }} Stock Products. All rights reserved.</p>
    </footer>

    <script>
        // Auto-submit quantity update when changed
        document.querySelectorAll('.cart-item-quantity input').forEach(input => {
            input.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
    </script>
</body>
</html>