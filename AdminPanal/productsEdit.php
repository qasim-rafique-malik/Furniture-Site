<?php
    require_once("include/templateHead.php");
    
?>
                            
<?php
    //getting category data
    $catData                = $db->getRecords('categories');
?>
 
 
 <?php
    // product updating code start 
    if(!empty($_POST)){
        
        $table                      = 'products';
        $data                       = array();
        $data['name']               = $_POST['name'];
        if(isset($_POST['code']) && ($_POST['code'] != "")){
           $data['code']               =  $_POST['code']; 
        }
        $data['price']              = $_POST['price'];
        $data['description']        = trim($_POST['description']);  
        $data['last_modified']      = date("Y-m-d");
        $data['status']             = isset($_POST['switch_1']) ? 'Active' :'Inactive';
        
        $where              = array();
        $where['id']        = $_POST['proId'];
        
        // deleting previous and saving file 
        if(!empty($_FILES) && $_FILES['proImage']['size'] != 0){
            $getRecord              = $db->getRecords($table, $where);
            $preImage = $getRecord[0]['image'];
            $filePath                = $ml->fileupload('proImage','product/original/');
            $ml->deleteImage($preImage);
            $data['image']           = $filePath;
        }
        
        // updating data in product table
        $db->updateRecord($table, $data,$where);
        // product updating code end
        
        //deleting previous and inserting category and product relating start
        if(isset($_POST['catId']) && !empty($_POST['catId'])){
            
            // deleting start
            $xrefTable                  = 'cat_pro_xref';
            $xrefData                   = array();
            $whereXtef                  = array();
            $whereXtef['product_id']    = $_POST['proId'];
            $db->deleteRecord($xrefTable, $whereXtef);
            // deleting end
            
            // insertion start
            foreach($_POST['catId'] as $catRow){
                $xrefData['category_id']        = $catRow;
                $xrefData['product_id']         = $_POST['proId'];
                $db->insertData($xrefTable, $xrefData);  
            }
            // insertion end
        }
        //deleting previous and inserting category and product relating end
        
        
        
    }
 
 
 ?>

 <?php
 if(isset($_GET['proId']) && $_GET['proId'] != ''){
        $table                  = 'products';
        $where                  = array();
        $where['id']            = $_GET['proId'];

        // getting specific category record for editing 
        $getRecord              = $db->getRecords($table, $where);
        
        // getting category and product relation record for editing start
        $tableXref                  = 'cat_pro_xref';
        $whereXref                  = array();
        $whereXref['product_id']    = $_GET['proId'];
        $getXrefRecord              = $db->getRecords($tableXref, $whereXref);
        foreach($getXrefRecord as $xrefRow){
            $xrefID[] = $xrefRow['category_id'];
        }
        // getting category and product relation record for editing end
 }
 ?>
 
    <!-- page title -->
    <div class="page-title" id="tour-step-4">
        <h1>PRODUCTS</h1>
        <p>Description</p>
        
        <ul class="breadcrumb">
            <li><a href="#">Products</a></li>
        </ul>
    </div>                        
    <!-- ./page title -->
    <!-- Product insertion form start-->
    <div class="wrapper wrapper-white">
        <div class="row">
            <form id="validate" role="form" method="post" action="" enctype="multipart/form-data">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name: </label>                                      
                        <input type="text" class="form-control" name="name" value="<?=$getRecord[0]['name']?>" required />                                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Code: </label>                                      
                        <input type="text" class="form-control" name="code" value="<?=$getRecord[0]['code']?>"/>                                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price: </label>                                      
                        <input type="text" class="form-control" name="price" required value="<?=$getRecord[0]['price']?>" />                                    
                    </div>
                </div>
                
                <div class="col-md-12">                        
                    <div class="form-group">
                        <label>Categories <span>(You can select multiple)</span></label>
                        <select class="form-control selectpicker" name="catId[]" multiple>
                            <?php
                                // listing category in select box
                                if (!empty($catData)){
                                foreach($catData as $row){
                            ?>
                                <option value="<?=$row['id']?>"
                                <?= (in_array($row['id'],$xrefID)) ? 'selected' :''?>
                                 ><?=$row['name']?></option>
                            <?php
                                    }
                                }   
                            ?>
                        </select>
                    </div>                        
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description: </label>                                      
                        <textarea class="form-control" name="description"><?=$getRecord[0]['description']?></textarea>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Select Product Image</label>
                        <br/>                                                               
                        <input type="file" class="file" title="Choose file" name="proImage"/>
                    </div> 
                </div>
                
                <div class="col-md-4">
                    <img src="<?=$NC->baseUrl."upload/".$getRecord[0]['image']?>" style=" width: 90%; height: 5%"/> 
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Status <small>(Green means "Active" Red means "Inactive")</small></label>
                            <br/>
                            <label class="switch">
                                <input type="checkbox" name="switch_1" 
                                <?php echo  ($getRecord[0]['status'] == 'Active') ? "checked" :  '' ?>       
                                value="0"/>
                                <span></span>
                            </label>
                    </div>
                </div>
                
                <div class="col-md-12">
        
                    <div class="pull-right margin-top-10">
                        <input type="hidden" name="proId" value="<?=$getRecord[0]['id']?>">
                        <button class="btn btn-warning hide-prompts" type="button">Hide prompts</button>
                        <button class="btn btn-danger" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Product insertion form end -->
                        
                        
                        
                       
<?php
    require_once("include/templateFooter.php");
?>