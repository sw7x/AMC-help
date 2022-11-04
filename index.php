<?php 
include('init.php'); 
include "dbcon.php";
include('data/escape_string.php');
$page = 'index';



if(isset($_GET['selected_page'])){

    if($_GET['selected_page']=='index'){
        $page = 'index';    
    }else if($_GET['selected_page'] == 'sample-account'){
        $page = 'sample-account';
    }else{
        $page = 'index';
    }
}else{
    $page = 'index';
}










if(isset($_SESSION['userdata'])){
    header('Location: pdf.php');
}
    

?>



<!-- Header--> 
<?php include('header.php'); ?>



	<!-- Navigation -->
	<?php include('navigation.php'); ?>

	
    

    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a class="mod-link <?php echo $signTabClass = ($page=='index')?'selected':'' ?>" href="">Sign in</a></li>
                <li><a class="mod-link <?php echo $sampleAccTabClass = ($page=='sample-account')?'selected':'' ?>" href="">Sample account</a></li>
            </ul>

            <div id="cd-login" class="<?php echo $signDivClass = ($page=='index')?'is-selected':'' ?>"> <!-- log in form -->                
                
                <form class="cd-form top-form login-form" method="post" action="" id="user_email" autocomplete="off">
                    <div class="fieldset" id="login-email-field">
                        <label class="image-replace cd-email" for="signin-email">E-mail</label>
                        <input class="full-width has-padding has-border" name="u_email" id="username" type="email" placeholder="E-mail">
                    </div>

                     <div id="login_email_error_msg"></div>   

                    <div class="result__email" style="color: red;font-size: 12px;display: inline-block;"></div>

                    <div class="fieldset from-btn-wrap top-form">
                        <input class="half-width left" type="submit" value="Login" id="email_submit">
                        <input class="half-width right emailFormValidatorReset" type="reset" value="Reset" id="email_cancel">
                        <div class="clearfix"></div>                        
                    </div>

                </form>
                    
                <form role="form" method="post" class="cd-form" action="" id="user_pass" autocomplete="off">        
                    
                    <p class="fieldset" style="color: #08b182;font-weight: bold;">Please enter your password</p>

                    <div class="fieldset" id="login-password-field">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border" name="u_pass" id="pwd" type="password"  placeholder="Password">
                        <a href="#0" class="hide-password">Show</a>                        
                    </div>

                    <div id="pw-error-msg"></div>
                    <div class="result__pass" style="color: red;font-size: 12px;display: inline-block;"></div>

                    <div class="fieldset">
                        <input class="half-width left" type="submit" value="Login" id="pass_submit">
                        <input class="half-width right passFormValidatorReset" type="reset" value="Reset" id="pass_cancel">
                        <div class="clearfix"></div>
                    </div>
                    
                </form>
            </div> <!-- cd-login -->



            <div id="cd-signup" class="<?php echo $sampleAccDivClass = ($page=='sample-account')?'is-selected':'' ?>"> <!-- sign up form -->
                <form class="cd-form" id="sample-account-form">
                    
                    <p class="fieldset">Log in to view sample documents</p>
                    
                    <p class="fieldset" id="sample-account-email-field">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" name="sample_acc_email" id="signup-email" type="email" placeholder="E-mail">
                    </p>
                    <div id="sample_acc_email_error_msg"></div>                   

                    <p class="fieldset sample_login__email" style="margin:0px;color: red;font-weight:bold;font-size: 14px;display: inline-block;"></p>
                    
                    <div class="fieldset from-btn-wrap">                        
                        <input class="half-width left" type="submit" value="Login">
                        <input class="half-width right sampleAccountFormValidatorReset" type="reset" value="Reset">
                        <div class="clearfix"></div>                        
                    </div>


                    <input type="hidden" value=<?php if(isset($email_para)){echo $email_para;}else echo '""'; ?> name="email_para"/>
                    <input type="hidden" value=<?php if(isset($amc_para)){echo $amc_para;}else echo '""'; ?> name="amc_para"/>
                </form>

            </div> <!-- cd-signup -->


            
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->
	

   
 
<!-- Footer -->   
<?php require('footer.php'); ?>