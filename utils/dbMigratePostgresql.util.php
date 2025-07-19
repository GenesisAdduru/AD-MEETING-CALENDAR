<?php
declare(strict_types=1);


require_once 'bootstrap.php';

require VENDOR_PATH . 'autoload.php';

require_once UTILS_PATH . 'envSetter.util.php';


$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "Dropping old tables…\n";
foreach ([
    'tasks',
    'meeting_users',
    'meetings',
    'users'
] as $table) {
    // Use IF EXISTS so it won't error if the table is already gone
    $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
    echo "✅ Dropped table: {$table}\n";
}

echo "Applying schema from database/users.model.sql…\n";
$sql = file_get_contents('database/users.model.sql');
if ($sql === false) {
    throw new RuntimeException("Could not read database/users.model.sql");
} else {
    echo "Creation Success from the database/users.model.sql\n";
}
$pdo->exec($sql);

echo "Applying schema from database/meetings.model.sql…\n";
$sql = file_get_contents('database/meetings.model.sql');
if ($sql === false) {
    throw new RuntimeException("Could not read database/meetings.model.sql");
} else {
    echo "Creation Success from the database/meetings.model.sql\n";
}
$pdo->exec($sql);

echo "Applying schema from database/meeting_users.model.sql…\n";
$sql = file_get_contents('database/meeting_users.model.sql');
if ($sql === false) {
    throw new RuntimeException("Could not read database/meeting_users.model.sql");
} else {
    echo "Creation Success from the database/meeting_users.model.sql\n";
}
$pdo->exec($sql);

echo "Applying schema from database/tasks.model.sql…\n";
$sql = file_get_contents('database/tasks.model.sql');
if ($sql === false) {
    throw new RuntimeException("Could not read database/tasks.model.sql");
} else {
    echo "Creation Success from the database/tasks.model.sql\n";
}
$pdo->exec($sql);

echo "✅ Database migration completed successfully.\n";