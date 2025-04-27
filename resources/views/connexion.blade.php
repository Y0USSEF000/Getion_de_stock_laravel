<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <div class="login-image">
                <img src="{{ asset('images/image2.jpg') }}" alt="Logo">
            </div>

            <div class="login-box">
                <h2>Connexion</h2>

                @if (session('error'))
                    <div class="error">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">

                    @csrf
                    <input type="email" name="email" placeholder="Adresse Email" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit">Se connecter</button>
                </form>

                <div class="links">
                <a href="{{ route('create') }}">Créer un compte</a> 
                <a href="{{ route('connexionadmin') }}">Basculer vers un autre formulaire</a>
                <a href="{{ url('/') }}">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
