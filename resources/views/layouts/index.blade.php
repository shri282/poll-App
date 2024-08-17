<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll App</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body class="contents">
    <header class="header">
    
        <div class="logo">
            <a href="/"><img src="{{ asset('images/poll-logo.svg') }}" alt=""></a>
            <h4>DirectPoll</h4>
        </div>
    
        <div class="heading">
            <h3 style="color: grey;">Poll EveryWhere</h3>
        </div>
    
        <div class="nav-menus">
            <ul>
                @if(Auth::check())
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                    <li><a href="/about">About Us</a></li>
                @endif
            </ul>
        </div>
    
    </header>
    
    <div class="body">
       @yield('content')
    </div>
    
    <footer class="footer">
    
        <div class="contacts">
            <h4>Contact Us</h4>
            <p>If you have any questions or feedback, feel free to reach out to us:</p>
            <p>Email: <a href="mailto:support@pollapp.com">support@pollapp.com</a></p>
            <p>Phone: +1 (123) 456-7890</p>
            <p>Address: 123 Poll Street, Survey City, ST 45678</p>
        </div>
    
        <div class="nav-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="/terms">Terms of Service</a></li>
            </ul>
        </div>
    
        <div class="social-media-icons">
            <h4>Follow Us</h4>
            <a href="https://facebook.com/pollapp" target="_blank" aria-label="Facebook">
                <img src="/images/facebook-icon.png" alt="Facebook">
            </a>
            <a href="https://twitter.com/pollapp" target="_blank" aria-label="Twitter">
                <img src="/images/twitter-icon.png" alt="Twitter">
            </a>
        </div>
    
    </footer>
</body>

<div class="copy-rights">
    <p style="margin: 5px;">&copy; 2024 PollApp. All rights reserved.</p>
    <p style="margin: 5px;">Designed with love by <a href="https://yourdesignagency.com" target="_blank">Your Design Agency</a></p>
</div>

</html>