<?php include('include/header.php'); ?>

<?php

$category = 'TOP SELLER';
$topSellers = getBookByCategory($category);
//pretty_print($newReleases);

if(isset($_POST['delete'])){
    $deleteId = $_POST['delete_id'];

    if(deleteBook($deleteId)){
        header("Location: top_seller.php");
    }else{
        echo "Something went wrong!";
    }
}

?>

<!-- top seller section --->
<section id="top-seller">
    <h1>TOP SELLER</h1>
    <hr>

    <div class="top-seller-container">

        <?php foreach($topSellers as $topSeller): ?>
        <div class="top-seller" style="background: url('./uploads/books/<?php echo $topSeller['photo']; ?>'); background-position: center; background-size: contain;">
            <div class="top-seller-list" >
                <ul>
                    <li title="Add To Wishlist"><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li title="Quick View"><a href="view.php?id=<?php echo $topSeller['id']; ?>"><i class="fas fa-search"></i></a></li>
                    <li title="Add To Cart"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li title="Compare"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <!-- Admin Control -->

            <div class="admin-control">
                <a href="edit.php?book_id=<?php echo $topSeller['id']; ?>">edit</a>
                <form action="" method="POST">
                <input type="hidden" value="<?php echo $topSeller['id']; ?>" name="delete_id">
                <button class="del-book-btn" name="delete" onclick="return confirm('Are you sure to delete this book?');">delete</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
    </div>

</section>




<?php include('include/footer.php'); ?>