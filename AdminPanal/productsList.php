<?php
    require_once("include/templateHead.php");
    
?>
<?php
    
    //getting products data
    $catData                = $db->getRecords('products');

?>
                          
                            
    <!-- page title -->
    <div class="page-title" id="tour-step-4">
        <h1>PRODUCT LIST</h1>
        <p>Description</p>
        
        <ul class="breadcrumb">
            <li><a href="#">Product List</a></li>
        </ul>
    </div>                        
    <!-- ./page title -->
    
    <!-- Product listing start-->
    <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sortable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Last Modified</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                          foreach($catData as $row){
                                        ?>  
                                            <tr>
                                                 <td><?=$row['id']?></td>
                                                 <td><?=$row['name']?></td>
                                                 <td><img src="<?=$NC->baseUrl."upload/".$row['image']?>" style="width:20%; height: 8%"/></td>
                                                 <td><?=$row['last_modified']?></td>
                                                 <td><?=$row['status']?></td>
                                                 <td>
                                                    
                                                    <input class="btn btn-danger" name="submit_cat" value="Submit" type="submit"/>
                                                 </td>
                                             </tr>
                                        <?php
                                          }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>                        
                        <!-- ./datatables plugin -->
    <!-- Product listing end -->
                        
                        
<?php
    require_once("include/templateFooter.php");
?>