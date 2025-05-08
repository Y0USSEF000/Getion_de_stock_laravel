<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ff73;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        main {
            flex: 1;
            width: 100%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            width: 100%;
            background-color: #1f1f1f;
            padding: 20px;
            box-shadow: 0 0 10px #00ff73;
            border-bottom: 1px solid #00ff73;
        }
        .nav {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav h2 {
            margin: 0;
            font-size: 1.8em;
            text-shadow: 0 0 5px #00ff73;
        }
        .nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        .nav ul li a {
            color: #00ff73;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .nav ul li a:hover {
            color: #00cc5a;
        }
        footer {
            width: 100%;
            background-color: #1f1f1f;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #00ff73;
            box-shadow: 0 0 10px #00ff73;
        }
        footer p {
            margin: 0;
            font-size: 0.9em;
        }
        footer ul {
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        footer ul li a {
            color: #00ff73;
            text-decoration: none;
            font-size: 0.9em;
            transition: 0.3s;
        }
        footer ul li a:hover {
            color: #00cc5a;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #00ff73;
        }
        .success-message {
            color: #00ff73;
            margin-bottom: 20px;
        }
        .search-form {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .search-form input[type="text"] {
            padding: 8px;
            border: 1px solid #00ff73;
            border-radius: 5px;
            background-color: #1a1a1a;
            color: #00ff73;
            width: 200px;
        }
        .search-form button {
            background-color: #00ff73;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #121212;
            cursor: pointer;
            transition: 0.3s;
        }
        .search-form button:hover {
            background-color: #00cc5a;
        }
        .sort-links {
            width: 90%;
            max-width: 1000px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            background-color: #1f1f1f;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px #00ff73;
        }
        .sort-links a {
            color: #00ff73;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .sort-links a:hover {
            color: #00cc5a;
        }
        .profiles-container {
            width: 90%;
            max-width: 1000px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .profile-card {
            background-color: #121212;
            border: 1px solid #00ff73;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px #00ff73;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .profile-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #00ff73;
            background-color: #1a1a1a;
        }
        .profile-card p {
            margin: 10px 0;
            font-size: 1em;
        }
        .profile-card p strong {
            color: #00cc5a;
        }
        .delete-btn {
            background-color: #ff3c3c;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            margin-top: 10px;
        }
        .delete-btn:hover {
            background-color: #cc2e2e;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .pagination a {
            background-color: #1f1f1f;
            color: #00ff73;
            padding: 8px 12px;
            border: 1px solid #00ff73;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }
        .pagination a:hover {
            background-color: #00ff73;
            color: #121212;
        }
        .pagination .active {
            background-color: #00ff73;
            color: #121212;
        }
        .pagination .disabled {
            background-color: #333;
            color: #666;
            border-color: #666;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <header>
        <nav class="nav">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ url('/') }}" >Home</a></li>
                <li><a href="{{ url('/pageadmin') }}">last page</a></li>
                <li><a href="{{ route('messages') }}">messages</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Liste des utilisateurs</h1>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <!-- Search Form -->
        <form class="search-form" action="{{ route('admin.users.index', [], false) }}" method="GET">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par nom ou email" aria-label="Rechercher des utilisateurs">
            <button type="submit">Rechercher</button>
        </form>

        <!-- Sorting Links -->
      

        @if($users->count() > 0)
            <div class="profiles-container">
                @foreach($users as $user)
                    <div class="profile-card">
                        <p><strong>ID:</strong> {{ $user->id }}</p>
                        <p><strong>Nom:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Date de création:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
                        <form action="{{ route('admin.users.delete', $user->id, false) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" aria-label="Supprimer l'utilisateur {{ $user->name }}">Supprimer</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination">
              

            

              
            </div>
        @else
            <p>Aucun utilisateur trouvé.</p>
        @endif
    </main>

    <footer>
        <p>&copy; 2025 Admin Panel. Tous droits réservés.</p>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/pageadmin') }}">last page</a></li>
            <li><a href="{{ route('messages') }}">Produits</a></li>
        </ul>
    </footer>
</body>
</html>