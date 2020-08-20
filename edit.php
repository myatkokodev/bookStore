<?php 

require("function.php");

$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : null;
$n_book = getBookById($book_id);
// pretty_print($n_book);

$errors = array();

if(isset($_POST['submit'])){

    $new_book = array();

    if(empty($_POST['name'])){
        $errors['name'] = "You must fill book name!";
    }else{
        $new_book['name'] = $_POST['name'];
    }

    if(!empty($_FILES['photo']['name'])){
        $thumbnail = $_FILES['photo'];
        $allowed_types = ["image/jpg", "image/jpeg", "image/png"];
        if(!in_array($thumbnail['type'], $allowed_types)){
            $errors['photo'] = "File must be jpg , png or jpeg image!";
        }else{
            $filename = time()."-".$thumbnail['name'];
            move_uploaded_file($thumbnail['tmp_name'], "uploads/books/".$filename);
            $new_book['photo'] = $filename;
        }

    }



    if(empty($_POST['price'])){
        $errors['price'] = "You must fill this field!";
    }else{
        $new_book['price'] = $_POST['price'];
    }


    if(empty($_POST['autor'])){
        $errors['autor'] = "You must fill this field!";
    }else{
        $new_book['autor'] = $_POST['autor'];
    }


    if(empty($_POST['description'])){
        $errors['description'] = "You must fill this field!";
    }else{
        $new_book['description'] = $_POST['description'];
    }

    if(empty($_POST['category'])){
        $errors['category'] = "You must fill this field!";
    }else{
        $new_book['category'] = $_POST['category'];
    }


    if(count($errors) == 0){
        $id = $_POST['id'];
        if(updateBook($id, $new_book)){
            header("Location:index.php");
        }else{
            $errors['save'] = "Something went wrong while saving this post!";
        }

    }




}


?>




<?php include('include/admin_header.php'); ?>


    <!-- content -->

    <div class="book-form">

    <?php if(isset($errors['save'])): ?>
        <p class="text-danger"><?php echo $errors['save']; ?></p>
    <?php endif; ?>


            <form action="" method="POST" enctype="multipart/form-data"> 

                <input type="hidden" name="id" value="<?php echo $n_book['id']; ?>">

                <label for="name">Edit Book Title:</label>
                <input type="text" class="form-control" placeholder="GOME WITH THE WIND" name="name" value="<?php echo $n_book['name']; ?>">
                <?php if(isset($errors['name'])): ?>
                <p class="text-danger"><?php echo $errors['name']; ?></p>
                <?php endif; ?>

                <label for="photo">Edit Book Cover:</label>
                <input type="file" name="photo" class="form-control">

                <label for="price">Edit Book Price:</label>
                <input type="text" name="price" placeholder="00.00" class="form-control" value="<?php echo $n_book['price']; ?>">
                <?php if(isset($errors['price'])): ?>
                <p class="text-danger"><?php echo $errors['price']; ?></p>
                <?php endif; ?>

                <label for="autor">Edit Book's Autor:</label>
                <input type="text" name="autor" placeholder="JOHN SMIT" class="form-control" value="<?php echo $n_book['autor']; ?>">
                <?php if(isset($errors['autor'])): ?>
                <p class="text-danger"><?php echo $errors['autor']; ?></p>
                <?php endif; ?>

                <label for="description">Edit Book's Description:</label>
                <textarea name="description" rows="10" placeholder="THis book is ..."><?php echo $n_book['description']; ?></textarea>
                <?php if(isset($errors['description'])): ?>
                <p class="text-danger"><?php echo $errors['description']; ?></p>
                <?php endif; ?>

                <label for="category">Edit Category:</label>
                 <select name="category" class="form-control">
                     <option value="">BOOK</option>
                     <option value="TOP SELLER">TOP SELLER</option>
                     <option value="NEW RELEASE">NEW RELEASE</option>
                     <option value="BLOG">BLOG</option>
                     <option value="COMMING SOON">COMMING SOON</option>
                 </select>
                 <button type="submit
                 " name="submit" class="form-control form-btn">Submit</button>
            </form>
        </div>


    <!--- content --->


<?php include('include/admin_footer.php'); ?>