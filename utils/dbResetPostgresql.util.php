<?php
declare(strict_types=1);

// 1) Composer autoload
require_once 'vendor/autoload.php';

// 2) Composer bootstrap
require_once 'bootstrap.php';

// 3) envSetter
require_once UTILS_PATH . '/envSetter.util.php';

$host = $databases['pgHost'];
$port = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname = $databases['pgDB'];

// ——— Connect to PostgreSQL ———
$dsn = "pgsql:host={$databases['pgHost']};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Just indicator it was working
echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/users.model.sql');

// Another indicator but for failed creation
if ($sql === false) {
    throw new RuntimeException("Could not read database/users.model.sql");
} else {
    echo "Creation Success from the database/users.model.sql";
}

// If your model.sql contains a working command it will be executed
$pdo->exec($sql);

echo "Truncating tables…\n";
foreach (['users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}


// Meetings
echo "Applying schema from database/meetings.model.sql…\n";

$sql = file_get_contents('database/meetings.model.sql');

if ($sql === false) {
    throw new RuntimeException("Could not read database/meetings.model.sql");
} else {
    echo "Creation Success from the database/meetings.model.sql";
}

echo "Truncating tables…\n";
foreach (['meetings'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}


// // Project Users
// echo "Applying schema from database/project_users.model.sql…\n";

// $sql = file_get_contents('database/project_users.model.sql');

// if ($sql === false) {
//     throw new RuntimeException("Could not read database/project_users.model.sql");
// } else {
//     echo "Creation Success from the database/project_users.model.sql";
// }

// echo "Truncating tables…\n";
// foreach (['project_users'] as $table) {
//     $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
// }

// // Tasks Model
// echo "Applying schema from database/tasks.model.sql…\n";

// $sql = file_get_contents('database/tasks.model.sql');

// if ($sql === false) {
//     throw new RuntimeException("Could not read database/tasks.model.sql");
// } else {
//     echo "Creation Success from the database/tasks.model.sql";
// }

// echo "Truncating tables…\n";
// foreach (['tasks'] as $table) {
//     $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
// }