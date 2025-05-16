<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produits</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00ff73;
            --primary-dark: #00cc5c;
            --primary-light: rgba(0, 255, 115, 0.1);
            --dark: #000000;
            --dark-light: #1a1a1a;
            --darker: #111111;
            --light: #f8f9fa;
            --gray: #2d2d2d;
            --gray-light: #e9ecef;
            --danger: #dc3545;
            --danger-dark: #bb2d3b;
            --success: #00ff73;
            --warning: #ff9800;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
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
            min-height: 100vh;
            padding: 20px;
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
            font-family: 'Montserrat', sans-serif;
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2rem;
            position: relative;
            padding-bottom: 15px;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }
        
        .alert-success {
            background: var(--dark-light);
            color: var(--primary);
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-left: 4px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--card-shadow);
            animation: slideIn 0.5s ease-out;
            border: 1px solid var(--gray);
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert-success i {
            color: var(--primary);
            font-size: 1.3rem;
        }
        
        .table-wrapper {
            overflow-x: auto;
            background: var(--dark-light);
            box-shadow: var(--card-shadow);
            border-radius: 12px;
            padding: 20px;
            transition: var(--transition);
            border: 1px solid var(--gray);
        }
        
        .table-wrapper:hover {
            box-shadow: 0 15px 35px rgba(0, 255, 115, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }
        
        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid var(--gray);
        }
        
        th {
            background: var(--primary);
            color: var(--dark);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
        }
        
        tr {
            transition: var(--transition);
        }
        
        tr:not(:last-child) {
            border-bottom: 1px solid var(--gray);
        }
        
        tr:hover {
            background-color: var(--primary-light);
        }
        
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--gray);
            transition: var(--transition);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        }
        
        .product-img:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 255, 115, 0.3);
        }
        
        .no-image {
            color: var(--gray-light);
            font-style: italic;
            font-size: 0.9rem;
        }
        
        .delete-btn {
            background: linear-gradient(135deg, var(--danger), var(--danger-dark));
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 3px 10px rgba(220, 53, 69, 0.3);
        }
        
        .delete-btn i {
            font-size: 0.9rem;
        }
        
        .delete-btn:hover {
            background: linear-gradient(135deg, var(--danger-dark), #c9165b);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }
        
        .delete-btn:active {
            transform: translateY(0);
        }
        
        .action-btns {
            display: flex;
            gap: 10px;
        }

        .category-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            background: var(--primary-light);
            color: var(--primary);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--primary);
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: var(--dark-light);
            padding: 30px;
            border-radius: 12px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 5px 30px rgba(0, 255, 115, 0.2);
            animation: modalFadeIn 0.3s ease-out;
            border: 1px solid var(--primary);
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
        }

        .modal-btn {
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .modal-btn-cancel {
            background: var(--gray);
            color: white;
            border: 1px solid var(--gray-light);
        }

        .modal-btn-cancel:hover {
            background: var(--gray-light);
        }

        .modal-btn-confirm {
            background: linear-gradient(135deg, var(--danger), var(--danger-dark));
            color: white;
        }

        .modal-btn-confirm:hover {
            background: linear-gradient(135deg, var(--danger-dark), #c9165b);
        }
        
        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .admin-container {
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
                margin-bottom: 25px;
            }
            
            .table-wrapper {
                padding: 15px;
            }
            
            th, td {
                padding: 12px 15px;
            }
            
            .product-img {
                width: 50px;
                height: 50px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            h1 {
                font-size: 1.6rem;
                padding-bottom: 10px;
            }
            
            h1::after {
                width: 80px;
                height: 3px;
            }
            
            .alert-success {
                padding: 12px 15px;
                font-size: 0.95rem;
            }
            
            .table-wrapper {
                padding: 10px;
            }
            
            th, td {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            
            .delete-btn {
                padding: 6px 12px;
                font-size: 0.85rem;
            }

            .modal-content {
                padding: 20px;
            }

            .modal-actions {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

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
                    <th>Catégorie</th>
                    <th>Prix (MAD)</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                    @if($product->product_img)
        <img src="{{ asset('storage/' . $product->product_img) }}" alt="Image" class="product-img">
    @else
        <span class="no-image">Pas d'image</span>
    @endif
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td><span class="category-badge">{{ $product->product_type }}</span></td>
                    <td>{{ number_format($product->product_price, 2, ',', ' ') }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>
                        <div class="action-btns">
                            <button class="delete-btn" onclick="openDeleteModal({{ $product->id }})">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3 style="margin-bottom: 15px; color: var(--primary);"><i class="fas fa-exclamation-triangle" style="color: var(--danger);"></i> Confirmer la suppression</h3>
        <p>Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.</p>
        <div class="modal-actions">
            <button class="modal-btn modal-btn-cancel" onclick="closeDeleteModal()">Annuler</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="modal-btn modal-btn-confirm">
                    <i class="fas fa-trash-alt"></i> Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    let deleteModal = document.getElementById("deleteModal");
    let deleteForm = document.getElementById("deleteForm");

    function openDeleteModal(productId) {
        deleteForm.action = "/products/" + productId; // Adjust if your route is different
        deleteModal.style.display = "flex";
    }

    function closeDeleteModal() {
        deleteModal.style.display = "none";
    }

    // Handle form submission via AJAX
    deleteForm.addEventListener("submit", function(e) {
        e.preventDefault();

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: new FormData(this)
        })
        .then(response => {
            if (response.ok) {
                return response.text(); // or .json() depending on response type
            }
            throw new Error('Erreur lors de la suppression');
        })
        .then(() => {
            closeDeleteModal();

            // Remove the corresponding row from the table
            const row = document.querySelector(`button[onclick="openDeleteModal(${deleteForm.action.split('/').pop()})"]`).closest("tr");
            if (row) {
                row.remove();
            }
        })
        .catch(error => {
            alert(error.message);
            closeDeleteModal();
        });
    });

    // Optional: close modal on outside click
    window.onclick = function(event) {
        if (event.target == deleteModal) {
            closeDeleteModal();
        }
    }
</script>

</body>
</html>