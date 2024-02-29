<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Read the existing usernames from the users.txt file
    $existingUsernames = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Check if the entered username already exists
    if (in_array($enteredUsername, $existingUsernames)) {
        echo "Username '$enteredUsername' Noen har allerede tatt det brukernavnet... Velg et annet :D";
    } else {
        // Save the username and password to the users.txt file
        $file = fopen("users.txt", "a");
        fwrite($file, "$enteredUsername:$enteredPassword\n");
        fclose($file);

        echo "Du har blitt et medlem av Vibra!! Brukernavnet ditt: '$enteredUsername'";
    }
}
?>
