<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #121212;
            color: #00ff73;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        header {
            background-color: #1f1f1f;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            letter-spacing: 2px;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            background-color: #181818;
            padding: 15px 0;
        }

        nav a {
            color: #00ff73;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: #00ff73;
            color: #121212;
            transform: scale(1.1);
        }

        .content {
            padding: 40px 20px;
            text-align: center;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #00ff73;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 255, 115, 0.5);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 25px rgba(0, 255, 115, 0.7);
        }

        .card img {
            width: 80px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .card img:hover {
            transform: rotate(360deg);
        }

        .card h2 {
            margin-bottom: 15px;
            font-size: 1.8em;
            color: #ffffff;
        }

        .card p {
            margin-bottom: 20px;
            color: #dcdcdc;
        }

        .card a {
            display: inline-block;
            color: #00ff73;
            font-size: 1.1em;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .card a:hover {
            color: #ffffff;
        }

        footer {
            text-align: center;
            padding: 30px;
            background-color: #1f1f1f;
            margin-top: 50px;
            color: #666;
            font-size: 1em;
        }

        .footer-links a {
            color: #00ff73;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            header {
                font-size: 2em;
            }

            .card-container {
                grid-template-columns: 1fr;
            }

            nav a {
                font-size: 0.9em;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<header>
    Admin Dashboard
</header>

<nav>
    <a href="#">Users</a>
    <a href="#">Messages</a>
    <a href="#">Settings</a>
    <a href="#">Logout</a>
</nav>

<div class="content">
    <h2>Welcome to the Admin Panel</h2>
    <p>Manage users, support messages, and configure settings with ease.</p>

    <div class="card-container">
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Users Icon">
            <h2>Manage Users</h2>
            <p>View, edit, and delete user accounts easily.</p>
            <a href="{{ route('users') }}">Go to Users</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Messages Icon">
            <h2>Support Messages</h2>
            <p>Check the latest support tickets from users.</p>
            <a href="{{ route('messages') }}">View Messages</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/2099/2099058.png" alt="Settings Icon">
            <h2>Settings</h2>
            <p>Update site settings and configurations.</p>
            <a href="#">Edit Settings</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/4261/4261817.png" alt="Analytics Icon">
            <h2>Analytics</h2>
            <p>View website usage and performance metrics.</p>
            <a href="#">View Analytics</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/732/732213.png" alt="Security Icon">
            <h2>Security</h2>
            <p>Manage user permissions and site security.</p>
            <a href="#">Configure Security</a>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2025 Admin Panel. All rights reserved.</p>
    <div class="footer-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Help</a>
    </div>
</footer>

</body>
</html>
