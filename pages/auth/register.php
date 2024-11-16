<?php
session_start();
require '../../jwt_helper.php';

if (isset($_SESSION['jwt']) && decodeJWT($_SESSION['jwt'])) {
    header("Location: ../../index.php");
    exit;
}
?>

<div>
    <h2>Регистрирајте се</h2>
    <form action="../../handlers/auth/register_handler.php" method="POST">
        <div class="mb-4">
            <label for="username">Корисничко име</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="mb-4">
            <label for="password">Лозинка</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Регистрирај се</button>
        <p >
            Веќе имате акаунт? <a href="login.php">Најавете се тука</a>
        </p>
    </form>
</div>