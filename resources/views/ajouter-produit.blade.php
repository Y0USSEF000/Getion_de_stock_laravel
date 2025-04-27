<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="{{ asset('css/ajouter-produit.css') }}">
</head>
<body>
<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf

        <h2>Publier un produit</h2>

        @if(session('success'))
            <p class="alert">{{ session('success') }}</p>
        @endif

        <input type="text" name="name" placeholder="Nom du produit" required>

        <input type="email" name="email" placeholder="Votre email" required>

        <input type="text" name="phone" placeholder="Votre numéro de téléphone" required>

        <select name="category" required>
            <option value="">-- Choisir une catégorie --</option>
            <option value="Vêtements">Vêtements</option>
            <option value="Électronique">Électronique</option>
            <option value="Maison">Maison</option>
            <option value="Jeux Vidéo">Jeux Vidéo</option>
        </select>

        <input type="number" name="price" step="0.01" placeholder="Prix en €" required>

        <input type="number" name="quantity" min="1" placeholder="Quantité disponible" required>

        <input type="file" name="image" accept="images/*">

        <button type="submit">Publier le produit</button>
    </form>
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
