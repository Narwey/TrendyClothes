<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="test.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="registration form">
      <header>Sign up</header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Create a password">
        <input type="password" placeholder="Confirm your password">
        <label for="interests">Interests:</label>
            <select id="interests" name="interests" required>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="All">All</option>
            </select>
        <button class="button" type="submit">Register</button>
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <a href="loginVf.php">Login</a>
        </span>
      </div>
    </div>
  </div>
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
</body>
</html>