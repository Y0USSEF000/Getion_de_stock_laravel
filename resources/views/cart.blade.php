<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Modern Shop</title>
    <style>
        :root {
            --primary: #00ff73;
            --primary-dark: #00cc5c;
            --primary-light: rgba(0, 255, 115, 0.1);
            --dark: #000000;
            --dark-light: #1a1a1a;
            --light: #f8f9fa;
            --gray: #2d2d2d;
            --gray-light: #e9ecef;
            --danger: #dc3545;
            --danger-dark: #bb2d3b;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--dark);
            color: white;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: white;
            text-align: center;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }
        
        .message {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }
        
        .success {
            background-color: var(--primary-light);
            color: var(--primary);
            border-left: 4px solid var(--primary);
        }
        
        .error {
            background-color: rgba(220, 53, 69, 0.2);
            color: var(--danger);
            border-left: 4px solid var(--danger);
        }
        
        .info {
            background-color: rgba(13, 110, 253, 0.2);
            color: #0d6efd;
            border-left: 4px solid #0d6efd;
        }
        
        .delivery-info {
            background-color: var(--dark-light);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            border: 1px solid var(--primary);
            display: none;
        }
        
        .delivery-info h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .delivery-info p {
            margin-bottom: 0.5rem;
        }
        
        .delivery-info .highlight {
            color: var(--primary);
            font-weight: bold;
        }
        
        .cart-summary {
            display: flex;
            justify-content: space-between;
            background: var(--dark-light);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            font-weight: 600;
            color: white;
            border: 1px solid var(--gray);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            background: var(--dark-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray);
        }
        
        thead {
            background-color: var(--primary);
            color: var(--dark);
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--gray);
        }
        
        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }
        
        tr {
            transition: var(--transition);
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        tr:hover {
            background-color: var(--primary-light);
        }
        
        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid var(--gray);
            transition: var(--transition);
        }
        
        img:hover {
            transform: scale(1.05);
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .quantity-btn {
            background: var(--primary);
            color: var(--dark);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }
        
        .quantity-btn:hover {
            background: var(--primary-dark);
            transform: scale(1.1);
        }
        
        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            border: 1px solid var(--gray);
            border-radius: 4px;
            font-weight: 600;
            background: var(--dark-light);
            color: white;
        }
        
        .quantity-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 255, 115, 0.25);
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-remove {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-remove:hover {
            background-color: var(--danger-dark);
            transform: translateY(-2px);
        }
        
        .btn-checkout {
            background-color: var(--primary);
            color: var(--dark);
            padding: 0.8rem 2rem;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-right: 1rem;
        }
        
        .btn-checkout:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .btn-buy {
            background-color: var(--dark);
            color: var(--primary);
            padding: 0.8rem 2rem;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid var(--primary);
        }
        
        .btn-buy:hover {
            background-color: var(--primary);
            color: var(--dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 255, 115, 0.3);
        }
        
        .btn-action {
            background-color: transparent;
            color: var(--primary);
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            border: 2px solid var(--primary);
            margin: 0 0.5rem;
        }
        
        .btn-action:hover {
            background-color: var(--primary);
            color: var(--dark);
        }
        
        .checkout-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        
        .auth-prompt {
            background: var(--dark-light);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
            text-align: center;
            color: white;
            border: 1px solid var(--gray);
        }
        
        .auth-prompt a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .auth-prompt a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .action-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .empty-cart {
            text-align: center;
            background: var(--dark-light);
            padding: 3rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray);
        }
        
        .empty-cart p {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: white;
        }
        
        .empty-cart a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
            padding: 0.5rem 1rem;
            border: 2px solid var(--primary);
            border-radius: 4px;
        }
        
        .empty-cart a:hover {
            background: var(--primary);
            color: var(--dark);
            transform: translateY(-2px);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
            
            .cart-summary {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            th, td {
                padding: 0.75rem 0.5rem;
                font-size: 0.9rem;
            }
            
            img {
                width: 60px;
                height: 60px;
            }
            
            .checkout-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn-checkout, .btn-buy {
                width: 100%;
                margin-right: 0;
            }
            
            .action-links {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn-action {
                width: 100%;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Shopping Cart</h1>

        @if(session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif
        <div id="deliveryMessage" class="message info" style="display: none;">
            Your order will be delivered within 15 days. Thank you for your purchase!
        </div>

        @if($cartItems->count() > 0)
            <div class="cart-summary">
                <p>Total Items: {{ $cartItems->sum('quantity') }}</p>
                <p>Total Price: {{ number_format($cartItems->sum(function($item) { 
                    return $item['quantity'] * $item['price']; 
                }), 2) }} MAD</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <img src="{{ isset($item['img']) ? asset('storage/' . $item['img']) : asset('images/placeholder.jpg') }}" 
                                     alt="{{ $item['name'] }}">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price'], 2) }} MAD</td>
                            <td>
                                <form method="POST" action="{{ route('cart.update', $item['product_id']) }}" class="quantity-controls">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="quantity-btn" onclick="this.parentNode.querySelector('input').stepDown()">-</button>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                           class="quantity-input" onchange="this.form.submit()">
                                    <button type="button" class="quantity-btn" onclick="this.parentNode.querySelector('input').stepUp()">+</button>
                                </form>
                            </td>
                            <td>{{ number_format($item['quantity'] * $item['price'], 2) }} MAD</td>
                            <td>
                                <form method="POST" action="{{ route('cart.destroy', $item['product_id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-remove" type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div id="deliveryInfo" class="delivery-info">
                <h3>Order Summary</h3>
                <p>Total Price: <span class="highlight">{{ number_format($cartItems->sum(function($item) { 
                    return $item['quantity'] * $item['price']; 
                }), 2) }} MAD</span></p>
                <p>Estimated Delivery Date: <span class="highlight" id="deliveryDate"></span></p>
                <p>Please register to complete your purchase.</p>
            </div>

            <div class="checkout-actions">
                @auth
                    <a href="{{ route('checkout') }}" class="btn btn-checkout">Proceed to Checkout</a>
                    <button id="buyNowBtn" class="btn btn-buy">Buy Now</button>
                @else
                    <div class="auth-prompt">
                        <div class="action-links">
                            <a href="{{ route('stockshopmaster') }}" class="btn btn-action">Buy more</a>
                            <button id="showDeliveryBtn" class="btn btn-action">Buy Now</button>
                        </div>
                    </div>
                @endauth
            </div>
        @else
            <div class="empty-cart">
                <p>Your cart is empty.</p>
                <a href="{{ route('stockshopmaster') }}">Continue Shopping</a>
            </div>
        @endif
    </div>

    <script>
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                if (this.value < 1) this.value = 1;
                this.form.submit();
            });
        });

        document.getElementById('buyNowBtn')?.addEventListener('click', function() {
            // Show delivery message
            const deliveryMessage = document.getElementById('deliveryMessage');
            deliveryMessage.style.display = 'block';
            
            // Scroll to the message
            deliveryMessage.scrollIntoView({ behavior: 'smooth' });
            
            // Calculate delivery date (15 days from now)
            const deliveryDate = new Date();
            deliveryDate.setDate(deliveryDate.getDate() + 15);
            
            // Format the date
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = deliveryDate.toLocaleDateString('en-US', options);
            
            // Update message with specific date
            deliveryMessage.textContent = `Your order will be delivered by ${formattedDate}. Thank you for your purchase!`;
        });

        document.getElementById('showDeliveryBtn')?.addEventListener('click', function() {
            // Show delivery info
            const deliveryInfo = document.getElementById('deliveryInfo');
            deliveryInfo.style.display = 'block';
            
            // Calculate and display delivery date
            const deliveryDate = new Date();
            deliveryDate.setDate(deliveryDate.getDate() + 15);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = deliveryDate.toLocaleDateString('en-US', options);
            document.getElementById('deliveryDate').textContent = formattedDate;
            
            // Scroll to the delivery info
            deliveryInfo.scrollIntoView({ behavior: 'smooth' });
        });
    </script>
</body>
</html>