<?php 
include "inc/header.php";

if(isset($_POST['updateproduct']) && !empty($_POST['updateproduct'])){
               
    $message = $product->updateproduct($_POST,$_FILES);
  
}

if(isset($_GET['productedit'])  && !empty($_GET['productedit'])){
    $product_id   =  $_GET['productedit'];
    $sql       =  "SELECT * FROM  `products` WHERE id=$product_id;";
    $result    =  $db->select($sql);
    $product    =  $result->fetch_assoc();
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
                          
                <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                <div class="form-group col-md-8 ">
                   <label for="">Name</label>
                   <input type="text" class="form-control"  name="name" value="<?php echo $product['name'];  ?>">
                </div>

                <div class="form-group col-md-8 ">
                   <label for="">Category</label>
                    <select class="form-control" name="category_id">
                        <option>Select Category</option>
                        <?php
                          $sql = "SELECT * FROM  categories;";
                          $category = $db->select($sql);
                          while($array = $category->fetch_assoc()){?>
                                 <option 
                                  <?php echo ($product['category_id'] == $array['id'])? "selected":'' ?>
                                  value="<?php echo $array['id']; ?>">
                                    <?php echo $array['name']; ?>
                                </option>
                         <?php  }?>
                        
                    </select>
                </div>

                <div class="form-group col-md-8 ">
                   <label >Brand</label>
                    <select class="form-control" name="brand_id">
                        <option>Select  Brand</option>
                        <?php
                          $sql = "SELECT * FROM  brands;";
                          $brand = $db->select($sql);
                          while($value = $brand->fetch_assoc()){?>
                                 <option 
                                
                                <?php echo($product['brand_id'] == $value['id'])?"selected":''; ?>
                                 value="<?php echo $value['id']; ?>">
                                    <?php echo $value['name']; ?>
                                </option>
                         <?php } ?>
                        
                    </select>
                </div>

                <div class="form-group col-md-8">
                    <label>Tag</label>
                    <textarea name="tag"  class="form-control" cols="30" rows="10" >
                          <?php echo $product['tag'];  ?>
                    </textarea>
                </div>

                <div class="form-group col-md-8">
                    <label>Images</label>
                    <?php
                        $product_id    = $product['id'];
                        $sql           = "SELECT * FROM `images` WHERE product_id=$product_id  LIMIT 1;";
                        $image         = $db->select($sql);
                        if($image){
                            $image         = $image->fetch_assoc();?>
                            <img src="../<?php echo $image['image']; ?>" width="50px"/> 

                        <?php }else{ echo "No Image !"; } ?>
                    <input type="file" class="form-control" name="images[]" multiple="multiple" />
                </div>

                <div class="form-group col-md-8">
                    <label class='form-control-label'>status</label>
                    <select class="form-control" name="status" >
                       <option>Select Status</option> 
                        <option selected=<?php ($product['status'] == '0')?"selected":'' ?> value="0">No Available</option> 
                        <option selected=<?php ($product['status'] == '1')?"selected":'' ?> value="1">Available</option>  
                    </select>
                </div> 
                <div class="form-group col-md-8">
                    <label>price</label>
                    <input type="number" class="form-control" name="price" value="<?php echo $product['price'];  ?>" />
                </div>

                <input type="submit" name="updateproduct" class="btn btn-primary" value="Update Product">
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