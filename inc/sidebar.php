  <!-- side bar section -->
  <ul class="aside_bar">
    <li class="sidebar_item">
      <div class="list-group-item list-group_toggle" data-toggle="collapse" data-target="#Screensize" aria-expanded="false" aria-controls="Screensize">Brands</div>
    <div class="collapse multi-collapse" id="Screensize">
            <ul class="list-group">
                    <?php  
                        $sql = "SELECT * FROM `brands`;";
                        $brands = $db->select($sql);
                        if($brands){
                        while($value = $brands->fetch_assoc()){?>
                         <li class="list-group-item list_group_sub">
                            <a class="list-group_link" href="products.php?brand=<?php echo $value['id'];?>">  <?php echo $value['name']; ?></a></a>
                         </li> 
                    <?php }} ?>
                 </ul>
            </div>
        </li>
        <li class="sidebar_item">
            <div class="list-group-item list-group_toggle" data-toggle="collapse" data-target="#Processor" aria-expanded="false" aria-controls="Processor">Categories</div>

             <div class="collapse multi-collapse" id="Processor">
                    <ul class="list-group">
                            <?php  
                                $sql = "SELECT * FROM `categories`;";
                                $categories = $db->select($sql);
                                if($categories){
                                while($value = $categories->fetch_assoc()){
                                   
                                     if($value['parent_id'] != 0 || $value['parent_id'] !=NULL){?>
                                  
                                <li class="list-group-item list_group_sub">
                                    <a class="list-group_link" href="products.php?category=<?php echo $value['id'];?>">  <?php echo $value['name']; ?></a></a>
                                </li> 
                            <?php }} }?>
                        </ul>
                    </div>
                    </li>
             </ul>
 <!-- end of sidebar  -->