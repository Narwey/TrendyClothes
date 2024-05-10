<?php

session_start();


// Function to update cart count
function updateCartCount($count) {
    $_SESSION['cart_count'] = $count;
}

// Check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']); // Assuming you set 'user_id' in session upon login
}

// Check if "Order Now" button is clicked
if (isset($_POST['order_button'])) {
    // Check if user is logged in
    if (isLoggedIn()) {
        // Increment cart count
        if (!isset($_SESSION['cart_count'])) {
            $_SESSION['cart_count'] = 0;
        }
        $_SESSION['cart_count']++;
    } else {
        // Redirect to login page if user is not logged in
        header("Location: index.php");
        echo "<script> alert('connect to your account to make order')</script>";
        exit(); // Stop further execution of the script
    }
}

// Redirect back to the index page
header("Location: index.php");
exit();
?>
