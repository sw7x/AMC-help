<?php 
include('init.php'); 
include "dbcon.php";
include('data/escape_string.php');
$page = 'index';



if(isset($_SESSION['userdata'])){
    header('Location: pdf.php');
}
    

?>

<!-- Header--> 
<?php include('header.php'); ?>



	<!-- Navigation -->
	<?php include('navigation.php'); ?>

	
    <!-- Page Content -->
    
   
    <div class="container">
        <div class="row">
            <div class="col-md-12" > 
				
                    
                  
                    <div class="dropdown-menu login_dropdown" role="menu" style="display:block;margin-left:24%;margin-top:50px;background-color:#f4f0ed;">
                        
                        <h2>Login Form</h2>
                        <p>Login to view your documents</p>
                        
                        <form role="form" method="post" action="" id="user_email" autocomplete="off">
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
                            
                        </form>
                        
                        <form role="form" method="post" action="" id="user_pass" autocomplete="off">
                            <div class="form-group">
                              	<label for="pwd">Please enter password that was sent to the registered phone number</label>
                             	<input type="password" class="form-control" name="u_pass" id="pwd" placeholder="Enter password"><br />
                            	<div>
                                    <button type="submit" class="btn btn-success" id="pass_submit" style="float: left;">Submit</button>
									<button class="btn btn-danger" type="reset" id="pass_cancel" style="float: right;">Reset</button>
									<div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                                <div class="result__pass"></div> 
							 </div>                            
                       	</form>
                        <hr>
                        <a class="btn" href="sample-account.php" type="button" id="em" style="padding-left:0px;">Trial Login </a>  
                        
                    </div>
					<div class="result__pass"></div> 
                    <div class="clear"></div> 
            
            
            
            </div><!--col-md-12-->
    	</div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
	

   
 
<!-- Footer -->   
<?php require('footer.php'); ?>