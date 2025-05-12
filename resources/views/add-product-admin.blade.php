<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00ff88;
            --primary-dark: #00e565;
            --primary-light: #00ffaa;
            --bg-dark: #0a0a0a;
            --bg-darker: #050505;
            --bg-light: #1e1e1e;
            --text: #e0e0e0;
            --text-dark: #b0b0b0;
            --accent: #00b7ff;
            --error: #ff5555;
            --success: #00ff73;
            --glow: 0 0 15px rgba(0, 255, 115, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: radial-gradient(circle at center, var(--bg-dark), var(--bg-darker));
            color: var(--text);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }

        header {
            background: rgba(15, 15, 15, 0.9);
            backdrop-filter: blur(12px);
            padding: 20px 40px;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--glow);
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }

        header.scrolled {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 255, 115, 0.3);
            padding: 15px 40px;
        }

        header h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8em;
            font-weight: 600;
            color: var(--primary);
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 255, 136, 0.5);
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            transition: all 0.3s ease;
        }

        header.scrolled h1 {
            font-size: 1.6em;
        }

        header nav {
            display: flex;
            gap: 20px;
        }

        header nav a {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 500;
            font-size: 1em;
            position: relative;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        header nav a i {
            font-size: 0.9em;
        }

        header nav a::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -5px;
            left: 0;
            transition: width 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        header nav a:hover::before {
            width: 100%;
        }

        header nav a:hover {
            color: var(--primary);
            text-shadow: 0 0 8px rgba(0, 255, 136, 0.6);
        }

        main {
            flex: 1;
            padding: 50px 20px;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
        }

        .form-container {
            background: rgba(28, 28, 28, 0.7);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 40px rgba(0, 255, 115, 0.3), 
                        inset 0 0 20px rgba(0, 255, 115, 0.1);
            transition: all 0.4s ease;
            backdrop-filter: blur(8px);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 255, 136, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-container:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 50px rgba(0, 255, 115, 0.4), 
                       inset 0 0 20px rgba(0, 255, 115, 0.2);
            border-color: var(--primary);
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.2em;
            font-weight: 600;
            color: var(--primary);
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 0 0 15px rgba(0, 255, 115, 0.7);
            letter-spacing: 1px;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, transparent, var(--primary), transparent);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 30px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 1.1em;
            font-weight: 500;
            color: var(--primary-light);
            margin-bottom: 12px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .form-group label:hover {
            color: var(--primary);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px 20px;
            background: rgba(42, 42, 42, 0.7);
            border: 1px solid rgba(0, 255, 136, 0.4);
            border-radius: 12px;
            color: var(--text);
            font-size: 1em;
            font-family: 'Poppins', sans-serif;
            transition: all 0.4s ease;
            backdrop-filter: blur(5px);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            background: rgba(51, 51, 51, 0.8);
            box-shadow: 0 0 15px rgba(0, 255, 115, 0.4);
            outline: none;
            transform: translateY(-2px);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
            line-height: 1.6;
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2300ff88'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 20px;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background: rgba(42, 42, 42, 0.7);
            border: 1px dashed rgba(0, 255, 136, 0.4);
            border-radius: 12px;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            border-color: var(--primary);
            color: var(--primary-light);
            background: rgba(51, 51, 51, 0.8);
        }

        .file-input-label i {
            color: var(--primary);
            font-size: 1.2em;
        }

        .submit-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #111;
            padding: 16px 25px;
            border: none;
            border-radius: 12px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            width: 100%;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            box-shadow: 0 5px 15px rgba(0, 255, 115, 0.3);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.7s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 255, 115, 0.5);
        }

        .submit-btn:active {
            transform: translateY(0);
            box-shadow: 0 5px 10px rgba(0, 255, 115, 0.4);
        }

        .success-message {
            color: var(--success);
            font-size: 1.1em;
            text-align: center;
            margin-bottom: 30px;
            padding: 15px;
            background: rgba(0, 255, 115, 0.15);
            border-radius: 12px;
            border: 1px solid var(--success);
            box-shadow: inset 0 0 10px rgba(0, 255, 115, 0.1);
            animation: fadeIn 0.5s ease;
        }

        .error-message {
            color: var(--error);
            font-size: 1em;
            margin-top: 10px;
            text-align: center;
            padding: 12px;
            background: rgba(255, 85, 85, 0.15);
            border-radius: 10px;
            border: 1px solid var(--error);
            animation: shake 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        footer {
            background: rgba(15, 15, 15, 0.9);
            padding: 25px;
            text-align: center;
            color: var(--primary-light);
            font-size: 0.9em;
            box-shadow: 0 -2px 15px rgba(0, 255, 115, 0.2);
            border-top: 1px solid rgba(0, 255, 136, 0.2);
            backdrop-filter: blur(8px);
        }

        footer p {
            letter-spacing: 1px;
            font-weight: 300;
        }

        /* Floating particles animation */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(0, 255, 136, 0.3);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            main {
                padding: 30px 15px;
            }

            .form-container {
                padding: 30px;
            }

            .section-title {
                font-size: 1.8em;
                margin-bottom: 30px;
            }

            header {
                padding: 15px 25px;
                flex-direction: column;
                gap: 15px;
            }

            header nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
            }

            header nav a {
                margin-left: 0;
            }

            .submit-btn {
                padding: 14px 20px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 25px 20px;
                border-radius: 15px;
            }

            .section-title {
                font-size: 1.5em;
                padding-bottom: 10px;
            }

            .section-title::after {
                width: 70px;
            }

            .form-group label {
                font-size: 1em;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 12px 15px;
                font-size: 0.95em;
            }

            .file-input-label {
                padding: 12px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Floating particles background -->
    <div class="particles" id="particles"></div>

    <header>
        <h1>Add New Product</h1>
        <nav>
            <a href="{{ route('pageadmin') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i> Products</a>
            <a href="{{ route('admin.users.index') }}"><i class="fas fa-users-cog"></i> Users</a>
        </nav>
    </header>

    <main>
        <div class="form-container">
            <h2 class="section-title">Add Product to Stock</h2>

            @if (session('success'))
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}" required>
                    @error('product_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product_type">Product Type</label>
                    <select name="product_type" id="product_type" required>
                        <option value="" disabled selected>Select a type</option>
                        <option value="Clothes" {{ old('product_type') == 'Clothes' ? 'selected' : '' }}>Clothes</option>
                        <option value="Technology" {{ old('product_type') == 'Technology' ? 'selected' : '' }}>Technology</option>
                        <option value="Books" {{ old('product_type') == 'Books' ? 'selected' : '' }}>Books</option>
                        <option value="Video games" {{ old('product_type') == 'Video games' ? 'selected' : '' }}>Video games</option>
                    </select>
                    @error('product_type')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product_price">Price (MAD)</label>
                    <input type="number" name="product_price" id="product_price" step="0.01" value="{{ old('product_price') }}" required>
                    @error('product_price')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product_quantity">Quantity</label>
                    <input type="number" name="product_quantity" id="product_quantity" value="{{ old('product_quantity') }}" required>
                    @error('product_quantity')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product_description">Description (Optional)</label>
                    <textarea name="product_description" id="product_description">{{ old('product_description') }}</textarea>
                    @error('product_description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product_img">Product Image (Optional)</label>
                    <div class="file-input-wrapper">
                        <label class="file-input-label" for="product_img">
                            <span id="file-name">Choose an image file...</span>
                            <i class="fas fa-cloud-upload-alt"></i>
                        </label>
                        <input type="file" name="product_img" id="product_img" accept="image/*" onchange="updateFileName(this)">
                    </div>
                    @error('product_img')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-plus-circle"></i> Add Product
                </button>
            </form>
        </div>
    </main>

    <footer>
        <p>© {{ date('Y') }} Stock Products. All rights reserved.</p>
    </footer>

    <script>
        // Add scrolled class to header for animation
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Update file input label with selected file name
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'Choose an image file...';
            document.getElementById('file-name').textContent = fileName;
        }

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = Math.floor(window.innerWidth / 10);
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 1px and 3px
                const size = Math.random() * 2 + 1;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random animation duration between 10s and 30s
                const duration = Math.random() * 20 + 10;
                particle.style.animationDuration = `${duration}s`;
                
                // Random delay
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        window.addEventListener('load', createParticles);
    </script>
</body>
</html>