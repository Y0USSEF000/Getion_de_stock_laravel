<!DOCTYPE html>
<html>
<head>
    <title>Jeux Vidéo - ShopMaster</title>
    <link rel="stylesheet" href="{{ asset('css/ajouter-produit.css') }}">
    <style>
        body {
            background-color: #0d0d0d;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .custom-header {
            background-color: #121212;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 255, 115, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-header .logo {
            color: #00ff73;
            font-size: 2rem;
            margin-left: 20px;
        }

        .nav-links a {
            color: #00ff73;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            text-decoration: underline;
            color: #ffffff;
        }

        .games-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .games-grid {
            display: flex;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            flex-wrap: wrap;
            gap: 30px;
        }
        .game-card {
    flex: 0 0 calc(33.33% - 20px); /* 3 per row with spacing */
    max-width: calc(33.33% - 20px);
    box-sizing: border-box;
}

        .game-card {
            background: linear-gradient(145deg, #1c1c1c, #141414);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 0 25px rgba(0, 255, 115, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
        }

        .game-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 35px rgba(0, 255, 115, 0.4);
        }

        .game-card img {
            width: 100%;
            max-height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .game-card h3 {
            color: #00ff73;
            font-size: 1.3rem;
            margin: 10px 0 6px;
        }

        .game-card p {
            color: #ccc;
            margin: 4px 0;
            font-size: 0.95rem;
        }

        .buy-btn {
            margin-top: 12px;
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            background-color: transparent;
            color: #00ff73;
            border: 2px solid #00ff73;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .buy-btn:hover {
            background-color: #00ff73;
            color: #0d0d0d;
            box-shadow: 0 0 15px #00ff73;
        }

        footer.footer {
            margin-top: 60px;
            background-color: #121212;
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
            border-top: 1px solid #222;
        }

        footer.footer a {
            color: #00ff73;
            text-decoration: none;
            margin: 0 5px;
        }

        footer.footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header class="custom-header">
    <h1 class="logo">ShopMaster</h1>
    <nav class="nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('ajouter-produit') }}">Ajouter un produit</a>
        <a href="{{ route('page1') }}">Dernière page</a>
    </nav>
</header>

<section class="games-container">
    <h2 style="color: #00ff73; text-align: center;">Jeux Vidéo Disponibles</h2>

    @if($products->isEmpty())
        <p style="text-align: center; color: #ccc;">Aucun jeu vidéo trouvé.</p>
    @else
        <div class="games-grid">
            @foreach($products as $product)
                <div class="game-card">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    @endif
                    <h3>{{ $product->name }}</h3>
                    <p>Prix : {{ $product->price }} MAD</p>
                    <p>Quantité : {{ $product->quantity }}</p>
                    <p>Email : {{ $product->email }}</p>
                    <p>Téléphone : {{ $product->phone }}</p>
                    <button class="buy-btn">Acheter</button>
                </div>
            @endforeach
        </div>
    @endif
</section>

<footer class="footer">
    <p>© {{ date('Y') }} ShopMaster. Tous droits réservés.</p>
    <p>
        <a href="#">Confidentialité</a> |
        <a href="#">Conditions</a> |
        <a href="#">Contact</a>
    </p>
</footer>

</body>
</html>
