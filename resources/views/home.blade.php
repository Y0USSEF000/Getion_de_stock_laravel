<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopMaster</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #00ff88;
      --primary-dark: #00cc66;
      --primary-light: #00ffaa;
      --bg-dark: #0a0a0a;
      --bg-darker: #050505;
      --bg-light: #1a1a1a;
      --text: #e0e0e0;
      --text-dark: #b0b0b0;
      --accent: #00b7ff;
      --danger: #ff5555;
      --success: #00ff73;
      --glow: 0 0 15px rgba(0, 255, 115, 0.7);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: radial-gradient(circle at center, var(--bg-dark), var(--bg-darker));
      color: var(--text);
      line-height: 1.6;
    }

    .homepage {
      overflow-x: hidden;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.5rem 5%;
      background: rgba(15, 15, 15, 0.9);
      backdrop-filter: blur(10px);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
      transition: all 0.3s ease;
      border-bottom: 1px solid rgba(0, 255, 136, 0.2);
    }

    .navbar.scrolled {
      padding: 1rem 5%;
      box-shadow: var(--glow);
    }

    .navbar h2 {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: 1px;
      background: linear-gradient(to right, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
    }

    .navbar ul {
      display: flex;
      list-style: none;
      gap: 2rem;
    }

    .navbar a {
      text-decoration: none;
      color: var(--primary-light);
      font-weight: 500;
      position: relative;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .navbar a i {
      font-size: 1.1rem;
    }

    .navbar a:hover {
      color: var(--primary);
    }

    .navbar a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary);
      transition: width 0.3s ease;
    }

    .navbar a:hover::after {
      width: 100%;
    }

    .hero {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 5%;
      margin-top: 70px;
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(30, 30, 30, 0.8));
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.unsplash.com/photo-1551434678-e076c223a692') no-repeat center center/cover;
      opacity: 0.15;
      z-index: -1;
    }

    .hero h1 {
      font-family: 'Orbitron', sans-serif;
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      font-weight: 700;
      color: var(--primary);
      text-shadow: var(--glow);
      letter-spacing: 1px;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      color: var(--text-dark);
      max-width: 600px;
    }

    .hero button {
      padding: 1rem 2.5rem;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: #111;
      border: none;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: var(--glow);
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .hero button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.7s ease;
      z-index: -1;
    }

    .hero button:hover::before {
      left: 100%;
    }

    .hero button:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 25px rgba(0, 255, 115, 0.8);
    }

    .features {
      padding: 5rem 5%;
      text-align: center;
      background: var(--bg-light);
    }

    .features h2 {
      font-family: 'Orbitron', sans-serif;
      font-size: 2.5rem;
      margin-bottom: 3rem;
      color: var(--primary);
      position: relative;
      display: inline-block;
      text-shadow: 0 0 10px rgba(0, 255, 115, 0.5);
    }

    .features h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: linear-gradient(to right, var(--primary), var(--accent));
      border-radius: 3px;
    }

    .feature-list {
      display: flex;
      justify-content: center;
      gap: 3rem;
      flex-wrap: wrap;
    }

    .feature {
      flex: 1;
      min-width: 250px;
      max-width: 350px;
      padding: 2.5rem;
      background: rgba(30, 30, 30, 0.7);
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
      border: 1px solid rgba(0, 255, 136, 0.2);
      backdrop-filter: blur(5px);
    }

    .feature:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 30px rgba(0, 255, 115, 0.3);
      border-color: var(--primary);
    }

    .feature i {
      font-size: 2.5rem;
      margin-bottom: 1.5rem;
      color: var(--primary);
    }

    .feature h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary-light);
    }

    .feature p {
      color: var(--text-dark);
      line-height: 1.7;
    }

    .categories {
      padding: 5rem 5%;
      text-align: center;
      background: var(--bg-dark);
    }

    .categories h2 {
      font-family: 'Orbitron', sans-serif;
      font-size: 2.5rem;
      margin-bottom: 3rem;
      color: var(--primary);
      position: relative;
      display: inline-block;
      text-shadow: 0 0 10px rgba(0, 255, 115, 0.5);
    }

    .categories h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: linear-gradient(to right, var(--primary), var(--accent));
      border-radius: 3px;
    }

    .category-list {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .category {
      padding: 1.5rem 2.5rem;
      background: rgba(30, 30, 30, 0.7);
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border: 1px solid rgba(0, 255, 136, 0.2);
      color: var(--text);
      backdrop-filter: blur(5px);
    }

    .category:hover {
      background: var(--primary);
      color: #111;
      transform: translateY(-5px);
      box-shadow: 0 0 25px rgba(0, 255, 115, 0.5);
      border-color: var(--primary);
    }

    .gallery {
      padding: 5rem 5%;
      text-align: center;
      background: var(--bg-light);
    }

    .gallery h2 {
      font-family: 'Orbitron', sans-serif;
      font-size: 2.5rem;
      margin-bottom: 3rem;
      color: var(--primary);
      position: relative;
      display: inline-block;
      text-shadow: 0 0 10px rgba(0, 255, 115, 0.5);
    }

    .gallery h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: linear-gradient(to right, var(--primary), var(--accent));
      border-radius: 3px;
    }

    .image-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .gallery-item {
      position: relative;
      border-radius: 15px;
      overflow: hidden;
      height: 350px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
      border: 1px solid rgba(0, 255, 136, 0.2);
    }

    .gallery-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 30px rgba(0, 255, 115, 0.5);
      border-color: var(--primary);
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: all 0.5s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
      color: white;
      padding: 2rem;
      text-align: left;
    }

    .overlay h3 {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      color: var(--primary);
    }

    .overlay p {
      font-size: 1rem;
      opacity: 0.9;
      color: var(--text);
    }

    .professional-footer {
      background: linear-gradient(135deg, var(--bg-dark), var(--bg-darker));
      color: white;
      padding: 5rem 5% 2rem;
      border-top: 1px solid rgba(0, 255, 136, 0.2);
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-section h3 {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.8rem;
      margin-bottom: 1.5rem;
      background: linear-gradient(to right, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .footer-section p {
      margin-bottom: 1.5rem;
      color: var(--text-dark);
      line-height: 1.7;
    }

    .social-icons {
      display: flex;
      gap: 1.5rem;
    }

    .social-icons a {
      color: var(--text-dark);
      font-size: 1.5rem;
      transition: all 0.3s ease;
    }

    .social-icons a:hover {
      color: var(--primary);
      transform: translateY(-5px);
      text-shadow: var(--glow);
    }

    .footer-section h4 {
      font-size: 1.3rem;
      margin-bottom: 1.5rem;
      color: var(--primary-light);
    }

    .footer-section ul {
      list-style: none;
    }

    .footer-section li {
      margin-bottom: 1rem;
    }

    .footer-section a {
      color: var(--text-dark);
      text-decoration: none;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .footer-section a:hover {
      color: var(--primary);
      padding-left: 5px;
    }

    .footer-section i {
      color: var(--primary);
    }

    .footer-bottom {
      text-align: center;
      padding-top: 3rem;
      margin-top: 3rem;
      border-top: 1px solid rgba(0, 255, 136, 0.1);
      color: var(--text-dark);
    }

    /* Floating particles animation */
    .particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .particle {
      position: absolute;
      background: rgba(0, 255, 136, 0.3);
      border-radius: 50%;
      animation: float linear infinite;
    }

    @keyframes float {
      0% { transform: translateY(0) translateX(0); opacity: 0; }
      50% { opacity: 1; }
      100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
    }

    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        padding: 1rem;
      }

      .navbar ul {
        margin-top: 1rem;
        gap: 1rem;
      }

      .hero h1 {
        font-size: 2.5rem;
      }

      .hero p {
        font-size: 1rem;
      }

      .feature {
        min-width: 100%;
      }

      .category {
        padding: 1rem 1.5rem;
      }
    }

    @media (max-width: 480px) {
      .hero h1 {
        font-size: 2rem;
      }

      .categories h2, .features h2, .gallery h2 {
        font-size: 2rem;
      }

      .footer-content {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <!-- Floating particles background -->
  <div class="particles" id="particles"></div>

  <div class="homepage">
    <nav class="navbar">
      <h2>ShopMaster</h2>
    
    </nav>

    <header class="hero">
      <h1>Bienvenue sur <span>ShopMaster</span></h1>
      <p>Votre boutique en ligne pour tous vos besoins !</p>
      <a href="{{ route('login.submit') }}"><button>Explorer maintenant</button></a>
    </header>

    <section class="features">
      <h2>Pourquoi nous choisir ?</h2>
      <div class="feature-list">
        <div class="feature">
          <i class="fas fa-truck"></i>
          <h3>Livraison rapide</h3>
          <p>Recevez vos produits en un temps record !</p>
        </div>
        <div class="feature">
          <i class="fas fa-award"></i>
          <h3>Produits de qualité</h3>
          <p>Nous sélectionnons uniquement les meilleurs articles.</p>
        </div>
        <div class="feature">
          <i class="fas fa-headset"></i>
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
        <div class="category">📚 Livres</div>
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
          <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f" alt="Livres">
          <div class="overlay">
            <h3>Livres</h3>
            <p>Découvrez notre collection littéraire</p>
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
            <li><a href="#"><i class="fas fa-chevron-right"></i> Accueil</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Boutique</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> À propos</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Informations</h4>
          <ul>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Politique de confidentialité</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Conditions générales</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Livraison & Retours</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
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

    // Create floating particles
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = Math.floor(window.innerWidth / 10);
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        // Random size between 1px and 3px
        const size = Math.random() * 2 + 1;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Random animation duration between 10s and 30s
        const duration = Math.random() * 20 + 10;
        particle.style.animationDuration = `${duration}s`;
        
        // Random delay
        particle.style.animationDelay = `${Math.random() * 5}s`;
        
        particlesContainer.appendChild(particle);
      }
    }

    // Initialize particles when page loads
    window.addEventListener('load', createParticles);
  </script>
</body>
</html>