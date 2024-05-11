<?php
session_start();

// Handle update quantity logic
if (isset($_POST['update'])) {
    foreach ($_POST as $key => $value) {
        // Check if the input name starts with 'quantity-'
        if (strpos($key, 'quantity-') === 0) {
            $productId = substr($key, strlen('quantity-'));
            // Update the quantity in the cart session
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] = $value;
            }
        }
    }
    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
} elseif (isset($_POST['placehorder'])) {
    // Handle place order logic
    // Add your code to process the order, e.g., save order details to a database
    // After processing, you can clear the cart session or perform any other necessary actions
    unset($_SESSION['cart']);
    unset($_SESSION['cart_count']);
    // Redirect to a thank you page or order confirmation page
    header("Location: order_confirmation.php");
    exit();
}
?>
