<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster</title>
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
    </head>
<body>
<div class="login-page">
    <div class="login-container">
        <div class="login-box">
            <div class="login-image">
                <img src="{{ asset('images/image1.png') }}" alt="Login Illustration">
            </div>
           

            <h2>Connexion à ShopMaster</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <input
                    type="email"
                    name="email"
                    placeholder="Adresse e-mail"
                    value="{{ old('email') }}"
                    required
                />
                <input
                    type="password"
                    name="password"
                    placeholder="Mot de passe"
                    required
                />
                <button type="submit">Se connecter</button>
            </form>

            <p class="signup-link">Pas encore de compte ?
                <a href="{{ route('register') }}">Inscrivez-vous</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
