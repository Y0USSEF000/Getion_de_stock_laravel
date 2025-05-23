<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopMaster</title>
  <link href="{{ asset('css/page1.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* General Styling */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      background-color: #000000;
      color: #ffffff;
    }

    /* Top Loading Bar */
    #top-loader {
      width: 0%;
      height: 4px;
      background: linear-gradient(to right, #00cc5f, #00994c);
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9999;
      animation: loadBar 2s forwards;
    }

    @keyframes loadBar {
      0% { width: 0%; }
      50% { width: 70%; }
      100% { width: 100%; }
    }

    /* Header Styling */
    .header {
      background: linear-gradient(135deg, #000000, #1a1a1a);
      padding: 15px 30px;
      box-shadow: 0 2px 5px rgba(0,204,95,0.2);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo span {
      font-size: 1.8rem;
      font-weight: bold;
      color: #00cc5f;
      letter-spacing: 2px;
    }

    .nav {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .nav-link {
      color: #ffffff;
      text-decoration: none;
      font-size: 1rem;
      padding: 8px 15px;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .nav-link:hover, .nav-link.active {
      background: #00cc5f;
      color: #000000;
    }

    /* Hero Section */
    .hero-section {
      background: url('https://images.unsplash.com/photo-1504672281656-e3e7b0afeb55') no-repeat center center/cover;
      height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #ffffff;
      position: relative;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.7);
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero-content h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .hero-content p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .hero-content .cta-button {
      background: #00cc5f;
      color: #000000;
      padding: 12px 25px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .hero-content .cta-button:hover {
      background: #00994c;
    }

    /* Section Styling */
    .section {
      padding: 40px 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .section-title {
      font-size: 2rem;
      color: #ffffff;
      margin-bottom: 30px;
      text-align: center;
    }

    /* Recent Activity */
    .activity-list {
      display: grid;
      gap: 20px;
    }

    .activity-item {
      background: #1a1a1a;
      padding: 15px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 15px;
      box-shadow: 0 2px 5px rgba(0,204,95,0.1);
      transition: transform 0.3s;
    }

    .activity-item:hover {
      transform: translateY(-5px);
    }

    .activity-icon {
      font-size: 1.5rem;
      color: #00cc5f;
    }

    .activity-text {
      font-weight: bold;
      color: #ffffff;
    }

    .activity-time {
      color: #999999;
      font-size: 0.9rem;
    }

    /* Product Highlights */
    .product-highlights {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .product-card {
      background: #1a1a1a;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,204,95,0.1);
      transition: transform 0.3s;
    }

    .product-card:hover {
      transform: translateY(-10px);
    }

    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-info {
      padding: 15px;
      text-align: center;
    }

    .product-info h3 {
      font-size: 1.3rem;
      color: #ffffff;
      margin-bottom: 10px;
    }

    .product-info p {
      color: #999999;
      font-size: 0.9rem;
      margin-bottom: 15px;
    }

    .product-info .product-link {
      color: #00cc5f;
      text-decoration: none;
      font-weight: bold;
    }

    /* Categories Grid */
    .categories-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .category-card {
      background: #1a1a1a;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,204,95,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .category-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 15px rgba(0,204,95,0.2);
    }

    .category-image-container {
      position: relative;
      height: 200px;
    }

    .category-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .category-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      transition: background 0.3s;
    }

    .category-card:hover .category-overlay {
      background: rgba(0,0,0,0.7);
    }

    .category-info {
      padding: 15px;
      text-align: center;
    }

    .category-name {
      font-size: 1.5rem;
      color: #ffffff;
      margin-bottom: 10px;
    }

    .category-description {
      color: #999999;
      font-size: 0.9rem;
      margin-bottom: 15px;
    }

    .category-link {
      color: #00cc5f;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    .category-link:hover {
      color: #00994c;
    }

    /* Floating Button */
    .floating-button {
      position: fixed;
      bottom: 80px;
      right: 30px;
      background: #00cc5f;
      color: #000000;
      border: none;
      padding: 15px;
      border-radius: 50%;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 0 10px #00cc5f;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0 0 rgba(0,204,95,0.7); }
      70% { box-shadow: 0 0 0 20px rgba(0,204,95,0); }
      100% { box-shadow: 0 0 0 0 rgba(0,204,95,0); }
    }

    .floating-button:hover {
      background: #00994c;
    }

    /* Modal Styling */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.8);
      z-index: 1000;
    }

    .modal-content {
      background: #1a1a1a;
      margin: 10% auto;
      padding: 20px;
      width: 90%;
      max-width: 400px;
      border-radius: 10px;
      position: relative;
      color: #ffffff;
    }

    .modal-close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 1.5rem;
      cursor: pointer;
      color: #ffffff;
    }

    .modal-title {
      font-size: 1.5rem;
      margin-bottom: 20px;
      text-align: center;
    }

    .modal-actions {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .modal-link {
      color: #00cc5f;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .modal-link:hover {
      background: #00cc5f;
      color: #000000;
    }

    /* Footer Styling */
    .footer {
      background: #000000;
      color: #ffffff;
      padding: 40px 20px;
      text-align: center;
    }

    .footer-social {
      margin-bottom: 20px;
    }

    .social-link {
      color: #ffffff;
      font-size: 1.5rem;
      margin: 0 10px;
      transition: color 0.3s;
    }

    .social-link:hover {
      color: #00cc5f;
    }

    .footer p {
      margin: 10px 0;
      font-size: 0.9rem;
    }

    .footer a {
      color: #00cc5f;
      text-decoration: none;
      margin: 0 5px;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    /* Scroll to Top Button */
    #scrollTopBtn {
      display: none;
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 99;
      background: #00cc5f;
      color: #000000;
      border: none;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      font-size: 18px;
      cursor: pointer;
      box-shadow: 0 0 10px #00cc5f;
      transition: background 0.3s;
    }

    .scrollTopBtn:hover {
      background: #00994c;
      box-shadow: 0 0 15px #00cc5f;
    }
  </style>
</head>

<body class="app">
  <div id="top-loader"></div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <header class="header">
      <div class="logo">
        <span>ShopMaster</span>
      </div>
      <nav class="nav">
        <a href="/" class="nav-link active">Home</a>
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        <a href="{{ route('ajouter-produit') }}" class="nav-link">Add a Product</a>
        <div class="user-dropdown"></div>
      </nav>
    </header>

    <main class="main">
      <!-- Hero Section -->
      <section class="hero-section">
        <div class="hero-content">
          <h1>Welcome to ShopMaster</h1>
          <p>Discover the latest trends and manage your inventory with ease.</p>
          <a href="{{ url('/stockshopmaster') }}" class="cta-button">Shop Now</a>
        </div>
      </section>

      <!-- Recent Activity -->
      <section class="section">
        <h2 class="section-title">Recent Activity</h2>
        <div class="activity-list">
          <div class="activity-item">
            <i class="fas fa-plus-circle activity-icon"></i>
            <div class="activity-details">
              <p class="activity-text">New product added: Summer 2023 T-Shirt</p>
              <span class="activity-time">2 hours ago</span>
            </div>
          </div>
          <div class="activity-item">
            <i class="fas fa-shopping-cart activity-icon"></i>
            <div class="activity-details">
              <p class="activity-text">Sale completed: Smartphone X</p>
              <span class="activity-time">5 hours ago</span>
            </div>
          </div>
          <div class="activity-item">
            <i class="fas fa-boxes activity-icon"></i>
            <div class="activity-details">
              <p class="activity-text">Stock updated: Video Games</p>
              <span class="activity-time">Yesterday</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Product Highlights -->
      <section class="section">
        <h2 class="section-title">Featured Products</h2>
        <div class="product-highlights">
          <div class="product-card">
            <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90" alt="Headphones" class="product-image">
            <div class="product-info">
              <h3>Wireless Headphones</h3>
              <p>Immersive sound with noise cancellation.</p>
              <a href="#" class="product-link">Shop Now</a>
            </div>
          </div>
          <div class="product-card">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Sneakers" class="product-image">
            <div class="product-info">
              <h3>Trendy Sneakers</h3>
              <p>Comfort and style for everyday wear.</p>
              <a href="#" class="product-link">Shop Now</a>
            </div>
          </div>
          <div class="product-card">
            <img src="https://images.unsplash.com/photo-1612817159949-195b6eb9e31a" alt="Smartwatch" class="product-image">
            <div class="product-info">
              <h3>Smartwatch Pro</h3>
              <p>Track your fitness and stay connected.</p>
              <a href="#" class="product-link">Shop Now</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Categories -->
      <section class="section">
        <h2 class="section-title">Our Categories</h2>
        <div class="categories-grid">
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f" alt="Fashion" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Clothing</h3>
              <p class="category-description">Spring-Summer 2023 Collections</p>
              <a href="{{ url('/clothes') }}" class="category-link">View <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1518770660439-4636190af475" alt="High-tech" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Electronics</h3>
              <p class="category-description">Latest Technology</p>
              <a href="{{ url('/Technology') }}" class="category-link">Discover <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="category-card">
            <div class="category-image-container">
              <img src="{{ asset('images/books.jpeg') }}" alt="Books" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Books</h3>
              <p class="category-description">Literature and New Releases</p>
              <a href="{{ url('/books') }}" class="category-link">Explore <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="category-card">
            <div class="category-image-container">
              <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e" alt="Gaming" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Video Games</h3>
              <p class="category-description">Recent Releases</p>
              <a href="{{ url('/video-games') }}" class="category-link">Play <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="category-card">
            <div class="category-image-container">
              <img src="{{ asset('images/3b3df1b1597885326387565c8c5eb0d4.jpg') }}" alt="Stock" class="category-image">
              <div class="category-overlay"></div>
            </div>
            <div class="category-info">
              <h3 class="category-name">Stock</h3>
              <p class="category-description">Inventory Product Management</p>
              <a href="{{ route('stockshopmaster') }}" class="category-link">View Stock <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Floating Action Button -->
    <button class="floating-button" onclick="openModal()">
      <i class="fas fa-plus"></i>
    </button>

    <!-- Modal -->
    <div class="modal" id="actionModal">
      <div class="modal-content">
        <span class="modal-close" onclick="closeModal()" aria-label="Close modal">×</span>
        <h3 class="modal-title">Quick Actions</h3>
        <div class="modal-actions">
          <a href="{{ route('ajouter-produit') }}" class="modal-link"><i class="fas fa-box"></i> Add a Product</a>
          <a href="#" class="modal-link"><i class="fas fa-chart-bar"></i> View Reports</a>
          <a href="#" class="modal-link"><i class="fas fa-users"></i> Manage Users</a>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="footer-social">
        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
      </div>
      <p>© {{ date('Y') }} Youssef Store. All rights reserved.</p>
      <p>
        <a href="#">Privacy</a> |
        <a href="#">Terms</a> |
        <a href="{{ route('contact') }}">Contact</a>
      </p>
    </footer>

    <!-- Scroll to Top -->
    <button onclick="topFunction()" id="scrollTopBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <script>
      function openModal() {
        document.getElementById('actionModal').style.display = 'block';
      }

      function closeModal() {
        document.getElementById('actionModal').style.display = 'none';
      }

      window.onclick = function(event) {
        const modal = document.getElementById('actionModal');
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      }

      let mybutton = document.getElementById("scrollTopBtn");

      window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      };

      function topFunction() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    </script>
  </form>
</body>
</html>