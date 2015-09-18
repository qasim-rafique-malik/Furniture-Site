<?php
    require_once("include/templateHead.php");
    
?>
<?php
    if(!empty($_POST)){
        $table                  = 'contact';
        $data                   = array();
        $data['address']        = implode("{data}",$_POST['address']);
        $data['email']          = implode("{data}",$_POST['email']);
        $data['phone']          = implode("{data}",$_POST['phoneNumber']);
        
        $where                  = array();
        $where['id']            = $_POST['update'];
        
        (isset($_POST['update']) && $_POST['update'] != "") ? $db->updateRecord($table, $data,$where) : $db->insertData($table, $data);
        
    }
?>
<?php
    $table                  = 'contact';
    $fields                 = "*";
    $orderBy                = "id";
    $record                 = $db->getLastRecord($table, $fields, $orderBy);
    $productLastId          = $record['id'];
    
    if($record['address'] != "")
    {
        $addressRecord = explode("{data}",$record['address']);
        $ml->pr($addressRecord);
    }
    $update                 = ($productLastId != "") ? $productLastId :"";
?>
                            
    <!-- page title -->
    <div class="page-title" id="tour-step-4">
        <h1>CONTACT</h1>
        <p>Description</p>
        
        <ul class="breadcrumb">
            <li><a href="#">Contact</a></li>
        </ul>
    </div>                        
    <!-- ./page title -->
    <!-- Product insertion form start-->
    <div class="wrapper wrapper-white">
        <div class="row">
            <form id="validate" role="form" method="post" action="contact.php">
                <div class="addressDiv">
                    <?php
                    if(isset($addressRecord) && $addressRecord != ""){
                        $count      = 0;
                        foreach($addressRecord as $addressRow){
                    ?>
                        <?php if($count == 0){ ?>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Address: </label>                                      
                                    <input type="text" class="form-control" name="address[<?=$count?>]"  value="<?=$addressRow?>" required />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="addAddress" class="btn btn-primary btn-clean" style="margin-top: 30px;">Add More</button>
                            </div>
                        <?php }
                            else{
                        ?>
                        <div class="col-md-10">
                                <div class="form-group">
                                    <label>Address: </label>                                      
                                    <input type="text" class="form-control" name="address[<?=$count?>]" value="<?=$addressRow?>" required />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="addAddress" class="btn btn-primary btn-clean" style="margin-top: 30px;">Remove</button>
                            </div>
                        
                        <?php         
                            }
                        ?>
                    <?php
                            $count++;
                        }
                    }
                    else{
                    ?>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Address: </label>                                      
                            <input type="text" class="form-control" name="address[0]" required />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="addAddress" class="btn btn-primary btn-clean" style="margin-top: 30px;">Add More</button>
                    </div>
                    <?php
                    }
                    ?>
                </div>   
                
                <div class="emailDiv">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Email: </label>                                      
                            <input type="text" class="form-control" name="email[0]" required />                                    
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="addEmail" class="btn btn-primary btn-clean" style="margin-top: 30px;">Add More</button>
                    </div>
                </div>
                
                
                
                <div class="phoneNumDiv">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Phone Number: </label>                                      
                            <input type="text" class="form-control" name="phoneNumber[0]" required />                                    
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="addPN" class="btn btn-primary btn-clean" style="margin-top: 30px;">Add More</button>
                    </div>
                </div>
                
                <div class="col-md-12">
        
                    <div class="pull-right margin-top-10">
                        <input type="hidden" name="update" value="<?=$update?>">
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
<script>
$( document ).ready(function() {
    
    //Defining variables
    var AA = 0;
    var AE = 0;
    var AP = 0;
    
    // Add HTMl for more Address
    $( "#addAddress" ).click(function() {
        AA++;
        var AdrresssHTML = '<div class="col-md-10" id="new-'+AA+'" ><div class="form-group"><label>Address: </label><input type="text" class="form-control" name="address['+AA+']" required /></div></div><div class="col-md-2"><button type="button" id="AA-'+AA+'" class="btn btn-primary btn-clean remove" style="margin-top: 30px;">Remove</button></div>';     
        $(".dev-page-content").css({height:""});
        $(".addressDiv").append(AdrresssHTML);
        
        
    });
    
    // Add HTMl for more Email
    $( "#addEmail" ).click(function() {
        AE++;
        var EmailHTML = '<div class="col-md-10" id="new-'+AE+'" ><div class="form-group"><label>Email: </label><input type="text" class="form-control" name="email['+AE+']" required /></div></div><div class="col-md-2"><button type="button" id="AE-'+AE+'" class="btn btn-primary btn-clean remove" style="margin-top: 30px;">Remove</button></div>';     
        $(".dev-page-content").css({height:""});
        $(".emailDiv").append(EmailHTML);
        
    });
    
    // Add HTMl for more Phone Number
    $( "#addPN" ).click(function() {
        AP++;
        var PhoneNumHTML = '<div class="col-md-10" id="new-'+AP+'" ><div class="form-group"><label>Phone Number: </label><input type="text" class="form-control" name="phoneNumber['+AP+']" required /></div></div><div class="col-md-2"><button type="button" id="AP-'+AP+'" class="btn btn-primary btn-clean remove" style="margin-top: 30px;">Remove</button></div>';     
        $(".dev-page-content").css({height:""});
        $(".phoneNumDiv").append(PhoneNumHTML);
    });
    
});
</script>