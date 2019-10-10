<?php 
   include "inc/header.php";

  if(isset($_GET['brand']) && !empty($_GET['brand'])){
      
      $brand = $_GET['brand'];
      $sql = "SELECT * FROM products WHERE brand_id=$brand;";
      $products = $db->select($sql);
  }
  elseif(isset($_GET['category']) && !empty($_GET['category'])){
    $category = $_GET['category'];
    $sql = "SELECT * FROM products WHERE category_id=$category;";
    $products = $db->select($sql);
       
  }
?>

<header id="header_section">
     <div class="carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="images/header.jpeg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img  src="images/header-2.jpeg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img  src="images/header-3.jpeg" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
            </div>

     </div>
     <div class="overlay">
         <h1>Best Dell Laptop Price in Bangladesh</h1>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, qui!</p>
         <div>
             <button class="read_more_header">
                  <a href="#">Read More</a>
            </button>
        </div>
     </div>
</header>

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
                    <h1 class="section_header"> All Products</h1>
                  </div>
                </div>
                <!-- first row -->
               <div class="row">

               <?php
                     if(isset($products) && !empty($products)){
                          while($product= $products->fetch_assoc()){
                ?>
                 <!-- single item -->
                 <div class="col-md-4 py-3">
                 
                        <article class="single_product">
                             <?php
                                  $product_id = $product['id'];
                                  $sql = "SELECT * FROM `images` WHERE product_id=$product_id LIMIT 1;";
                                  $image = $db->select($sql);
                                  if($image){
                                     $image = $image->fetch_assoc();
                                    ?>
                                    <img class="single_image" src="<?php echo  $image['image']; ?>" alt="">
                                 <?php }?>
                             
                              <h3 class="product_header"><?php echo $product['name']; ?></h3>
                              <ul class="description">
                                <li>price: <?php echo $product['price']; ?></li>
                                <li>stock: <?php echo ($product['status'] == '1')? "avilable":"Not avilable"; ?></li>
                                <li>Tag: <?php echo $format->textShorten($product['tag'],20); ?></li>
                              </ul>
                             <a class="read_more" href="details.php?details=<?php echo $product['id']; ?>">view More</a>
                        </article> 
               </div>
               <?php }}
                  else{
                      echo "<div class='col-md-4'>";
                      echo "<h1 class='text-danger'>No Products</h1>";
                      echo "</div>";
                } ?>
              <!-- end of single item -->
              
            </div>
          <!-- end of first row -->
           
       
    </div>
     <!-- pagination -->
          <nav aria-label="Page navigation example" class="col-md-12 pagination-section">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
   </div>
   <!-- container -->
  
  
</div>

</section>
<!-- end of content section -->
    

<?php include "inc/footer.php"; ?>