<?php 

//pretty print function
function pretty_print($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

//save into session for form data (temporatory)
function flash($array){
    $_SESSION['formdata'] = $array;
}

//output form value stored in session
function old($key){
    $value = isset($_SESSION['formdata'][$key]) ? $_SESSION['formdata'][$key] : NULL;
    if($value){
        unset($_SESSION['formdata'][$key]);
    }
    return $value;
}

$dbname = "book_store";
$servername = "localhost";
$username = "phpdev";
$password = "123456";

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);//where the connection 
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
die("Connection failed: " . $e->getMessage());
}

//get all book
function getBookAll($offset=0,$limit=5,$count=false){
    global $conn;
    $query = "SELECT * FROM `books` ORDER BY `created_at` DESC LIMIT :limit OFFSET :offset";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":limit", $limit,PDO::PARAM_INT);
    $stmt->bindParam(":offset", $offset,PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

//get book count
function getBookCount(){
    global $conn;
    $query = "SELECT COUNT(*) as total FROM `books` ORDER BY `created_at` DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchColumn();
}


//get book by id
function getBookById($id){
    global $conn;
    $query = "SELECT * FROM `books` WHERE `id` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

//get books by category
function getBookByCategory($category){
    global $conn;
    $query = "SELECT * FROM `books` WHERE `category` = :category ORDER BY `created_at` DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":category",$category);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

//insert into books table
function insertBook($new_book){
    global $conn;
    $query = "INSERT INTO `books`(`name`, `autor`, `price`, `photo`, `description`, `category`) VALUES (:name, :autor, :price, :photo, :description, :category)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name", $new_book['name']);
    $stmt->bindParam(":autor", $new_book['autor']);
    $stmt->bindParam(":price", $new_book['price']);
    $stmt->bindParam(":photo", $new_book['photo']);
    $stmt->bindParam(":description", $new_book['description']);
    $stmt->bindParam(":category", $new_book['category']);

    return $stmt->execute();
}

//insert into cart table
function insertIntoCart($user_id, $item_id){
    global $conn;
    $query = "INSERT INTO `cart`(`user_id`, `item_id`) VALUES (:user_id, :item_id)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":item_id", $item_id);
    return $stmt->execute();
}


//get data from cart table
function cartData(){
    global $conn;
    $query = "SELECT * FROM `cart`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getCartItemId(){
    global $conn;
    $query = "SELECT `item_id` FROM `cart`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_COLUMN,0);
    return $stmt->fetchAll();
}



//delete cart
function deleteCart($cart_id){
    global $conn;
    $query = "DELETE FROM `cart` WHERE `item_id` = :cart_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":cart_id", $cart_id);
    return $stmt->execute();
}

//delete book
function deleteBook($delete_id){
    global $conn;
    $query = "DELETE FROM `books` WHERE `id` = :delete_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":delete_id", $delete_id);
    return $stmt->execute();
}



// $cartData = getData();
// foreach($cartData as $cart){
//     pretty_print(getBookById($cart['item_id']));
// }


//update book
function updateBook($book_id, $update_book){
    global $conn;
    try{
        $query = "UPDATE `books` SET `name`=:name,`autor`=:autor,`price`=:price";
    //`photo`=:photo,`description`=:description,`category`=:category WHERE `id` = :id;";
    if(!empty($update_book['photo'])){
        $query .= " ,`photo`=:photo";
    }
    $query .= " ,`description`=:description,`category`=:category WHERE `id` = :id;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name", $update_book['name']);
    $stmt->bindParam(":autor", $update_book['autor']);
    $stmt->bindParam(":price", $update_book['price']);
    if(!empty($update_book['photo'])){
        $stmt->bindValue(":photo", $update_book['photo']);
    }
    $stmt->bindParam(":description", $update_book['description']);
    $stmt->bindParam(":category", $update_book['category']);
    $stmt->bindParam(":id", $book_id);

    return $stmt->execute();
    } catch(PDOExpression $e){
        die($e->getMessage());
    }
}






 ?>