<?php
    
    require("../php/connectivity.php");
    require("../php/NameClass.php");
    require("../php/MyLib.php");
    $ml = new MyLib($NC);
    if(isset($_SESSION['adminInfo'])){
        header("Location: index.php");
    } 
    if(isset($_POST['submit'])){
        $table                      = "admin_login";
        $where['email']             = $_POST['email'];
        $where['password']          = $_POST['password'];
        $where['admin_status']      = "Active";
        $auth                       =$db->getRecords($table,$where);
        
        if(!empty($auth)){
            $_SESSION['adminInfo'] = $auth;
            //echo "sss<pre>"; print_r($_SESSION); exit;
            header("Location: index.php");
        }
        else{
            echo "i am in else "; exit;
        }  
        //$ml->pr($db->getRecords($table,$where));
    }
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from aqvatarius.com/themes/intuitive/pages-login-lite.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2015 09:48:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- meta section -->
        <title>Intuitive - Admin Dashboard Template</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" >
        <!-- /meta section -->        
        
        <!-- css styles -->
        <link rel="stylesheet" type="text/css" href="css/default-blue-white.css" id="dev-css">
        <!-- ./css styles -->                              
                
        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/dev-other/dev-ie-fix.css">
        <![endif]-->
        
        <!-- javascripts -->
        <script type="text/javascript" src="js/plugins/modernizr/modernizr.js"></script>
        <!-- ./javascripts -->
        
        <style>.dev-page{visibility: hidden;}</style>
    </head>
    <body>
                
        <!-- page wrapper -->
        <div class="dev-page dev-page-login">
                      
            <div class="dev-page-login-block">
                <a class="dev-page-login-block__logo">Intuitive</a>
                <div class="dev-page-login-block__form">
                    <div class="title"><strong>Welcome</strong>, please login</div>
                    <form action="" method="post">                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="Login">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group no-border margin-top-20">
                            <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                        <p><a href="#">Forgot Password?</a></p>                        
                    </form>
                </div>
                <div class="dev-page-login-block__footer">                    
                    © 2015 <strong>Aqvatarius</strong>. All rights reserved.
                </div>
            </div>
            
        </div>
        <!-- ./page wrapper -->                
        
        <!-- javascript -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>       
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- ./javascript -->
    </body>

<!-- Mirrored from aqvatarius.com/themes/intuitive/pages-login-lite.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2015 09:48:42 GMT -->
</html>






