<?php
echo '<h1>Main page</h1>';
if ($user == 'Guest') {
    echo '<a href="/login">Login</a><br />';
    echo '<a href="/registration">Registration</a>';
} else {
    $name = User::getName($user);
    echo 'Welcome to start page ' . $name . '<br />';
    echo '<a href="/logout">Logout</a>';
}
