<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="{{ asset('css/adminconnexion.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
          

            <div class="login-box">
                <h2>Connexion Admin</h2>

                @if (session('error'))
                    <div class="error">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('admin.connexion') }}">
                @csrf
                    <input type="email" name="email" placeholder="Adresse Email" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit">Se connecter</button>
                </form>

                <div class="links">
                    <a href="{{ route('connexion') }}">Basculer vers un autre formulaire</a>
                    <a href="{{ url('/') }}">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
