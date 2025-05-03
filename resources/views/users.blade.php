<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ff73;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #00ff73;
        }
        table {
            width: 90%;
            max-width: 1000px;
            border-collapse: collapse;
            background-color: #121212;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px #00ff73;
        }
        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #00ff73;
        }
        th {
            background-color: #1f1f1f;
        }
        tr:hover {
            background-color: #1a1a1a;
        }
        form {
            display: inline;
        }
        .delete-btn {
            background-color: #ff3c3c;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
        }
        .delete-btn:hover {
            background-color: #cc2e2e;
        }
        .success-message {
            color: #00ff73;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>Liste des utilisateurs</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    @if($users->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date de création</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun utilisateur trouvé.</p>
    @endif

</body>
</html>
