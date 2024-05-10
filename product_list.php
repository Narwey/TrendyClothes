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
            <li><a href="">Home</a></li>
            <li><a href="product_list.php" >Men</a></li>
            <li><a href="product_list.php">Women</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>

  <div class="icon_head">
    <div class="search">
        <img src="image/search_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
    </div>

    <div class="login">
        <img src="image/account_circle_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
        <button id="loginButton" onclick="openLoginPopup()">Login</button>
        <button id="logoutButton" href="logout.php">Logout</button>

    </div>
    
    <div class="cart">
        <!-- <img src="image/shopping_bag_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt=""> -->
        <i class="fa badge" style="font-size:24px" value="product_calcul()">&#xf07a;</i>
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
<div class="productList">
<?php
$category = isset($_GET['category']) ? $_GET['category'] : 'All';
$filePath = 'products.csv';
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
        if ($category === 'All' || strtolower($row[1]) === strtolower($category)) {
            echo "<div class='children-division " . strtolower($row[1]) . "'>";
            echo "<div class='cloths'>";
            
            // Check if the image is an URL or a relative path
            $images = explode("|", $row[6]); // Split images by |
            if (!empty($images[0])) { // Check if there is at least one image
                if (filter_var($images[0], FILTER_VALIDATE_URL)) {
                    // Display first image from URL with fixed width and height
                    echo "<img class='product-image' src='" . htmlspecialchars($images[0]) . "' alt='Product Image'>";
                } else {
                    // Display first image from relative path with fixed width and height
                    echo "<img class='product-image' src='" . htmlspecialchars($images[0]) . "' alt='Product Image'>";
                }
            }
            echo "</div>";
            echo "<p style='text-align: center;'><strong>" . $row[3] . "</strong></p>";
            // echo "<div class='stars'>";
            // echo "</div>";
            echo "<p style='text-align: center;'><strong>$" . $row[5] . "</strong></p>"; // Note: corrected index
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
    
</body>
</html>