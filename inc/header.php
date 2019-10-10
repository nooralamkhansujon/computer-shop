<?php 
    include "lib/Database.php";
    include "lib/Session.php";
    include "Helper/Format.php";
      
    $db       = new  Database();
    $format   = new Format();
    
    function __autoload($class){
        include "class/$class".".php";
    }
    // if(Session::checkSession()){
    //   header("Location: login.php");
    // }

    $user     = new  User();
    $brand    = new  Brand();
    $category = new  Category();
    $product  = new  Product(); 


    // if(isset($_GET['logout'])){
    //   Session::destroy();
    //   header("Location: login.php");
    // }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="js/all.js"></script>
    <title>Computer Shop</title>
</head>
<body>
  <!-- prelodaer -->
  <section id="preloader"></section>
  <!-- end of preloader  -->
 
   <!-- top nav -->
   <div class="topNav">
       <ul class="nav_list">
           <li class="nav_item">
            <span></span><i class="fas fa-phone"></i> 
            <span class="phone_text">09614222333 (10 AM - 7 PM)</span>
           </li>
           
          <div class="nav_right">
            <li class="nav_item nav_item_user"><i class="fas fa-user f_font"></i>Welcome, <span class="nav_item_user">Noor</span> 
            </li>
            <li class="nav_item">
                        <a  href="adminproject/index.php">Admin Panel</a>
              </li>
          </div>
          
       </ul>
   </div>
  <!-- end of top nav -->

  <!-- main navsection -->
<nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="#">Laptop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- left nav item -->
          <ul class="navbar-nav">
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Monitor
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php  
                            $sql = "SELECT * FROM `brands`;";
                            $brands = $db->select($sql);
                            while($value = $brands->fetch_assoc()){?>
                            <a class="dropdown-item" href="products.php?brands=<?php echo $value['id']; ?>">
                            <?php echo $value['name']; ?></a>
                        <?php } ?>
                          
                    </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laptop
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php  
                  $sql = "SELECT * FROM `brands`;";
                  $brands = $db->select($sql);
                  while($value = $brands->fetch_assoc()){?>
                  <a class="dropdown-item" href="products.php?brand=<?php echo $value['id']; ?>">
                  <?php echo $value['name']; ?></a>
              <?php } ?>
              </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Accessories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php  
                        $sql = "SELECT * FROM `categories` WHERE `parent_id`=16 ;";
                        $categories = $db->select($sql);
                        while($value = $categories->fetch_assoc()){?>
                        <a class="dropdown-item" href="products.php?category=<?php echo $value['id']; ?>">
                        <?php echo $value['name']; ?></a>
                      <?php } ?>
                    </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 mx-md-5">
               <select name="category_id" id="" class="select_box form-control text-dark">
                  <option value=''>select category</option>
                  <?php  
                        $sql = "SELECT * FROM `categories` WHERE `parent_id`=16 ;";
                        $categories = $db->select($sql);
                        while($value = $categories->fetch_assoc()){?>
                        <option value='<?php echo $value['id']; ?>'><?php echo $value['name']; ?></option>
                  <?php } ?>
               </select>
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>

             <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="aboutus.php">about us</a>
                      </li>
                      <li class="nav-item dropdown"><a class="nav-link" href="profile.php">Profile</a></li>
                     <li class="nav-item dropdown"><a class="nav-link" href="register.php">register</a></li>
                   <li class="nav-item dropdown"><a class="nav-link" href="login.php">Login</a></li>
                     
              </ul>
         
        </div>
      </nav>

  <!-- end of main navsection -->