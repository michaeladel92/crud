<?php
include('inc/header.php');
$msg = '';
//if set delete
if (isset($_GET['delBook'])) {
		$book_id = intval($_GET['delBook']);

		$check = mysqli_query($connect,"SELECT * FROM `books` WHERE `id` = '$book_id'");
		if (mysqli_num_rows($check) != 1 ) {
			$msg ='<div class="alert alert-danger">Book Not Found</div>';
		}else{

			//delete Book
			$delete = mysqli_query($connect,"DELETE FROM `books` WHERE `id` = '$book_id'");
			if ($delete) {
						$msg ='<div class="alert alert-success">Book  Deleted Successfuly</div>';
					}		

		}

}


//get all book
$sql = "
			SELECT * FROM `books` b
						INNER JOIN `categories` c
						ON 
						b.category_id = c.cat_id
						ORDER BY
						`id`

	   ";
$books = mysqli_query($connect,$sql);


?>

<div class="container">

    <div class="row">
	<div class="col-md-6 col-md-offset-1 text-center">
        <?php echo $msg; ?>
    </div>
    	<div class="col-md-10 col-md-offset-1">
        <ul class="list">
            <li>
                <span>ID</span>
                <span>book</span>
                <span>Category</span>
                <span>Actions</span>
            </li>
             <?php while ($book = mysqli_fetch_assoc($books)) { ?>
            <li>
           
                <span><?php echo $book['id']?></span>
                <span><?php echo $book['bookName']?></span>
                <span><?php echo $book['category']?></span>
                <span>
                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                        <a href="edit_book.php?editBook=<?php echo  $book['id'];?>" class="btn btn-primary">Edit</a>
                        <a href="index.php?delBook=<?php echo  $book['id'];?>" class="btn btn-danger">Delete</a>
                    </div>
                </span>
          
            </li>
              <?php } ?>
        </ul>
    </div>
</div>
</div>




<?php
include "inc/footer.php";

?>