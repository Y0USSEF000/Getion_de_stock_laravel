  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster</title>
    <link href="{{ asset('css/page1.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
      /* Scroll To Top Button */
      #scrollTopBtn {
        display: none;
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 99;
        background-color: #00ff73;
        color: black;
        border: none;
        outline: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        box-shadow: 0 0 10px #00ff73;
        transition: 0.3s;
      }

      #scrollTopBtn:hover {
        background-color: #00cc5f;
        box-shadow: 0 0 15px #00ff73;
      }

      /* Top Loading Bar */
      #top-loader {
        width: 0%;
        height: 4px;
        background: #00ff73;
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

      /* Category Cards - Static Positioning */
      .category-card {
        opacity: 1; /* Always visible */
        transform: none; /* No translation */
        /* No animation */
      }

      /* Remove hover effects */
      .category-card:hover {
        box-shadow: none; /* No shadow on hover */
        transform: none; /* No scaling */
        transition: none; /* No transition */
      }

      /* Floating Button Animation */
      .floating-button {
        animation: pulse 2s infinite;
      }

      @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(0, 255, 115, 0.7); }
        70% { box-shadow: 0 0 0 20px rgba(0, 255, 115, 0); }
        100% { box-shadow: 0 0 0 0 rgba(0, 255, 115, 0); }
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
          <a href="#" class="nav-link active">Home</a>
          <a href="{{ route('contact') }}" class="nav-link">Contact</a>
          <a href="{{ route('ajouter-produit') }}" class="nav-link">Add a Product</a>
          <div class="user-dropdown"></div>
        </nav>
      </header>

      <main class="main">
        <section class="section"></section>

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

        <section class="section">
          <h2 class="section-title">Our Categories</h2>
          <div class="categories-grid">
            <!-- Clothing -->
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

            <!-- Electronics -->
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

            <!-- Books -->
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

            <!-- Video Games -->
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

            <!-- Stock -->
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
        <i class="fas fa-plus"></i> Actions
      </button>

      <!-- Modal -->
      <div class="modal" id="actionModal">
        <div class="modal-content">
          <span class="modal-close" onclick="closeModal()" aria-label="Close modal">&times;</span>
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
    </form>

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
  </body>
  </html>