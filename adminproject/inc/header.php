<?php 
    include "../lib/Database.php";
    include "../lib/Session.php";
    include "../Helper/Format.php";
      
    $db       = new  Database();
    $format   = new Format();
    
    function __autoload($class){
        include "../class/$class".".php";
    }
    if(Session::checkSession()){
      header("Location: login.php");
    }

    $user     = new  User();
    $brand    = new  Brand();
    $category = new  Category();
    $product  = new  Product(); 


    if(isset($_GET['logout'])){
      Session::destroy();
      header("Location: login.php");
    }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin Area | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet" />
    
</head>
  <body>
<nav class="navbar navbar-expand-md navbar-light bg-faded">
        <a class="navbar-brand" href="index.php">Admin Panel</a>
        <button class="navbar-toggler navbar-toggler-right navbar_icon" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon navbar_icon"></span>
        </button>
              
        <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user-list.php">User</a>
               </li>

              <li class="nav-item">
                  <a class="nav-link" href="product-list.php">products</a>
              </li>

          </ul>

                  <ul class="navbar-nav navbar-right mr-5">
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i class="fas fa-user"></i> Welcome,<?php echo Session::get('username'); ?></a>
                        </li>
                        <?php
                          if(Session::get('login')==true){?>
                              <li class="nav-item">
                                      <a class="nav-link" href="?logout=logoutme">Logout</a>
                            </li>
                         <?php  }else{?>
                      
                        <li class="nav-item">
                          <a class="nav-link" href="login.php">Login</a>
                        </li>
                         <?php } ?>
                         <li class="nav-item">
                          <a class="nav-link" href="../index.php">website</a>
                        </li>
                      </ul>
                     
                 
                </div>
</nav>

  <header id="header">
       <div class="container">
            <div class="row pt-2">
                 <div class="col-md-10">
                      <h1><i class="fas fa-cog"></i>  Dashboard 
                        <small>
                          Manage Your Site
                      </small></h1> 
                 </div>
            </div>       
       </div>
  </header>

<section id="breadcrumb">
    
          <ol class="breadcrumb ml-3 mr-2 ml-md-3 mr-md-5">
              <li class="active">Dashboard</li>
          </ol>
    
</section>





