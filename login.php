<?php
sessio
if(isset($_POST["username"]) && isset($_POST["password"])) {
    // Get the submitted username and password
    $submitted_username = $_POST["username"];
    $submitted_password = $_POST["password"];

    // Open the data.csv file (Replace with your database connection)
    $file = fopen("data.csv", "r");

    // Loop through each line in the file
    while (($data = fgetcsv($file)) !== FALSE) {
        // Check if the username and password match
        if ($data[1] == $submitted_username && $data[3] == $submitted_password) {
            // Set a cookie to indicate user is logged in
            setcookie('user_id', $data[0], [
                'expires' => time() + (86400 * 30),
                'path' => '/',
                'sameSite' => 'Strict'
            ]);
            
            setcookie('username', $submitted_username, [
                'expires' => time() + (86400 * 30),
                'path' => '/',
                'sameSite' => 'Strict'
            ]);
            
            echo "success";
            exit();
        }
    }

    // If no match is found, respond with failure
    echo "failure";
}
?>
