<?php
$directory ='';
session_start();
include('init.php');
include('../dbcon.php');
include('../data/escape_string.php');
$page ='';



//$sql = "SELECT * FROM tbl_category";


?>

<?php include('header.php'); ?>

<?php include('navigation.php'); ?>





    <div class="container">
        <div class="row">
			<div class="col-md-12">
                
                
                <a href="dashboard.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-dashboard"></span>
                    Dashbord</a>
                <br><br>
                <div class="panel panel-info" style="width:100%;margin:0 auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Document Manage</h3>
                    </div>
				</div>

                <br />
                
				<!---->
				<div class="table-responsive container" style="padding:0px 0px;margin-bottom:20px;width:100%;">
					<div style="border:5px solid #D9EDF7;padding:5px;">
						<table class="table table-bordred table-striped display" id="usermanagetable3" style="width: 100%;">
							
							<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>User Name</th>
									<th>Telephone</th>
									<th>Country</th><br />
									<th>Exam</th>
									<th>Select User</th>
							   </tr>
							</thead>
					
					
							<tbody>
								<?php 
								$sql = "SELECT * FROM tbl_user ORDER BY id DESC";

								$query = $conn->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                //var_dump($results );
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
									<td><?php echo $result['country'];?></td>
									<td><?php echo $result['amc'];?></td>
                                    <td><button class="btn btn-info btn-xs userselect_docmanage" data-userid="<?php echo $result['id'];?>"><span class="glyphicon glyphicon-ok"></span></button></td>
								</tr>
								<?php 
								}
								?>
							 </tbody>
						</table>
					</div>
					<div class="clearfix"></div>
				</div>
				<!---->
				<div class="user_doclistdiv"></div>
			
            
            
            </div>
		</div>
	</div>
                
                
               
                
                
                
   
 	
    
    
    
    
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"><input class="form-control " type="text" value=""></div>
                    <div class="form-group"><input class="form-control " type="text" value=""></div>
                    <div class="form-group"><textarea rows="2" class="form-control" value=""></textarea></div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;">
                    	<span class="glyphicon glyphicon-ok-sign"></span>Update
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   	</div>


	<?php
	$sql = "SELECT * FROM tbl_docs ORDER BY id DESC";	
    $query = $conn->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($results );
    //$rows = $query->rowCount();


    foreach($results as $result)
	{
	?> 
    <div class="modal fade" id="docmg_delete<?php echo '-'.$result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Delete Document</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure
                        you want to delete this Document ?<?php echo ' '.$result['filename'].' - '.$result['doc_name']?>
                    </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success delete_docmanage" data-dismiss="modal" data-docid="<?php echo $result['id']; ?>"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </div>
    <?php
	}
	?>



	<div class="col-md-12 column">
        <div class="modal fade" id="rename" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                     <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">×</button>
						<h4 class="modal-title custom_align" id="Heading">Edit Document Name</h4>
               		</div>
                    
                    <div class="modal-body">
                        
                        <form action="" id="doc_rename" method="post" name="docname_update" autocomplete="off">
                            
                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="" style="margin:10px auto;">Filename</label>

                                <div class="col-md-6">
                                    <input class="form-control input-md" id="" style="margin-top:0px;" maxlength="20" name="doc_filename" placeholder="" type="text" value="" readonly="readonly">
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom:0px;padding:10px 10px;">
                                <label class="col-md-4 control-label" for="">Document Name</label>

                                <div class="col-md-6">
                                    <input class="form-control input-md" id=""  maxlength="20" name="doc_name" value="" style="margin-top:0px;">
                                </div>
                                <div class="clear"></div>
                            </div>
                           	
                            <input type="hidden" name="doc_id" value=""/>
                 			<input type="hidden" name="user_id" value=""/>
                 
                           <div style="margin-left:36%;margin-right:20%;" class="">
                                <input class="btn btn-success" name="docupdate_submit" type="submit" value="Update" style="">
                                <input class="btn btn-warning" type="reset" value="Reset" style="float:right;">
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
            
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-fade -->
    </div>


 	<div class="modal fade" id="renamedocexsists" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Document Name Already Exsists For User</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
	
    <div class="modal fade" id="renamedocerror" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Unable To Update Document Name Data In Database</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    
	<div class="modal fade" id="renamedocfinish" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Successfully Updated Document Name</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




	<div class="modal fade" id="categoryManageFaild" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Unable to enable/disable category status Data In Database</div>
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