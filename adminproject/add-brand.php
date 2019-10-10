<?php 
include "inc/header.php";

if(isset($_POST['userupdate']) && !empty($_POST['userupdate'])){
               
    $message = $user->update($_POST,$_FILES);
}

if(isset($_GET['useredit'])  && !empty($_GET['useredit'])){
    $user_id   =  $_GET['useredit'];
    $sql       =  "SELECT * FROM  users WHERE id=$user_id;";
    $result    =  $db->select($sql);
    $result    =  $result->fetch_assoc();
}
?>

<section id="main">
           <div class="row">
             
              <?php  include "inc/sidebar.php"; ?>

                <!-- column 9 -->
                <div class="col-md-9 mt-2 mt-lg-0 mt-md-0">

                      <div class="card mt-4">
                        <div class="card-header main-color-bg">
                              <h3>Add Brand</h3>
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
                          
                          <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                          <div class="form-group col-md-8 ">
                            <label for="">Name</label>
                            <input type="text" class="form-control" 
                            name="name">
                          </div>
                           
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Enter description">
                            </div>

                            <div class="form-group col-md-8">
                                <label class='form-control-label'>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div> 
                           <input type="submit" name="addBrand" class="btn btn-primary" value="Add Brand">
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