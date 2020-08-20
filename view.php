<?php include('include/header.php'); ?>

<?php


$id = isset($_GET['id']) ? $_GET['id'] : NULL;

if(isset($_POST['add_to_cart'])){

    $user_id = $_POST['user_id'];
    $item_id = $_POST['item_id'];

    if(insertIntoCart($user_id, $item_id)){
        header("Location:index.php");
    }

}


$book = getBookById($id);

// pretty_print(getCartItemId());

?>

<section id="view-section">
    <div class="view">

        <div class="book-profile">
            <div class="book-image">
                <img src="./uploads/books/<?php echo $book['photo']; ?>" alt="">
            </div>
            <div class="book-info">
                <ul class="star-icon">
                    <li>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </li>
                    <li>Book Title - <?php echo $book['name']; ?></li>
                    <li>Autor Name - <?php echo $book['autor']; ?></li>
                    <li>Category - <?php echo $book['category']; ?></li>
                    <li>Rating - <span style="background: #fdefcc;">75%</span></li>
                </ul>
            </div>
        </div>

        <div class="book-description">
            <h1>DESCRIPTION</h1>
            <hr>
            <P><?php echo $book['description']; ?></P>

            <div class="btn-group">
                <form action="#" method="POST">
                    <input type="hidden" name='item_id' value="<?php echo $book['id']; ?>">
                    <input type="hidden" name='user_id' value="<?php echo 1; ?>">
                    <?php
                        if(in_array($book['id'], getCartItemId())){
                            echo '<button type="submit" disabled class="btn-small btn-success font-size-12">In the cart <i class="fas fa-shopping-cart"></i></button>';
                        }else{
                            echo '<button class="btn-small first-btn" name="add_to_cart">Add To Cart <i class="fas fa-plus"></i></button>';
                        }

                    ?>
                </form>
            </div>

        </div>
    </div>
</section>




<?php include('include/footer.php'); ?>