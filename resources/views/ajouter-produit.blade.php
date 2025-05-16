<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit - ShopMaster</title>
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
            --danger: #dc3545;
            --success: #00ff73;
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
        
        .header {
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
        
        .nav {
            display: flex;
            gap: 30px;
        }
        
        .nav-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: var(--transition);
            position: relative;
            padding: 5px 0;
        }
        
        .nav-link:hover {
            color: white;
            text-shadow: 0 0 8px var(--primary);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: var(--dark-light);
            border-radius: 15px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray);
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        form h2 {
            color: var(--primary);
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        form h2::after {
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
        
        .alert {
            background: var(--primary-light);
            color: var(--primary);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 4px solid var(--primary);
        }
        
        input, select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid var(--gray);
            background: var(--darker);
            color: white;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 255, 115, 0.25);
        }
        
        input[type="file"] {
            padding: 10px;
            margin-bottom: 25px;
        }
        
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: var(--primary);
            color: var(--dark);
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        button[type="submit"]:hover {
            background: var(--primary-dark);
            box-shadow: 0 0 20px rgba(0, 255, 115, 0.4);
        }
        
        .file-upload {
            position: relative;
            margin-bottom: 25px;
        }
        
        .file-upload-label {
            display: block;
            padding: 15px;
            border: 2px dashed var(--gray);
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .file-upload-label:hover {
            border-color: var(--primary);
        }
        
        .file-upload-label i {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .file-upload-label span {
            display: block;
            margin-top: 5px;
            color: var(--gray-light);
        }
        
        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
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
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 20px;
                gap: 15px;
            }
            
            .nav {
                gap: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            form {
                padding: 20px;
                margin: 30px 20px;
            }
        }
        
        @media (max-width: 480px) {
            .nav {
                gap: 15px;
            }
            
            form h2 {
                font-size: 1.8rem;
            }
            
            input, select {
                padding: 10px 12px;
            }
        }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">
        <span>ShopMaster</span>
    </div>

    <nav class="nav">
        <a href="{{url('/page1')}}" class="nav-link"><i class="fas fa-home"></i> Home</a>
        <a href="{{ route('contact') }}" class="nav-link"><i class="fas fa-envelope"></i> Contact</a>
        <a href="{{ route('books') }}" class="nav-link"><i class="fas fa-book"></i> Books</a>
        <a href="{{ route('clothes') }}" class="nav-link"><i class="fas fa-tshirt"></i> Clothes</a>
        <a href="{{ route('Technology') }}" class="nav-link"><i class="fas fa-laptop"></i> Technology</a>
        <a href="{{ route('video-games') }}" class="nav-link"><i class="fas fa-gamepad"></i> Video Games</a>
    </nav>
</header>

<!-- FORM -->
<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @csrf

    <h2><i class="fas fa-plus-circle"></i> Publier un produit</h2>

    @if(session('success'))
        <p class="alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</p>
    @endif

    <input type="text" name="product_name" placeholder="Nom du produit" required>
    <input type="email" name="email" placeholder="Votre email" required>
    <input type="text" name="phone" placeholder="Votre numéro de téléphone" required>

    <select name="product_type" required>
        <option value="">-- Choisir une catégorie --</option>
        <option value="Clothes">Vêtements</option>
        <option value="Technology">Technologie</option>
        <option value="Books">Livres</option>
        <option value="Video games">Jeux vidéo</option>
    </select>

    <input type="number" name="product_price" step="0.01" placeholder="Prix en MAD" required>
    <input type="number" name="product_quantity" min="1" placeholder="Quantité disponible" required>
    
    <div class="file-upload">
        <label class="file-upload-label">
            <i class="fas fa-cloud-upload-alt"></i>
            <span>Cliquez pour télécharger une image</span>
            <input type="file" name="product_img" accept="image/*" class="file-upload-input">
        </label>
    </div>
    
    <button type="submit"><i class="fas fa-paper-plane"></i> Publier le produit</button>
</form>

<!-- FOOTER -->
<footer class="footer">
    <p>© {{ date('Y') }} ShopMaster. Tous droits réservés.</p>
    <p>
        <a href="#"><i class="fas fa-lock"></i> Confidentialité</a> |
        <a href="#"><i class="fas fa-file-alt"></i> Conditions</a> |
        <a href="#"><i class="fas fa-envelope"></i> Contact</a>
    </p>
</footer>

<script>
    // Update file upload label with selected file name
    document.querySelector('.file-upload-input').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.querySelector('.file-upload-label span').textContent = fileName;
    });
</script>

</body>
</html>