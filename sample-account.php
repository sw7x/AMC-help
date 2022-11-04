<?php 
include('init.php'); 
include "dbcon.php";
include('data/escape_string.php');
$page = 'sample-account';

?>

<!-- Header--> 
<?php include('header.php'); ?>



	<!-- Navigation -->
	<?php include('navigation.php'); ?>

	
    <!-- Page Content -->
    
    <?php
	if(!isset($_SESSION['userdata']))
	{
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" > 
				
                    
                  
                    <div class="dropdown-menu login_dropdown" role="menu" style="display:block;margin-left:24%;margin-top:50px;background-color:#f4f0ed;">
                        
                        <h2>Trial Account Login Form</h2>
                        <p>Login to view sample documents</p>

                        <form role="form" method="post" action="" id="sample-account-form" autocomplete="off">
                            <div class="form-group" style="margin-bottom:0px;">
                              	<label for="username">Email:</label>
                              	<input type="text" class="form-control" name="u_email" id="username" placeholder="Enter Email"><br />
                            	<div>
                                    <button type="submit" class="btn btn-success" id="email_submit" style="float: left;">Submit</button>
                                    
                                	<button class="btn btn-danger" type="reset" id="email_cancel" style="float: right;">Reset</button>
                                    
                                	<div class="clear"></div> 
								</div>
                                <div class="clear"></div>
                                <div class="result__email"></div>
                            </div>

                            <input type="hidden" value=<?php if(isset($email_para)){echo $email_para;}else echo '""'; ?> name="email_para"/>
                            <input type="hidden" value=<?php if(isset($amc_para)){echo $amc_para;}else echo '""'; ?> name="amc_para"/>
                            
                        </form>
                        

                        
                    </div>
					<div class="result__pass"></div> 
                    <div class="clear"></div> 
            
            
            
            </div><!--col-md-12-->
    	</div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
	<?php
	}
	else
	{
	
	}
	?>

   
 
<!-- Footer -->   
<?php require('footer.php'); ?>