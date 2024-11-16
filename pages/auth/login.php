<?php

session_start();
require '../../jwt_helper.php';

// Проверка дали JWT токенот постои и е валиден
if (isset($_SESSION['jwt']) && decodeJWT($_SESSION['jwt'])) {
    header("Location: ../../index.php");
    exit;
}
?>

<div>
    <h2>Најавете се</h2>
    <form action="../../handlers/auth/login_handler.php" method="POST">
        <div>
            <label for="username">Корисничко име</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Лозинка</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Најави се</button>
        <p>
            Немате акаунт? <a href="register.php">Регистрирајте се тука</a>
        </p>
    </form>
</div>