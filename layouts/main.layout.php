<?php
if (!defined('COMPONENTS_PATH')) {
    require_once __DIR__ . '/../bootstrap.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Meeting Calendar' ?></title>
    
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <link rel="stylesheet" href="/components/navbar/assets/css/navbar.css">
    
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css_file): ?>
            <link rel="stylesheet" href="<?= htmlspecialchars($css_file) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body class="main-layout">
    <?php include COMPONENTS_PATH . 'navbar/navbar.component.php'; ?>
    
    <main class="main-content">
        <?= $content ?? '' ?>
    </main>
    
</body>
</html>