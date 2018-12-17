<?php

echo '<h1>Login</h1>';
if ($email == null && !empty($_POST['submit'])) {
    echo '<p>Email or password is wrong!</p>';
}
echo '<form action="/login" method="POST">';
echo '<input type="email" name="email" required><br />';
echo '<input type="password" name="password" required><br />';
echo '<input type="checkbox" name="remeber">Remember me!<br />';
echo '<a href="/forgot">Forgot you password?</a><br />';
echo '<input type="submit" name="submit" value="Sign in">';
echo '</form>';
