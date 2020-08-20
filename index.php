<?php include('include/header.php'); ?>

<?php

$category = 'NEW RELEASE';
$newReleases = getBookByCategory($category);
//pretty_print($newReleases);

if(isset($_POST['delete'])){
  $deleteId = $_POST['delete_id'];

  if(deleteBook($deleteId)){
    header("Location: index.php");
  }else{
    echo "Something went wrong!";
  }
}


?>


 <!-- banner area -->
 <section id="site-banner">

<div class="banner-container">

  <h1>
    Good books don't give up 
    all their secrets at once
  </h1>

  <p>
    “Many people, myself among them, 
    feel better at the mere sight of a book.”
  </p>

  <div class="button-group">
    <button class="btn first-btn">View All Books</button>
    <button class="btn second-btn">Explore Now</button>
  </div>

</div>



</section>
<!-- end banner area -->

<!-- book category -->

<section id="book-category-list">
<div class="book-category">
  <div class="category-list">

    <div class="children">

      <div class="img-fluid">
        <img src="./assets/img/book-category/children.png" alt="children-book">
      </div>

      <h5>Children's Books</h5>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>

    </div>

    <div class="romance">
      <div class="img-fluid">
        <img src="./assets/img/book-category/romanc.png" alt="children-book">
      </div>
      <h5>Romance</h5>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>
    </div>

    <div class="art">
      <div class="img-fluid">
        <img src="./assets/img/book-category/archi.png" alt="children-book">
      </div>
      <h5>Art's & Architecture</h5>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>
    </div>

    <div class="history">
      <div class="img-fluid">
        <img src="./assets/img/book-category/history.png" alt="children-book">
      </div>
      <h5>History</h5>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>
    </div>

  </div>
</div> 
</section>

<!-- end book category-->

<!-- reader section -->
<section id="reader-section">
<div class="reader-box">
  <div class="active-reader">
    <h1>75,678</h1>
    <p>ACTIVE READERS</p>
  </div>
  <div class="total-page">
    <h1>3,043</h1>
    <p>TOTAL PAGES</p>
  </div>
  <div class="coffee">
    <h1>202</h1>
    <p>CUP OF COFFEE</p>
  </div>
  <div class="fan">
    <h1>10,000</h1>
    <p>FACEBOOK FANS</p>
  </div>
</div>
</section>
<!-- end reader section -->

<!-- welcome section-->
<section id="welcome-section">
<div class="welcome">
  <div class="welcome-image">
    <img src="./assets/img/welcome/mon.png" alt="author">
  </div>
  <div class="welcome-text">
    <p class="welcome-company">WELCOME TO MK BOOKSTORE COMPANY</p>
    <p class="welcome-header">MK LIBRARY <br> created by MyatKo</p>
    <p>
      A small river named Duden flows by their place and 
      supplies it with the necessary regelialia. It is a 
      paradisematic country, in which roasted parts of 
      sentences fly into your mouth.
    </p>
    <p>
      On her way she met a copy. The copy warned the Little 
      Blind Text, that where it came from it would have been 
      rewritten a thousand times and everything that was left 
      from its origin would be the word "and" and the Little 
      Blind Text should turn around and return to its own, 
      safe country.
    </p>
    <button class="btn first-btn">view all our author</button>
  </div>
</div>
</section>
<!-- welcome section-->

<!-- new release section -->

<section id="new-release">
<p>BOOKS</p>
<h1>New Release</h1>
<div class="new-release-container">

  <?php foreach($newReleases as $newRelease): ?>
    <div class="new-release">
      <img src="./uploads/books/<?php echo $newRelease['photo']; ?>" alt="newBook">
      <div class="release-list">
        <ul>
          <li title="Add To Wishlist"><a href="#" class="release-link"><i class="fas fa-heart"></i></a></li>
          <li title="Quick View"><a href="view.php?id=<?php echo $newRelease['id']; ?>" class="release-link"><i class="fas fa-search"></i></a></li>
          <li title="Add To Cart"><a href="view.php?id=<?php echo $newRelease['id']; ?>" class="release-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
          <li title="Compare"><a href="#" class="release-link"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <div class="release-info">
        <p>$<?php echo $newRelease['price']; ?></p>
        <h2><?php echo $newRelease['name']; ?></h2>
        <p class="author-name">By <?php echo $newRelease['autor']; ?></p>
      </div>


      <!-- ADMIN CONTROL -->

      <div class="admin-control">
        <a href="edit.php?book_id=<?php echo $newRelease['id']; ?>">edit</a>
        <form action="" method="POST">
          <input type="hidden" value="<?php echo $newRelease['id']; ?>" name="delete_id">
          <button class="del-book-btn" name="delete" onclick="return confirm('Are you sure to delete this book?');">delete</button>
        </form>
      </div>

    </div>
  <?php endforeach; ?>

  
</div>
</section>

<!-- end new release section-->


<!-- Testimonial section-->

<section id="client-word">

<div class="client-word-container">
  <p>Testimonial</p>
  <h1>Kinds Words From Clients</h1>
</div>

  <div class="owl-carousel owl-theme client-saying">
    <div class="item client1">
      <p>
        Motivational quotes can help you reach your 
        potential each day. Sure, they’re just words.
        But they’re positive words.
      </p>
      <div class="user">
        <div class="user-img">
          <img src="./assets/img/user/user1.png" alt="user1">
        </div>
        <div class="user-info">
          <h3>Myat Ko Ko</h3>
          <p>Web Developer</p>
        </div>
      </div>
    </div>

    <div class="item client2">
      <p>
        Motivational quotes can help you reach your 
        potential each day. Sure, they’re just words.
        But they’re positive words.
      </p>
      <div class="user">
        <div class="user-img">
          <img src="./assets/img/user/user1.png" alt="user1">
        </div>
        <div class="user-info">
          <h3>Deavy Jone</h3>
          <p>Marketing Manager</p>
        </div>
      </div>
    </div>

    <div class="item client3">
      <p>
        Motivational quotes can help you reach your 
        potential each day. Sure, they’re just words.
        But they’re positive words.
      </p>
      <div class="user">
        <div class="user-img">
          <img src="./assets/img/user/user1.png" alt="user1">
        </div>
        <div class="user-info">
          <h3>Roger Scott</h3>
          <p>Project Manager</p>
        </div>
      </div>
    </div>

    <div class="item client3">
      <p>
        Motivational quotes can help you reach your 
        potential each day. Sure, they’re just words.
        But they’re positive words.
      </p>
      <div class="user">
        <div class="user-img">
          <img src="./assets/img/user/user1.png" alt="user1">
        </div>
        <div class="user-info">
          <h3>Angela</h3>
          <p>Sofware Engineer</p>
        </div>
      </div>
    </div>

  </div>


</section>

<!-- End testimonial section-->


<!-- blog section -->

<section id="blog">
<h4>BLOG</h4>
<h1>Recent Blog</h1>
<div class="blog-container">
  <div class="blog">
    <div class="blog-img">
      <img src="./assets/img/blog-img/image3.png" alt="blog-image">
    </div>
    <div class="blog-date">
      <p class="blog-day">02</p>
      <p class="blog-month">MAY</p>
      <span>2020</span>
    </div>
    <div class="blog-info">
      <h3>New Friend With Book</h3>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>
    </div>
  </div>

  <div class="blog">
    <div class="blog-img">
      <img src="./assets/img/blog-img/image1.png" alt="blog-image">
    </div>
    <div class="blog-date">
      <p class="blog-day">02</p>
      <p class="blog-month">MAY</p>
      <span>2020</span>
    </div>
    <div class="blog-info">
      <h3>New Friend With Book</h3>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>
    </div>
  </div>

  <div class="blog">
    <div class="blog-img">
      <img src="./assets/img/blog-img/image2.png" alt="blog-image">
    </div>
    <div class="blog-date">
      <p class="blog-day">02</p>
      <p class="blog-month">MAY</p>
      <span>2020</span>
    </div>
    <div class="blog-info">
      <h3>New Friend With Book</h3>
      <p>
        A small river named Duden flows by their 
        place and supplies it with the necessary 
        regelialia.
      </p>
    </div>
  </div>

</div>
</section>

<!-- end blog section -->

</main>



<?php include('include/footer.php'); ?>