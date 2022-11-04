<?php 
$directory ='';
session_start();
include('init.php');
include('../data/escape_string.php');
$page ='';
?>


<?php include('header.php'); ?>




	<div class="container">
        <div class="row clearfix">
            <div class="col-md-8 column" style="margin-left:25%;">
                <form action="" id="user_create" method="post" name="user_create" autocomplete="off">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">First Name</label>

                        <div class="col-md-5">
                            <input class="form-control input-md" id="" maxlength="10" name="fname" placeholder="" type="text">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Last Name</label>

                        <div class="col-md-5">
                            <input class="form-control input-md" id="" maxlength="10" name="lname">
                        </div>
                        <div class="clear"></div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">EMail</label>

                        <div class="col-md-5">
                            <input class="form-control input-md" id="" maxlength="40" name="email">
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">User Name</label>

                        <div class="col-md-5">
                            <input class="form-control input-md" id="" maxlength="10" name="username">
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Country</label>

                        <div class="col-md-5">
                            <?php include('countrylist.php'); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="">Telephone</label>
                        <div class="col-md-6">
                            <div class="" style="float:left;">
                                <input class="form-control input-md" id="" maxlength="4" name="tp_country" style="width:60px;" />
                            </div>
    
                            <div class="" style="float:right;">
                                <input class="form-control input-md" id="" maxlength="20" name="tp_number" />
                            </div>
                            <div class="clear"></div>
                        </div><div class="clear"></div>
                    </div>
					<br><br><br><br>  
                    
                    <div style="margin-left:19%;">
                        <input class="btn btn-success" name="user_submit" type="submit" value="create">
                        <input class="btn btn-warning" type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>







<span id="result" class="clear"></span>
<?php require('footer.php'); ?>

