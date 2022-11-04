<?php
error_reporting (E_ALL ^ E_DEPRECATED);
$directory ='';
session_start();
include('init.php');
$page ='';
include('../data/escape_string.php');
include('../dbcon.php');
                            
?>

<?php include('header.php'); ?>

	<?php include('navigation.php'); ?>


	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-info" href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashbord</a><br>
                <br>
                

                <!--<h4><legend>User Manager</legend></h4>-->


                <div class="panel panel-info" style="width:100%;margin:0 auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Manager</h3>
                    </div>
				</div>

                <br />

			<div class="users">
                <div class="table-responsive">
                    
                    <table class="table table-bordred table-striped display" id="usermanagetable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>First Name</th>
								<th>Last Name</th>
                               	<th>Email</th>
                               	<th>User Name</th>
								<th>Telephone</th>
                                <th>Enable/Disable</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
                        </thead>


                        <tbody>
                            
                           	
							<?php 
                            $sql = "SELECT * FROM tbl_user ORDER BY id DESC";
                            $query = $conn->prepare($sql);
                            $query->execute();    
                            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                            //$rows = $query->rowCount();
                            
                            foreach($results as $result)
                            {
                            ?>	
                            <tr id="row<?php echo $result['id'];?>">	
                                <td><?php echo $result['firstname'];?></td>
								<td><?php echo $result['lastname'];?></td>
                                <td><?php echo $result['email'];?></td>
                                <td><?php echo $result['username'];?></td>
								<td><?php echo $result['tel_country'].' '.$result['tel_number'];?></td>
                                
								
                                <td  align="center">
                                <?php 
								if($result['firstname']!=='amc1' && $result['firstname']!=='amc2')
                                {
									if($result['account_status']==1)
                                    {
                                    ?>
                                        <p data-placement="top" data-toggle="tooltip" title="Enable"><a href="" class="disable_user btn btn-danger btn-xs" data-title="Edit" data-id="<?php echo $result['id'];?>"><span class="glyphicon glyphicon-ban-circle"></span></a></p>
                                    <?php
                                    }
                                    else if($result['account_status'] ==0)
                                    {	
                                    ?>
                                        <p data-placement="top" data-toggle="tooltip" title="Enable"><a href="" class="enable_user btn btn-success btn-xs" data-title="Edit" data-id="<?php echo $result['id'];?>"><span class="glyphicon glyphicon-ok"></span></a></p>
                                    <?php
                                    }
                                    elseif(is_null($result['account_status']))
                                    {
                                        echo 'onhold';
                                    }
                                    else
                                    {	
                                        echo 'error';}
								}
                                ?>
                                </td>

								<td  align="center">
                                <?php 
								if($result['firstname']!=='amc1' && $result['firstname']!=='amc2')
								{
								?>
                                	<button class="btn btn-primary btn-xs updateid" data-updateid="<?php echo $result['id'];?>">
                                    	<span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                <?php 
								}
								?>
                                </td>

                                
                                <td  align="center">
                                <?php 
								if($result['firstname']!=='amc1' && $result['firstname']!=='amc2')
								{
								?>
                                	 <a href="" class="btn btn btn-danger btn-xs" data-target="#delete<?php echo '-'.$result['id'];?>" data-title="Delete" data-toggle="modal">
                                    	<span class="glyphicon glyphicon-remove-sign"></span>
                                    </a>
								<?php 
								}
								?>
                                </td>
                            </tr>
							<?php 
							}
							?>
								
								
						</tbody>
                    </table>
				

                    <div class="clearfix">
                    </div>


                    <!--
                    <ul class="pagination pull-right">
                        <li class="disabled">
                            <a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
                        </li>


                        <li class="active"><a href="#">1</a></li>

						<li><a href="#">2</a></li>


                        <li><a href="#">3</a></li>


                        <li><a href="#">4</a></li>


                        <li><a href="#">5</a></li>

						<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                        
                    </ul>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>

	<div class="col-md-12 column">
        <div class="modal fade" id="edit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    
					
                     <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">×</button>
						<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
               		</div>
                    
                    <div class="modal-body">
                        
                        <form action="" id="user_update" method="post" name="user_update" autocomplete="off">
                            
                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="" style="margin:10px auto;">First Name</label>

                                <div class="col-md-6">
                                    <input class="form-control input-md" id="" style="margin-top:0px;" maxlength="20" name="fname" placeholder="" type="text" value="">
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">Last Name</label>

                                <div class="col-md-6">
                                    <input class="form-control input-md" id=""  maxlength="20" name="lname" value="" style="margin-top:0px;">
                                </div>
                                <div class="clear"></div>
                            </div>
                           


                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">EMail</label>

                                <div class="col-md-6">
                                	<input class="form-control input-md" id="" style="margin-top:0px;" maxlength="40" name="email" value="">
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            
                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">User Name</label>

                                <div class="col-md-6">
                                    <input class="form-control input-md" style="margin-top:0px;" id="" maxlength="40" name="username" readonly="readonly" value="">
                                </div>
                                <div class="clear"></div>
                            </div>
                            

                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">Country</label>

                                <div class="col-md-6">
                                    <?php include('countrylist.php'); ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            

                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                        		<label class="col-md-4 control-label" for="">Telephone</label>
								<div class="col-md-6">
                                    <div class="col-md-4" style="float:left;padding-left:0px;">
                                        <input class="form-control input-md" style="margin-top:0px;width:60px;" id="" maxlength="4" name="tp_country" value="" disabled="disabled" />
                                    </div>
            
                                    <div class="col-md-8" style="float:right;padding-right:0px;padding-left:0px;">
                                        <input class="form-control input-md" style="margin-top:0px;" id="" maxlength="9" name="tp_number" value="" />
                                    </div>
                                    <div class="clear"></div>
                            	</div><div class="clear"></div>
                    		</div>
							
                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">Sample papers</label>

                                <div class="col-md-6">
                                    <select name="sample_papers" id="sample_papers_" class="" style="width:100%;">
                                    	<option value="amc1">AMC 1</option>
                                        <option value="amc2">AMC 2</option>
	                                </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            
                           
                           <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">Login link</label>
        
                                <div class="col-md-6">
                                    <textarea rows="6" readonly style="margin-top:0px;resize: none;padding:6px 12px;width:100%;" value="" name='reglink'></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                           <input type="hidden" name="userid" value=""/>
                                     
                           <div style="margin-left:36%;margin-right:20%;" class="">
                                <input class="btn btn-success" name="user_submit" type="submit" value="Update" style="">
                                <input class="btn btn-warning" type="reset" value="Reset" style="float:right;">
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
					
					
					
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-fade -->
    </div>
    
	
	
	
	
	<?php 
	$sql = "SELECT * FROM tbl_user";
	$query = $conn->prepare($sql);
    $query->execute();
    
    $results = $query->fetchAll(PDO::FETCH_ASSOC);                
    //var_dump($results );

    //$rows = $query->rowCount();
	
	foreach($results as $result)
	{
	?>
    <div class="modal fade" id="delete<?php echo '-'.$result['id'];  ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>

                    <h4 class="modal-title custom_align" id="Heading">Delete User</h4>
                </div>


                <div class="modal-body">
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete User In <?php echo '- '.$result['email'];?>
                    </div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success delete_user" data-dismiss="modal" type="button" data-user="<?php echo $result['id'];  ?>"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Yes</button>
                    <button class="btn btn-default" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-remove"></span>&nbsp;No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
	<?php
	}
	?>



    <div class="modal fade" id="deletefinish" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
				</div>

				<div class="modal-body">
                    <div class="alert">Successfully Deleted User</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success deleteuser" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>






    <div class="modal fade" id="updateuserfinish" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Successfully Updated User</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

        <!---->
    <div class="modal fade" id="updateuserexsists" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">User Details Already Exsists </div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
	
    <div class="modal fade" id="updateusererror" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Unable To Update User Data In Database</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
<?php require('footer.php'); ?>