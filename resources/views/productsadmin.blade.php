<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produits</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Orbitron:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00ff88;
            --primary-dark: #00cc66;
            --primary-light: #00ffaa;
            --bg-dark: #0d0d0d;
            --bg-darker: #050505;
            --bg-light: #1a1a1a;
            --text: #f0f0f0;
            --text-dark: #b0b0b0;
            --accent: #00b3ff;
            --error: #ff4d4d;
            --success: #00ff73;
            --glow: 0 0 15px rgba(0, 255, 115, 0.5);
            --card-bg: rgba(30, 30, 30, 0.8);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: radial-gradient(circle at center, var(--bg-dark), var(--bg-darker));
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            min-height: 100vh;
            padding: 30px 20px;
            line-height: 1.6;
        }

        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            color: var(--primary);
            text-align: center;
            margin-bottom: 40px;
            text-shadow: var(--glow);
            letter-spacing: 1px;
            font-size: 2.5rem;
            position: relative;
            padding-bottom: 15px;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 3px;
            background: linear-gradient(to right, transparent, var(--primary), transparent);
            border-radius: 3px;
        }

        .alert-success {
            background: rgba(0, 255, 115, 0.15);
            color: var(--primary-light);
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 1px solid var(--success);
            text-align: center;
            font-weight: 500;
            box-shadow: inset 0 0 10px rgba(0, 255, 115, 0.1);
            animation: slideDown 0.5s ease-out;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success i {
            font-size: 1.2rem;
        }

        .table-wrapper {
            overflow-x: auto;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), var(--glow);
            padding: 25px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(0, 255, 115, 0.2);
            transition: all 0.4s ease;
        }

        .table-wrapper:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6), 0 0 25px rgba(0, 255, 115, 0.7);
            border-color: rgba(0, 255, 115, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(0, 255, 115, 0.1);
        }

        th {
            background: linear-gradient(to right, rgba(30, 58, 138, 0.7), rgba(17, 24, 39, 0.9));
            color: var(--primary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            position: sticky;
            top: 0;
        }

        tr {
            transition: all 0.3s ease;
        }

        tr:not(:last-child) {
            border-bottom: 1px solid rgba(0, 255, 115, 0.05);
        }

        tr:hover {
            background: rgba(0, 255, 115, 0.08);
            transform: translateX(5px);
        }

        .product-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(0, 255, 115, 0.3);
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        }

        .product-img:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 255, 115, 0.3);
        }

        .no-image {
            color: var(--text-dark);
            font-style: italic;
            font-size: 0.9rem;
        }

        .delete-btn {
            background: linear-gradient(135deg, var(--error), #ff3333);
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 3px 10px rgba(255, 77, 77, 0.3);
        }

        .delete-btn:hover {
            background: linear-gradient(135deg, #ff3333, #ff1a1a);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 77, 77, 0.4);
        }

        .delete-btn:active {
            transform: translateY(0);
        }

        .action-btns {
            display: flex;
            gap: 12px;
        }

        .edit-btn {
            background: linear-gradient(135deg, var(--accent), #0099e6);
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 3px 10px rgba(0, 179, 255, 0.3);
        }

        .edit-btn:hover {
            background: linear-gradient(135deg, #0099e6, #0080cc);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 179, 255, 0.4);
        }

        .edit-btn:active {
            transform: translateY(0);
        }

        /* Floating particles background */
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
            background: rgba(0, 255, 136, 0.2);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .admin-container {
                max-width: 100%;
            }
            
            th, td {
                padding: 12px 15px;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
                margin-bottom: 30px;
            }
            
            .table-wrapper {
                padding: 15px;
            }
            
            th, td {
                padding: 10px 12px;
                font-size: 0.9em;
            }
            
            .product-img {
                width: 50px;
                height: 50px;
            }
            
            .action-btns {
                flex-direction: column;
                gap: 8px;
            }
            
            .edit-btn, .delete-btn {
                padding: 8px 12px;
                font-size: 0.85rem;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 15px;
            }
            
            h1 {
                font-size: 1.8rem;
                padding-bottom: 10px;
            }
            
            h1::after {
                width: 100px;
            }
            
            .alert-success {
                padding: 15px;
                font-size: 0.95rem;
            }
            
            .table-wrapper {
                padding: 10px;
            }
            
            th, td {
                padding: 8px 10px;
                font-size: 0.85em;
            }
        }
    </style>
</head>
<body>

<!-- Floating particles background -->
<div class="particles" id="particles"></div>

<div class="admin-container">
    <h1><i class="fas fa-boxes"></i> Liste des Produits</h1>

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Prix (€)</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->product_img)
                            <img src="{{ asset('storage/' . $product->product_img) }}" alt="Product Image" class="product-img">
                        @else
                            <span class="no-image">Pas d'image</span>
                        @endif
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_type }}</td>
                    <td>{{ number_format($product->product_price, 2, ',', ' ') }} €</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="edit-btn">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
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