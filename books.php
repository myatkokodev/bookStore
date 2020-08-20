<?php include('include/header.php'); ?>

<?php 

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 5;
$offset = ($page-1) * $limit;
$total_result = getBookCount();

$total_pages = ceil($total_result/$limit);


$allBooks = getBookAll($offset, $limit);


if(isset($_POST['delete'])){
    $deleteId = $_POST['delete_id'];

    if(deleteBook($deleteId)){
        header("Location: books.php");
    }else{
        echo "Something went wrong!";
    }
}

?>

<section id="all_book">
    <h1>BOOKS</h1>
    <hr>

    <div class="book-container">

        <?php foreach($allBooks as $book): ?>
        <div class="book" style="background: url('./uploads/books/<?php echo $book['photo']; ?>'); background-position: center; background-size: contain;">
            <div class="book-list" >
                <ul>
                    <li title="Add To Wishlist"><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li title="Quick View"><a href="view.php?id=<?php echo $book['id']; ?>"><i class="fas fa-search"></i></a></li>
                    <li title="Add To Cart"><a href="view.php?id=<?php echo $book['id']; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li title="Compare"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <!-- Admin Control -->

            <div class="admin-control">
                <a href="edit.php?book_id=<?php echo $book['id']; ?>">edit</a>
                <form action="" method="POST">
                <input type="hidden" value="<?php echo $book['id']; ?>" name="delete_id">
                <button class="del-book-btn" name="delete" onclick="return confirm('Are you sure to delete this book?');">delete</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <div class="pagination">
            <?php if($page > 1 && $page <= $total_pages): ?>
            <a href="?page=<?php echo $page-1; ?>">&laquo;</a>
            <?php endif; ?>

            <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo ($page==$i) ? "active" : ""; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
            <!-- <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a> -->
            <?php if($page < $total_pages): ?>
            <a href="?page=<?php echo $page+1; ?>">&raquo;</a>
            <?php endif; ?>
    </div>

</section>


<?php include('include/footer.php'); ?>