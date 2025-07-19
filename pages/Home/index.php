<?php
require_once __DIR__ . '/../../bootstrap.php';
require_once UTILS_PATH . 'auth.util.php';

Auth::init();

// Check if user is authenticated
if (!Auth::check()) {
    header('Location: /index.php');
    exit;
}

$user = Auth::user();

// Set up layout variables
$title = 'Home - Meeting Calendar';
$additional_css = ['/pages/Home/assets/css/style.css'];

// Content for the home page
ob_start();
?>
<div class="home-container">
    <div class="greeting-card">
        <h1 class="greeting-title">Hello, <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>!</h1>
        <p class="user-role">Role: <?= htmlspecialchars($user['role']) ?></p>
        <p class="welcome-message">Welcome to the Meeting Calendar</p>
    </div>
</div>
<?php
$content = ob_get_clean();

// Include the main layout
include LAYOUTS_PATH . 'main.layout.php';
?>