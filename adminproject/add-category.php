<?php 
include "inc/header.php";

if(isset($_POST['addcategory']) && !empty($_POST['addcategory'])){          
    $message = $category->addcategory($_POST,$_FILES);
}
?>

<section id="main">
           <div class="row">
             
              <?php  include "inc/sidebar.php"; ?>

        <!-- column 9 -->
            <div class="col-md-9 mt-2 mt-lg-0 mt-md-0">
                <div class="card mt-4">
                    <div class="card-header main-color-bg">
                    <h3>Add Category</h3>
                   </div>
              <div class="card-body">
                <?php 
                    if(isset($message) && !empty($message)){?>
                    <div class="alert alert-primary alert_box"  role="alert">
                    <?php 
                        echo $message;
                    ?>
                    </div>
                <?php  } ?>
            <form action ='' method="POST" enctype="multipart/form-data">
                          
                <div class="form-group col-md-8 ">
                   <label for="">Name</label>
                   <input type="text" class="form-control"  name="name" placeholder="Enter Category Name">
                </div>

                <div class="form-group col-md-8">
                    <label>Images</label>
                    <input type="file" class="form-control" name="image" />
                </div>
                <input type="submit" name="addcategory" class="btn btn-primary" value="Add Category">
        </form>                    

   </div>
        </div>
    </div>
    </div> 
    <!-- end of column 9 -->
            
           </div>
   
</section>



<!-- Modals  -->




<?php include "inc/footer.php" ?>