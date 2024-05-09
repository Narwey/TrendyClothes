<?php
// Function to authenticate user based on email and password
function authenticateUser($email, $password) {
    // Open the CSV file for reading
    $file = fopen('usersdata.csv', 'r');
    if ($file !== false) {
        // Loop through each line in the CSV file
        while (($row = fgetcsv($file)) !== false) {
            // Check if email and password match
            if ($row[0] === $email && $row[1] === $password) {
                fclose($file);
                return true; // User authenticated
            }
        }
        fclose($file);
    }
    return false; // User not found or credentials do not match
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Authenticate user
    if (authenticateUser($email, $password)) {
        echo "Login successful.";
    } else {
        echo "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
