<?php include('include/header.php'); ?>

<?php

$category = 'COMMING SOON';
$commingSoonBooks = getBookByCategory($category);

if(isset($_POST['delete'])){
    $deleteId = $_POST['delete_id'];

    if(deleteBook($deleteId)){
        header("Location: comming_soon.php");
    }else{
        echo "Something went wrong!";
    }
}

//pretty_print($commingSoonBooks);

?>

<!-- comming soon section --->

<section id="top-seller">
    <h1>COMMING SOON...</h1>
    <hr>

    <div class="top-seller-container">

        <?php foreach($commingSoonBooks as $commingSoon): ?>
        <div class="top-seller" style="background: url('./uploads/books/<?php echo $commingSoon['photo']; ?>'); background-position: center; background-size: contain;">
            <div class="top-seller-list" >
                <ul>
                    <li title="Add To Wishlist"><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li title="Quick View"><a href="view.php?id=<?php echo $commingSoon['id']; ?>"><i class="fas fa-search"></i></a></li>
                    <li title="Add To Cart"><a href="view.php?id=<?php echo $commingSoon['id']; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li title="Compare"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="admin-control">
                <a href="edit.php?book_id=<?php echo $commingSoon['id']; ?>">edit</a>
                <form action="" method="POST">
                <input type="hidden" value="<?php echo $commingSoon['id']; ?>" name="delete_id">
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