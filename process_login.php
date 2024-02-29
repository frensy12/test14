<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Read the usernames and passwords from the users.txt file
    $usersFile = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Check if the entered username and password match any stored credentials
    foreach ($usersFile as $user) {
        list($username, $password) = explode(":", $user);

        if ($enteredUsername === $username && $enteredPassword === $password) {
            echo "Login successful! Welcome, $enteredUsername!";
            exit; // Stop further processing once a match is found
        }
    }

    // If no match is found
    echo "Invalid username or password. Please try again.";
}
?>
