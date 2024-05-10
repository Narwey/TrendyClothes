<?php
session_start();

// Function to read CSV file and return data as an array
function readCSV($file){
    $csvData = [];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $csvData[] = $data;
        }
        fclose($handle);
    }
    return $csvData;
}

// Read product data from CSV file
$products = readCSV('products.csv');

// Check if products exist and if addToCart button is clicked
if (!empty($products) && isset($_POST['addToCart'])) {
    // Get the product ID from the form and sanitize it
    $productId = filter_var($_POST['productId'], FILTER_SANITIZE_NUMBER_INT);
    
    // Find the product in the CSV data
    foreach ($products as $product) {
        if ($product[0] == $productId) { // Assuming the ID is in the first column
            // Here, you can fetch other product details from the CSV data
            $productName = $product[1];
            $productCategory = $product[2];
            $productColor = $product[3];
            $productSize = $product[4];
            $productPrice = $product[5];
            $productImage = $product[6];
            
            // Add the product to the cart session
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            // Check if the product is already in the cart
            if (isset($_SESSION['cart'][$productId])) {
                // If yes, increment the quantity
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                // If not, add it to the cart with quantity 1
                $_SESSION['cart'][$productId] = [
                    'name' => $productName,
                    'category' => $productCategory,
                    'color' => $productColor,
                    'size' => $productSize,
                    'price' => $productPrice,
                    'image' => $productImage,
                    'quantity' => 1
                ];
            }
            // Update cart count
            $_SESSION['cart_count'] = count($_SESSION['cart']);
            
            // Redirect back to the product listing page or display cart contents
            header("Location: cart.php");
            exit();
        }
    }
}
?>
