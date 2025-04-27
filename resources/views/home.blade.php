<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopMaster</title>
  <link rel="stylesheet" href="{{ asset('css/Home.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="homepage">
    <nav class="navbar">
      <h2>ShopMaster</h2>
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Boutique</a></li>
        <li><a href="#">À propos</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>

    <header class="hero">
      <h1>Bienvenue sur <span class="span">ShopMaster</span></h1>
      <p>Votre boutique en ligne pour tous vos besoins !</p>
      <a href="{{ route('login.submit') }}"><button>Explorer maintenant</button></a>
            </header>

    <section class="features">
      <h2>Pourquoi nous choisir ?</h2>
      <div class="feature-list">
        <div class="feature">
          <h3>Livraison rapide</h3>
          <p>Recevez vos produits en un temps record !</p>
        </div>
        <div class="feature">
          <h3>Produits de qualité</h3>
          <p>Nous sélectionnons uniquement les meilleurs articles.</p>
        </div>
        <div class="feature">
          <h3>Support 24/7</h3>
          <p>Notre équipe est là pour vous aider à tout moment.</p>
        </div>
      </div>
    </section>

    <section class="categories">
      <h2>Nos catégories</h2>
      <div class="category-list">
        <div class="category">👕 Vêtements</div>
        <div class="category">📱 Électronique</div>
        <div class="category">🏠 Maison</div>
        <div class="category">🎮 Jeux vidéo</div>
      </div>
    </section>

    <section class="gallery">
      <h2>Nos Produits en Vedette</h2>
      <div class="image-grid">
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" alt="Montre connectée">
          <div class="overlay">
            <h3>Électronique</h3>
            <p>Découvrez nos dernières innovations</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12" alt="Vêtements tendance">
          <div class="overlay">
            <h3>Mode</h3>
            <p>Collection printemps/été</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1ad" alt="Parfum de luxe">
          <div class="overlay">
            <h3>Beauté</h3>
            <p>Produits premium</p>
          </div>
        </div>
      </div>
    </section>

    <footer class="professional-footer">
      <div class="footer-content">
        <div class="footer-section">
          <h3>ShopMaster</h3>
          <p>Votre destination shopping en ligne préférée depuis 2025.</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
        <div class="footer-section">
          <h4>Liens rapides</h4>
          <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Boutique</a></li>
            <li><a href="#">À propos</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Informations</h4>
          <ul>
            <li><a href="#">Politique de confidentialité</a></li>
            <li><a href="#">Conditions générales</a></li>
            <li><a href="#">Livraison & Retours</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Contact</h4>
          <p><i class="fas fa-map-marker-alt"></i> Sale , Sidi Moussa</p>
          <p><i class="fas fa-phone"></i> +212 72 12 19 49</p>
          <p><i class="fas fa-envelope"></i> dahiyoussef@gmail.com</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 ShopMaster. Tous droits réservés.</p>
      </div>
    </footer>
  </div>

  <script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
</body>
</html>