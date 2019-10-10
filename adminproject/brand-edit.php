<?php 
  include "inc/header.php";


 

if(isset($_POST['brandupdate']) && !empty($_POST['brandupdate'])){
               
    $message = $brand->update($_POST,$_FILES);
}

if(isset($_GET['brandedit'])  && !empty($_GET['brandedit'])){
    $brand_id   =  $_GET['brandedit'];
    $sql       =  "SELECT * FROM brands WHERE id=$brand_id;";
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
                              <h3>Users Edit</h3>
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
                            <label for="inputAddress">name</label>
                            <input type="text" class="form-control" name="name" 
                            value="<?php echo $result['name']; ?>">
                          </div>
                           
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Description</label>
                                <textarea name="description"  cols="30" rows="10">
                                     <?php echo $description; ?>
                                </textarea>
                            </div>

                            <div class="form-group col-md-8">
                                <label class='form-control-label'>Image</label>
                                <img src="../<?php echo $result['image']; ?>" width="50px" alt="">
                                <input type="file" class="form-control" name="image">
                            </div> 
                           <input type="submit" name="brandupdate" class="btn btn-primary" value="Update Brand">
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