<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - ShopMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --darker: #1a1e21;
            --danger: #f72585;
            --danger-dark: #e01a6e;
            --success: #4caf50;
            --warning: #ff9800;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 4px 20px rgba(67, 97, 238, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            background: linear-gradient(to right, white, #e0e7ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 0;
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .nav-link i {
            font-size: 1.1rem;
        }
        
        .nav-link:hover {
            color: white;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white;
            transition: var(--transition);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .container {
            flex: 1;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 2.5rem;
            color: var(--secondary);
            position: relative;
            padding-bottom: 0.8rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 2px;
        }
        
        .products-table-wrapper {
            overflow-x: auto;
            background: white;
            box-shadow: var(--card-shadow);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .products-table-wrapper:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }
        
        .products-table th, 
        .products-table td {
            padding: 1.2rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .products-table th {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
        }
        
        .products-table tr {
            transition: var(--transition);
        }
        
        .products-table tr:not(:last-child) {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .products-table tr:hover {
            background-color: rgba(72, 149, 239, 0.08);
            transform: translateX(5px);
        }
        
        .product-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .product-image:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }
        
        .default-image {
            filter: grayscale(80%);
            opacity: 0.7;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .btn i {
            font-size: 0.9rem;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger), var(--danger-dark));
            color: white;
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, var(--danger-dark), #c9165b);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(247, 37, 133, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), #314bc8);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-add {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.8rem;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            background: linear-gradient(135deg, #e0e7ff, #d5deff);
            color: var(--primary-dark);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .footer {
            background: linear-gradient(135deg, var(--dark), var(--darker));
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: auto;
            font-size: 0.9rem;
        }
        
        .footer p {
            opacity: 0.8;
        }
        
        .alert {
            padding: 1.2rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-left: 4px solid var(--success);
        }
        
        .alert i {
            font-size: 1.3rem;
        }
        
        .alert-success i {
            color: var(--success);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }
        
        /* Floating animation for empty state */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .empty-state i {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .container {
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem 0;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .products-table th, 
            .products-table td {
                padding: 1rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .page-title {
                font-size: 1.6rem;
                margin-bottom: 1.5rem;
            }
            
            .page-title::after {
                width: 80px;
                height: 3px;
            }
            
            .products-table-wrapper {
                padding: 1rem;
            }
            
            .alert {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo">ShopMaster</div>
            <div class="nav-links">
                <a href="#" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#" class="nav-link"><i class="fas fa-box-open"></i> Products</a>
                <a href="#" class="nav-link"><i class="fas fa-users-cog"></i> Users</a>
                <a href="#" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="page-title">Product Management</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif
        
        <div style="text-align: right;">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-add">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
        
        @if(count($products) > 0)
        <div class="products-table-wrapper">
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->product_img)
                                <img src="{{ asset('storage/' . $product->product_img) }}" 
                                     alt="{{ $product->product_name }}" 
                                     class="product-image">
                            @else
                                <img src="{{ asset('images/default-product.png') }}" 
                                     alt="Default" 
                                     class="product-image default-image">
                            @endif
                        </td>
                        <td>{{ $product->product_name }}</td>
                        <td>
                            <span class="category-badge">
                                {{ $product->category ?? $product->product_type }}
                            </span>
                        </td>
                        <td>{{ number_format($product->price ?? $product->product_price, 2) }} MAD</td>
                        <td>{{ $product->quantity ?? $product->product_quantity }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-box-open"></i>
            <h3>No Products Found</h3>
            <p>Add your first product to get started</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary" style="margin-top: 1rem;">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>
        @endif
    </div>

    <footer class="footer">
        <p>© {{ date('Y') }} ShopMaster. All rights reserved.</p>
    </footer>

    <script>
        // Confirm before delete
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('Are you sure you want to delete this product?')) {
                    e.preventDefault();
                }
            });
        });

        // Add animation to table rows on hover
        document.querySelectorAll('.products-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.transform = 'translateX(5px)';
            });
            
            row.addEventListener('mouseleave', () => {
                row.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>