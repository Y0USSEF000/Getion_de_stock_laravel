<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Products</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #111, #1a1a1a);
            color: #00ff73;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            transition: margin-left 0.3s ease;
        }

        body.sidebar-open {
            margin-left: 250px;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(51, 51, 51, 0.9);
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 255, 115, 0.3);
        }

        header h1 {
            font-size: 1.5em;
            color: #00e565;
            margin: 0;
        }

        header nav {
            display: flex;
            gap: 20px;
        }

        header nav a {
            color: #00ff73;
            text-decoration: none;
            font-size: 1em;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 5px;
        }

        header nav a:hover {
            color: #111;
            background-color: #00ff73;
            transform: translateY(-2px);
        }

        main {
            flex: 1;
            padding: 80px 20px 120px;
            transition: margin-left 0.3s ease;
        }

        .section-title {
            font-size: 1.8em;
            color: #00e565;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 0 0 5px rgba(0, 255, 115, 0.5);
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #00ff73, transparent);
            border-radius: 3px;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100vh;
            background: rgba(34, 34, 34, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1100;
            transition: left 0.3s ease;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            padding-top: 70px;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-title {
            color: #00ff73;
            padding: 20px;
            font-size: 1.2em;
            border-bottom: 1px solid #444;
            margin-bottom: 10px;
        }

        .sidebar-categories {
            display: flex;
            flex-direction: column;
            padding: 0 20px;
        }

        .sidebar-category {
            color: #00ff73;
            padding: 12px 15px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-category:hover {
            background: rgba(0, 255, 115, 0.2);
            transform: translateX(5px);
        }

        .sidebar-category.active {
            background: #00ff73;
            color: #111;
            font-weight: 600;
        }

        .sidebar-category i {
            width: 20px;
            text-align: center;
        }

        .hamburger {
            position: fixed;
            top: 70px;
            right: 20px;
            font-size: 28px;
            color: #00ff73;
            cursor: pointer;
            z-index: 1200;
            transition: all 0.3s ease;
            background: rgba(34, 34, 34, 0.8);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 2px solid #00ff73;
        }

        .hamburger:hover {
            transform: scale(1.1) rotate(90deg);
            background: #00ff73;
            color: #111;
        }

        .hamburger.open {
            transform: rotate(90deg);
            left: 220px;
            right: auto;
        }

        .hamburger.open:hover {
            transform: rotate(0deg) scale(1.1);
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            width: 100%;
            padding: 20px;
        }

        .product {
            background: #222;
            border: 2px solid #00ff73;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .product::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                transparent,
                rgba(0, 255, 115, 0.1),
                transparent
            );
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .product:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 255, 115, 0.3);
        }

        .product:hover::before {
            opacity: 1;
            animation: shine 1.5s;
        }

        @keyframes shine {
            0% {
                left: -50%;
            }
            100% {
                left: 150%;
            }
        }

        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .product:hover img {
            transform: scale(1.03);
        }

        .product h3 {
            font-size: 1.6em;
            font-weight: 600;
            margin-bottom: 10px;
            color: #00e565;
            position: relative;
            display: inline-block;
        }

        .product h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: #00ff73;
            transition: width 0.3s ease;
        }

        .product:hover h3::after {
            width: 100px;
        }

        .product p {
            font-size: 1em;
            margin: 8px 0;
            color: #ccc;
        }

        .product p strong {
            color: #00ff73;
        }

        .quantity-control {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }

        .quantity-input {
            background: #333;
            color: #fff;
            border: 1px solid #00ff73;
            border-radius: 5px;
            padding: 8px;
            text-align: center;
            font-size: 1em;
            width: 100%;
        }

        .add-to-cart {
            background: #00ff73;
            color: #111;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-to-cart:hover {
            background: #00e565;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 255, 115, 0.3);
        }

        .toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: rgba(0, 255, 115, 0.9);
            color: #111;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            z-index: 2000;
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toast.show {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }

        .toast.error {
            background: rgba(255, 0, 0, 0.9);
        }

        .cart-badge {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #00ff73;
            color: #111;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 255, 115, 0.4);
            transition: all 0.3s ease;
        }

        .cart-badge:hover {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 6px 20px rgba(0, 255, 115, 0.6);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff3860;
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8em;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .pagination .page-item {
            margin: 0 5px;
            list-style: none;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #222;
            color: #00ff73;
            border: 1px solid #00ff73;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: #00ff73;
            color: #111;
            transform: translateY(-3px);
        }

        .pagination .page-item.active .page-link {
            background: #00ff73;
            color: #111;
            border-color: #00ff73;
            box-shadow: 0 0 10px rgba(0, 255, 115, 0.5);
        }

        .pagination .page-item.disabled .page-link {
            color: #666;
            border-color: #666;
            pointer-events: none;
        }

        .empty-message {
            text-align: center;
            grid-column: 1 / -1;
            padding: 40px;
            font-size: 1.2em;
            color: #ccc;
        }

        @media (max-width: 768px) {
            .product-container {
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            }

            .cart-badge {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 1.3em;
            }

            .pagination .page-link {
                width: 35px;
                height: 35px;
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            header {
                flex-direction: column;
                gap: 10px;
                padding: 10px;
            }

            header nav {
                width: 100%;
                justify-content: space-around;
            }

            .hamburger {
                top: 60px;
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .product-container {
                grid-template-columns: 1fr;
            }

            .pagination .page-item {
                margin: 0 2px;
            }

            .pagination .page-link {
                width: 30px;
                height: 30px;
                font-size: 0.8em;
            }

            body.sidebar-open {
                margin-left: 0;
            }

            .sidebar {
                width: 80%;
                left: -80%;
            }

            .sidebar.open {
                left: 0;
            }

            .hamburger.open {
                left: auto;
                right: 20px;
            }
        }
        main {
    position: relative;
    z-index: 1;
}

.sidebar {
    z-index: 1000; /* Higher than main content */
}

.hamburger {
    z-index: 1001; /* Higher than sidebar */
}
    </style>
</head>
<body>
    <header>
        <h1>ShopMaster Products</h1>
        <nav>
            <a href="{{ url('/page1') }}"><i class="fas fa-home"></i> Home</a>
            <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Cart</a>
            <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
        </nav>
    </header>

    <div class="hamburger" onclick="toggleSidebar()">☰</div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-title">
            <i class="fas fa-filter"></i> Filter by Type
        </div>
        <div class="sidebar-categories">
            <div class="sidebar-category {{ !request('type') || request('type') === 'all' ? 'active' : '' }}" onclick="filterProductsByType('all')">
                <i class="fas fa-th"></i> All Products
            </div>
            <div class="sidebar-category {{ request('type') === 'Technology' ? 'active' : '' }}" onclick="filterProductsByType('Technology')">
                <i class="fas fa-laptop"></i> Technology
            </div>
            <div class="sidebar-category {{ request('type') === 'Clothes' ? 'active' : '' }}" onclick="filterProductsByType('Clothes')">
                <i class="fas fa-tshirt"></i> Clothes
            </div>
            <div class="sidebar-category {{ request('type') === 'Books' ? 'active' : '' }}" onclick="filterProductsByType('Books')">
                <i class="fas fa-book"></i> Books
            </div>
            <div class="sidebar-category {{ request('type') === 'Video games' ? 'active' : '' }}" onclick="filterProductsByType('Video games')">
                <i class="fas fa-gamepad"></i> Video Games
            </div>
        </div>
    </div>

    <main>
        <h2 class="section-title">Available Products</h2>
        <div class="product-container">
            @forelse($products as $product)
                <div class="product" data-type="{{ $product->product_type }}">
                    <img src="{{ $product->product_img ? asset('storage/' . $product->product_img) : asset('images/placeholder.jpg') }}" alt="{{ $product->product_name }}">
                    <h3>{{ $product->product_name }}</h3>
                    <p><strong>Price:</strong> {{ number_format($product->product_price, 2) }} MAD</p>
                    <p><strong>Type:</strong> {{ $product->product_type }}</p>
                    <p><strong>Available:</strong> {{ $product->product_quantity }} units</p>

                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                        <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                        <input type="hidden" name="product_img" value="{{ $product->product_img }}">
                        <div class="quantity-control">
                            <input type="number" name="quantity" value="1" min="1" 
                                   max="{{ $product->product_quantity }}" class="quantity-input" required>
                            <button type="submit" class="add-to-cart">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            @empty
                <div class="empty-message">
                    <i class="fas fa-box-open" style="font-size: 2em; margin-bottom: 10px;"></i>
                    <p>No products available at the moment.</p>
                </div>
            @endforelse
        </div>

        @if($products->hasPages())
            <div class="pagination">
                {{-- Previous Page Link --}}
                @if($products->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-angle-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}{{ request('type') ? '&type='.request('type') : '' }}">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if($page == $products->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}{{ request('type') ? '&type='.request('type') : '' }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if($products->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}{{ request('type') ? '&type='.request('type') : '' }}">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-angle-right"></i></span>
                    </li>
                @endif
            </div>
        @endif
    </main>

    <div class="cart-badge" onclick="window.location.href='{{ route('cart.index') }}'">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">{{ auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->count() : 0 }}</span>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const hamburger = document.querySelector('.hamburger');
            const body = document.querySelector('body');
            
            sidebar.classList.toggle('open');
            hamburger.classList.toggle('open');
            body.classList.toggle('sidebar-open');
        }

        function filterProductsByType(type) {
            const urlParams = new URLSearchParams(window.location.search);
            
            if (type === 'all') {
                urlParams.delete('type');
            } else {
                urlParams.set('type', type);
            }
            
            urlParams.set('page', '1');
            
            const newUrl = window.location.pathname + '?' + urlParams.toString();
            window.location.href = newUrl;
        }

        // On page load, apply the filter from URL parameter
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const typeParam = urlParams.get('type');
            
            if (typeParam && typeParam !== 'all') {
                const products = document.querySelectorAll('.product');
                products.forEach(product => {
                    if (product.dataset.type !== typeParam) {
                        product.style.display = 'none';
                    }
                });
            }
        });

        function showToast(message, isError = false) {
            const toast = document.createElement('div');
            toast.className = 'toast' + (isError ? ' error' : '');
            
            const icon = document.createElement('i');
            icon.className = isError ? 'fas fa-exclamation-circle' : 'fas fa-check-circle';
            toast.appendChild(icon);
            
            const text = document.createElement('span');
            text.textContent = message;
            toast.appendChild(text);
            
            document.body.appendChild(toast);
            
            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Show flash messages
        @if (session('success'))
            showToast("{{ session('success') }}");
        @endif
        @if (session('error'))
            showToast("{{ session('error') }}", true);
        @endif
    </script>
</body>
</html>