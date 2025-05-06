<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stockshopmaster.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Stock Products</h1>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('stockshopmaster') }}">Products</a>
            <a href="{{ url('/about') }}">About</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hamburger Icon -->
        <div class="hamburger" onclick="toggleFilterBar()">☰</div>

        <!-- Filter Bar -->
        <div class="filter-bar" id="filterBar">
            <h2 class="section-title">Filter Products</h2>
            <form action="{{ route('stockshopmaster') }}" method="GET" class="filter-buttons">
                <button type="submit" name="product_type" value="" class="{{ request('product_type') == '' ? 'active' : '' }}">All</button>
                <button type="submit" name="product_type" value="clothes" class="{{ request('product_type') == 'clothes' ? 'active' : '' }}">Clothes</button>
                <button type="submit" name="product_type" value="electronics" class="{{ request('product_type') == 'electronics' ? 'active' : '' }}">Electronics</button>
                <button type="submit" name="product_type" value="video games" class="{{ request('product_type') == 'video games' ? 'active' : '' }}">Video Games</button>
                <button type="submit" name="product_type" value="books" class="{{ request('product_type') == 'books' ? 'active' : '' }}">Books</button>
                <button type="submit" name="product_type" value="mandas" class="{{ request('product_type') == 'mandas' ? 'active' : '' }}">Mandas</button>
            </form>
        </div>

        <!-- Products Display -->
        <h2 class="section-title">Available Products</h2>
        <div class="product-container">
            @forelse($products as $product)
                <div class="product">
                    <img src="{{ asset('images/' . $product->product_img) }}" alt="{{ $product->product_name }}" onerror="this.src='https://via.placeholder.com/280x180.png?text=Image+Not+Found';">
                    <h3>{{ $product->product_name }}</h3>
                    <p><strong>Price:</strong> MAD {{ $product->product_price }}</p>
                    <p><strong>Quantity:</strong> {{ $product->product_quantity }}</p>
                    <p>{{ $product->product_description }}</p>
                </div>
            @empty
                <p class="section-title" style="text-align: center;">No products found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <h2 class="section-title">Page Navigation</h2>
        <div class="pagination">
            <div class="page-links">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Your PFE Project. All rights reserved.</p>
        <div>
            <a href="{{ url('/privacy') }}">Privacy</a>
            <a href="{{ url('/contact') }}">Contact</a>
        </div>
    </footer>

    <script>
        function toggleFilterBar() {
            var filterBar = document.getElementById("filterBar");
            var hamburger = document.querySelector(".hamburger");
            filterBar.classList.toggle("open");
            hamburger.classList.toggle("open");
        }
    </script>
</body>
</html>