<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopMaster</title>
  <link href="{{ asset('css/page1.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="app">
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
        <div class="user-dropdown">
          
      </nav>
    </header>

    <main class="main">
      <section class="section">
        <h2 class="section-title">Dashboard</h2>
        <div class="card-grid">
          <!-- Users -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-users"></i></div>
              <h3 class="card-title">Users</h3>
            </div>
            <div class="card-value">1,248</div>
            <p class="card-text">+12% this month</p>
          </div>

          <!-- Sales -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
              <h3 class="card-title">Sales</h3>
            </div>
            <div class="card-value">356</div>
            <p class="card-text">+8% this month</p>
          </div>

          <!-- Revenue -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
              <h3 class="card-title">Revenue</h3>
            </div>
            <div class="card-value">$24,780</div>
            <p class="card-text">-3% this month</p>
          </div>

          <!-- Stock -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-boxes"></i></div>
              <h3 class="card-title">Stock</h3>
            </div>
            <div class="card-value">5,200</div>
            <p class="card-text">+5% this month</p>
          </div>

          <!-- Quick Stats -->
          <div class="card">
            <div class="card-header">
              <div class="card-icon"><i class="fas fa-chart-line"></i></div>
              <h3 class="card-title">Sales Goal</h3>
            </div>
            <div class="card-value">75%</div>
            <div class="progress-bar">
              <div class="progress" style="width: 75%;"></div>
            </div>
            <p class="card-text">Goal: 500 sales</p>
          </div>
        </div>
      </section>

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
              <a href="{{url('/Technology')}}" class="category-link">Discover <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>

          <!-- Books -->
          <div class="category-card">
            <div class="category-image-container">
              <img src="./images/books.jpeg" alt="Books" class="category-image">
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
        <span class="modal-close" onclick="closeModal()">×</span>
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
      <div class="newsletter">   
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