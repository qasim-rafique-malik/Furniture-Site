<?php 
    // main header
    require_once("include/MainHeader.php");
?>
        <!-- set loading layer -->
        <div class="dev-page-loading preloader"></div>
        <!-- ./set loading layer -->       
        
        <!-- page wrapper -->
        <div class="dev-page">
            
<?php 
    
    // header
    require_once("include/Header.php")
?>
            
            <!-- page container -->
            <div class="dev-page-container">

<?php 
    // sideBar 
    require_once("include/Sidebar.php")
?>
                
                <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        
                        
                        <div class="row row-condensed">
                            
                            
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="wrapper padding-bottom-0">
                                    <div class="dev-table">    
                                        <div class="dev-col">                                    

                                            <div class="dev-widget dev-widget-transparent">
                                                <h2>Server Usage</h2>
                                                <p>Total server usage in percentages</p>                                        
                                                <div class="dev-stat"><span class="counter">68</span>%</div>                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                                </div>                                        
                                                <p>We totally recommend you change your plan to <strong>Pro</strong>. Click here to get more details.</p>

                                                <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                            </div>

                                        </div>
                                        <div class="dev-col">                                    

                                            <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                <h2>Total Earnings</h2>
                                                <p>This is total earnings per last year</p>                                        
                                                <div class="dev-stat">$<span class="counter">75,332</span></div>                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"></div>
                                                </div>                                        
                                                <p>We happy to notice you that you become an Elite customer, and you can get some custom sugar.</p>

                                                <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                            </div>

                                        </div>
                                        <div class="dev-col">                                    

                                            <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                <h2>Your Balance</h2>
                                                <p>All your earnings for this time</p>
                                                <div class="dev-stat">$<span class="counter">5,321</span></div>                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                </div>                                        
                                                <p>You can withdraw this money in end of each month. Also you can spend it on our marketplace.</p>

                                                <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>                                        
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                       
<?php 
    require_once("include/ContainerFooter.php");
?>
                    </div>
                    <!-- ./page content container -->
                                        
                </div>
                <!-- ./page content -->                                               
            </div>  
            <!-- ./page container -->
            
            
            
<?php 
    require_once("include/SubFooter.php");
?>
<?php 
    require_once("include/Search.php");
?>
                   
        </div>
        <!-- ./page wrapper -->

<?php 
    require_once("include/footer.php");
?>
