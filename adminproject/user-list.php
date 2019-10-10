<?php 
  include "inc/header.php";


  if(isset($_GET['delete']) && !empty($_GET['delete'])){
       $delete_id = $_GET['delete'];

       $message=$user->delete($delete_id);
  }
?>

<section id="main">
           <div class="row">
            
              <?php  include "inc/sidebar.php"; ?>

                <!-- column 9 -->
                <div class="col-md-9 mt-2 mt-lg-0 mt-md-0">

                      <div class="card mt-4">
                          <div class="card-header main-color-bg">
                              <h3>Users List</h3>
                          </div>
                          <div class="card-body">
                          <?php 
                            if(isset($message) && !empty($message)){?>
                            <div class="alert alert-danger alert_box"  role="alert">
                            <?php 
                                echo $message;
                            ?>
                            </div>
                        <?php  } ?>
                               <table class="table table-striped table-hover  table-bordered">
                                    <thead class="bg-dark text-light">
                                      <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>image</th>
                                        <th>Joined</th> 
                                        <th>Action</th>  

                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM  users;";
                                         $result =  $db->select($sql);
                                         $i=0;
                                         while($value = $result->fetch_assoc()){
                                             $i++;
                                        ?>
                                      <tr>
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $value['username']; ?></td>
                                          <td><?php echo $value['email']; ?></td>
                                          <td><?php echo ($value['role'] == 1)? "admin": "user" ?></td>
                                          <td> <img src="../<?php echo $value['avater']; ?>" width="50px" alt=""/></td>
                                          <td><?php echo date("d  M ,Y", strtotime($value['date'])); ?></td>
                                          <td>
                                               <a class="btn btn-primary btn-sm" href="user-edit.php?useredit=<?php echo $value['id']; ?>">
                                               Edit
                                            </a> ||
                                            <a  class="btn btn-danger btn-sm" href="?delete=<?php echo $value['id']; ?>">Delete</a>
                                          </td>
                                      </tr>
                                      <?php
                                       }
                                      ?>
                                    </tbody> 
                               </table>
                          </div>
                      </div>
                  </div>
                 </div> 
                 <!-- end of column 9 -->
            
           </div>
   
</section>



<!-- Modals  -->




<?php include "inc/footer.php" ?>