<?php
    require_once("include/templateHead.php");
    
?>
<?php
    // category updating code
    if(!empty($_POST)){
        
        $table                      = 'categories';
        $data                       = array();
        $data['name']               = $_POST['name'];
        $data['description']        = trim($_POST['description']);  
        $data['last_modified']      = date("Y-m-d");
        $data['status']             = isset($_POST['switch_1']) ? 'Active' :'Inactive';
        
        $where              = array();
        $where['id']        = $_POST['catId'];
        
        // saving file 
        if(!empty($_FILES)){
            $getRecord              = $db->getRecords($table, $where);
            $ml->deleteImage($getRecord[0]['image']);
            $filePath                = $ml->fileupload('catImage','category/original/');
            $data['image']           = $filePath;
        }
        
        // updating data in category table
        $db->updateRecord($table, $data,$where);
        
    }
 
 
 ?>

 <?php
 if(isset($_GET['catId']) && $_GET['catId'] != ''){
        $table                  = 'categories';
        $where                  = array();
        $where['id']            = $_GET['catId'];

        // getting specific category record for editing 
        $getRecord              = $db->getRecords($table, $where);
        //$ml->pr($getRecord);
 }
 ?>
 
                            
    <!-- page title -->
    <div class="page-title" id="tour-step-4">
        <h1>CATEGORIES</h1>
        <p>Description</p>
        
        <ul class="breadcrumb">
            <li><a href="#">Categories</a></li>
        </ul>
    </div>                        
    <!-- ./page title -->
    
<?php
if(isset($getRecord) && !empty($getRecord)){
?>    
    <!-- Category insertion form start-->
    <div class="wrapper wrapper-white">
        <div class="row">
            <form id="validate" enctype="multipart/form-data" method="POST" role="form" action="">
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name:</label>                                      
                        <input type="text" class="form-control" name="name" value="<?=$getRecord[0]['name']?>" required />                                    
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
                        <label>Select Category Image</label>
                        <br/>                                                               
                        <input type="file" class="file" title="Choose file" name="catImage"/>
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
                        <input type="hidden" name="catId" value="<?=$getRecord[0]['id']?>">
                        <button class="btn btn-warning hide-prompts" type="button">Hide prompts</button>
                        <input class="btn btn-danger" name="submit_cat" value="Submit" type="submit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Category insertion form end -->
                        
<?php
}
else{
?>
<h1> you have done something wrong</h1>
<?php
}
?>
<?php
    require_once("include/templateFooter.php");
?>