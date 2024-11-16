<?php
session_start();

require '../../database/db_connection.php';
require '../../jwt_helper.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $db = connectDatabase();

    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username);
    $res = $stmt->execute();
    $user = $res->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $token = createJWT($user['id'], $user['username']);

        session_regenerate_id(true);

        $_SESSION['jwt'] = $token;

        header('Location: ../../index.php');
        exit;
    } else {
        echo "Корисничкото име или лозинката се невалидни.<br>";
        echo "<a href='../../pages/auth/login.php'><button>Обидете се повторно</button></a>";
        exit;
    }
}
?>