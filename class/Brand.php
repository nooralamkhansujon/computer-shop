<?php 

class Brand{
     
    public function total_brands(){
        global $db;
        return $category = $db->count("SELECT * FROM brands");

    }
}