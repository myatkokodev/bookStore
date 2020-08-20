<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>

    <!-- fontawesome css file -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <!-- owl carousel css file -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <!-- custom css file-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <?php require('function.php'); ?>
</head>
<body>

        <!-- site-title -->
           <div class="title-container">
              <div class="social hide">
                <img src="./assets/img/social/instagram.png" alt="facebook">
                <img src="./assets/img/social/twitter.png" alt="twitter">
                <img src="./assets/img/social/facebook.png" alt="instagram">
                <img src="./assets/img/social/linkedin.png" alt="linkedin">
              </div>
              <div class="site-name">
                <div class="name">
                  <h3>MK <span>LIBRARY</span></h3>
                  <p>BOOK LIBRARY</p>
                </div>
              </div>
              <div class="search-box">
                <form action="" method="POST">
                  <input type="search" placeholder="search" name="search">
                </form>
              </div>
           </div>
        <!-- site title -->

      <main>

        <section id="navigation">
           <!-- navigation -->
           <nav class="nav">
             <div class="nav-menu">
               <h1>MENU</h1>
             </div>
            <div class="nav-navbar">
              <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="comming_soon.php">COMMING SOON</a></li>
                <li><a href="top_seller.php">TOP SELLER</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="#">AUTHOR</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="admin.php" style="font-weight: bold;+
                ">ADD BOOK <i class="fas fa-plus" style="background: #ea9627; padding: 0.25rem; box-sizing: border-box; border-radius: 50%;"></i></a></li>
                <li>
                  <a href="cart.php" class="rounded-pill">
                    <span style="font-size: 16px;color: #fff;">
                      <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span class="rounded">
                      <?php echo count(cartData()); ?>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- end navigation -->
        </section>