<?php 
   
 
 
class User{
    
   
   public function update($data,$file){
            global $db;
            $username = mysqli_real_escape_string($db->link, $data['username']);
            $email    = mysqli_real_escape_string($db->link, $data['email']);
            $role     = mysqli_real_escape_string($db->link, $data['role']);
            $id       = $data['id'];

            if(empty($username) || empty($email) || empty($role)){
                 return "Field Must not be empty";
            }
            elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == true){

                  $sql = "SELECT * FROM users WHERE email= '$email' and id != $id ;";
                  $result = $db->select($sql);
                  
                  //Email already Exist or not 
                  if($result){
                       return "Email Already exist";
                  }
                  else{

                        // check image name is empty or not
                        if( isset($file['avater']['name']) && !empty($file['avater']['name'])){
                             

                            // remove previous image from folder
                            $sql   ="SELECT * FROM users where id=$id;";
                            $result = $db->select($sql);
                            if($result){
                                $array = $result->fetch_assoc();
                                unlink('../'.$array['avater']);
                            }
                            // take image from input 
                            $image_name         = mysqli_real_escape_string($db->link, $file['avater']['name']);
                            $image_name         = $image_name;
                            $tmp_name           = $file['avater']['tmp_name'];
                            $image_ext          = explode('.',$image_name)[1];
                            $extension           = array('jpg','jpeg','gif','png');
                            

                            if(!in_array($image_ext,$extension)){
                               return "File is not supported !";
                            }
                            $image_new_name     = time().rand(4,10).".".$image_ext;
                            $image_new_location = "images/user/".$image_new_name;
                            
                          
                            $sql = "UPDATE `users` SET 
                            `username`='$username',
                            `email`='$email',
                            `role`='$role',
                            `avater`='$image_new_location' WHERE id=$id;";
                             $update = $db->update($sql);

                             if($update){
                                 move_uploaded_file($tmp_name,"../".$image_new_location);
                                 return  "User  has been updated !";
                             }
                             else{
                                 return "User has not  been updated !";
                             }
                        } 
                        else{
                        
                            $sql = "UPDATE `users` SET 
                            `username`='$username',
                            `email`='$email',
                            `role`='$role'
                             WHERE id=$id;";
                             $update = $db->update($sql);

                             if($update){
                                 return  "User has been updated !";
                             }
                             else{
                                 return "User name has not  been updated !";
                             }

                        }

                  }

               
            }

            else{
                return "Something is wrong !";
            }
   }


   public function delete($sql){
        global $db;
        $deleteuser = $db->delete($sql);
        if($deleteuser){
            return "User has been deleted !";
        }
        else{
            return "User has not been deleted !";
        }

   }


   public function login($data){
        global $db;
        $email     = trim(mysqli_real_escape_string($db->link, $data['email']));
        $password  = trim(mysqli_real_escape_string($db->link, $data['password']));
        if(empty($email) || empty($password)){
            return "Email or password is empty!";
        }
        elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                return "Your Email is not valid !";
        }
        else{
           
            $sql        = "SELECT * FROM `users` WHERE `email`='$email' AND `password`= '$password' AND `role`=1;";
            $login_user = $db->select($sql);
            if($login_user){

                $user    = $login_user->fetch_assoc();
                Session::init();
                Session::set('login',true); 
                Session::set('username',$user['username']);
                Session::set('email',$user['email']);
                header("Location: index.php");
            }
            else{
                return "You are not login!";
            }
        }
   }


   public function register($data){
       
       global $db;
       $username    = mysqli_real_escape_string($db->link, $data['username']);
       $email       = mysqli_real_escape_string($db->link, $data['email']);
       $password    = mysqli_real_escape_string($db->link, $data['password']);

       if(empty($username) || empty($email) || empty($password)){
           return "Field Must not be empty";
      }
      elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false ){
             
            return "Please Enter Validate Email !";
      }else{

           $sql = "SELECT * FROM `users` WHERE `email` = '$email';";
           $value = $db->select($sql);
           if($value){
               return "Email id is already exist please choose another one!";
           }
           $sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password');";
           $register = $db->insert($sql);
           if($register){
             return "You registered successfully!";
           }
           else{
               return "You did't registered!";
           }
           
      }

   }

}