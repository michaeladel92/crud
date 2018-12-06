<?php
include('inc/header.php');


$msg = '';
//insert data
if (isset($_POST['add_cat'])) {
        $categoryName   =  $_POST['categoryName'];
   

            if (empty($categoryName)) {
                    $msg = '<div class="alert alert-danger">Please Insert book name</div>';
            }elseif(strlen($categoryName) < 3){
                    $msg = '<div class="alert alert-danger">Minimum char. Length 3 </div>';
            }else{

                    $sql = "INSERT INTO `categories` (`category`) VALUES ('$categoryName')";

                    $query = mysqli_query($connect,$sql);

                    if ($query) {
                    $msg = '<div class="alert alert-success">Category Successfully Added </div>';

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
              <div class="panel-heading"><h4>Create New Category</h4></div>

  <div class="panel-body">
        <form action="" method="POST">
        <!-- bookName -->
            <div class="form-group col-md-6 col-md-offset-3">
                <input type="text" name="categoryName" placeholder="insert Category Name" class="form-control">
             </div>   
        <!-- submit -->
             <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" name="add_cat" value="Add Category" class="btn btn-warning">
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