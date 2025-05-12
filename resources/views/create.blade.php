<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte - ShopMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00ff88;
            --primary-dark: #00cc66;
            --primary-light: #00ffaa;
            --bg-dark: #0a0a0a;
            --bg-darker: #050505;
            --bg-light: #1a1a1a;
            --text: #e0e0e0;
            --text-dark: #b0b0b0;
            --accent: #00b7ff;
            --danger: #ff5555;
            --success: #00ff73;
            --glow: 0 0 15px rgba(0, 255, 115, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: radial-gradient(circle at center, var(--bg-dark), var(--bg-darker));
            color: var(--text);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Floating particles animation */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(0, 255, 136, 0.2);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }

        .sign-up-page {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
        }

        .sign-up-container {
            background: rgba(30, 30, 30, 0.8);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5), var(--glow);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.5s ease;
        }

        .sign-up-container:hover {
            box-shadow: 0 0 40px rgba(0, 255, 115, 0.8);
            border-color: var(--primary);
        }

        .sign-up-box h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: var(--primary);
            text-shadow: var(--glow);
            letter-spacing: 1px;
            text-align: center;
            position: relative;
        }

        .sign-up-box h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .error-message {
            color: var(--danger);
            background: rgba(255, 85, 85, 0.15);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid var(--danger);
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        .success-message {
            color: var(--success);
            background: rgba(0, 255, 115, 0.15);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid var(--success);
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        input {
            padding: 1rem 1.5rem;
            background: rgba(42, 42, 42, 0.7);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 10px;
            color: var(--text);
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(51, 51, 51, 0.8);
            box-shadow: 0 0 15px rgba(0, 255, 115, 0.3);
            transform: translateY(-2px);
        }

        input::placeholder {
            color: var(--text-dark);
        }

        button {
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #111;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 255, 115, 0.3);
            margin-top: 1rem;
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        button:hover::before {
            left: 100%;
        }

        button:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 255, 115, 0.5);
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-dark);
        }

        .login-link a {
            color: var(--primary-light);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: var(--primary);
            text-shadow: 0 0 8px rgba(0, 255, 115, 0.5);
        }

        @media (max-width: 768px) {
            .sign-up-page {
                padding: 1rem;
            }

            .sign-up-container {
                padding: 2rem;
            }

            .sign-up-box h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .sign-up-container {
                padding: 1.5rem;
            }

            input, button {
                padding: 0.8rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating particles background -->
    <div class="particles" id="particles"></div>

    <div class="sign-up-page">
        <div class="sign-up-container">
            <div class="sign-up-box">
                <h2><i class="fas fa-user-plus"></i> Créez votre compte ShopMaster</h2>

                @if(session('error'))
                    <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</p>
                @endif

                @if(session('success'))
                    <p class="success-message"><i class="fas fa-check-circle"></i> {{ session('success') }}</p>
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
                    <button type="submit"><i class="fas fa-user-plus"></i> Créer un compte</button>
                </form>

                <p class="login-link">
                    Déjà un compte ? <a href="{{ route('connexion') }}"><i class="fas fa-sign-in-alt"></i> Connectez-vous</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = Math.floor(window.innerWidth / 10);
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 1px and 3px
                const size = Math.random() * 2 + 1;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random animation duration between 10s and 30s
                const duration = Math.random() * 20 + 10;
                particle.style.animationDuration = `${duration}s`;
                
                // Random delay
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        window.addEventListener('load', createParticles);
    </script>
</body>
</html>