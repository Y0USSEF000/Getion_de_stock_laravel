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
      <nav class="nav">
        <a href="#" class="nav-link active">Accueil</a>
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        <a href="{{ route('ajouter-produit') }}" class="nav-link">Ajouter un produit</a>
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
        </div>
      </section>
    </main>
    <footer class="footer">
  <p>© {{ date('Y') }} Youssef Store. All rights reserved.</p>
  <p>
    <a href="#">Privacy</a> |
    <a href="#">Terms</a> |
    <a href="#">Contact</a>
  </p>
</footer>

  </form>
</body>
</html>
