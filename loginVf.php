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
        // Redirect to index.html
        header("Location: index.html");
        exit(); // Ensure script stops executing after the redirect
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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="test.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <button class="button" type="submit">Login</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
            <a href="registerVf.php">Signup</a>
        </span>
      </div>
    </div>
  </div>
</body>
</html>