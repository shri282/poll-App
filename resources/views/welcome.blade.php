<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
    <title>Poll App</title>
</head>

<div class="contents">
    <header class="header">
    
        <div class="logo">
            <img src="images/poll-logo.svg" alt="">
            <h4>DirectPoll</h4>
        </div>
    
        <div class="heading">
            <h3 style="color: grey;">Poll EveryWhere</h3>
        </div>
    
        <div class="nav-menus">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/polls">Polls</a></li>
            </ul>
        </div>
    
    </header>
    
    <body class="body">
        <div class="categories">
            <h3 style="text-transform: capitalize; color:gray">poll catagories:</h3>
            <ul>
                @foreach($categories as $category)
                  <li onclick="applyfilter(event)">{{ $category }}</li>
                @endforeach
            </ul>
        </div>

        <div class="polls">
            @foreach($polls as $poll)
                <div class="poll-card">
                    <p>{{ $poll['question'] . '?'}}</p>
                    <ul>
                        @foreach($poll['options'] as $option)
                            @php
                                $percentage = $poll['totalVoters'] > 0 ? ($option['votes'] / $poll['totalVoters']) * 100 : 0;
                            @endphp
                            <li>
                                <p>{{ $option['option'] }}</p> 
                                <h5 style="margin: 0; color:blueviolet;">{{ round($percentage) . '%' }}</h5> 
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </body>
    
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
</div>
    <div class="copy-rights">
        <p style="margin: 5px;">&copy; 2024 PollApp. All rights reserved.</p>
        <p style="margin: 5px;">Designed with love by <a href="https://yourdesignagency.com" target="_blank">Your Design Agency</a></p>
    </div>
</html>