<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="{{ asset('css/ajouter-produit.css') }}">
</head>
<body>

<!-- HEADER -->

<header class="header">
  <div class="logo">
    <span>ShopMaster</span>
  </div>

  <nav class="nav">
    <a href="{{url('/')}}" class="nav-link">Home</a>
    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
    <a href="{{ route('books') }}" class="nav-link">Books</a>
    <a href="{{ route('clothes') }}" class="nav-link">Clothes</a>
    <a href="{{ route('Technology') }}" class="nav-link">Technology</a>
    <a href="{{ route('video-games') }}" class="nav-link">Video Games</a>



    <div class="user-dropdown">
    </div>
  </nav>
</header>

<!-- FORM -->
<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @csrf

    <h2>Publier un produit</h2>

    @if(session('success'))
        <p class="alert">{{ session('success') }}</p>
    @endif

    <input type="text" name="product_name" placeholder="Nom du produit" required>
<input type="email" name="email" placeholder="Votre email" required>
<input type="text" name="phone" placeholder="Votre numéro de téléphone" required>

<select name="product_type" required>
    <option value="">-- Choisir une catégorie --</option>
    <option value="Clothes">Clothes</option>
    <option value="Technology">Technology</option>
    <option value="Books">Books</option>
    <option value="Video games">Video games</option>
</select>

<input type="number" name="product_price" step="0.01" placeholder="Prix en MAD" required>
<input type="number" name="product_quantity" min="1" placeholder="Quantité disponible" required>
<input type="file" name="product_img" accept="image/*">
    <button type="submit">Publier le produit</button>
</form>

<!-- FOOTER -->
<footer class="footer">
    <p>© {{ date('Y') }} Youssef Shop. Tous droits réservés.</p>
    <p>
        <a href="#">Confidentialité</a> |
        <a href="#">Conditions</a> |
        <a href="#">Contact</a>
    </p>
</footer>

</body>
</html>
