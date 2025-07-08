<?php
require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';

$host = $pgConfig['host'];
$port = $pgConfig['port'];
$user = $pgConfig['user'];
$pass = $pgConfig['pass'];
$db   = $pgConfig['db'];

$dsn = "pgsql:host={$host};port={$port};dbname={$db}";
$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "Truncating tables...\n";
foreach (['tasks', 'meeting_users', 'meetings', 'users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}

echo "Seeding users...\n";
$stmt = $pdo->prepare("
    INSERT INTO users (username, password, full_name, group_name, role)
    VALUES (:username, :password, :full_name, :group_name, :role)
");

foreach ($users as $u) {
    $stmt->execute([
        ':username'   => $u['username'],
        ':password'   => password_hash($u['password'], PASSWORD_DEFAULT),
        ':full_name'  => $u['full_name'],
        ':group_name' => $u['group_name'],
        ':role'       => $u['role'],
    ]);
}

echo "✅ Users seeded successfully!\n";