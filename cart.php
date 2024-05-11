<?php include 'addToCart.php'; 
$products = []; // Assuming you will populate this array with product data
$products_in_cart = []; // Assuming you will populate this array with cart data
$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Css/styles.css">
    <script src="Js/main.js"></script> 
    <title>Shopping Cart</title>
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="image/Trendy Clothes.svg" alt="">
    </div>
    <nav>
        <ul class="nav_top">
            <li><a href="index.php">Home</a></li>
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

<div class="product_cart">
<div class="cart">
    <h1>Shopping Cart</h1>
   <form action="cart_update.php" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                        <img src="image_directory/<?=$product['image']?>" width="50" height="50" alt="<?=$product['product_name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['product_name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['Price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['Price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placehorder">
        </div>
    </form>
</div>
</div>





</body>
</html>
