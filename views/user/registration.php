<?php
if ($registration == false || is_array($registration)) {
    if ($registration == false && !empty($_POST['submit'])) {
        echo 'This email is used! Try another email!';
    }

    if (is_array($registration)) {
        foreach ($registration as $error) {
            echo '<p>' . $error . '</p>';
        }
    }
    echo '<h1>Registration</h1>';
    echo '<form action="#" method="POST">';
    echo '<input type="email" name="email" placeholder="Email" required value="' . $email . '" ><br />';
    echo '<input type="password" name="password" placeholder="Password" required value="' . $password . '"><br />';
    echo '<input type="password" name="cpassword" placeholder="Confirm Password" required value="' . $confirmPassword . '"><br />';
    echo '<input type="text" name="name" placeholder="Your name" required value="' . $name . '"><br />';
    echo '<input type="submit" name="submit" value="Do it!">';
    echo '</form>';
} else if ($registration == true) {
    echo '<p>Registration successfull! Go to <a href="/login">Login page</a> to sign in!</p>';
}
