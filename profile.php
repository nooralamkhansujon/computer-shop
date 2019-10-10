<?php include "inc/header.php"; ?>


<!-- content section -->
<section id="content_section" class="mt-2">
<div class="row">
<div class="col-md-12 col-lg-4 col-12">
  <!-- side bar section -->
  <div class="container">
   <?php include "inc/sidebar.php"; ?>
  </div>
  <!-- end of sidebar  -->
</div>

     <!-- item section  -->
<div class="col-md-12 col-lg-8 col-12">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <h1 class="section_header">Profile</h1>
          </div>
        </div>

      <div class="row">
   
        <div class="col-md-12 ">
            <div class="profile py-5">
            <div class="row">
              <div class="col-md-4 profile_image_content">
                  <img  class="profile_image" src="images/500_F_101703424_C4a6vnCq88qD2bdMHhoAsNoP4eoWS6iV.jpg" alt="">
              </div>
              <div class="col-md-8">
                     
                  <form action ='' method="POST" enctype="multipart/form-data">
                          
                    <input type="hidden" name="id" value="id">
                    <div class="form-group col-md-12 ">
                      <label class="text_input_label">Username</label>
                      <input type="text" class="form-control" name="username" value="nooralam">
                    </div>
                     
                      <div class="form-group col-md-12">
                          <label class="text_input_label">Email</label>
                          <input type="email" class="form-control" name="email" value="Nooralam@gmail.com">
                      </div>

                      <div class="form-group col-md-12">
                          <label class="text_input_label">Image</label>
                          <img src="" width="50px" alt="">
                          <input type="file" class="form-control" name="avater">
                      </div> 
                     <input type="submit" name="userupdate" class="btn btn-coral" value="Update profile">
                </form>                    

              </div>
            </div>
             
                 

              </div>
        </div>
       <!-- end of single item -->
     </div>
     <!-- end of first row -->
    </div>
</div>
 
</div>  <!--  end of container -->

</section>
<!-- end of content section -->

<?php include 'inc/footer.php';?>



  <script src='js/jquery-slim.min.js'></script>
<script src="js/popper.min.js"></script>
<script src='js/bootstrap.min.js'></script>
</body>
</html>