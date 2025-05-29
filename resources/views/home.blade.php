@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="/dist/css/home.css">
@endpush

@section('content')
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
                        <p class="post-text">Just finished working on an amazing project! Can't wait to share more details
                            with everyone. #coding #webdev #excited</p>
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
                        <p class="post-text">Had an amazing time at the tech conference today! Met so many inspiring people
                            and learned a lot about the latest trends in AI and machine learning. Looking forward to
                            implementing some of these ideas in my next project. #techconference #AI #networking</p>
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
                        <p class="post-text">Just launched my new portfolio website! Check it out and let me know what you
                            think. Any feedback is appreciated!</p>
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
@endsection
