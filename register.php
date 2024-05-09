<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $interests = $_POST['interests'] ?? '';

        // Validate form data (you can add more validation if needed)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        } else {
            // Append the user data to the CSV file
            $file = fopen('usersdata.csv', 'a'); // 'a' mode opens the file for writing only, and places the file pointer at the end of the file if the file exists.
            if ($file === false) {
                echo "Failed to open users.csv";
            } else {
                // Prepare the data for writing to CSV
                $userData = [$email, $password, $interests];
                // Write the data to the CSV file
                fputcsv($file, $userData);
                fclose($file);

                echo "User registered successfully!";
            }
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="interests">Interests:</label>
            <select id="interests" name="interests" required>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="All">All</option>
            </select>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>