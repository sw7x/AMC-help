<?php 
error_reporting (E_ALL ^ E_DEPRECATED);
$directory ='';
include('../data/escape_string.php');
session_start();
include('init.php');
$page ='';
?>

<?php
include('../dbcon.php');



?>


<?php include('header.php'); ?>

<?php include('navigation.php'); ?>




    <!-- Page Content -->

    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <a class="btn btn-sm btn-info" href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashbord</a><br>
                <br>
                <div class="panel panel-info" style="width:100%;margin:0 auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sample Papers</h3>
                    </div>
				</div>
				<br />
            </div>
        </div>
    </div>

	
    <!---->
    <div class="table-responsive container" style="padding:0px 15px;margin-bottom:10px;">
        <div style="border:5px solid #D9EDF7;padding:5px;">
            <table class="table table-bordred table-striped display" id="samplepapers_usermanagetable" style="width: 100%;">
                
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
						if($result['firstname']!=='amc1' && $result['firstname']!=='amc2')
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
                        <td><button class="btn btn-info btn-xs userselect_sample" data-userid="<?php echo $result['id'];?>"><span class="glyphicon glyphicon-ok"></span></button></td>
                    	<?php 
						}
						?>
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
    
    
    
    
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                
				
				<div class="panel panel-info">
                    
					<div class="panel-heading">
                        <h3 class="panel-title">Select user and sample paper type</h3>
                    </div>


                    <div class="panel-body">
                        <form action="" id="samplePapers" method="post" name="samplePapersForm" autocomplete="off">
                        
							<div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
								<label class="col-md-3 control-label" for="selectbasic" style="text-align:left;padding:10px 0px;">User</label>
								<div class="col-md-7">
									
									<select name="user_info" class="" id="samplePapers_selectuser" style="width:100%;">
										<option></option>
										<?php
										
										$sql = "SELECT * FROM tbl_user Where username NOT IN('amc1','amc2') ORDER BY id DESC";
										$query = $conn->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_ASSOC);                
                                        //var_dump($results );
                                        //$rows = $query->rowCount();
                                        foreach($results as $result)
										{
										?>
											<option value="<?php echo $result['id'];?>"><?php echo $result['username']; ?></option>
										<?php
										}
										?>     
									</select>
							   </div>
							   <div class="col-md-2 amcinfo" style="padding-top: 7px;font-weight:700;text-transform:uppercase;"></div>
								<div class="clear"></div>
                            </div>
								
									
							
							<div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
								<label class="col-md-3 control-label" for="" style="text-align:left;padding:10px 0px;">User Email</label>

								<div class="col-md-7">
									<input style="margin-top:0px;" class="form-control input-md" id="samplePapersEmail" maxlength="40" name="samplePapersEmail" readonly="readonly"/>
								</div>
								<div class="clear"></div>
							</div>
							
							
							<div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
								<label class="col-md-3 control-label" for="" style="text-align:left;padding:10px 0px;">Sample papers user login</label>

								<div class="col-md-7">
									<select name="sample_papersV" id="amcLoginToUser" class="" style="width:100%;">
										<option value="amc1">AMC 1</option>
										<option value="amc2">AMC 2</option>
									</select>
								</div>
								<div class="clear"></div>
							</div>
							
							
							<div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
								<label class="col-md-3 control-label" for="" style="padding:10px 0px;">Login link</label>

								<div class="col-md-7">
                                	<textarea rows="6" readonly class="samplePapersLink" style="" value="" name='reglink'></textarea>
									<!--<input style="margin-top:0px;" class="form-control input-md" id="username-from-email__" maxlength="40" name="username" readonly="readonly">
									-->
                                </div>
								<div class="clear"></div>
							</div>
						</form>
                        
							<div class="form-group" style="margin-bottom:0px;padding:0px 10px;">
                                <label class="col-md-3 control-label" for="" style="padding:10px 0px;"></label>
                                
                                <div class="col-md-7">
                                	<button  class="btn btn-success generatelink" style="margin-top: 10px;" id="gnLink">Generate Link</button>
                                    <button  class="btn btn-info emaillink" style="margin-top: 10px;float:right;" id="seLink">Send Email</button >
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
									
                    	
                    </div>
					
                </div>
				
				
            </div>
		</div><!--row clearfix-->
    </div><!--container-->
    
    



	<div class="modal fade" id="samplePapers_invalidInfo" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Inavalid info</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
 
	<div class="modal fade" id="samplePapers_emailsend" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Email  Send successfully</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    
	<div class="modal fade" id="samplePapers_emailnotsend" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Unable to send email</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

        
	<div class="modal fade" id="samplePapers_emailGnError" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
					<!--<h4 class="modal-title custom_align" id="Heading">Delete this entry 4444444444</h4>-->
                </div>

				<div class="modal-body">
                    <div class="alert">Email  generate error</div>
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