<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
        }

        /* Header */
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
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #00e565;
        }

        /* Main content */
        main {
            flex: 1;
            padding: 80px 20px 120px; /* Space for header and footer */
        }

        /* Section titles */
        .section-title {
            font-size: 1.8em;
            color: #00e565;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 0 0 5px rgba(0, 255, 115, 0.5);
        }

        /* Filter bar (bottom) */
        .filter-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(51, 51, 51, 0.9);
            backdrop-filter: blur(10px);
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .filter-bar.open {
            transform: translateY(0);
            box-shadow: 0 -2px 10px rgba(0, 255, 115, 0.3);
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            max-width: 600px;
            width: 100%;
        }

        .filter-buttons button {
            background: #222;
            color: #00ff73;
            padding: 10px 20px;
            border: 2px solid #00ff73;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-buttons button:hover {
            background: #00ff73;
            color: #111;
            transform: translateY(-2px);
        }

        .filter-buttons button.active {
            background: #00ff73;
            color: #111;
            box-shadow: 0 0 8px rgba(0, 255, 115, 0.5);
        }

        /* Hamburger icon */
        .hamburger {
            position: fixed;
            top: 70px; /* Below header */
            right: 20px;
            font-size: 28px;
            color: #00ff73;
            cursor: pointer;
            z-index: 1100;
            transition: transform 0.3s ease;
        }

        .hamburger:hover {
            transform: scale(1.2);
        }

        .hamburger.open::before {
            content: '✕';
            font-size: 24px;
        }

        /* Product container */
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 10px 20px rgba(0, 255, 115, 0.3);
        }

        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product h3 {
            font-size: 1.6em;
            font-weight: 600;
            margin-bottom: 10px;
            color: #00e565;
        }

        .product p {
            font-size: 1em;
            margin: 8px 0;
            color: #ccc;
        }

        .product p strong {
            color: #00ff73;
        }

        /* Pagination */
        .pagination {
            text-align: center;
            margin: 40px 0;
        }

        .page-links {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .page-links button {
            background: #222;
            color: #00ff73;
            border: 2px solid #00ff73;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .page-links button:hover {
            background: #00ff73;
            color: #111;
            transform: scale(1.1);
        }

        .page-links button.active {
            background: #00ff73;
            color: #111;
            box-shadow: 0 0 8px rgba(0, 255, 115, 0.5);
        }

        .page-links .ellipsis {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1em;
            color: #00ff73;
        }

        /* Footer */
        footer {
            background: rgba(51, 51, 51, 0.9);
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            text-align: center;
            border-top: 2px solid #00ff73;
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
            color: #00ff73;
        }

        footer a {
            color: #00ff73;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #00e565;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 10px;
            }

            header h1 {
                font-size: 1.3em;
            }

            header nav {
                gap: 15px;
            }

            main {
                padding: 120px 10px 100px;
            }

            .section-title {
                font-size: 1.5em;
            }

            .filter-bar {
                padding: 10px;
            }

            .filter-buttons {
                gap: 8px;
            }

            .product-container {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }

            .hamburger {
                top: 110px;
                right: 15px;
            }

            footer {
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            header nav {
                flex-direction: column;
                gap: 10px;
            }

            .section-title {
                font-size: 1.3em;
            }

            .product img {
                height: 150px;
            }

            .filter-buttons button {
                font-size: 0.9em;
                padding: 8px 15px;
            }

            .page-links button {
                width: 35px;
                height: 35px;
                font-size: 0.9em;
            }

            footer p {
                font-size: 0.8em;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Stock Products</h1>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/stockshopmaster') }}">Products</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/page1') }}">Last page</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hamburger Icon -->
        <div class="hamburger" onclick="toggleFilterBar()" aria-label="Toggle filter menu" tabindex="0" onkeydown="if(event.key === 'Enter') toggleFilterBar()">☰</div>

        <div class="filter-bar" id="filterBar">
            <h2 class="section-title">Filter Products</h2>
            <div class="filter-buttons">
                <form action="{{ route('stockshopmaster') }}" method="GET" style="display: inline;">
                    <input type="hidden" name="product_type" value="">
                    <button type="submit" class="{{ request('product_type') == '' ? 'active' : '' }}">All</button>
                </form>
                <form action="{{ route('stockshopmaster') }}" method="GET" style="display: inline;">
                    <input type="hidden" name="product_type" value="clothes">
                    <button type="submit" class="{{ request('product_type') == 'clothes' ? 'active' : '' }}">Clothes</button>
                </form>
                <form action="{{ route('stockshopmaster') }}" method="GET" style="display: inline;">
                    <input type="hidden" name="product_type" value="electronics">
                    <button type="submit" class="{{ request('product_type') == 'electronics' ? 'active' : '' }}">Electronics</button>
                </form>
                <form action="{{ route('stockshopmaster') }}" method="GET" style="display: inline;">
                    <input type="hidden" name="product_type" value="video games">
                    <button type="submit" class="{{ request('product_type') == 'video games' ? 'active' : '' }}">Video Games</button>
                </form>
                <form action="{{ route('stockshopmaster') }}" method="GET" style="display: inline;">
                    <input type="hidden" name="product_type" value="books">
                    <button type="submit" class="{{ request('product_type') == 'books' ? 'active' : '' }}">Books</button>
                </form>
                <form action="{{ route('stockshopmaster') }}" method="GET" style="display: inline;">
                    <input type="hidden" name="product_type" value="mandas">
                    <button type="submit" class="{{ request('product_type') == 'mandas' ? 'active' : '' }}">Mandas</button>
                </form>
            </div>
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

        <!-- Pagination (Limited to 12 Numbers) -->
        <h2 class="section-title">Page Navigation</h2>
        <div class="pagination">
            <div class="page-links">
                @php
                    $currentPage = $products->currentPage();
                    $lastPage = $products->lastPage();
                    $maxVisible = 12;
                    $halfVisible = floor($maxVisible / 2);

                    // Calculate start and end page numbers
                    $start = max(1, $currentPage - $halfVisible);
                    $end = min($lastPage, $currentPage + $halfVisible);

                    // Adjust start/end to ensure maxVisible pages are shown
                    if ($end - $start + 1 < $maxVisible) {
                        if ($start == 1) {
                            $end = min($lastPage, $start + $maxVisible - 1);
                        } else {
                            $end = min($lastPage, $currentPage + $halfVisible);
                            $start = max(1, $end - $maxVisible + 1);
                        }
                    }

                    // Get current product_type
                    $productType = request()->query('product_type', '');

                    // Show first page and ellipsis if needed
                    if ($start > 1) {
                        echo '<form action="' . route('stockshopmaster') . '" method="GET" style="display: inline;">
                            <input type="hidden" name="product_type" value="' . $productType . '">
                            <input type="hidden" name="page" value="1">
                            <button type="submit" class="' . ($currentPage == 1 ? 'active' : '') . '">1</button>
                        </form>';
                        if ($start > 2) {
                            echo '<span class="ellipsis">...</span>';
                        }
                    }

                    // Generate page links
                    for ($i = $start; $i <= $end; $i++) {
                        echo '<form action="' . route('stockshopmaster') . '" method="GET" style="display: inline;">
                            <input type="hidden" name="product_type" value="' . $productType . '">
                            <input type="hidden" name="page" value="' . $i . '">
                            <button type="submit" class="' . ($currentPage == $i ? 'active' : '') . '">' . $i . '</button>
                        </form>';
                    }

                    // Show last page and ellipsis if needed
                    if ($end < $lastPage) {
                        if ($end < $lastPage - 1) {
                            echo '<span class="ellipsis">...</span>';
                        }
                        echo '<form action="' . route('stockshopmaster') . '" method="GET" style="display: inline;">
                            <input type="hidden" name="product_type" value="' . $productType . '">
                            <input type="hidden" name="page" value="' . $lastPage . '">
                            <button type="submit" class="' . ($currentPage == $lastPage ? 'active' : '') . '">' . $lastPage . '</button>
                        </form>';
                    }
                @endphp
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

    <!--
        Backend Check:
        Ensure your Laravel controller for the 'stockshopmaster' route handles the 'product_type' and 'page' query parameters correctly.
        Example controller logic:
        ```php
        public function index(Request $request) {
            $productType = $request->query('product_type', '');
            $query = Product::query();
            if ($productType) {
                $query->where('product_type', $productType);
            }
            $products = $query->paginate(12); // Adjust per_page as needed
            return view('stockshopmaster', compact('products'));
        }
        ```
        Verify that:
        1. The Product model has a 'product_type' column or equivalent.
        2. The pagination preserves 'product_type' in the URL (e.g., /stockshopmaster?product_type=clothes&page=2).
        3. The database query correctly filters products based on 'product_type'.
    -->

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