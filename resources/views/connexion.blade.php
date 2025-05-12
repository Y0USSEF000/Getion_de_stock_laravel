<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ShopMaster</title>
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

        .login-page {
            width: 100%;
            max-width: 1200px;
            padding: 2rem;
        }

        .login-container {
            display: flex;
            background: rgba(30, 30, 30, 0.8);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5), var(--glow);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.5s ease;
        }

        .login-container:hover {
            box-shadow: 0 0 40px rgba(0, 255, 115, 0.8);
            border-color: var(--primary);
        }

        .login-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background: rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 255, 136, 0.1), rgba(0, 183, 255, 0.1));
            z-index: 1;
        }

        .login-image img {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 10px;
            z-index: 2;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.5s ease;
        }

        .login-image:hover img {
            transform: scale(1.03);
            box-shadow: 0 15px 40px rgba(0, 255, 115, 0.3);
        }

        .login-box {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-box h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--primary);
            text-shadow: var(--glow);
            letter-spacing: 1px;
            position: relative;
            text-align: center;
        }

        .login-box h2::after {
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

        .error {
            color: var(--danger);
            background: rgba(255, 85, 85, 0.15);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid var(--danger);
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

        .links {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .links a {
            color: var(--primary-light);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .links a:hover {
            color: var(--primary);
            text-shadow: 0 0 8px rgba(0, 255, 115, 0.5);
        }

        .links a i {
            font-size: 0.9rem;
        }

        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
            }

            .login-image {
                padding: 2rem 2rem 0;
            }

            .login-image img {
                max-height: 300px;
            }

            .login-box {
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .login-page {
                padding: 1rem;
            }

            .login-box h2 {
                font-size: 2rem;
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

    <div class="login-page">
        <div class="login-container">
            <div class="login-image">
                <img src="{{ asset('images/image2.jpg') }}" alt="Login Image">
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
                    <a href="{{ route('create') }}"><i class="fas fa-user-plus"></i> Créer un compte</a> 
                    <a href="{{ url('/connexionadmin') }}"><i class="fas fa-user-shield"></i> Connexion Admin</a>
                    <a href="{{ url('/') }}"><i class="fas fa-home"></i> Retour à l'accueil</a>
                </div>
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