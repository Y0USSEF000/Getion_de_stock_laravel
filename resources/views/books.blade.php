<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres - ShopMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00ff73;
            --primary-dark: #00cc5c;
            --primary-light: rgba(0, 255, 115, 0.1);
            --dark: #0d0d0d;
            --darker: #080808;
            --dark-light: #1a1a1a;
            --light: #f8f9fa;
            --gray: #2d2d2d;
            --gray-light: #e9ecef;
            --shadow: 0 4px 20px rgba(0, 255, 115, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: var(--dark);
            color: white;
            line-height: 1.6;
        }
        
        .custom-header {
            background-color: var(--darker);
            padding: 20px 40px;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .logo {
            color: var(--primary);
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 0 10px rgba(0, 255, 115, 0.3);
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
        }
        
        .nav-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: var(--transition);
            position: relative;
            padding: 5px 0;
        }
        
        .nav-links a:hover {
            color: white;
            text-shadow: 0 0 8px var(--primary);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .books-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 30px;
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .section-title {
            color: var(--primary);
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
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
            background: var(--primary);
            border-radius: 3px;
        }
        
        .empty-message {
            text-align: center;
            color: var(--gray-light);
            font-size: 1.2rem;
            margin-top: 50px;
        }
        
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .book-card {
            background: linear-gradient(145deg, var(--dark-light), var(--darker));
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--gray);
        }
        
        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 255, 115, 0.2);
            border-color: var(--primary);
        }
        
        .book-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                transparent,
                transparent,
                transparent,
                var(--primary-light)
            );
            transform: rotate(30deg);
            transition: var(--transition);
            opacity: 0;
        }
        
        .book-card:hover::before {
            opacity: 1;
        }
        
        .book-img {
            width: 100%;
            height: 280px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid var(--gray);
            transition: var(--transition);
            background-color: var(--darker);
            padding: 15px;
        }
        
        .book-card:hover .book-img {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .book-title {
            color: var(--primary);
            font-size: 1.4rem;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .book-detail {
            color: var(--gray-light);
            margin: 8px 0;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .book-detail i {
            color: var(--primary);
            font-size: 0.9rem;
            min-width: 20px;
        }
        
        .buy-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid var(--primary);
            border-radius: 30px;
            background: transparent;
            color: var(--primary);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }
        
        .buy-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(0, 255, 115, 0.2),
                transparent
            );
            transition: var(--transition);
        }
        
        .buy-btn:hover {
            background: var(--primary);
            color: var(--dark);
            box-shadow: 0 0 20px rgba(0, 255, 115, 0.4);
        }
        
        .buy-btn:hover::before {
            left: 100%;
        }
        
        /* Book-specific enhancements */
        .book-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary);
            color: var(--dark);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }
        
        .book-author {
            font-style: italic;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .footer {
            margin-top: 80px;
            background-color: var(--darker);
            padding: 30px 0;
            text-align: center;
            border-top: 1px solid var(--gray);
        }
        
        .footer p {
            margin: 10px 0;
            color: var(--gray-light);
        }
        
        .footer a {
            color: var(--primary);
            text-decoration: none;
            margin: 0 10px;
            transition: var(--transition);
        }
        
        .footer a:hover {
            color: white;
            text-decoration: underline;
        }
        
        /* Responsive styles */
        @media (max-width: 1024px) {
            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .custom-header {
                flex-direction: column;
                padding: 20px;
                gap: 15px;
            }
            
            .nav-links {
                gap: 20px;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .books-container {
                padding: 0 15px;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .book-card {
                padding: 20px;
            }
            
            .book-img {
                height: 220px;
            }
        }
    </style>
</head>
<body>

<header class="custom-header">
    <h1 class="logo">ShopMaster</h1>
    <nav class="nav-links">
        <a href="{{ url('/') }}"><i class="fas fa-home"></i> Accueil</a>
        <a href="{{ route('ajouter-produit') }}"><i class="fas fa-plus-circle"></i> Ajouter un produit</a>
        <a href="{{ route('page1') }}"><i class="fas fa-book"></i> Dernière page</a>
    </nav>
</header>

<section class="books-container">
    <h2 class="section-title">Collection de Livres</h2>

    @if($books->isEmpty())
        <p class="empty-message">Aucun livre trouvé.</p>
    @else
        <div class="books-grid">
            @foreach($books as $book)
                <div class="book-card">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" class="book-img">
                    @endif
                    <h3 class="book-title">{{ $book->name }}</h3>
                    @if($book->author)
                        <p class="book-author">Par {{ $book->author }}</p>
                    @endif
                    <p class="book-detail"><i class="fas fa-tag"></i> Prix : {{ $book->price }} MAD</p>
                    <p class="book-detail"><i class="fas fa-box-open"></i> Quantité : {{ $book->quantity }}</p>
                    <p class="book-detail"><i class="fas fa-envelope"></i> Email : {{ $book->email }}</p>
                    <p class="book-detail"><i class="fas fa-phone"></i> Téléphone : {{ $book->phone }}</p>
                    <button class="buy-btn">
                        <i class="fas fa-shopping-cart"></i> Acheter maintenant
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</section>

<footer class="footer">
    <p>© {{ date('Y') }} ShopMaster. Tous droits réservés.</p>
    <p>
        <a href="#"><i class="fas fa-lock"></i> Confidentialité</a> |
        <a href="#"><i class="fas fa-file-alt"></i> Conditions</a> |
        <a href="#"><i class="fas fa-envelope"></i> Contact</a>
    </p>
</footer>

</body>
</html>