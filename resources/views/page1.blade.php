<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopMaster</title>
  <link href="{{ asset('css/page1.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="app">
  <form method="POST">
    @csrf
    <header class="header">
      <div class="logo">
        <span>ShopMaster</span>
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Rechercher un produit..." class="search-input">
        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
      </div>
      <nav class="nav">
        <a href="#" class="nav-link active">Accueil</a>
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        <a href="{{ route('ajouter-produit') }}" class="nav-link">Ajouter un produit</a>
        <div class="user-dropdown">
          <button class="user-button"><i class="fas fa-user"></i> Profil</button>
          <div class="dropdown-content">
            <a href="{{ route('profile') }}">Profil</a>
            <a href="#">Paramètres</a>
            <a href="#">Déconnexion</a>
          </div>
        </div>
      </nav>
    </header>

    <main class="main">
      <section class="section">
        <h2 class="section-title">Tableau de bord</h2>
        <div class="card-grid">
          <!-- Utilisateurs -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-users"></i></div>
              <h3 class="card-title">Utilisateurs</h3>
            </div>
            <div class="card-value">1,248</div>
            <p class="card-text">+12% ce mois-ci</p>
          </div>

          <!-- Ventes -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
              <h3 class="card-title">Ventes</h3>
            </div>
            <div class="card-value">356</div>
            <p class="card-text">+8% ce mois-ci</p>
          </div>

          <!-- Revenu -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
              <h3 class="card-title">Revenu</h3>
            </div>
            <div class="card-value">$24,780</div>
            <p class="card-text">-3% ce mois-ci</p>
          </div>

          <!-- Stock -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-boxes"></i></div>
              <h3 class="card-title">Stock</h3>
            </div>
            <div class="card-value">5,200</div>
            <p class="card-text">+5% ce mois-ci</p>
          </div>

          <!-- Quick Stats -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-chart-line"></i></div>
              <h3 class="card-title">Objectif Ventes</h3>
            </div>
            <div class="card-value">75%</div>
            <div class="progress-bar">
              <div class="progress" style="width: 75%;"></div>
            </div>
            <p class="card-text">Objectif: 500 ventes</p>
          </div>
        </div>
      </section>

      <section class="section">
        <h2 class="section-title">Activité Récente</h2>
        <div class="activity-list">
          <div class="activity-item">
            <i class="fas fa-plus-circle activity-icon"></i>
            <div class="activity-details">
              <p class="activity-text">Nouveau produit ajouté: T-Shirt Été 2023</p>
              <span class="activity-time">Il y a 2 heures</span>
            </div>
          </div>
          <div class="activity-item">
            <i class="fas fa-shopping-cart activity-icon"></i>
            <div class="activity-details">
              <p class="activity-text">Vente réalisée: Smartphone X</p>
              <span class="activity-time">Il y a 5 heures</span>
            </div>
          </div>
          <div class="activity-item">
            <i class="fas fa-boxes activity-icon"></i>
            <div class="activity-details">
              <p class="activity-text">Stock mis à jour: Jeux Vidéo</p>
              <span class="activity-time">Hier</span>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <h2 class="section-title">Nos Rayons</h2>
        <div class="categories-grid">
          <!-- Vêtements -->
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f" alt="Mode vestimentaire" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Vêtements</h3>
              <p class="category-description">Collections printemps-été 2023</p>
              <a href="#" class="category-link">Voir <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>

          <!-- Électronique -->
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1518770660439-4636190af475" alt="High-tech" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Électronique</h3>
              <p class="category-description">Nouveautés technologiques</p>
              <a href="#" class="category-link">Découvrir <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>

          <!-- Maison -->
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" alt="Maison" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Maison</h3>
              <p class="category-description">Décoration tendance</p>
              <a href="#" class="category-link">Explorer <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>

          <!-- Jeux Vidéo -->
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e" alt="Gaming" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Jeux Vidéo</h3>
              <p class="category-description">Sorties récentes</p>
              <a href="#" class="category-link">Jouer <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>

          <!-- Stock -->
          <div class="category-card">
            <div class="category-image-container">
              <img src="{{ asset('images/3b3df1b1597885326387565c8c5eb0d4.jpg') }}" alt="Stock" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Stock</h3>
              <p class="category-description">Gestion des produits en inventaire</p>
              <a href="{{ route('stock_products') }}" class="category-link">Voir le stock <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Floating Action Button -->
    <button class="floating-button" onclick="openModal()">
      <i class="fas fa-plus"></i> Actions
    </button>

    <!-- Modal -->
    <div class="modal" id="actionModal">
      <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <h3 class="modal-title">Actions Rapides</h3>
        <div class="modal-actions">
          <a href="{{ route('ajouter-produit') }}" class="modal-link"><i class="fas fa-box"></i> Ajouter un produit</a>
          <a href="#" class="modal-link"><i class="fas fa-chart-bar"></i> Voir les rapports</a>
          <a href="#" class="modal-link"><i class="fas fa-users"></i> Gérer les utilisateurs</a>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="footer-social">
        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
      </div>
      <div class="newsletter">
        <h4>Abonnez-vous à notre newsletter</h4>
        <form class="newsletter-form">
          <input type="email" placeholder="Votre email..." class="newsletter-input">
          <button type="submit" class="newsletter-button">S'abonner</button>
        </form>
      </div>
      <p>© {{ date('Y') }} Youssef Store. All rights reserved.</p>
      <p>
        <a href="#">Privacy</a> |
        <a href="#">Terms</a> |
        <a href="{{ route('contact') }}">Contact</a>
      </p>
    </footer>
  </form>

  <script>
    function openModal() {
      document.getElementById('actionModal').style.display = 'block';
    }

    function closeModal() {
      document.getElementById('actionModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      const modal = document.getElementById('actionModal');
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  </script>
</body>
</html>