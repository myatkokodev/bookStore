<?php 

    require('function.php');
    $errors = array();

    if(isset($_POST['submit'])){

        $new_book = array();

        flash($_POST);

        if(empty($_POST['name'])){
            $errors['name'] = "Enter Book's Title First!";
        }else{
            $new_book['name'] = $_POST['name'];
        }

        if(!empty($_FILES['photo']['name'])){
            $photo = $_FILES['photo'];
            $allowed_types = ['image/jpg', 'image/png', 'image/jpeg'];
            if(!in_array($photo['type'], $allowed_types) || $photo['size'] > 3000000){
                $errors['photo'] = "File type must be jpeg or jpg or png image and must not be larger than 3MB.";
            }else{
                $filename = time().'-'.$photo['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/books/".$filename);
                $new_book['photo'] = $filename;
            }
            // $filename = time()."-".random(111111,999999)."-".$_FILES['photo']['name'];
            // move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/books/".$filename);
            // $new_book['photo'] = $_FILES['photo'];
        }

        if(empty($_POST['price'])){
            $errors['price'] = "Please enter price!";
        }else{
            $new_book['price'] = $_POST['price'];
        }

        if(empty($_POST['autor'])){
            $errors['autor'] = "Please enter autor name!";
        }else{
            $new_book['autor'] = $_POST['autor'];
        }

        if(empty($_POST['description'])){
            $errors['description'] = "Please enter book description!";
        }else{
            $new_book['description'] = $_POST['description'];
        }

        $new_book['category'] = $_POST['category'];


        if(count($errors) == 0){
            if(insertBook($new_book)){
                header("Location:index.php");
            }else{
                $errors['save'] = "Smoething went wrong while saving this post.Please try again!";
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
                <label for="name">Add Book Title:</label>
                <input type="text" class="form-control" placeholder="GOME WITH THE WIND" name="name" value="<?php echo old('name'); ?>">
                <?php if(isset($errors['name'])): ?>
                    <p class="text-danger" style="color: red;"><?php echo $errors['name']; ?></p>
                <?php endif; ?>

                <label for="photo">Add A Book Cover:</label>
                <input type="file" name="photo" class="form-control">

                <label for="price">Add Book Price:</label>
                <input type="text" name="price" placeholder="00.00" class="form-control" value="<?php echo old('price'); ?>">
                <?php if(isset($errors['price'])): ?>
                    <p class="text-danger"><?php echo $errors['price']; ?></p>
                <?php endif; ?>

                <label for="autor">Add Book's Autor:</label>
                <input type="text" name="autor" placeholder="JOHN SMIT" class="form-control" value="<?php echo old('autor'); ?>">
                <?php if(isset($errors['autor'])): ?>
                    <p class="text-danger"><?php echo $errors['autor']; ?></p>
                <?php endif; ?>

                <label for="description">Add Book's Description:</label>
                <textarea name="description" rows="10" placeholder="THis book is ..."><?php echo old('description'); ?></textarea>
                <?php if(isset($errors['description'])): ?>
                    <p class="text-danger"><?php echo $errors['description']; ?></p>
                <?php endif; ?>

                <label for="category">Select A Category:</label>
                 <select name="category" class="form-control">
                     <option value="">BOOK</option>
                     <option value="TOP SELLER">TOP SELLER</option>
                     <option value="NEW RELEASE">NEW RELEASE</option>
                     <option value="BLOG">BLOG</option>
                     <option value="COMMING SOON">COMMING SOON</option>
                 </select>
                 <button type="submit" name="submit" class="form-control form-btn">Submit</button>
            </form>
        </div>


    <!--- content --->


<?php include('include/admin_footer.php'); ?>