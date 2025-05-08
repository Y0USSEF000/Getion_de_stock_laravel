<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Messages</title>
    <style>
       body {
        background-color: #0a0a0a;
        color: #00ff73;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background-color: #121212;
        padding: 20px 0;
        box-shadow: 0 0 15px #00ff73;
        width: 100%;
        text-align: center;
    }

    .logo {
        font-size: 2.5em;
        text-shadow: 0 0 15px #00ff73;
        letter-spacing: 2px;
    }

    main {
        flex: 1;
        width: 90%;
        max-width: 1100px;
        margin: 40px auto;
        padding: 20px 0;
    }

    h1 {
        font-size: 3em;
        text-shadow: 0 0 20px #00ff73;
        margin-bottom: 40px;
        animation: fadeInDown 0.8s ease-out;
        text-align: center;
    }

    .messages-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 25px;
        margin: 0 auto;
    }

    .message-card {
        background-color: #121212;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 0 15px #00ff73;
        border: 1px solid rgba(0, 255, 115, 0.3);
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease-out;
    }

    .message-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 25px #00ff73;
        border-color: #00ff73;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(0, 255, 115, 0.3);
    }

    .message-id {
        background-color: rgba(0, 255, 115, 0.1);
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: bold;
    }

    .message-date {
        color: #00cc60;
        font-size: 0.9em;
    }

    .message-content {
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .message-email {
        color: #00ff73;
        text-decoration: none;
        display: block;
        margin: 10px 0;
        word-break: break-all;
    }

    .message-email:hover {
        text-decoration: underline;
    }

    .no-messages {
        margin-top: 60px;
        font-size: 1.8em;
        color: #ff3c3c;
        animation: fadeIn 1s ease-in;
        text-align: center;
    }

    footer {
        background-color: #121212;
        padding: 20px 0;
        text-align: center;
        box-shadow: 0 0 15px #00ff73;
        margin-top: 40px;
    }

    .footer-links {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-bottom: 15px;
    }

    .footer-link {
        color: #00ff73;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-link:hover {
        text-shadow: 0 0 10px #00ff73;
    }

    .copyright {
        font-size: 0.9em;
        color: #00cc60;
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

    @media (max-width: 768px) {
        .messages-container {
            grid-template-columns: 1fr;
        }
        
        h1 {
            font-size: 2.2em;
        }
    }
    </style>
</head>
<body>
    <header>
        <div class="logo">SUPPORT CENTER</div>
    </header>

    <main>
        <h1>Support Messages</h1>

        @if($messages->count() > 0)
            <div class="messages-container">
                @foreach($messages as $message)
                    <div class="message-card">
                        <div class="card-header">
                            <span class="message-id">#{{ $message->id }}</span>
                            <span class="message-date">{{ $message->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="message-content">
                            <strong>{{ $message->name }}</strong>
                            <a href="mailto:{{ $message->email }}" class="message-email">{{ $message->email }}</a>
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-messages">
                No support messages found.
            </div>
        @endif
    </main>

    <footer>
        <div class="footer-links">
            <a href="{{url('/')}}" class="footer-link">Home</a>
            <a href="{{ url('/pageadmin') }}" class="footer-link">Last Page</a>
            <a href="{{ url('/admin/users') }}" class="footer-link">users</a>
        </div>
        <div class="copyright">
            &copy; 2023 CyberSupport. All rights reserved.
        </div>
    </footer>
</body>
</html>