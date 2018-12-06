<?php
include('inc/header.php');

//ALL Categories
$categories = mysqli_query($connect,"SELECT * FROM  `categories`");
$msg = '';
//insert data
if (isset($_POST['add_book'])) {
        $bookName   =  $_POST['book'];
        $cate_name  =  $_POST['cat_name'];

            if (empty($bookName)) {
                    $msg = '<div class="alert alert-danger">Please Insert book name</div>';
            }elseif(strlen($bookName) < 3){
                    $msg = '<div class="alert alert-danger">Minimum char. Length 3 </div>';
            }else{

                    $sql = "INSERT INTO `books` (`bookName`,`category_id`) VALUES ('$bookName','$cate_name')";

                    $query = mysqli_query($connect,$sql);

                    if ($query) {
                    $msg = '<div class="alert alert-success">Book Successfully Added </div>';

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
                <input type="text" name="book" placeholder="insert book Name" class="form-control">
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
                <input type="submit" name="add_book" value="Add Book" class="btn btn-warning">
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