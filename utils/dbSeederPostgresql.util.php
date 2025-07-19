<?php
require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';
$meetings = require_once DUMMIES_PATH . '/meetings.staticData.php';
$meetingUsers = require_once DUMMIES_PATH . '/meeting_users.staticData.php';
$tasks = require_once DUMMIES_PATH . '/tasks.staticData.php';

$host = $pgConfig['host'];
$port = $pgConfig['port'];
$user = $pgConfig['user'];
$pass = $pgConfig['pass'];
$db = $pgConfig['db'];

$dsn = "pgsql:host={$host};port={$port};dbname={$db}";
$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "Truncating tables...\n";
foreach (['tasks', 'meeting_users', 'meetings', 'users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}

$stmt = $pdo->prepare(
    'INSERT INTO users (username, role, firstname, lastname, password)
     VALUES (:username, :role, :fn, :ln, :pw)'
);

foreach ($users as $u) {
    $stmt->execute([
        ':username' => $u['username'],
        ':role'     => $u['role'],
        ':fn'       => $u['first_name'], 
        ':ln'       => $u['last_name'],  
        ':pw'       => password_hash($u['password'], PASSWORD_DEFAULT),
    ]);
}

echo "✅ Users seeded successfully!\n";

// Seed meetings
$meetingsStmt = $pdo->prepare(
    'INSERT INTO meetings (title, description, schedule, location, created_by, created_at, updated_at)
     VALUES (:title, :description, :schedule, :location, :created_by, :created_at, :updated_at)'
);

foreach ($meetings as $m) {
    $meetingsStmt->execute([
        ':title' => $m['title'],
        ':description' => $m['description'],
        ':schedule' => $m['schedule'],
        ':location' => $m['location'],
        ':created_by' => $m['created_by'],
        ':created_at' => $m['created_at'],
        ':updated_at' => $m['updated_at'],
    ]);
}

echo "✅ Meetings seeded successfully!\n";

// Seed meeting_users
$meetingUsersStmt = $pdo->prepare(
    'INSERT INTO meeting_users (meeting_id, user_id, role)
     VALUES (:meeting_id, :user_id, :role)'
);

foreach ($meetingUsers as $mu) {
    $meetingUsersStmt->execute([
        ':meeting_id' => $mu['meeting_id'],
        ':user_id' => $mu['user_id'],
        ':role' => $mu['role'],
    ]);
}

echo "✅ Meeting users seeded successfully!\n";

// Seed tasks
$tasksStmt = $pdo->prepare(
    'INSERT INTO tasks (meeting_id, assigned_to, title, description, status, due_date, created_at, updated_at)
     VALUES (:meeting_id, :assigned_to, :title, :description, :status, :due_date, :created_at, :updated_at)'
);

foreach ($tasks as $t) {
    $tasksStmt->execute([
        ':meeting_id' => $t['meeting_id'],
        ':assigned_to' => $t['assigned_to'],
        ':title' => $t['title'],
        ':description' => $t['description'],
        ':status' => $t['status'],
        ':due_date' => $t['due_date'],
        ':created_at' => $t['created_at'],
        ':updated_at' => $t['updated_at'],
    ]);
}

echo "✅ Tasks seeded successfully!\n";

echo "✔️ PostgreSQL seeding complete!\n";