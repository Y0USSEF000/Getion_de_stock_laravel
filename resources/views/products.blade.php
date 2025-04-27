<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produits</title>
    <link rel="stylesheet" href="{{ asset('css/admin-products.css') }}">
</head>
<body>

<div class="admin-container">
    <h1>Liste des Produits</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Catégorie</th>
                    <th>Prix (€)</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image" class="product-img">
                        @else
                            Pas d'image
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->email }}</td>
                    <td>{{ $product->phone }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ number_format($product->price, 2, ',', ' ') }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

</body>
</html>
