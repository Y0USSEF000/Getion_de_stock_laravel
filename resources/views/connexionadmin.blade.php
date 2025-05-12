<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin - ShopMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00a859;
            --primary-light: #00c971;
            --primary-dark: #00874a;
            --bg-dark: #121212;
            --bg-light: #1e1e1e;
            --text: #f5f5f5;
            --text-light: #e0e0e0;
            --text-dark: #b0b0b0;
            --border: #2e2e2e;
            --error: #ff4d4d;
            --success: #00c853;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1.6;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }

        .login-card {
            background-color: var(--bg-light);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-icon {
            background-color: rgba(0, 168, 89, 0.1);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary);
            font-size: 1.5rem;
            border: 1px solid rgba(0, 168, 89, 0.3);
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-light);
        }

        .login-subtitle {
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .error-message {
            background-color: rgba(255, 77, 77, 0.1);
            color: var(--error);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 77, 77, 0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1rem;
        }

        input {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 168, 89, 0.2);
            background-color: rgba(255, 255, 255, 0.08);
        }

        .login-btn {
            width: 100%;
            padding: 1rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .login-btn:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-footer {
            margin-top: 2rem;
            text-align: center;
        }

        .footer-link {
            color: var(--text-dark);
            font-size: 0.9rem;
            text-decoration: none;
            transition: color 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            margin: 0 0.8rem;
        }

        .footer-link:hover {
            color: var(--primary);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }
            
            .login-card {
                padding: 2rem 1.5rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
            
            .footer-link {
                display: block;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h1 class="login-title">Connexion Admin</h1>
                <p class="login-subtitle">Accès sécurisé au panneau d'administration</p>
            </div>

            @if (session('error'))
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.connexion') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Adresse Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" placeholder="admin@example.com" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>
                
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </button>
            </form>

            <div class="login-footer">
                <a href="{{ route('connexion') }}" class="footer-link">
                    <i class="fas fa-user"></i> Connexion utilisateur
                </a>
                <a href="{{ url('/') }}" class="footer-link">
                    <i class="fas fa-home"></i> Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</body>
</html>