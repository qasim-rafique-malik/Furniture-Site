<?php
    require_once("include/templateHead.php");
    
?>
                            
<?php
    //getting category data
    $catData                = $db->getRecords('categories');
?>

<?php
    // product insertion code start
    if(!empty($_POST)){
        
        $table                      = 'products';
        $data                       = array();
        $data['name']               = $_POST['name'];
        $data['code']               = isset($_POST['code']) && ($_POST['code'] != "") ? $_POST['code'] :rand(10,10000);
        $data['price']              = $_POST['price'];
        $data['description']        = trim($_POST['description']);  
        $data['create_date']        = date("Y-m-d");
        $data['last_modified']      = date("Y-m-d");
        $data['status']             = isset($_POST['switch_1']) ? 'Active' :'Inactive';
        
        // saving file 
        if(!empty($_FILES)){
           $filePath                = $ml->fileupload('proImage','product/original/');
           $data['image']           = $filePath;
        }
        
        // inserting data in product table
        $db->insertData($table, $data);
        
        // getting last id in table
        $fields         = "id";
        $orderBy        = "id";
        $record         = $db->getLastRecord($table, $fields, $orderBy);
        $productLastId  = $record['id'];
        
        //inserting category and product relating start
        if(isset($_POST['catId']) && !empty($_POST['catId'])){
            $xrefTable      = 'cat_pro_xref';
            $xrefData       = array();
            foreach($_POST['catId'] as $catRow){
                $xrefData['category_id']        = $catRow;
                $xrefData['product_id']         = $productLastId;
                $db->insertData($xrefTable, $xrefData);  
            }
        }
        //inserting category and product relating end
        
    }
    // product insertion code end
 
 
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
                        <input type="text" class="form-control" name="name" required />                                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Code: </label>                                      
                        <input type="text" class="form-control" name="code"/>                                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price: </label>                                      
                        <input type="text" class="form-control" name="price" required />                                    
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
                                <option value="<?=$row['id']?>"><?=$row['name']?></option>
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
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Product Image</label>
                        <br/>                                                               
                        <input type="file" class="file" title="Choose file" name="proImage"/>
                    </div> 
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status <small>(Green means "Active" Red means "Inactive")</small></label>
                            <br/>
                            <label class="switch">
                                <input type="checkbox" name="switch_1" checked value="0"/>
                                <span></span>
                            </label>
                    </div>
                </div>
                
                <div class="col-md-12">
        
                    <div class="pull-right margin-top-10">
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