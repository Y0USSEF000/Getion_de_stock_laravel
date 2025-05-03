<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Messages</title>
    <style>
       body {
        background-color: #0a0a0a;
        color: #00ff73;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 40px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    h1 {
        font-size: 3em;
        text-shadow: 0 0 20px #00ff73;
        margin-bottom: 40px;
        animation: fadeInDown 0.8s ease-out;
    }

    table {
        width: 90%;
        max-width: 1100px;
        border-collapse: collapse;
        background-color: #121212;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 20px #00ff73;
        animation: fadeInUp 1s ease-out;
    }

    th, td {
        padding: 18px 25px;
        text-align: left;
        border-bottom: 1px solid #00ff73;
    }

    th {
        background-color: #1f1f1f;
        font-size: 1.1em;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    tr:hover {
        background-color: #1a1a1a;
        transition: background-color 0.3s;
    }

    .no-messages {
        margin-top: 60px;
        font-size: 1.8em;
        color: #ff3c3c;
        animation: fadeIn 1s ease-in;
    }

    a.button {
        margin-top: 30px;
        padding: 12px 30px;
        background-color: #00ff73;
        color: #0a0a0a;
        font-weight: bold;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 0 10px #00ff73;
    }

    a.button:hover {
        background-color: #00cc60;
        transform: scale(1.05);
        box-shadow: 0 0 20px #00ff73;
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
    </style>
</head>
<body>

    <h1>Support Messages</h1>

    @if($messages->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-messages">
            No support messages found.
        </div>
    @endif

</body>
</html>
