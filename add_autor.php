<?php include('include/admin_header.php'); ?>


    <!-- content -->

    <div class="book-form">
            <form action="" method="POST">
                <input type="text" class="form-control" placeholder="Autor Name" name="autor_name">
                <input type="file" name="photo" class="form-control">
                <input type="text" name="email" placeholder="email" class="form-control">
                <input type="text" name="phone" placeholder="phone" class="form-control">
                <textarea name="description" rows="10" placeholder="address"></textarea>
                <button type="submit" name="submit" class="form-control form-btn">Submit</button>
            </form>
        </div>


    <!--- content --->


<?php include('include/admin_footer.php'); ?>