
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin Area |Dashboard</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" />

<!-- ckeditor  -->
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<style>
        /* login page */
        .login_section{
           margin-top:5%;
           margin-left:30%;
           width:500px;
           margin-right:10% !important;
           background:rgba(0,0,0,0.6);
           padding:10px;
           display:inline-block;
        }
       .input_submit{
           display:flex;
           justify-content:center;
           align-content:center;
       }
       .header{
           color:#ffff;
           text-align:center;
           border-bottom:1px solid #fff;
           padding:5px;
       }
       .form-control{
           font-size:18px !important;
       }
       body{
            background:url('images/login-background.jpeg')center/cover no-repeat fixed;
       }
      
</style>
<script src="js/all.js"></script>

</head>
<body>
 
 <div class="login_section">
            <div class="login_body">
                <h2 class="header">User Sign In</h2>
                   <form action="" method="POST">
                      
                          <div class="form-group">
                              <label class="form-control-label mr-2 text-light" for="">email</label>
                              <input class="form-control form-control-lg" type="email" name="email" placeholder="Ente Email" />
                          </div>
                          <div class="form-group">
                              <label class="form-control-label mr-2 text-light" for="">password</label>
                              <input class="form-control form-control-lg" type="text" name="password" placeholder="Enter Password"/>
                          </div> 
                          <div class="form-group input_submit">
                             <input type="submit" name="submit" class="btn btn-success" value="Login">
                          </div>
                        <p class="text-light">Don't You have an Account? <small class="font-size-10"><a href="register.php" class="text-info">register</a></small></p>
                      
                   </form>
        </div>
</div>
  


<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 </body>
 </html>


  