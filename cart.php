<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!----------Using Font---------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Literata:ital,opsz,wght@0,7..72,200..900;1,7..72,200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!----------CSS file---------->
    <link rel="stylesheet" href="Css/styles.css">
    <!-----------JS file------------->
    <script src="Js/main.js"></script> 
    <title>TrendyClothes Online_Shop</title>
</head>

<body>

 <div class="header">
    <div class="logo">
        <img src="image/Trendy Clothes.svg" alt="">
    </div>
    <nav>
        <ul class="nav_top">
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="product_list.php" >Men</a></li>
            <li><a href="product_list.php">Women</a></li> -->
            <li><button class="btn-gnd" onclick="filterProducts('All')">All products</button></li>
            <li><button class="btn-gnd" onclick="filterProducts('Men')">Men</button></li>
            <li><button class="btn-gnd" onclick="filterProducts('Women')">Women</button></li>
            <li><li><a href="">Contact</a></li>
        </ul>
    </nav>

  <div class="icon_head">
    <!-- <div class="search">
        <img src="image/search_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
    </div> -->
    <!-- <div class="search_div">
            <img src="image/search_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
            <input class="search_input" type="text" placeholder="Search" oninput="searchProducts(this.value)">
        </div> -->

    <div class="login">   
        <button id="loginButton" onclick="openLoginPopup()"><img src="image/account_circle_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="loginPage"></button>
        <a id="logoutButton" href="logout.php">Logout</a>
    </div>
    
    <div class="cart">
    <a href="cart.php">
        <i id="cartIcon" class="fa badge" style="font-size:24px">&#xf07a; <?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0; ?></i>
    </a>
</div>
  </div>
 </div> 
 <!-- Login Popup -->
<div class="popup" id="SignPopup">
    <h2>Please choose your option</h2>
    <button onclick="openLogin()">Login</button>
    <button onclick="openRegisterPopup()">Register</button>
</div>
<!----------Login Popup------------------>
<div id="LoginPopup" class="popup">
  
    <form class="login_form" action="login.php" method="post" onsubmit="loginUser()">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
  
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
          
        <input type="button" name="submit_log" value="Submit" onclick="loginUser()"></button>
        <input type="button" value="Cancel" onclick="document.getElementById('LoginPopup').style.display='none'" ></input>
        <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
    </form>
  </div>
<!-- Register Popup -->
<div class="popup" id="registerPopup">
    
    <form action="register.php" method="post">
        <label for="fname">Username</label>
        <input type="text" id="fname" name="username" placeholder="Your name..">
        <label for="lname">Email</label>
        <input type="text" id="lname" name="email" placeholder="Your last name..">
        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="password">
        <label for="gender">Gender</label>
        <select id="Gender" name="gender">
            <option value="Men">Men</option>
            <option value="Women">Women</option>
        </select>
        <label for="preference">Preferences</label>
        <select id="Preferences" name="pref">
            <option value="Pants">Pants</option>
            <option value="Dress">Dress</option>
            <option value="Top">Top</option>
            <option value="shoes">Shoes</option>
            <option value="all">All</option>
        </select>
        <div class="buttons">
            <input type="button" name="submit" value="Submit">
            <input type="button" value="Cancel" onclick="closePopup('registerPopup')">
        </div>
    </form>
</div>
<!-- <div class="gender">
            Make the categories clickable buttons 
            <button class="btn-gnd" onclick="filterProducts('All')">All products</button>
            <button class="btn-gnd" onclick="filterProducts('Men')">Men</button>
            <button class="btn-gnd" onclick="filterProducts('Women')">Women</button>
        </div>
        <div class="search_div">
            <img src="image/search_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
            <input class="search_input" type="text" placeholder="Search" oninput="searchProducts(this.value)">
        </div> -->
<div class="CartList">
<?php
// Read the contents of cart.csv into an array
$cartItems = array_map('str_getcsv', file('cart.csv'));

// Initialize total amount to 0
$totalAmount = 0;

// Check if there are items in the cart
if (!empty($cartItems)) {
    echo "<table border='1'>";
    echo "<tr><th>Product Name</th><th>Category</th><th>Color</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";

    // Loop through each item in the cart
    foreach ($cartItems as $item) {
        // Calculate total price for each item
        $totalPrice = $item[4] * $item[5];

        // Add the total price of this item to the total amount
        $totalAmount += $totalPrice;

        // Display item details in table rows
        echo "<tr>";
        echo "<td>" . $item[1] . "</td>"; // Product Name
        echo "<td>" . $item[2] . "</td>"; // Category
        echo "<td>" . $item[3] . "</td>"; // Color
        echo "<td>" . $item[4] . "</td>"; // Quantity
        echo "<td>$" . $item[5] . "</td>"; // Price
        echo "<td>$" . $totalPrice . "</td>"; // Total Price
        echo "</tr>";
    }

    // Display total amount row
    echo "<tr>";
    echo "<td colspan='5'><strong>Total Amount:</strong></td>";
    echo "<td><strong>$" . $totalAmount . "</strong></td>";
    echo "</tr>";

    echo "</table>";
    echo "<button onclick=\"confirmPayment()\">Confirm Payment</button>";
} else {
    // Display a message if cart is empty
    echo "Your cart is empty.";
}
?>
<script>
function confirmPayment() {
    // Check if user is logged in
    var loggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;

    // If user is logged in, display payment success alert
    if (loggedIn) {
        alert("Payment successful!");
    } else {
        // If user is not logged in, display login popup
        document.getElementById("SignPopup").style.display = "block";
    }
}
</script>



</div>
    
</body>
</html>


