```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support - ShopMaster</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary: #00ff73;
            --primary-dark: #00d968;
            --background: #121212;
            --card: #1e1e1e;
            --text: #f0f0f0;
            --light-gray: #2e2e2e;
            --error: #ff4c4c;
            --shadow: 0 8px 16px rgba(0,0,0,0.4);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--background);
            color: var(--text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Top Loading Bar */
        #top-loader {
            width: 0%;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
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
            background: linear-gradient(135deg, #000000, var(--card));
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo span {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--text);
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 0.3rem;
            transition: background 0.3s, color 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--primary);
            color: var(--background);
        }

        /* Animation fade-in */
        .fade-in {
            animation: fadeIn 1s ease forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Container */
        .support-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        /* Support Header */
        .support-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .support-header h1 {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1.2rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .support-header p {
            max-width: 700px;
            margin: 0 auto;
            color: #ccc;
            font-size: 1.1rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            background-color: var(--card);
            border: 1px solid var(--primary);
            color: var(--primary);
            font-size: 1rem;
            text-align: center;
        }

        .success-alert {
            border-color: var(--primary);
            background-color: rgba(0, 255, 115, 0.1);
        }

        .error-alert {
            border-color: var(--error);
            color: var(--error);
            background-color: rgba(255, 76, 76, 0.1);
        }

        /* Content */
        .support-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        @media (max-width: 1024px) {
            .support-content {
                grid-template-columns: 1fr;
            }
        }

        /* Form Card */
        .support-form {
            background: var(--card);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .support-form:hover {
            transform: translateY(-5px);
        }

        /* Form */
        .form-group {
            margin-bottom: 1.8rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 600;
            color: var(--text);
            font-size: 1.1rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.9rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
            background-color: var(--light-gray);
            color: var(--text);
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 255, 115, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        /* Errors */
        .error-message {
            color: var(--error);
            font-size: 0.9rem;
            margin-top: 0.3rem;
        }

        .is-invalid {
            border-color: var(--error) !important;
            box-shadow: 0 0 0 3px rgba(255, 76, 76, 0.2);
        }

        /* Submit Button */
        .submit-btn {
            background-color: var(--primary);
            color: var(--background);
            border: none;
            padding: 1.2rem;
            width: 100%;
            font-weight: 700;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            animation: pulse 2s infinite;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: scale(1.05);
            box-shadow: 0 0 10px var(--primary);
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 255, 115, 0.7); }
            70% { box-shadow: 0 0 0 12px rgba(0, 255, 115, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 255, 115, 0); }
        }

        /* Info Cards */
        .support-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .info-card {
            background: var(--card);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .info-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 12px 24px rgba(0, 255, 115, 0.2);
        }

        .info-card i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1.2rem;
        }

        .info-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.8rem;
            color: var(--text);
        }

        .info-card p {
            color: #ccc;
            font-size: 1rem;
        }

        /* Footer Styling */
        .footer {
            background: var(--card);
            color: var(--text);
            padding: 3rem 2rem;
            text-align: center;
            border-top: 1px solid var(--light-gray);
        }

        .footer-social {
            margin-bottom: 1.5rem;
        }

        .social-link {
            color: var(--text);
            font-size: 1.8rem;
            margin: 0 1rem;
            transition: color 0.3s, transform 0.3s;
        }

        .social-link:hover {
            color: var(--primary);
            transform: scale(1.2);
        }

        .footer p {
            margin: 0.5rem 0;
            font-size: 1rem;
        }

        .footer a {
            color: var(--primary);
            text-decoration: none;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Scroll to Top Button */
        #scrollTopBtn {
            display: none;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 99;
            background: var(--primary);
            color: var(--background);
            border: none;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: background 0.3s, transform 0.3s;
        }

        #scrollTopBtn:hover {
            background: var(--primary-dark);
            transform: scale(1.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 1rem;
            }

            .nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .support-header h1 {
                font-size: 2.2rem;
            }

            .support-form, .info-card {
                padding: 1.5rem;
            }

            .submit-btn {
                padding: 1rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .support-container {
                margin: 1.5rem auto;
                padding: 0 1rem;
            }

            .support-header p {
                font-size: 1rem;
            }

            .form-group input, .form-group textarea {
                padding: 0.7rem;
            }

            .footer {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div id="top-loader"></div>

    <!-- Header -->
    <header class="header fade-in">
        <div class="logo">
            <span>ShopMaster</span>
        </div>
        <nav class="nav">
            <a href="{{ url('/page1') }}" class="nav-link">Accueil</a>
            <a href="{{ route('stockshopmaster') }}" class="nav-link active">stock</a>
            <a href="{{ url('/ajouter-produit') }}" class="nav-link">add product</a>
        </nav>
    </header>

    <div class="support-container fade-in">
        <div class="support-header">
            <h1><i class="fas fa-headset"></i> Contactez-nous</h1>
            <p>Une question, une demande ou un souci ? Notre équipe est prête à vous aider rapidement et efficacement !</p>
        </div>

        @if(session('success'))
            <div class="alert success-alert fade-in">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert error-alert fade-in">
                {{ session('error') }}
            </div>
        @endif

        <div class="support-content">
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
                    <p>123 Avenue Principale<br>Sale, Maroc</p>
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

    <!-- Footer -->
    <footer class="footer fade-in">
        <div class="footer-social">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p>Contactez-nous : <a href="mailto:support@shopmaster.com">support@shopmaster.com</a> | +212 123 456 789</p>
        <p>© {{ date('Y') }} ShopMaster. Tous droits réservés.</p>
        <p>
            <a href="#">Politique de confidentialité</a> |
            <a href="#">Conditions d'utilisation</a>
        </p>
    </footer>

    <!-- Scroll to Top -->
    <button onclick="topFunction()" id="scrollTopBtn" title="Retour en haut"><i class="fas fa-arrow-up"></i></button>

    <script>
        // Modal Functions
        function openModal() {
            document.getElementById('actionModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('actionModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('actionModal');
            if (modal && event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Scroll to Top
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
```