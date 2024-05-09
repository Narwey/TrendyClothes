<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/Product.css">
    <title>Product Page</title>
    <script>
        function filterProducts(category) {
            // Set the category to the PHP variable
            window.location.href = 'product.php?category=' + category;
        }
    </script>
</head>
<body>
    <main>
        <h1 class="title-m">Our Products</h1>
        <div class="gender">
            <!-- Make the categories clickable buttons -->
            <button class="btn-gnd" onclick="filterProducts('All')">All products</button>
            <button class="btn-gnd" onclick="filterProducts('Men')">Men</button>
            <button class="btn-gnd" onclick="filterProducts('Women')">Women</button>
        </div>
        <div class="container-division">
            <?php
            // Get the category from the query parameter
            $category = isset($_GET['category']) ? $_GET['category'] : 'All';
            $filePath = 'table.csv';
            $file = fopen($filePath, 'r');
            $test = true;

            if ($file === false) {
                echo "Failed to open file: $filePath";
            } else {
                while (($row = fgetcsv($file)) !== false) {
                    if ($test) {
                        $test = false;
                        continue;
                    }
                    // Check if the product matches the selected category or if it's 'All'
                    if ($category === 'All' || strtolower($row[1]) === strtolower($category)) {
                        echo "<div class='children-division " . strtolower($row[1]) . "'>";
                        echo "<div class='cloths'>";
                        echo "<img style='width: 90%;' src='" . htmlspecialchars($row[2]) . "' alt='Product Image'>";
                        echo "</div>";
                        echo "<p style='text-align: center;'><strong>" . $row[0] . "</strong></p>";
                        echo "<div class='stars'>";
                        echo "<img style='width: 20%;' src='" . htmlspecialchars($row[4]) . "' alt='Stars Rating'>";
                        echo "</div>";
                        echo "<p style='text-align: center;'><strong>$" . $row[3] . "</strong></p>";
                        echo "<div class='btn-div'>";
                        echo "<button>Order Now -></button>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                fclose($file);
            }
            ?>
        </div>
    </main>
</body>
</html>
