<?php
session_start();
// Check if the form is submitted
if(isset($_POST["username"]) && isset($_POST["password"])) {
    // Get the submitted username and password
    $submitted_username = $_POST["username"];
    $submitted_password = $_POST["password"];

    // Open the data.csv file
    $file = fopen("data.csv", "r");

    // Loop through each line in the file
    while (($data = fgetcsv($file)) !== FALSE) {
        // Check if the username and password match
        if ($data[1] == $submitted_username && $data[3] == $submitted_password) {
            // Respond with success
            echo "success";
            exit;
        }
    }

    // If no match is found, respond with failure
    echo "failure";
}
?>
