```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages de Support - ShopMaster</title>
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
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

        /* Main Content */
        main {
            flex: 1;
            width: 90%;
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        h1 {
            font-size: 3rem;
            color: var(--primary);
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 2rem;
            text-align: center;
            animation: fadeInDown 0.8s ease-out;
        }

        .messages-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .message-card {
            background: var(--card);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(0, 255, 115, 0.3);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out;
        }

        .message-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 255, 115, 0.2);
            border-color: var(--primary);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid rgba(0, 255, 115, 0.3);
        }

        .message-id {
            background: rgba(0, 255, 115, 0.1);
            padding: 0.4rem 0.8rem;
            border-radius: 1rem;
            font-weight: 600;
            color: var(--primary);
        }

        .message-date {
            color: #ccc;
            font-size: 0.9rem;
        }

        .message-content {
            margin-bottom: 1rem;
        }

        .message-content strong {
            color: var(--text);
            font-size: 1.2rem;
        }

        .message-email {
            color: var(--primary);
            text-decoration: none;
            display: block;
            margin: 0.5rem 0;
            word-break: break-all;
        }

        .message-email:hover {
            text-decoration: underline;
        }

        .message-subject {
            color: #ccc;
            font-style: italic;
            margin: 0.5rem 0;
        }

        .message-text {
            color: #ccc;
            line-height: 1.6;
        }

        .no-messages {
            margin-top: 3rem;
            font-size: 1.8rem;
            color: var(--error);
            text-align: center;
            animation: fadeIn 1s ease-in;
        }

        /* Footer Styling */
        footer {
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

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .footer-link {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .copyright {
            font-size: 0.9rem;
            color: #ccc;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .messages-container {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 2.2rem;
            }

            header {
                flex-direction: column;
                gap: 1rem;
            }

            .nav {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            main {
                margin: 1.5rem auto;
                padding: 0 1rem;
            }

            .message-card {
                padding: 1.5rem;
            }

            footer {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <span>ShopMaster</span>
        </div>
        <nav class="nav">
            <a href="{{ url('/') }}" class="nav-link">Accueil</a>
            <a href="{{ route('contact') }}" class="nav-link">Support</a>
            <a href="{{ route('messages') }}" class="nav-link active">Messages</a>
        </nav>
    </header>

    <main>
        <h1>Messages de Support</h1>

        @if($messages->count() > 0)
            <div class="messages-container">
                @foreach($messages as $message)
                    <div class="message-card">
                        <div class="card-header">
                            <span class="message-id">#{{ $message->id }}</span>
                            <span class="message-date">{{ $message->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="message-content">
                            <strong>{{ $message->name }}</strong>
                            <a href="mailto:{{ $message->email }}" class="message-email">{{ $message->email }}</a>
                            <p class="message-subject"><strong>Sujet:</strong> {{ $message->subject }}</p>
                            <p class="message-text">{{ $message->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-messages">
                Aucun message de support trouvé.
            </div>
        @endif
    </main>

    <footer>
        <div class="footer-social">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="footer-links">
            <a href="{{ url('/') }}" class="footer-link">Accueil</a>
            <a href="{{ route('contact') }}" class="footer-link">Support</a>
            <a href="{{ url('/admin/users') }}" class="footer-link">Utilisateurs</a>
        </div>
        <div class="copyright">
            © {{ date('Y') }} ShopMaster. Tous droits réservés.
        </div>
    </footer>
</body>
</html>