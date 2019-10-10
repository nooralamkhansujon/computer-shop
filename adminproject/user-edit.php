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
                            <label for="inputAddress">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $result['username']; ?>">
                          </div>
                           
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>">
                            </div>

                            <div class="form-group col-md-8">
                                <label class='form-control-label'>Image</label>
                                <img src="../<?php echo $result['avater']; ?>" width="50px" alt="">
                                <input type="file" class="form-control" name="avater">
                            </div> 
                            <div class="form-group col-md-8">
                              <label class="form-control-label mr-2 text-light" >Role</label>
                             <select  class="form-control form-control-lg " name="role">
                                 <option>Select Role</option>
                                 <option <?php echo($result['role']  == 1 )? "selected":""; ?> value="1" >Admin</option>
                                 <option <?php echo($result['role'] == 2 )? "selected":""; ?>  value="2">User</option>
                             </select>
                          </div>
                           <input type="submit" name="userupdate" class="btn btn-primary" value="Update User">
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