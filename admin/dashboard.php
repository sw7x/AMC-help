<?php 
error_reporting (E_ALL ^ E_DEPRECATED);
$directory ='';
session_start();
include('init.php');

$page ='dashboard';
?>


<?php include('header.php'); ?>

	
    <?php include('navigation.php'); ?>
    
    <div class="container">
        <div class="row">
            <!--
            <h3>&nbsp;&nbsp;&nbsp;Admin Dashboard</h3>
            <hr>-->
            
            
            <div class="panel panel-info" style="width:100%;margin:0 auto;">
                <div class="panel-heading">
                    <h3 class="panel-title" style="font-size:24px;">Admin Dashboard</h3>
                </div>
            </div>
            
            <br />
            
            <ul class="ds-btn">
                <li>
                    <a class="btn btn-lg btn-primary"  id="modal-523321" href="#modal-container-523321" role="button" data-toggle="modal"><br>
                    	<i class="glyphicon glyphicon-user pull-left"></i><span>Add Users<br>
                    	<small><br></small></span>
                    </a>
                </li>

                <li>
                    <a class="btn btn-lg btn-success" href="manage_user.php"><br>
                    <i class="glyphicon glyphicon-tasks pull-left"></i><span>Manage Users<br>
                    <small><br></small></span></a>
                </li>

                <li>
                    <a class="btn btn-lg btn-danger" href="file_upload.php"><br>
                    <i class="glyphicon glyphicon-open pull-left"></i><span>Document Upload<br>
                    <small><br></small></span></a>
                </li>

                <li>
                    <a class="btn btn-lg btn-warning" href="comment.php"><br>
                    <i class="glyphicon glyphicon-comment pull-left"></i><span>User Comments<br>
                    <small><br></small></span></a>
                </li>

                <li>
                    <a class="btn btn-lg btn-info" href="doc_manage.php"><br>
                    <i class="glyphicon glyphicon-list pull-left"></i><span>Manage Document<br>
                    <small><br></small></span></a>
                </li>

                <li style="margin-left:25%;">
                    <a class="btn btn-lg btn-warning" href="category-management.php"><br>
                    <i class="glyphicon glyphicon-sort-by-attributes pull-left"></i><span>Manage Category<br>
                    <small><br></small></span></a>
                </li>
                
                <li style="">
                    <a class="btn btn-lg btn-default"  href="sample_papers.php"><br>
                    <i class="pull-left glyphicon glyphicon-file"></i><span>Sample Papers<br>
                    <small><br></small></span></a>
                </li>
                
                <li class="clear"></li>
            </ul>
        </div>
    </div><!-- add user popup -->


	<!--start-----modal for add users--> 
    <div class="col-md-12 column">
        <div class="modal fade" id="modal-container-523321">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">×</button>

                        <h4 class="modal-title" id="myModalLabel">Insert User</h4>
                    </div>

                    <div class="modal-body">
                        <form action="" id="user_create" method="post" name="user_create" autocomplete="off">
                            <div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">First Name</label>

                                <div class="col-md-6">
                                    <input style="margin-top:0px;" class="form-control input-md" id="" maxlength="20" name="fname" placeholder="" type="text">
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">Last Name</label>

                                <div class="col-md-6">
                                    <input style="margin-top:0px;" class="form-control input-md" id="" maxlength="20" name="lname">
                                </div>
                                <div class="clear"></div>
                            </div>

                            
                            <div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">Email</label>

                                <div class="col-md-6">
                                    <input style="margin-top:0px;" type="email" class="form-control input-md" id="" maxlength="40" name="email">
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            
                            <div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">User Name</label>

                                <div class="col-md-6">
                                    <input style="margin-top:0px;" class="form-control input-md" id="username-from-email" maxlength="40" name="username" readonly="readonly">
                                	<div class="username-suggestion"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

							<div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">Country</label>

                                <div class="col-md-6">
                                    <?php include('countrylist.php'); ?>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">Telephone</label>

                                <div class="col-md-2">
                                    <input style="margin-top:0px;width:50px;" class="form-control input-md" id="" maxlength="4" name="tp_country">
                                </div>

                                <div class="col-md-4" style="margin-bottom:0px;padding-left:0px;">
                                    <input style="margin-top:0px;" class="form-control input-md" id="" maxlength="9" name="tp_number">
                                </div>
                                <div class="clear"></div>
                            </div>
							
                            
                            <div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-4 control-label" for="" style="padding:10px 0px;">Sample papers</label>

                                <div class="col-md-6">
                                    <select name="sample_papers" id="sample_papers" class="" style="width:100%;">
                                    	<option value="amc1">AMC 1</option>
                                        <option value="amc1">AMC 2</option>
	                                </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            
                            <div style="margin-left:36%;margin-right:20%;">
                                <input class="btn btn-success" name="user_submit" type="submit" value="create">
                                <input class="btn btn-warning" type="reset" name="user_reset" value="Reset" style="float:right;">
                                <div class="clear"></div>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--end-----modal for add users-----------------------------> 
	
    
    
    
	
	
	
	
	
	
	
    <!---->
    <div class="modal fade" id="adduserfinish" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Successfully Inserted User</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    

    <!---->
    <div class="modal fade" id="adduserexsists" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">User Already Exsists </div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
	
    
    
    
    <div class="modal fade" id="addusererror" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Unable To Add User Data To Database</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div><!-- /.modal-content -->
       	 </div><!-- /.modal-dialog -->
    </div>
    
    
<?php require('footer.php'); ?>