<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
        body {
            font-family: 'Lato', sans-serif;
            background-color: #fff8f0;
            color: #333;
        }
        .hero {
            background: url('{{ asset('images/cake-banner.jpg') }}') no-repeat center center;
            background-size: cover;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px #000;
            text-align: center;
        }
        .section {
            padding: 40px 20px;
            text-align: center;
        }
        .btn {
            background-color: #ff66a3;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #e65c97;
        }
    </style>
</head>
<body>

    <div class="hero">
        <div>
            <h1>Welcome to Frosting</h1>
            <p>Your favorite place for handcrafted cakes and desserts</p>
            <a href="{{ url('/shop') }}" class="btn">Shop Now</a>
        </div>
    </div>

    <div class="section">
        <h2>Why Frosting?</h2>
        <p>Freshly baked, 100% eggless, and customizable cakes made just for you.</p>
    </div>

    <div class="section">
        <h2>Popular Categories</h2>
        <p>Cakes | Cupcakes | Pastries | Designer Cakes</p>
        <a href="{{ url('/categories') }}" class="btn">Explore</a>
    </div>

    <div class="section">
        <h2>Need Something Custom?</h2>
        <p>We take custom orders for birthdays, weddings, and corporate events.</p>
        <a href="{{ url('/contact') }}" class="btn">Contact Us</a>
    </div>

</body>
</html>