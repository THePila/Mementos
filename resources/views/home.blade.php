<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectHub - Home</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #0a0a0a;
            color: #f5f5f5;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        button {
            cursor: pointer;
            border: none;
            outline: none;
        }

        /* Header styles */
        .header {
            background-color: #1a1a1a;
            padding: 15px 20px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
        }

        .logo span {
            color: #e60000;
        }

        .search-bar {
            flex: 0 1 400px;
            position: relative;
            margin: 0 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            padding-left: 40px;
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            border-radius: 20px;
            color: #ffffff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: #e60000;
            box-shadow: 0 0 0 2px rgba(230, 0, 0, 0.2);
        }

        .search-bar::before {
            content: "🔍";
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888888;
            font-size: 14px;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-icon {
            font-size: 20px;
            color: #cccccc;
            transition: color 0.3s ease;
        }

        .nav-icon:hover {
            color: #e60000;
        }

        .profile-pic {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #3a3a3a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #ffffff;
            border: 2px solid #e60000;
        }

        .mobile-menu-toggle {
            display: none;
            font-size: 24px;
            color: #cccccc;
            background: none;
        }

        /* Main layout */
        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            gap: 20px;
        }

        /* Left sidebar */
        .left-sidebar {
            flex: 0 0 250px;
            position: sticky;
            top: 85px;
            height: calc(100vh - 85px);
            overflow-y: auto;
            padding-right: 10px;
        }

        .user-profile {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #3a3a3a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            border: 3px solid #e60000;
        }

        .user-details h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .user-details p {
            font-size: 14px;
            color: #b3b3b3;
        }

        .user-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid #2a2a2a;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
        }

        .stat-label {
            font-size: 12px;
            color: #b3b3b3;
        }

        .main-nav {
            background-color: #1a1a1a;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #cccccc;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .nav-item:hover, .nav-item.active {
            background-color: #2a2a2a;
            color: #ffffff;
            border-left-color: #e60000;
        }

        .nav-item.active {
            font-weight: 600;
        }

        .nav-item-icon {
            font-size: 18px;
        }

        /* Main content */
        .main-content {
            flex: 1;
            max-width: 100%;
        }

        .create-post {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .post-input {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .post-input .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .post-input input {
            flex: 1;
            padding: 12px 15px;
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            border-radius: 20px;
            color: #ffffff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .post-input input:focus {
            outline: none;
            border-color: #e60000;
            box-shadow: 0 0 0 2px rgba(230, 0, 0, 0.2);
        }

        .post-actions {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #2a2a2a;
            padding-top: 15px;
        }

        .post-attachments {
            display: flex;
            gap: 15px;
        }

        .attachment-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #b3b3b3;
            font-size: 14px;
            background: none;
            transition: color 0.3s ease;
        }

        .attachment-btn:hover {
            color: #e60000;
        }

        .post-btn {
            background-color: #e60000;
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .post-btn:hover {
            background-color: #cc0000;
        }

        .feed {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .post {
            background-color: #1a1a1a;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .post-header {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .post-header .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .post-author h4 {
            font-size: 16px;
            margin-bottom: 3px;
        }

        .post-time {
            font-size: 12px;
            color: #b3b3b3;
        }

        .post-content {
            padding: 0 20px 20px;
        }

        .post-text {
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .post-image {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #2a2a2a;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666666;
            font-size: 14px;
        }

        .post-engagement {
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
            border-top: 1px solid #2a2a2a;
        }

        .engagement-action {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #b3b3b3;
            font-size: 14px;
            background: none;
            transition: color 0.3s ease;
        }

        .engagement-action:hover {
            color: #e60000;
        }

        /* Right sidebar */
        .right-sidebar {
            flex: 0 0 300px;
            position: sticky;
            top: 85px;
            height: calc(100vh - 85px);
            overflow-y: auto;
            padding-left: 10px;
        }

        .sidebar-section {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
        }

        .section-link {
            font-size: 14px;
            color: #e60000;
            transition: opacity 0.3s ease;
        }

        .section-link:hover {
            opacity: 0.8;
        }

        .trending-item {
            padding: 10px 0;
            border-bottom: 1px solid #2a2a2a;
        }

        .trending-item:last-child {
            border-bottom: none;
        }

        .trending-tag {
            font-size: 14px;
            color: #e60000;
            margin-bottom: 5px;
        }

        .trending-topic {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .trending-stats {
            font-size: 12px;
            color: #b3b3b3;
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #2a2a2a;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .suggestion-info {
            flex: 1;
        }

        .suggestion-info h4 {
            font-size: 14px;
            margin-bottom: 3px;
        }

        .suggestion-info p {
            font-size: 12px;
            color: #b3b3b3;
        }

        .follow-btn {
            background-color: transparent;
            color: #e60000;
            border: 1px solid #e60000;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .follow-btn:hover {
            background-color: #e60000;
            color: white;
        }

        /* Footer */
        .footer {
            background-color: #1a1a1a;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
            border-top: 1px solid #2a2a2a;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
        }

        .footer-link {
            font-size: 14px;
            color: #b3b3b3;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #e60000;
        }

        .copyright {
            font-size: 12px;
            color: #666666;
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .container {
                padding: 15px;
            }
            
            .left-sidebar, .right-sidebar {
                flex: 0 0 220px;
            }
        }

        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }
            
            .left-sidebar, .right-sidebar {
                flex: 1;
                height: auto;
                position: static;
                padding: 0;
            }
            
            .left-sidebar {
                display: flex;
                gap: 20px;
                margin-bottom: 20px;
            }
            
            .user-profile {
                flex: 1;
                margin-bottom: 0;
            }
            
            .main-nav {
                flex: 1;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 10px 15px;
            }
            
            .search-bar {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .header-nav {
                gap: 15px;
            }
            
            .left-sidebar {
                flex-direction: column;
            }
            
            .post-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .post-attachments {
                justify-content: space-between;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 10px;
            }
            
            .post-header, .post-content, .post-engagement {
                padding: 10px 15px;
            }
            
            .sidebar-section {
                padding: 15px;
            }
            
            .nav-item {
                padding: 12px 15px;
            }
            
            .footer-links {
                gap: 10px;
            }
        }

        /* Mobile menu */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 200;
            padding: 20px;
            flex-direction: column;
        }

        .mobile-nav.active {
            display: flex;
        }

        .mobile-nav-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .close-menu {
            font-size: 24px;
            color: #cccccc;
            background: none;
        }

        .mobile-nav-items {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .mobile-nav-item {
            padding: 15px;
            background-color: #1a1a1a;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #cccccc;
            transition: all 0.3s ease;
        }

        .mobile-nav-item:hover, .mobile-nav-item.active {
            background-color: #2a2a2a;
            color: #ffffff;
        }

        .mobile-nav-item.active {
            border-left: 3px solid #e60000;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
        <div class="logo">Connect<span>Hub</span></div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <nav class="header-nav">
            <a href="#" class="nav-icon">🔔</a>
            <a href="#" class="nav-icon">✉️</a>
            <a href="#" class="profile-pic">JD</a>
        </nav>
    </header>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-header">
            <div class="logo">Connect<span>Hub</span></div>
            <button class="close-menu" onclick="toggleMobileMenu()">✕</button>
        </div>
        <div class="mobile-nav-items">
            <a href="#" class="mobile-nav-item active">
                <span class="nav-item-icon">🏠</span>
                <span>Home</span>
            </a>
            <a href="#" class="mobile-nav-item">
                <span class="nav-item-icon">👥</span>
                <span>My Network</span>
            </a>
            <a href="#" class="mobile-nav-item">
                <span class="nav-item-icon">💬</span>
                <span>Messages</span>
            </a>
            <a href="#" class="mobile-nav-item">
                <span class="nav-item-icon">🔔</span>
                <span>Notifications</span>
            </a>
            <a href="#" class="mobile-nav-item">
                <span class="nav-item-icon">👤</span>
                <span>Profile</span>
            </a>
            <a href="#" class="mobile-nav-item">
                <span class="nav-item-icon">⚙️</span>
                <span>Settings</span>
            </a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Left Sidebar -->
        <aside class="left-sidebar">
            <div class="user-profile">
                <div class="user-info">
                    <div class="user-avatar">JD</div>
                    <div class="user-details">
                        <h3>John Doe</h3>
                        <p>@johndoe</p>
                    </div>
                </div>
                <div class="user-stats">
                    <div class="stat">
                        <div class="stat-number">254</div>
                        <div class="stat-label">Posts</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">1.2K</div>
                        <div class="stat-label">Followers</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">568</div>
                        <div class="stat-label">Following</div>
                    </div>
                </div>
            </div>
            <nav class="main-nav">
                <a href="#" class="nav-item active">
                    <span class="nav-item-icon">🏠</span>
                    <span>Home</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-item-icon">👥</span>
                    <span>My Network</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-item-icon">💬</span>
                    <span>Messages</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-item-icon">🔔</span>
                    <span>Notifications</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-item-icon">👤</span>
                    <span>Profile</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-item-icon">⚙️</span>
                    <span>Settings</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="nav-item-icon">🚪</span>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Create Post -->
            <div class="create-post">
                <div class="post-input">
                    <div class="user-avatar">JD</div>
                    <input type="text" placeholder="What's on your mind?">
                </div>
                <div class="post-actions">
                    <div class="post-attachments">
                        <button class="attachment-btn">📷 Photo</button>
                        <button class="attachment-btn">🎬 Video</button>
                        <button class="attachment-btn">📅 Event</button>
                    </div>
                    <button class="post-btn">Post</button>
                </div>
            </div>

            <!-- Feed -->
            <div class="feed">
                <!-- Post 1 -->
                <article class="post">
                    <div class="post-header">
                        <div class="user-avatar">AS</div>
                        <div class="post-author">
                            <h4>Alex Smith</h4>
                            <div class="post-time">2 hours ago</div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p class="post-text">Just finished working on an amazing project! Can't wait to share more details with everyone. #coding #webdev #excited</p>
                        <div class="post-image">Image: Project Screenshot</div>
                    </div>
                    <div class="post-engagement">
                        <button class="engagement-action">👍 Like (42)</button>
                        <button class="engagement-action">💬 Comment (8)</button>
                        <button class="engagement-action">🔄 Share (3)</button>
                    </div>
                </article>

                <!-- Post 2 -->
                <article class="post">
                    <div class="post-header">
                        <div class="user-avatar">EJ</div>
                        <div class="post-author">
                            <h4>Emma Johnson</h4>
                            <div class="post-time">5 hours ago</div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p class="post-text">Had an amazing time at the tech conference today! Met so many inspiring people and learned a lot about the latest trends in AI and machine learning. Looking forward to implementing some of these ideas in my next project. #techconference #AI #networking</p>
                    </div>
                    <div class="post-engagement">
                        <button class="engagement-action">👍 Like (87)</button>
                        <button class="engagement-action">💬 Comment (14)</button>
                        <button class="engagement-action">🔄 Share (6)</button>
                    </div>
                </article>

                <!-- Post 3 -->
                <article class="post">
                    <div class="post-header">
                        <div class="user-avatar">RK</div>
                        <div class="post-author">
                            <h4>Ryan Kim</h4>
                            <div class="post-time">Yesterday</div>
                        </div>
                    </div>
                    <div class="post-content">
                        <p class="post-text">Just launched my new portfolio website! Check it out and let me know what you think. Any feedback is appreciated!</p>
                        <div class="post-image">Image: Portfolio Website</div>
                    </div>
                    <div class="post-engagement">
                        <button class="engagement-action">👍 Like (124)</button>
                        <button class="engagement-action">💬 Comment (32)</button>
                        <button class="engagement-action">🔄 Share (18)</button>
                    </div>
                </article>
            </div>
        </main>

        <!-- Right Sidebar -->
        <aside class="right-sidebar">
            <!-- Trending Section -->
            <div class="sidebar-section">
                <div class="section-header">
                    <h3 class="section-title">Trending</h3>
                    <a href="#" class="section-link">See All</a>
                </div>
                <div class="trending-item">
                    <div class="trending-tag">#TechNews</div>
                    <div class="trending-topic">New AI breakthrough changes everything</div>
                    <div class="trending-stats">2.5K posts</div>
                </div>
                <div class="trending-item">
                    <div class="trending-tag">#WebDev</div>
                    <div class="trending-topic">The future of frontend development</div>
                    <div class="trending-stats">1.8K posts</div>
                </div>
                <div class="trending-item">
                    <div class="trending-tag">#Productivity</div>
                    <div class="trending-topic">5 tools every developer should use</div>
                    <div class="trending-stats">950 posts</div>
                </div>
            </div>

            <!-- Suggestions Section -->
            <div class="sidebar-section">
                <div class="section-header">
                    <h3 class="section-title">Suggested for you</h3>
                    <a href="#" class="section-link">See All</a>
                </div>
                <div class="suggestion-item">
                    <div class="user-avatar">SL</div>
                    <div class="suggestion-info">
                        <h4>Sarah Lee</h4>
                        <p>UX/UI Designer</p>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="suggestion-item">
                    <div class="user-avatar">MP</div>
                    <div class="suggestion-info">
                        <h4>Mike Peterson</h4>
                        <p>Full Stack Developer</p>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="suggestion-item">
                    <div class="user-avatar">JW</div>
                    <div class="suggestion-info">
                        <h4>Jessica Wang</h4>
                        <p>Data Scientist</p>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
            </div>

            <!-- Events Section -->
            <div class="sidebar-section">
                <div class="section-header">
                    <h3 class="section-title">Upcoming Events</h3>
                    <a href="#" class="section-link">See All</a>
                </div>
                <div class="trending-item">
                    <div class="trending-tag">May 25</div>
                    <div class="trending-topic">Web Development Meetup</div>
                    <div class="trending-stats">58 attending</div>
                </div>
                <div class="trending-item">
                    <div class="trending-tag">June 3</div>
                    <div class="trending-topic">AI & Machine Learning Conference</div>
                    <div class="trending-stats">124 attending</div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-links">
            <a href="#" class="footer-link">About</a>
            <a href="#" class="footer-link">Help Center</a>
            <a href="#" class="footer-link">Privacy Policy</a>
            <a href="#" class="footer-link">Terms of Service</a>
            <a href="#" class="footer-link">Cookie Policy</a>
            <a href="#" class="footer-link">Accessibility</a>
            <a href="#" class="footer-link">Careers</a>
            <a href="#" class="footer-link">Advertising</a>
        </div>
        <div class="copyright">© 2025 ConnectHub. All rights reserved.</div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
        }
    </script>
</body>
</html>