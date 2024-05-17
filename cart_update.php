<?php
session_start();

// Check if the form for adding to cart is submitted
if (isset($_POST['addToCart'])) {
    // Retrieve product information from the form
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Retrieve complete product details from the database
    $filePath = 'products.csv';
    $file = fopen($filePath, 'r');
    $productDetails = null;

    if ($file !== false) {
        while (($row = fgetcsv($file)) !== false) {
            if ($row[0] === $productId) {
                $productDetails = $row;
                break;
            }
        }
        fclose($file);
    }

    // If product details are found
    if ($productDetails !== null) {
        // Open cart.csv file in append mode
        $cartFile = fopen('cart.csv', 'a');

        // Check if cart.csv file could be opened
        if ($cartFile !== false) {
            // Write product details to cart.csv file
            fputcsv($cartFile, array(
                $productDetails[0], // Product ID
                $productDetails[1], // Product name
                $productDetails[2], // Category
                $productDetails[3], // Product color
                $quantity,          // Quantity
                $productDetails[5]  // Product price
            ));

            // Close cart.csv file
            fclose($cartFile);

            // Redirect to product list page
            header("Location: product_list.php");
            exit();
        } else {
            // If there's an error opening cart.csv file
            echo "Failed to open cart file.";
        }
    } else {
        // If product not found in the database
        echo "Product not found.";
    }
}
?>
