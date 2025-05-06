<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil - ShopMaster</title>
  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="app">
  <form method="POST" enctype="multipart/form-data">
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
        <a href="{{ route('home') }}" class="nav-link">Accueil</a>
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        <a href="{{ route('ajouter-produit') }}" class="nav-link">Ajouter un produit</a>
        <a href="{{ route('profile') }}" class="nav-link active">Profil</a>
      </nav>
    </header>

    <main class="main">
      <section class="section">
        <h2 class="section-title">Mon Profil</h2>
        <div class="profile-container">
          <!-- Profile Card -->
          <div class="profile-card">
            <div class="profile-image-container">
              <img src="{{ asset('images/default-profile.jpg') }}" alt="Photo de profil" class="profile-image">
              <div class="profile-overlay">
                <i class="fas fa-camera"></i>
              </div>
            </div>
            <h3 class="profile-name">Nom Utilisateur</h3>
            <p class="profile-email">utilisateur@shopmaster.com</p>
            <p class="profile-bio">Passionné par la gestion de stock et les nouvelles technologies.</p>
            <button class="profile-button" onclick="toggleEditForm()">Modifier le profil</button>
          </div>

          <!-- Edit Profile Form -->
          <div class="profile-edit-form" id="editForm" style="display: none;">
            <h3 class="form-title">Modifier le Profil</h3>
            <div class="form-group">
              <label for="name">Nom</label>
              <input type="text" id="name" name="name" value="Nom Utilisateur" class="form-input">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" value="utilisateur@shopmaster.com" class="form-input">
            </div>
            <div class="form-group">
              <label for="bio">Bio</label>
              <textarea id="bio" name="bio" class="form-input">Passionné par la gestion de stock et les nouvelles technologies.</textarea>
            </div>
            <div class="form-group">
              <label for="profile_image">Photo de profil</label>
              <input type="file" id="profile_image" name="profile_image" accept="image/*" class="form-input">
            </div>
            <div class="form-actions">
              <button type="submit" class="form-button">Enregistrer</button>
              <button type="button" class="form-button cancel" onclick="toggleEditForm()">Annuler</button>
            </div>
          </div>

          <!-- Account Settings -->
          <div class="account-settings">
            <h3 class="settings-title">Paramètres du Compte</h3>
            <div class="settings-item">
              <p>Changer le mot de passe</p>
              <button class="settings-button">Modifier</button>
            </div>
            <div class="settings-item">
              <p>Notifications</p>
              <label class="switch">
                <input type="checkbox" checked>
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>
      </section>
    </main>

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
    function toggleEditForm() {
      const form = document.getElementById('editForm');
      form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
  </script>
</body>
</html>