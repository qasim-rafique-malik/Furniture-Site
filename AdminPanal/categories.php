<?php
    require_once("include/templateHead.php");
    
?>
 <?php
    // category insertion code
    if(!empty($_POST)){
        
        $table                      = 'categories';
        $data                       = array();
        $data['name']               = $_POST['name'];
        $data['description']        = trim($_POST['description']);  
        $data['create_date']        = date("Y-m-d");
        $data['last_modified']      = date("Y-m-d");
        $data['status']             = isset($_POST['switch_1']) ? 'Active' :'Inactive';
        
        // saving file 
        if(!empty($_FILES)){
           $filePath                = $ml->fileupload('catImage','category/original/');
           $data['image']           = $filePath;
        }
        
        // inserting data in category table
        $db->insertData('categories',$data);
        
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
    
    <!-- Category insertion form start-->
    <div class="wrapper wrapper-white">
        <div class="row">
            <form id="validate" enctype="multipart/form-data" method="POST" role="form" action="">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name:</label>                                      
                        <input type="text" class="form-control" name="name" required />                                    
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description: </label>                                      
                        <textarea class="form-control" name="description" placeholder="placeholder"></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Input File <span>Custom Title</span></label>
                        <br/>                                                               
                        <input type="file" class="file" title="Choose file" name="catImage"/>
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
                        <input class="btn btn-danger" name="submit_cat" value="Submit" type="submit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Category insertion form end -->
                        
                        
<?php
    require_once("include/templateFooter.php");
?>