<?php 
  include "inc/header.php";
?>

<section id="main">
           <div class="row">
            
              <?php  include "inc/sidebar.php"; ?>

                <!-- column 9 -->
                <div class="col-md-9 mt-2 mt-lg-0 mt-md-0">
                  <!-- Website Overview -->
                  <div class="mr-md-5 ml-md-0 ml-3 mr-2">
                    <div class="card card_custom">
                        <div class="card-header main-color-bg">
                          <h5>Website Overview</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                             <div class="col-md-3">
                                <div class="desh-box">
                                  <h2><i class="fas fa-user"></i> <span class="total_number">
                                    <?php  echo $user->total_user();  ?></span></h2>
                                  <h4>Users</h4>
                                </div>
                             </div>
                             <div class="col-md-3">
                                <div class="desh-box">
                                  <h2><i class="fas fa-pencil-alt"></i><span class="total_number">
                                    <?php echo $brand->total_brands(); ?>
                                  </span></h2>
                                  <h4>Brand</h4>
                                </div>
                             </div>
                             <div class="col-md-3">
                                <div class="desh-box">
                                  <h2><i class="fas  fa-columns"></i> <span class="total_number">
                                  <?php echo $category->total_categories();  ?>
                                    
                                  </span></h2>
                                  <h4>Category</h4>
                                </div>
                             </div>
                             <div class="col-md-3">
                                <div class="desh-box">
                                  <h2><i class="fas fa-signal"></i><span class="total_number">
                                    <?php echo $product->total_products(); ?></span> 
                                  </h2>
                                  <h4>products</h4>
                                </div>
                             </div>
                          </div>
                        </div>
                      </div>
                        <!-- End of  Website Overview -->

                      <div class="card mt-4">
                          <div class="card-header main-color-bg">
                              <h3>Latest Users</h3>
                          </div>
                          <div class="card-body">
                               <table class="table table-striped table-hover  table-bordered">
                                    <thead class="bg-dark text-light">
                                      <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>   
                                      </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                       echo $user->selectAllUser();
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