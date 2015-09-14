<?php
    require_once("include/templateHead.php");
    
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
            <form id="validate" role="form" action="javascript:alert('Form #validate submited');">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name: </label>                                      
                        <input type="text" class="form-control" name="name" required />                                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Code: </label>                                      
                        <input type="text" class="form-control" name="Code"/>                                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price: </label>                                      
                        <input type="text" class="form-control" name="name" required />                                    
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description: </label>                                      
                        <textarea class="form-control" placeholder="placeholder"></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Input File <span>Custom Title</span></label>
                        <br/>                                                               
                        <input type="file" class="file" title="Choose file" name="file_4"/>
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