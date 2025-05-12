<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #121212;
            color: #00ff73;
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
        }

        header {
            background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
            color: #ffffff;
            padding: 25px;
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            letter-spacing: 3px;
            font-family: 'Orbitron', sans-serif;
            text-shadow: 0 0 10px rgba(0, 255, 115, 0.7);
            border-bottom: 2px solid #00ff73;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            background: linear-gradient(90deg, #0d0d0d 0%, #1a1a1a 50%, #0d0d0d 100%);
            padding: 15px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        nav a {
            color: #00ff73;
            text-decoration: none;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 30px;
            transition: all 0.4s ease;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
            border: 1px solid transparent;
            background-color: rgba(0, 255, 115, 0.1);
            cursor: pointer;
        }

        nav a:hover {
            background-color: rgba(0, 255, 115, 0.3);
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 255, 115, 0.4);
            border: 1px solid #00ff73;
        }

        .content {
            padding: 40px 20px;
            text-align: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .content h2 {
            font-size: 2.2em;
            margin-bottom: 20px;
            font-family: 'Orbitron', sans-serif;
            text-shadow: 0 0 5px rgba(0, 255, 115, 0.5);
        }

        .content p {
            font-size: 1.1em;
            max-width: 700px;
            margin: 0 auto 40px;
            color: #b3b3b3;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .card {
            background: linear-gradient(145deg, #1a1a1a 0%, #0f0f0f 100%);
            border: 1px solid #00ff73;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 255, 115, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 255, 115, 0.1) 0%, transparent 70%);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0, 255, 115, 0.5);
        }

        .card:hover::before {
            opacity: 1;
            transform: rotate(0deg);
        }

        .card img {
            width: 80px;
            margin-bottom: 25px;
            transition: transform 0.5s ease;
            filter: drop-shadow(0 0 5px rgba(0, 255, 115, 0.7));
        }

        .card:hover img {
            transform: rotate(15deg) scale(1.1);
        }

        .card h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #ffffff;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        .card p {
            margin-bottom: 25px;
            color: #dcdcdc;
            font-size: 1em;
        }

        .card a {
            display: inline-block;
            color: #00ff73;
            font-size: 1.1em;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 30px;
            border: 1px solid #00ff73;
            background-color: rgba(0, 255, 115, 0.1);
            font-weight: 500;
            cursor: pointer;
        }

        .card a:hover {
            color: #121212;
            background-color: #00ff73;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 115, 0.4);
        }

        .chart-container {
            margin: 70px auto;
            background: linear-gradient(145deg, #1a1a1a 0%, #0f0f0f 100%);
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 900px;
            box-shadow: 0 10px 30px rgba(0, 255, 115, 0.3);
            border: 1px solid rgba(0, 255, 115, 0.2);
            position: relative;
            overflow: hidden;
        }

        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #00ff73, #00b3ff, #00ff73);
        }

        footer {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
            margin-top: 70px;
            color: #666;
            font-size: 1em;
            border-top: 1px solid #333;
        }

        .footer-links {
            margin-top: 15px;
        }

        .footer-links a {
            color: #00ff73;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.1em;
            transition: all 0.3s ease;
            position: relative;
            padding-bottom: 5px;
            cursor: pointer;
        }

        .footer-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #00ff73;
            transition: width 0.3s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        .footer-links a:hover::after {
            width: 100%;
        }

        @media (max-width: 768px) {
            header {
                font-size: 1.8em;
                padding: 20px;
            }

            .card-container {
                grid-template-columns: 1fr;
            }

            nav {
                flex-wrap: wrap;
                gap: 10px;
            }

            nav a {
                padding: 10px 15px;
                font-size: 0.9em;
            }

            .card {
                padding: 25px;
            }
        }

        /* Animation */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 255, 115, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(0, 255, 115, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 255, 115, 0); }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>

<header>
    ADMIN DASHBOARD
</header>

<nav>
    <a href="{{route('admin.users.index')}}" onclick="navigateTo('admin.users.index')">USERS</a>
    <a href="{{url('/messages')}}" onclick="navigateTo('messages')">MESSAGES</a>
    <a href="{{url('/admin/products')}}" onclick="navigateTo('products')">PRODUCTS</a>
    <a href="{{ url('/admin/add-product') }}">CREATE PRODUCT</a></nav>

<div class="content">
    <h2>WELCOME TO THE ADMIN PANEL</h2>
    <p>Manage users, products, support messages, and configure settings with our powerful dashboard tools.</p>

    <div class="card-container">
        <div class="card pulse-animation">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Users Icon">
            <h2>MANAGE USERS</h2>
            <p>View, edit, and delete user accounts with comprehensive control options.</p>
            <a href="#" onclick="navigateTo('users')">ACCESS USERS</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Messages Icon">
            <h2>SUPPORT MESSAGES</h2>
            <p>Check and respond to the latest support tickets from your users.</p>
            <a href="#" onclick="navigateTo('messages')">VIEW MESSAGES</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/3737/3737726.png" alt="Products Icon">
            <h2>PRODUCT MANAGEMENT</h2>
            <p>Add, edit, and manage your product catalog and inventory.</p>
            <a href="#" onclick="navigateTo('products')">MANAGE PRODUCTS</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/4261/4261817.png" alt="Analytics Icon">
            <h2>ANALYTICS</h2>
            <p>View detailed website usage statistics and performance metrics.</p>
            <a href="#" onclick="navigateTo('analytics')">VIEW ANALYTICS</a>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="userMessageChart"></canvas>
    </div>
</div>

<footer>
    <p>&copy; 2025 ADMIN PANEL. ALL RIGHTS RESERVED.</p>
    <div class="footer-links">
        <a href="#" onclick="navigateTo('privacy')">PRIVACY POLICY</a>
        <a href="#" onclick="navigateTo('terms')">TERMS OF SERVICE</a>
        <a href="#" onclick="navigateTo('help')">HELP CENTER</a>
    </div>
</footer>

<script>
    // Navigation function
    function navigateTo(page) {
        alert(`Navigating to ${page.toUpperCase()} page`);
        // In a real application, you would use:
        // window.location.href = `/admin/${page}`;
    }

    // Chart initialization
    const ctx = document.getElementById('userMessageChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN'],
            datasets: [
                {
                    label: 'NEW USERS',
                    data: [20, 35, 40, 60, 75, 90],
                    backgroundColor: 'rgba(0, 255, 115, 0.7)',
                    borderColor: '#00ff73',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false
                },
                {
                    label: 'SUPPORT MESSAGES',
                    data: [15, 25, 30, 45, 60, 80],
                    backgroundColor: 'rgba(0, 255, 115, 0.4)',
                    borderColor: '#00ff73',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#00ff73',
                        font: {
                            family: 'Orbitron',
                            size: 12,
                            weight: 'bold'
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'USER ACTIVITY ANALYTICS',
                    color: '#ffffff',
                    font: {
                        family: 'Orbitron',
                        size: 18
                    }
                }
            },
            scales: {
                x: {
                    ticks: { 
                        color: '#00ff73',
                        font: {
                            family: 'Orbitron',
                            size: 12
                        }
                    },
                    grid: { 
                        color: '#333',
                        drawBorder: false
                    }
                },
                y: {
                    ticks: { 
                        color: '#00ff73',
                        font: {
                            family: 'Orbitron',
                            size: 12
                        }
                    },
                    grid: { 
                        color: '#333',
                        drawBorder: false
                    }
                }
            }
        }
    });
</script>

</body>
</html>