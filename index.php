<?php
declare(strict_types=1);
require_once 'bootstrap.php';
require_once HANDLERS_PATH . 'auth.util.php';
require_once UTILS_PATH . 'auth.util.php';
require_once UTILS_PATH . 'envSetter.util.php';
require_once HANDLERS_PATH . 'mongodbChecker.handler.php';
require_once HANDLERS_PATH . 'postgreChecker.handler.php';
Auth::init();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = $_GET['action'] ?? null;

if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'handlers/auth.handler.php';
    exit;
}
if (Auth::check()) {
    header('Location: /pages/Home/index.php');
    exit;
}

$error = trim((string) ($_GET['error'] ?? ''));
$error = str_replace("%", " ", $error);


$title = 'LOGIN';

ob_start();
?>
<div class="login-container">
    <form action="/index.php?action=login" method="POST">
        <label for="username" class="label">Username</label>
        <input id="username" name="username" type="text" required class="input">

        <label for="password" class="label">Password</label>
        <input id="password" name="password" type="password" required class="input">

        <input type="hidden" name="action" value="login">
        <button type="submit" class="button">Log In</button>

        <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    </form>
</div>
<?php
$content = ob_get_clean();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?= $content ?>
</body>
</html>