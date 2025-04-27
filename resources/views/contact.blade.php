<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support - ShopMaster</title>

    <!-- Lien vers le CSS -->
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    
    <!-- Font Awesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="support-container fade-in">

    <div class="support-header">
        <h1><i class="fas fa-headset"></i> Contactez-nous</h1>
        <p>Une question, une demande ou un souci ? Notre équipe est prête à vous aider !</p>
    </div>

    @if(session('success'))
        <div class="alert success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert error-alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="support-content">
        <!-- Formulaire -->
        <div class="support-form">
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Votre Nom</label>
                    <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text" id="subject" name="subject" class="@error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                    @error('subject')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="@error('message') is-invalid @enderror" rows="5" required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Envoyer
                </button>
            </form>
        </div>

        <!-- Informations -->
        <div class="support-info">
            <div class="info-card">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Notre Bureau</h3>
                <p>123 Avenue Principale<br> Sale, Maroc</p>
            </div>

            <div class="info-card">
                <i class="fas fa-clock"></i>
                <h3>Horaires</h3>
                <p>Lundi - Vendredi : 9h à 18h<br>Samedi : 10h à 14h</p>
            </div>

            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <h3>Nous écrire</h3>
                <p>support@shopmaster.com</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>
