<?php
/**
 * Navbar Component
 * Renders a navigation bar with Home and Logout links
 */

// Get current page for active state
$current_page = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-brand">
            <img src="/assets/img/meeting_calendar_logo.png" alt="Meeting Calendar" class="navbar-logo">
            <span class="navbar-title">Meeting Calendar</span>
        </div>
        
        <ul class="navbar-menu">
            <li class="navbar-item">
                <a href="/pages/Home/index.php" class="navbar-link <?= strpos($current_page, '/pages/Home') !== false ? 'active' : '' ?>">
                    <span class="navbar-icon">🏠</span>
                    Home
                </a>
            </li>
            <li class="navbar-item">
                <a href="/handlers/auth.handler.php?action=logout" class="navbar-link logout-link">
                    <span class="navbar-icon">🚪</span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>