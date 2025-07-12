<?php
declare(strict_types=1);

// 1) Composer autoload
require_once 'vendor/autoload.php';

// 2) Composer bootstrap
require_once 'bootstrap.php';

// 3) envSetter
require_once UTILS_PATH . '/envSetter.util.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';
$meetings = require_once DUMMIES_PATH . '/meetings.staticData.php';
$project_users = require_once DUMMIES_PATH . '/project_users.staticData.php';
$tasks = require_once DUMMIES_PATH . '/tasks.staticData.php';

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

// simple indicator command seeding started
echo "Seeding users…\n";

// query preparations. NOTE: make sure they matches order and number
$stmt = $pdo->prepare("
    INSERT INTO users (username, role, first_name, last_name, password)
    VALUES (:username, :role, :fn, :ln, :pw)
");

// plug-in datas from the staticData and add to the database
foreach ($users as $u) {
    $stmt->execute([
        ':username' => $u['username'],
        ':role' => $u['role'],
        ':fn' => $u['first_name'],
        ':ln' => $u['last_name'],
        ':pw' => password_hash($u['password'], PASSWORD_DEFAULT),
    ]);
}

// Meetings


// Just indicator it was working
echo "Applying schema from database/meetings.model.sql…\n";

$sql = file_get_contents('database/meetings.model.sql');

// Another indicator but for failed creation
if ($sql === false) {
    throw new RuntimeException("Could not read database/meetings.model.sql");
} else {
    echo "Creation Success from the database/meetings.model.sql";
}

// simple indicator command seeding started
echo "Seeding meetings…\n";

// query preparations. NOTE: make sure they matches order and number
$stmt = $pdo->prepare("
    INSERT INTO meetings (name, description, meeting_date, location, start_time, end_time, organizer_id, created_at)
    VALUES (:name, :description, :meeting_date, :location, :start_time, :end_time, :organizer_id, :created_at)
");

// plug-in datas from the staticData and add to the database
foreach ($meetings as $m) {
    $stmt->execute([
        ':name' => $m['name'],
        ':description' => $m['description'],
        ':meeting_date' => $m['meeting_date'],
        ':location' => $m['location'],
        ':start_time' => $m['start_time'],
        ':end_time' => $m['end_time'],
        ':organizer_id' => $m['organizer_id'],
        ':created_at' => $m['created_at'],
    ]);
}


// // Project Users


// // Just indicator it was working
// echo "Applying schema from database/project_users.model.sql…\n";

// $sql = file_get_contents('database/project_users.model.sql');

// // Another indicator but for failed creation
// if ($sql === false) {
//     throw new RuntimeException("Could not read database/project_users.model.sql");
// } else {
//     echo "Creation Success from the database/project_users.model.sql";
// }

// // simple indicator command seeding started
// echo "Seeding project_users…\n";

// // query preparations. NOTE: make sure they matches order and number
// $stmt = $pdo->prepare("
//     INSERT INTO project_users (project_id, user_id)
//     VALUES (:project_id, :user_id)
// ");

// // plug-in datas from the staticData and add to the database
// foreach ($project_users as $pu) {
//     $stmt->execute([
//         ':project_id' => $pu['project_id'],
//         ':user_id' => $pu['user_id']
//     ]);
// }

// // Tasks


// // Just indicator it was working
// echo "Applying schema from database/tasks.model.sql…\n";

// $sql = file_get_contents('database/tasks.model.sql');

// // Another indicator but for failed creation
// if ($sql === false) {
//     throw new RuntimeException("Could not read database/tasks.model.sql");
// } else {
//     echo "Creation Success from the database/tasks.model.sql";
// }

// // simple indicator command seeding started
// echo "Seeding tasks…\n";

// // query preparations. NOTE: make sure they matches order and number
// $stmt = $pdo->prepare("
//     INSERT INTO tasks (project_id, assigned_to, title, description, status, due_date, created_at, updated_at)
//     VALUES (:project_id, :assigned_to, :title, :description, :status, :due_date,:created_at, :updated_at)
// ");

// // plug-in datas from the staticData and add to the database
// foreach ($projects as $p) {
//     $stmt->execute([
//         ':project_id' => $p['project_id'],
//         ':assigned_to' => $p['assigned_to'],
//         ':title' => $p['title'],
//         ':description' => $p['description'],
//         ':status' => $p['status'],
//         ':due_date' => $p['due_date'],
//         ':created_at' => $p['created_at'],
//         ':updated_at' => $p['updated_at']
//     ]);
// }