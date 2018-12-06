<?php
include('inc/header.php');

//ALL Categories
$categories = mysqli_query($connect,"SELECT * FROM  `categories`");
$msg = '';

if (isset($_GET['editBook'])) {
      $book_id = intval($_GET['editBook']);

      $books = mysqli_query($connect,"SELECT * FROM `books` WHERE `id` = '$book_id'");

          if (mysqli_num_rows($books) != 1) {
            header('location:index.php');
          }else{
              $book = mysqli_fetch_assoc($books);
          }
}

//update data
if (isset($_POST['update_book'])) {
        $bookName   =  $_POST['book'];
        $cate_name  =  $_POST['cat_name'];

            if (empty($bookName)) {
                    $msg = '<div class="alert alert-danger">Please Insert book name</div>';
            }elseif(strlen($bookName) < 3){
                    $msg = '<div class="alert alert-danger">Minimum char. Length 3 </div>';
            }else{

                    $sql = "UPDATE `books` SET 
                                              `bookName` = '$bookName',
                                              `category_id` = '$cate_name'
                                              WHERE
                                              `id` = '$book_id'
                                              ";

                    $query = mysqli_query($connect,$sql);

                    if ($query) {
                      //to show the latest update 
                         $books = mysqli_query($connect,"SELECT * FROM `books` WHERE `id` = '$book_id'");
                         $book = mysqli_fetch_assoc($books);
                    $msg = '<div class="alert alert-success">Book Successfully Updated</div>';

                    }
            }
}


?>

<div class="container">
<div class="row">
    <!-- warning message -->
    <div class="col-md-6 text-center">
        <?php echo $msg; ?>
    </div>

        <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
              <div class="panel-heading"><h4>Create New Book</h4></div>

  <div class="panel-body">
        <form action="" method="POST">
        <!-- bookName -->
            <div class="form-group col-md-6 col-md-offset-3">
                <input type="text" value="<?php echo $book['bookName']?>" name="book" placeholder="insert book Name" class="form-control">
             </div>   
        <!-- category -->
             <div class="form-group col-md-6 col-md-offset-3">
                <select name="cat_name" class="form-control">

                <?php while ($category = mysqli_fetch_assoc($categories)) {?>
                           <option value="<?php echo $category['cat_id'];?>"><?php echo $category['category'];?></option>
                <?php } ?>
                </select>
             </div>  
        <!-- submit -->
             <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" name="update_book" value="Update Book" class="btn btn-warning">
             </div>  
        </form>
  </div>
</div>
        
</div>
</div>
</div>
<?php
include "inc/footer.php";

?>