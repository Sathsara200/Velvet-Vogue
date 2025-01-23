<?php
    $conn = mysqli_connect("localhost","root","","user_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{}    
    $sql = "SELECT * from product";

    $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velvet Vogue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="#"><img src="images/Untitled_image__8_-removebg-preview.png" class="logo" alt=""></a>
    

    <div>
        <ul id="navbar">
           <li><a class="active" href="index.html">Home</a></li> 
           <li><a href="shop.html">Shop</a></li> 
           <li><a href="blog.html">Blog</a></li> 
           <li><a href="about.html">About</a></li> 
           <li><a href="contact.html">Contact</a></li> 
           <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-bag-shopping"  style="color: #000000;"></i></a></li> 
           <a href="#" id="close"><i class="fa-regular fa-circle-xmark"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.html"><i class="fa-solid fa-bag-shopping" style="color: #000000;"></i></a>
        <i id="bar" class="fa-solid fa-bars"></i>
    </div>
    </section>

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button>Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="images/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>

        <div class="fe-box">
            <img src="images/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>

        <div class="fe-box">
            <img src="images/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>

        <div class="fe-box">
            <img src="images/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>

        <div class="fe-box">
            <img src="images/features/f5.png" alt="">
            <h6>Happy sell</h6>
        </div>

        <div class="fe-box">
            <img src="images/features/f6.png" alt="">
            <h6>Support</h6>
        </div>

    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">

            <?php
            while($row=mysqli_fetch_assoc($result))
            {
             ?>
                <div class="pro">
                <img src="<?php echo $row['image'] ?>" alt="">
                <div class="des">
                    <span><?php echo $row['product_brand'] ?></span>
                    <h5><?php echo $row['product_name']?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo $row['price'] ?></h4>
                </div>
                <a href="#"><i class="cart"><i class="fa-solid fa-cart-shopping"></i></i></a>
            </div>
             <?php   
            }
            ?>

           

            

        </div> 
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> - All T-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
           <div class="pro">
                <img src="images/products/n1.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="cart"><i class="fa-solid fa-cart-shopping"></i></i></a>
            </div>

           

        </div> 
    </section>

    <section id="sm-banner" class="section-p1">
       <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>buy 1 get 1 free</h2>
        <span>The best classic dress is on sale at Velvet Vogue</span>
        <button class="white">Learn More</button>
       </div> 

       <div class="banner-box banner-box2">
        <h4>spring/summer</h4>
        <h2>upcomming season</h2>
        <span>The best classic dress is on sale at Velvet Vogue</span>
        <button class="white">Collection</button>
       </div> 

    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
           <h3>Winter Collection -50% OFF</h3>
        </div> 
        
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
           <h3>Spring / Summer 2022</h3>
        </div>

        <div class="banner-box banner-box3">
            <h2>T-Shirts</h2>
           <h3>New Trendy Prints</h3>
        </div>

    </section>

    <section id="newsletter" class="section-p1" class="section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
       <div class="fo">
         <div class="col">
            <img class="logo" src="images/Untitled_image__8_-removebg-preview.png" alt="">
            <h4>Contact</h4>
            <p><Strong>Address:</Strong> 562 Wellington Road, Street 32, San Francisco</p>
            <p><strong>Phone:</strong>+94 74 1121 090/(+94) 06 6224 7908</p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-pinterest-p"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
          </div>

          <div class="col">
             <h4>About</h4>
             <a href="#">About us</a>
             <a href="#">Delivery Information</a>
             <a href="#">Privecy Policy</a>
             <a href="#">Terms & Conditions</a>
             <a href="#">Contact us</a>
          </div>

          <div class="col">
             <h4>My Account</h4>
             <a href="#">Sign In</a>
             <a href="#">View Cart</a>
             <a href="#">My Wishlist</a>
             <a href="#">Track My Order</a>
             <a href="#">Help</a>
          </div>

          <div class="col install">
              <h4>Install App</h4>
              <p>From App Store or Google Play</p>
              <div class="row">
                 <img src="images/pay/app.jpg" alt="">
                 <img src="images/pay/play.jpg" alt="">
              </div>
              <p>Secured Payment Gateways</p>
              <img src="images/pay/pay.png" alt="">
          </div>
        </div>

        <div class="copyright">
            <p>© 2024, Tech2 etc - HTML CSS Ecommerce Template</p>
        </div>


        

    </footer>

    
   <script src="addtocart.js"></script>
</body>