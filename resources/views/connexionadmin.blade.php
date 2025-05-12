<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin - ShopMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
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
            --scanline: repeating-linear-gradient(
                0deg,
                rgba(0, 255, 136, 0.05),
                rgba(0, 255, 136, 0.05) 1px,
                transparent 1px,
                transparent 2px
            );
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
            position: relative;
        }

        /* Cyberpunk scanline effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--scanline);
            pointer-events: none;
            z-index: 1;
            opacity: 0.3;
        }

        /* Grid overlay */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(0, 255, 136, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 136, 0.03) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
            z-index: 1;
        }

        .login-page {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .login-container {
            background: rgba(20, 20, 20, 0.9);
            border-radius: 10px;
            padding: 3rem;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.7), var(--glow);
            border: 1px solid var(--primary);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
        }

        /* Animated border effect */
        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                transparent, transparent, transparent,
                var(--primary), transparent, transparent, transparent
            );
            animation: rotate 6s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-box {
            position: relative;
            z-index: 2;
        }

        .login-box h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: var(--primary);
            text-shadow: var(--glow);
            letter-spacing: 2px;
            text-align: center;
            position: relative;
        }

        .login-box h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .error {
            color: var(--danger);
            background: rgba(255, 85, 85, 0.15);
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            border: 1px solid var(--danger);
            text-align: center;
            font-size: 0.9rem;
            animation: glitch 0.5s linear;
        }

        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
            100% { transform: translate(0); }
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1.1rem;
        }

        input {
            width: 100%;
            padding: 1rem 1.5rem 1rem 3rem;
            background: rgba(30, 30, 30, 0.7);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 5px;
            color: var(--text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 10px rgba(0, 255, 115, 0.5);
            background: rgba(40, 40, 40, 0.9);
        }

        input::placeholder {
            color: var(--text-dark);
            letter-spacing: 1px;
        }

        button {
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #111;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 255, 115, 0.3);
            letter-spacing: 1px;
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
            box-shadow: 0 0 25px rgba(0, 255, 115, 0.6);
            transform: translateY(-2px);
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
            font-size: 0.9rem;
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
            font-size: 0.8rem;
        }

        /* Security terminal animation */
        .terminal-line {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: var(--primary);
            font-family: 'Courier New', monospace;
            font-size: 0.7rem;
            opacity: 0.5;
            animation: terminal 15s linear infinite;
        }

        @keyframes terminal {
            0% { transform: translateY(0); opacity: 0; }
            5% { opacity: 1; }
            95% { opacity: 1; }
            100% { transform: translateY(-100px); opacity: 0; }
        }

        @media (max-width: 768px) {
            .login-page {
                padding: 1rem;
            }

            .login-container {
                padding: 2rem;
            }

            .login-box h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }

            input {
                padding: 0.8rem 0.8rem 0.8rem 2.5rem;
            }

            .input-group i {
                left: 10px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <div class="login-box">
                <h2><i class="fas fa-user-shield"></i> Connexion Admin</h2>

                @if (session('error'))
                    <div class="error"><i class="fas fa-exclamation-triangle"></i> {{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('admin.connexion') }}">
                    @csrf
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Adresse Email" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
                </form>

                <div class="links">
                    <a href="{{ route('connexion') }}"><i class="fas fa-exchange-alt"></i> Basculer vers utilisateur</a>
                    <a href="{{ url('/') }}"><i class="fas fa-home"></i> Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Terminal animation lines -->
    <div class="terminal-line">> Initializing security protocol...</div>
    <div class="terminal-line">> Checking credentials database...</div>
    <div class="terminal-line">> Firewall active...</div>
    <div class="terminal-line">> Encryption enabled...</div>
    <div class="terminal-line">> Admin access required...</div>

    <script>
        // Make terminal lines appear sequentially
        const terminalLines = document.querySelectorAll('.terminal-line');
        terminalLines.forEach((line, index) => {
            line.style.animationDelay = `${index * 3}s`;
        });

        // Add a subtle glitch effect to the title on hover
        const title = document.querySelector('.login-box h2');
        title.addEventListener('mouseenter', () => {
            title.style.animation = 'glitch 0.3s linear';
            setTimeout(() => {
                title.style.animation = '';
            }, 300);
        });
    </script>
</body>
</html>