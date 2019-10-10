<?php include "inc/header.php"; 

if(isset($_GET['details']) && !empty($_GET['details'])){
   $details_id = $_GET['details'];
   $sql        = "SELECT * FROM `products` WHERE id=$details_id;";
   $product    = $db->select($sql);
   if($product){
      $product    = $product->fetch_assoc();
   }
  

}
else{
    header("Location: index.php");
}

?>


<!-- content section -->
<section id="content_section" class="mt-2">
<div class="row">
<div class="col-md-4">
    <?php include "inc/sidebar.php"; ?>
</div>

     <!-- item section  -->
<div class="col-md-8">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <h1 class="section_header"> Details of  Product</h1>
          </div>
        </div>
   <div class="row">
   
        <div class="col-md-12 py-3">

                  <div class="container details">

                          <div class="row">
                            <!-- header section -->
                              <div class="col-md-12">
                                <div class="detail_header">
                                    <h4 class="product_header "><?php echo $product['name']; ?></h4>
                                    <?php
                                   $brand_id = $product['brand_id'];
                                   $sql = "SELECT * FROM `brands` WHERE id=$brand_id;";
                                   $brand= $db->select($sql); 
                                   if($brand){
                                      $brand = $brand->fetch_assoc();
                                   }
                                 ?>
                                    <p class="brand">Brand: 
                                    <a href="products.php?category=<?php $product['brand_id']; ?>">
                                       <?php echo $brand['name']; ?>
                                    </a>
                                    </p>
                                </div>  
                              </div>
                              <!-- images section -->
                              <div class="col-md-4">   
                              <?php
                                 $product_id = $product['id'];
                                $sql = "SELECT * FROM  `images` WHERE product_id=$product_id LIMIT 1;";
                                $image= $db->select( $sql); 
                                if($image){
                                  $image= $image->fetch_assoc();
                                }
                              ?>  
                                  <img class="detail_image" src="<?php echo $image['image']; ?>" width="200px" alt="">
                              </div>

                  <div class="col-md-8 details_inner">
                          <div class="row">
                              <div class="col-md-12 ml-1">
                               <?php
                                   $category_id = $product['category_id'];
                                   $sql = "SELECT * FROM `categories` WHERE id=$category_id";
                                   $category= $db->select( $sql); 
                                   if($category){
                                      $category = $category->fetch_assoc();
                                   }
                                 ?>
                                 <p>Categories :
                                   <a href="products.php?category=<?php $product['category_id']; ?>">
                                   <?php echo $category['name']; ?></a>
                                 </p>
                              </div>
                              <div class="col-md-12">
                                  <ul class="description">
                                        
                                       <li> <span class="lead">Tag: </span> <small style="font-size:15px;"><?php echo $product['tag']; ?></small> </li>
                                  </ul> 
                              </div>
                          </div>
                                     
                  </div>
                    <div class="price-section col-md-12 p-3">
                        <p class="price_body">Price : <span class="fa-font"><i class="fas fa-dollar-sign"></i></span> 
                        <span class="price"><?php echo $product['price']; ?></span></p>
                        <p class="status_body">Status: <span class='status'><?php echo $product['status']; ?></span> </p>
                    </div>
                  </div>
                              
      </div>
        
        </div>
       <!-- end of single item -->
     </div>
     <!-- end of first row -->
    </div>
</div>
   <!-- container -->
</div>

</section>
<!-- end of content section -->
    
<?php include 'inc/footer.php'; ?>

<script src='js/jquery-slim.min.js'></script>
<script src="js/popper.min.js"></script>
<script src='js/bootstrap.min.js'></script>
</body>
</html>