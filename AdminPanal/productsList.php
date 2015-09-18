<?php
    require_once("include/templateHead.php");
    
?>
<?php
     $table                  = 'products';
    //getting products data
    $catData                = $db->getRecords($table);

?>
<?php
    
    if(isset($_GET['id'])){
        $where                  = array();
        $where['id']            = $_GET['id'];

        // deleting image form of category
        $getRecord              = $db->getRecords($table, $where);
        $ml->deleteImage($getRecord[0]['image']);

        //deleting product relation records from categories
        $tableXref                  = 'cat_pro_xref';
        $whereXtef                  = array();
        $whereXtef['product_id']    = $_GET['id'];
        $db->deleteRecord($tableXref, $whereXtef);
        
        //deleting records from categories
        $db->deleteRecord($table, $where);
?>
        <script>
        window.location.href = "<?=$NC->AdminSiteURL;?>productsList.php";
        </script>
<?php }    
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
                                                 <td style="width:20%;">
                                                    <img src="<?=$NC->baseUrl."upload/".$row['image']?>" style=" height: 5%"/>
                                                 </td>
                                                 <td><?=$row['last_modified']?></td>
                                                 <td><?=$row['status']?></td>
                                                 <td>
                                                    <a href="<?=$NC->AdminSiteURL?>productsEdit.php?proId=<?=$row['id']?>" class="btn btn-info btn-clean edit"/>
                                                        View/Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-clean delete" id="<?=$row['id']?>"/>
                                                        Delete
                                                    </a>
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
<script>
$( document ).ready(function() {
    

    
    //deleting  records 
    $( ".delete" ).click(function() {
        var userChoice = confirm("Are you really want to delete?");
        if (userChoice) {
            window.location.href = "<?=$NC->AdminSiteURL;?>productsList.php?id="+this.id;
        }  
    });
    
});
</script>