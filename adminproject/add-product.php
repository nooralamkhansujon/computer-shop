<?php 
include "inc/header.php";

if(isset($_POST['addproduct']) && !empty($_POST['addproduct'])){
               
    $message = $product->addproduct($_POST,$_FILES);
  
}


?>

<section id="main">
           <div class="row">
             
              <?php  include "inc/sidebar.php"; ?>

        <!-- column 9 -->
            <div class="col-md-9 mt-2 mt-lg-0 mt-md-0">
                <div class="card mt-4">
                    <div class="card-header main-color-bg">
                    <h3>Add Product</h3>
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
                   <input type="text" class="form-control"  name="name" placeholder="Enter Name">
                </div>

                <div class="form-group col-md-8 ">
                   <label for="">Category</label>
                    <select class="form-control" name="category_id">
                        <option>Select Category</option>
                        <?php
                          $sql = "SELECT * FROM `categories` ;";
                          $category = $db->select($sql);
                          while($value = $category->fetch_assoc()){?>
                                 <option value="<?php echo $value['id'] ?>">
                                    <?php echo $value['name']; ?>
                                </option>
                         <?php  }?>
                        
                    </select>
                </div>

                <div class="form-group col-md-8 ">
                   <label>Brand</label>
                    <select class="form-control" name="brand_id" >
                        <option>Select  Brand</option>
                        <?php
                          $sql = "SELECT * FROM  brands;";
                          $brand = $db->select($sql);
                          while($value = $brand->fetch_assoc()){?>
                                 <option value="<?php echo $value['id']; ?>">
                                    <?php echo $value['name']; ?>
                                </option>
                         <?php } ?>
                        
                    </select>
                </div>

                <div class="form-group col-md-8">
                    <label>Tag</label>
                    <textarea name="tag"  class="form-control" cols="30" rows="10" >
                    </textarea>
                </div>

                <div class="form-group col-md-8">
                    <label>Images</label>
                    <input type="file" class="form-control" name="images[]" multiple="multiple" />
                </div>

                <div class="form-group col-md-8">
                    <label class='form-control-label'>status</label>
                    <select class="form-control" name="status">
                       <option>Select Status</option> 
                        <option value="0">No Available</option> 
                        <option value="1">Available</option>  
                    </select>
                </div> 
                <div class="form-group col-md-8">
                    <label>price</label>
                    <input type="number" class="form-control" name="price" />
                </div>

                <input type="submit" name="addproduct" class="btn btn-primary" value="Add Product">
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