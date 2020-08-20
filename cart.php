<?php 

include('include/header.php'); 

$cartData = cartData();
$cart_id  = 0;


if(isset($_POST['delete_cart'])){

    $cart_id =  isset($_POST['cart_id']) ? $_POST['cart_id'] : 2;

    if(deleteCart($cart_id)){
        header("Location: cart.php");
    }else{
        die("Something went wrong!");
    }

}




?>


<section id="cart">

    <div class="cart-header">
        <p>SHOPPING CART</p>
    </div>

    <div class="cart-container">

        <?php

            $totalCost = 0;
            foreach($cartData as $cart): 
            
            $cartProduct = getBookById($cart['item_id']);
            $totalCost += $cartProduct['price'];
            
        ?>

            <div class="cart">

                <div class="cart-icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>

                <div class="cart-image">
                    <img src="./uploads/books/<?php echo $cartProduct['photo']; ?>" alt="">
                </div>
                
                <div class="cart-info">
                    <h3><?php echo $cartProduct['name']; ?></h3>
                    <p>By <?php echo $cartProduct['autor']; ?></p>
                    <ul class="star-icon">
                        <li>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </li>
                    </ul>
                    <p>rating - <?php echo $cart_id; ?></p>
                    <p>price - <?php echo $cartProduct['price']; ?>$</p>
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $cart['item_id']; ?>" name="cart_id">
                        <button name="delete_cart" type="submit" class="btn-xl del-btn">Delete Cart</button>
                    </form>
                </div>
            </div>

        <?php 
    
        endforeach; 
        
        ?>

        <div class="price-container">
            <p class="price"><i class="fas fa-money-check-alt"></i> Total Price - <span><?php echo $totalCost; ?>$</span></p>
            <p class="descri"><i class="fas fa-check-double"></i> order is eligible for FREE Delivery.</p>
        </div>

        <!-- <div class="cart">

            <div class="cart-icon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>

            <div class="cart-image">
                <img src="./assets/img/new-release/book6.jpeg" alt="">
            </div>
            <div class="cart-info">
                <h3>PHOTOGRAPHY</h3>
                <p>By Autor</p>
                <ul class="star-icon">
                    <li>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </li>
                </ul>
                <p>rating - 70%</p>
                <p>price - 55$</p>

                <form action="" method="POST">
                    <button name="delete-cart" type="submit" class="btn-xl del-btn">Delete Cart</button>
                </form>
            </div>
        </div> -->

    </div>
    <hr>
</section>




<?php include('include/footer.php'); ?>