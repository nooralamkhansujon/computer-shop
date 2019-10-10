<?php 

class Category{
    
    public function addcategory($data,$file){
       
        global $db;
        $name    = mysqli_real_escape_string($db->link, $data['name']);

        if(empty($name)){

        }
        else{
             if(isset($file['image']['name'])){

                $image_name         = mysqli_real_escape_string($db->link, $file['image']['name']);
                $tmp_name           = $file['image']['tmp_name'];
                $image_ext          = explode('.',$image_name)[1];
                $image_new_name     =  time().rand(4,10).".".$image_ext;
                $filepath           =  "images/category/".$image_new_name;
                $extension          = array('jpg','jpeg','gif','png');
                 
                // check if the extension has  in the array or not 
                if(!in_array($image_ext,$extension)){
                    return "File is not supported !";
                 }
                 
                 //insert new category to our categories table 
                 $sql       = "INSERT INTO `categories`(`name`, `image`) VALUES ('$name','$filepath')";
                 $insertcat = $db->insert($sql);
                 if($insertcat){
                    move_uploaded_file($tmp_name,'../'.$filepath);
                    return "Category is inserted Successfully!";
                 }
                 else{
                     return "Category is not inserted!";
                 }
             }
        }
    }
}