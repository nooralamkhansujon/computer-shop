<?php 


class  Database{

   private $host="localhost";
   private $user  = 'root';
   private $password = '';
   private $db = "computer_shop";
   public $link="nothing";

   public function __construct(){
       $this->link = new mysqli($this->host,$this->user,$this->password,$this->db);
   }

   public function select ($sql){
       $result =  $this->link->query($sql);

       if($result){
           if($result->num_rows > 0){
               return $result;
           } 
       }
       else{
           return false;
       }
   }
    public function insert ($sql){
        $result =  $this->link->query($sql);

        if($result){
            return $result;
        }
        else{
            return false;
        }
    }
    public function update ($sql){
        $result =  $this->link->query($sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function delete($sql){
        $result = $this->link->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    // public function pagination($table,$buttons=5,$per_page_record=5){
     
    //     $pagination_buttns = 11;
    //     $page_number = (isset($_GET['page']) AND !emtpy($_GET['page']))?$_GET['page']:1;
    //     $per_page_records = 10;

    //     $rows    = $this->link->query($sql)->num_rows();

    //     $last_page = ceil($rows/$per_page_record);
    // }
    


}





