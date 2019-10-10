<?php 

class Product{
    

    public function addproduct($data,$file){
        global $db;
        $name        =   trim(mysqli_real_escape_string($db->link,$data['name']));
        $category_id =   mysqli_real_escape_string($db->link,$data['category_id']);
        $brand_id    =   mysqli_real_escape_string($db->link,$data['brand_id']);
        $tag         =   mysqli_real_escape_string($db->link,$data['tag']);
        $status      =   mysqli_real_escape_string($db->link,$data['status']);
        $price       =   mysqli_real_escape_string($db->link,$data['price']);

        if(empty($name) || empty($category_id) || empty($brand_id) || empty($tag) || empty($status) || empty($price)){
                return "Filed must not be empty !";
        }
        else{
            
             // check if product name is dublicate or not 
             $sql     = "SELECT * FROM products WHERE 'name' = '$name';";
             $product = $db->select($sql);
             if ($product){
                 return "Product name should be unqiue!";
             }
             // check if image is selected or not 
             elseif(isset($file['images']['name'][0]) && !empty($file['images']['name'][0]) ){
                  
                // print_r($file['images']);
                // die();
                 $sql = "INSERT INTO `products`( `name`, `category_id`, `tag`, `status`, `price`, `brand_id`) VALUES ('$name','$category_id','$tag','$status',$price,'$brand_id');";

                 $product = $db->insert($sql);

                 /// check if product inserted successfully or not
                 if($product){
                      
                    $sql          = "SELECT * FROM `products` WHERE  `name`= '$name';";
                    $product      = $db->select($sql);
                    $product      = $product->fetch_assoc();
                    $product_id   = $product['id'];
                    $product_name = str_replace(' ','-',$product['name']);

                    for($i=0; $i < count($file['images']['name']);$i++){
                     
                        $image_name = $file['images']['name'][$i];
                        $tmp_name   = $file['images']['tmp_name'][$i];
                        $image_ext  = explode('.',$image_name)[1];
    
                        $extension   = array('jpg','jpeg','gif','png');
                        $image_name = time().rand(4,10).".".$image_ext;
                        $image_new_location = "images/product/".$image_name;
    
                        if(!in_array($image_ext,$extension)){
                           return "Only support (".implode(',',$extension).")";
                        }

                        $sql   = "INSERT INTO `images` (`product_id`, `image`, `avater_alt`) VALUES ('$product_id','$image_new_location','$product_name')";
                        $image = $db->insert($sql);
                        if($image){
                             move_uploaded_file($tmp_name,"../".$image_new_location);
                          
                        }else{
                            return "Image is not inserted !";
                        }
                    }
                    if($image){
                        return "new product has been added !";
                    }else{
                        return "Product has not been added !";
                    }
                }
            }
            else{

                $sql = "INSERT INTO `products`( `name`, `category_id`, `tag`, `status`, `price`, `brand_id`) VALUES ('$name','$category_id','$tag','$status',$price,'$brand_id');";

                 $product = $db->insert($sql);
                 if($product){
                     return "new product has been added !";
                 }else{
                     return "Product has not been added !";
                 }

            }
        }

    }

    public function updateproduct($data,$file){

        global $db;
        $name        =   trim(mysqli_real_escape_string($db->link,$data['name']));
        $category_id =   mysqli_real_escape_string($db->link,$data['category_id']);
        $brand_id    =   mysqli_real_escape_string($db->link,$data['brand_id']);
        $tag         =   mysqli_real_escape_string($db->link,$data['tag']);
        $status      =   mysqli_real_escape_string($db->link,$data['status']);
        $price       =   mysqli_real_escape_string($db->link,$data['price']);
        $id          =   $data['id'];

        if(empty($name) ||empty($category_id) || empty($brand_id) || empty($tag) || empty($status) || empty($price)){
                return "Filed must not be empty !";
        }else{

            // check name is exist or not 
            $sql     = "SELECT * FROM  `products` WHERE `name`='$name' and  id !=$id; ";
            $product = $db->select($sql);
            if($product){
                return "Product name should be unqiue!";
            }

            // check if image is selected or not 
           elseif(isset($file['images']['name'][0]) && !empty($file['images']['name'][0]) ){
                
                        $sql = "UPDATE `products` SET 
                            `name`       = '$name',
                            `category_id`= '$category_id',
                            `tag`        = '$tag',
                            `status`     = '$status',
                            `price`      = '$price',
                            `brand_id`   = '$brand_id'
                            WHERE id=$id;";

                        $product = $db->update($sql);

                        /// check if product updated successfully or not
                        if($product){
                            
                            $sql          = "SELECT * FROM `products` WHERE  `id` ='$id';";
                            $product      = $db->select($sql);
                            $product      = $product->fetch_assoc();
                            $product_id   = $product['id'];
                            $product_name = str_replace(' ','-',$product['name']);

                            for($i=0; $i < count($file['images']['name']);$i++){

                                $image_name = $file['images']['name'][$i];
                            
                                $tmp_name   = $file['images']['tmp_name'][$i];
                                $image_ext  = explode('.',$image_name)[1];
                                $extension  = array('jpg','jpeg','gif','png');
                                $image_name = time().rand(4,10).".".$image_ext;
                                $image_new_location = "images/product/".$image_name;
            
                                if(!in_array($image_ext,$extension)){
                                    return "Only support (".implode(',',$extension).")";
                                }

                                //remove previous image from directory
                                $sql   = "SELECT * FROM `images` WHERE product_id='$product_id';";
                                $images = $db->select($sql);
                                if($images){
                                    $sql = "DELETE FROM images where product_id=$product_id";
                                    $allImage = $db->delete($sql);
                                    while($image = $images->fetch_assoc()){
                                        
                                        if(file_exists("../".$image['image'])){
                                           
                                            unlink("../".$image['image']);
                                            
                                        }
                                    }
                                   

                            } 
                            
                            //insert new image to database  whose has been selected 
                            $sql   = "INSERT INTO `images` (`product_id`, `image`, `avater_alt`) VALUES ('$product_id','$image_new_location','$product_name')";
                            $image = $db->insert($sql);
                            if($image){
                                    move_uploaded_file($tmp_name,"../".$image_new_location);
                                
                            }else{
                                return "Image is not inserted !";
                            }
                        }
                        if($image){
                            return "Product has been updated !";
                        }else{
                            return "Product has not been updated !";
                        }
                    }
           }
           else{

                $sql = "UPDATE `products` SET 
                    `name`       = '$name',
                    `category_id`= '$category_id',
                    `tag`        = '$tag',
                    `status`     = '$status',
                    `price`      = '$price',
                    `brand_id`   = '$brand_id'
                    WHERE id=$id;";

                $product = $db->update($sql);
                if($product){
                    return "Product has been updated !";
                }else{
                    return "Product has not been updated !";
                }

           }

        }
    }

     public function delete($id){
        global $db;
        $sql = "DELETE FROM  `products` WHERE id=$id;";
        $deleteproduct = $db->delete($sql);
        if($deleteproduct){
            $sql = "DELETE  FROM images WHERE product_id=$id;";
            $deleteImage = $db->delete($sql);
            if($deleteImage){
                return "Product has been deleted !";
            }  
        }
        else{
            return "Product has not been deleted !";
        }

    }

    public function total_products(){
        global $db;
        return $products = $db->count("SELECT * FROM products");

    }


}

?>