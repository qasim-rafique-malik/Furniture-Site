<?php
    require_once("include/templateHead.php");
    
?>
<?php
    $table                  = 'categories';
    //getting category data
    $catData                = $db->getRecords($table);
?>
<?php
    
    if(isset($_GET['id'])){
        $where                  = array();
        $where['id']            = $_GET['id'];

        // deleting image form of category
        $getRecord              = $db->getRecords($table, $where);
        $ml->deleteImage($getRecord[0]['image']);

        //deleting records from categories
        $db->deleteRecord($table, $where);
?>
        <script>
        window.location.href = "<?=$NC->AdminSiteURL;?>categoriesList.php";
        </script>
<?php }    
?>

                          
                            
    <!-- page title -->
    <div class="page-title" id="tour-step-4">
        <h1>CATEGORIES LIST</h1>
        <p>Description</p>
        
        <ul class="breadcrumb">
            <li><a href="#">Categories List</a></li>
        </ul>
    </div>                        
    <!-- ./page title -->
    
    <!-- Category listing start-->
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
                                                    <a class="btn btn-info btn-clean edit"/>View/Edit</a>
                                                    <a class="btn btn-danger btn-clean delete" id="<?=$row['id']?>"/>Delete</a>
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
    <!-- Category listing end -->
                        
                        
<?php
    require_once("include/templateFooter.php");
?>
<script>
$( document ).ready(function() {
    

    
    //deleting  records 
    $( ".delete" ).click(function() {
        var userChoice = confirm("Are you really want to delete?");
        if (userChoice) {
            window.location.href = "<?=$NC->AdminSiteURL;?>categoriesList.php?id="+this.id;
        }  
    });
    
});
</script>