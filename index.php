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
            <li><a class="btn-gnd" onclick="filterProducts('All')">All products</a></li>
            <li><a class="btn-gnd" onclick="filterProducts('Men')">Men</a></li>
            <li><a class="btn-gnd" onclick="filterProducts('Women')">Women</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>

  <div class="icon_head">
    <div class="search">
        <img src="image/search_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
    </div>

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
          
        <input type="button" name="submit_log" value="Login" onclick="loginUser()"></button>
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
        <select id="gender" name="gender">
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
        <input type="submit" name="submit" value="Submit">
            <input type="button" value="Cancel" onclick="closePopup('registerPopup')">
        </div>
    </form>
</div>
 
 <main>
    <div class="intro">
        <h1>The Spring Collection</h1>
        <p>Fashion plays an important role in people's lives. 
            The way people dress expresses their individuality 
            and personality, and can influence how others 
            perceive them, trendyClothes help you to blow them away. </p>
    </div>
    <div class="buttons">
        <button onclick="filterProducts('All')" class="shop">Shop Now</button>
        <button class="explore">Explore</button>
    </div>
    <div class="images">
        <div class="men_intro">
            <img src="image/AdobeStock_675230311_Preview.jpeg" alt="" class="men_photo">
            <button onclick="filterProducts('Men')" class="menbtn">Men</button>
        </div>
        <div class="women_intro">
            <img src="image/close-up-woman-with-flowers.jpg" alt="" class="women_photo">
            <button onclick="filterProducts('Women')" class="womenbtn">Women</button>
        </div>
    </div>
    <div class="subscribe">
        <p>Subscribe to be the first</p>
        <button>Get notified</button>
    </div>
 </main> 

<div class="news">
    <div class="new_arrival">
        <h1>New 
            Arrival</h1>
        <p>The new collections of
            2024 to best apparel 
            production</p>
        <img src="image/login_24dp_FILL0_wght400_GRAD0_opsz24.svg" alt="">
    </div>
    <div class="image_new">
        <div class="dress">
            <div class="image"><img src="image/photo1_newarrival.svg" alt=""></div>
            <div class="price_new">
               <div class="detail_dress"> 
                  <div class="price_name">
                       <p>Dress</p>
                       <p>56$ </p>
                  </div>
                  <div class="det">
                    <p>Flowers motifs</p>
                  </div>
               </div>
               <div class="button_new">
                <button onclick="filterProducts('All')">
                <span class="material-symbols-outlined">
                    arrow_right_alt
                    </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="twophoto">
            <img src="image/spadrille_newarrival.svg" alt="">
            <img src="image/chemise_newarrival.svg" alt="">
        </div>
        <div class="jean">
            <img src="image/jeans_newarrival.svg" alt="">
        </div>
    </div>
</div>

<div class="TopProduct">
    <h3>COLLECTIONS</h3>
    <div class="title">
        
        <h1>Top Products</h1>
    </div>
    <div class="nav">
    <a class="btn-gnd" onclick="filterProducts('All')">All products</a>
    <a class="btn-gnd" onclick="filterProducts('Men')">Men</a>
    <a class="btn-gnd" onclick="filterProducts('Women')">Women</a>
    </div>
    <div class="Top_product">
    
    <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarre une session si aucune session n'est déjà active
}

// Vérifie si la session est active et si la préférence de l'utilisateur est définie
if(isset($_SESSION["preference"])) {
    // Récupère la préférence de l'utilisateur
    $user_preference = $_SESSION["preference"];

    // Lit les produits à partir du fichier CSV
    $products = array_map('str_getcsv', file('products.csv'));

    // Affiche les produits en fonction de la préférence de l'utilisateur
    echo "<div class='user-preference-section'>";
    echo "<h2>Produits pour " . $user_preference . "</h2>";
    echo "<div class='products'>";
    foreach ($products as $product) {
        // Vérifie si le produit correspond à la préférence de l'utilisateur
        if ($product[1] == $user_preference) { 
            // Affiche les informations sur le produit
            echo "<div class='children-division'>";
            echo "<div class='cloths'>";
            // Vérifie si l'image est une URL ou un chemin relatif
            $images = explode("|", $product[6]); // Split les images par |
            if (!empty($images[0])) { // Vérifie s'il y a au moins une image
                if (filter_var($images[0], FILTER_VALIDATE_URL)) {
                    echo "<img class='product-image' src='" . htmlspecialchars($images[0]) . "' alt='Product Image'>";
                } else {
                    echo "<img class='product-image' src='" . htmlspecialchars($images[0]) . "' alt='Product Image'>";
                }
            }
            echo "</div>";
            echo "<p style='text-align: center;'><strong>" . $product[1] . "</strong></p>";
            echo "<p style='text-align: center;'><strong>$" . $product[5] . "</strong></p>"; 
            echo "<form action='cart_update.php' method='post'>";
            echo "<input type='hidden' name='productId' value='" . $product[0] . "'>";
            echo "<label for='quantity'>Quantity:</label>";
            echo "<select name='quantity' id='quantity'>";
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
            }
            echo "</select>";
            echo "<div class='btn-div'>";
            echo "<button type='submit' name='addToCart'>Add to Cart</button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
    }
    echo "</div>";
    echo "</div>";
} else {
    // Gère le cas où la préférence n'est pas définie
    echo "<p>Veuillez vous connecter pour voir les produits.</p>";
}
?>

</div>
</div> 

</main>


<footer class="footer_area">
    <div class="footer_subscribe">
        <div class="container_subscribe"> 
            <h1>Special offers and free giveaways?</h1> 
            <h3>Tap your email down below and get new notifications about Fashion</h3>
            <div>
                <form action="#" class="subscribe_Form " method="post">
                
                    <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                    <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                
                </form>
            </div>
        </div>
    </div>
    
    <div class="info_footer">
        <div class="Product_footer">
            <h2>Products</h2>
            <ul class="list_product">
                <li><a href="#">Top</a></li>
                <li><a href="#">Dress</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">Shoes</a></li>
            </ul>
        </div>

        <div class="Categories_footer">
            <h2>Category</h2>
            <ul class="list_category">
                <li><a href="#">Men</a></li>
                <li><a href="#">Women</a></li> 
            </ul>
        </div>                                  
        <div class="Comp_info_footer">
            <h2>Company Info</h2>
            <ul class="list_comp_info">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li> 
                <li><a href="#">Support</a></li>
            </ul>
        </div>                                  
</footer>
</body>  
</html>
