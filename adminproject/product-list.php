<?php 
  include "inc/header.php";
  
  
 
  if(isset($_GET['delete']) && !empty($_GET['delete'])){
       $delete_id = $_GET['delete'];
      
       $message=$product->delete($delete_id);
  }
?>

<section id="main">
           <div class="row">
            
              <?php  include "inc/sidebar.php"; ?>

                <!-- column 9 -->
                <div class="col-md-9 mt-2 mt-lg-0 mt-md-0">

                      <div class="card mt-4">
                          <div class="card-header main-color-bg">
                              <h3>Product List</h3>
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
                                <th width="2%">Sr No.</th>
                                <th width="5%">Name</th>
                                <th width="5%">Category</th>
                                <th width="5%">Brand</th>
                                <th width="5%">Tag</th>
                                <th width="5%">Image</th>
                                <th width="2%">Status</th>
                                <th width="2%">Price</th>
                                <th width="5%">Joined</th> 
                                <th width="14%">Action</th>  
                            </tr>
                        </thead>
                         <tbody>
                        <?php
                            $sql    = "SELECT * FROM  products;";
                            $result =  $db->select($sql);
                            $i=0;
                            while($value = $result->fetch_assoc()){
                                $i++;
                        ?>
                        <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td>
                            <?php 
                             echo $format->textShorten($value['name'],30); 
                             ?>
                        </td>
                        <td>
                            <?php
                             $category_id = $value['category_id'];
                             $sql         = "SELECT * FROM `categories` WHERE id=$category_id;";
                             $category    = $db->select($sql);
                             $category    = $category->fetch_assoc();
                             echo $category['name']; 
                            ?>
                         </td>
                        <td>
                          <?php
                                $brand_id    = $value['brand_id'];
                                $sql         = "SELECT * FROM `brands` WHERE id=$brand_id;";
                                $brand      = $db->select($sql);
                                if($brand){
                                    $brand       = $brand->fetch_assoc();
                                    echo $brand['name']; 
                                }else{
                                    echo "no  brand";
                                }
                               
                            ?>
                        </td>
                        <td>
                              <?php echo $format->textShorten($value['tag'],30); ?>
                        </td>
                        <td> 
                           <?php
                                $product_id    = $value['id'];
                                $sql           = "SELECT * FROM `images` WHERE product_id=$product_id  LIMIT 1;";
                                $image         = $db->select($sql);
                                if($image){
                                    $image         = $image->fetch_assoc();?>
                                 <img src="../<?php echo $image['image']; ?>" width="50px" alt=""/> 

                                <?php }else{
                                    echo "No Image !";
                                } ?>
                        </td>
                        <td>
                              <?php
                                  $status = $value['status'];
                                  if($status == 0){
                                    echo "No avilable"; 
                                  }
                                  elseif($status == 1){
                                      echo "stock";
                                  }
                                  
                               ?>
                        </td>
                        <td>
                              <?php  echo $value['price']; ?>
                        </td>
                        <td>
                         <?php echo date("d  M ,Y", strtotime($value['date'])); ?>
                        </td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="product-edit.php?productedit=<?php echo $value['id']; ?>">Edit
                         </a> ||
                            <a  class="btn btn-danger btn-sm" href="?delete=<?php echo $value['id']; ?>">Delete</a>
                        </td>
                        </tr>
                        <?php }?>
                     </tbody> 
                               </table>
                          </div>
                      </div>
                  </div>
                 </div> 
                 <!-- end of column 9 -->
            
           </div>
   
</section>





<?php include "inc/footer.php" ?>