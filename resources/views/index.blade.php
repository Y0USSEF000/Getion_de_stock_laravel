<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ShopMaster</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <h1>Liste des produits</h1>
    <div class="products">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                <h3>{{ $product->title }}</h3>
                <p>{{ $product->description }}</p>
                <small>Catégorie : {{ $product->category->name }}</small><br>
                <small>Ajouté par : {{ $product->user->name }}</small>
            </div>
        @endforeach
    </div>
</body>
</html>
