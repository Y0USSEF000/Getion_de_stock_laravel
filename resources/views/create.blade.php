    <!DOCTYPE html>
    <html>
    <head>
        <title>Créer un compte - ShopMaster</title>
        <link rel="stylesheet" href="{{ asset('css/SignUp.css') }}">
    </head>
    <body>
        <div class="sign-up-page">
            <div class="sign-up-container">
                <div class="sign-up-box">
                    <h2>Créez votre compte ShopMaster</h2>

                    @if(session('error'))
                        <p class="error-message">{{ session('error') }}</p>
                    @endif

                    @if(session('success'))
                        <p class="success-message">{{ session('success') }}</p>
                    @endif

                    <form method="POST" action="{{ route('create.submit') }}"> 
                    @csrf
                        <input
                            type="text"
                            name="username"
                            placeholder="Nom d'utilisateur"
                            value="{{ old('username') }}"
                            required
                        />
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
                        <button type="submit">Créer un compte</button>
                    </form>

                    <p class="login-link">
                        Déjà un compte ? <a href="{{ route('connexion') }}">Connectez-vous</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
    </html>