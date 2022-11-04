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
                        <h3 class="panel-title">Document Upload</h3>
                    </div>
				</div>
				<br />
            </div>
        </div>
    </div>

	
    <!---->
    <div class="table-responsive container" style="padding:0px 15px;">
        <div style="border:5px solid #D9EDF7;padding:5px;">
            <table class="table table-bordred table-striped display" id="usermanagetable2" style="width: 100%;">
                
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
                        <td><button class="btn btn-info btn-xs userselect_docup" data-userid="<?php echo $result['id'];?>"><span class="glyphicon glyphicon-ok"></span></button></td>
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
    
    
    
    
    <form id="upload" method="post" action="ajax/file_upload_ajax.php" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
    
    <div class="container">
        <div class="row clearfix">
            
            
            <div class="col-md-6 column">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Select user and category</h3>
                    </div>


                    <div class="panel-body">
                        <fieldset>
                        
                        <!-- Form Name -->
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic" style="text-align:left;">User</label>
                            <div class="col-md-6">
                                
                                <!--<<select name="user_info" class="form-control" id="fileupload_selectuser">-->
                                <select name="user_info" class="" id="fileupload_selectuser" style="width:100%;">
                                    <!--<option value="" disabled="disabled" selected="selected">select user</option>-->
                                    <option></option>
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
                                        <option value="<?php echo $result['id'];?>"><?php echo $result['username']; ?></option>
                                    <?php
                                    }
                                    ?>     
                                </select>
                           </div>
                           <div class="col-md-2 amcinfo" style="padding-top: 7px;font-weight:700;text-transform:uppercase;"></div>
                        </div>
                            
                                
                        <!--<div class="form-group">
                            <label class="col-md-3 control-label" for="selectbasic">Document Name</label>
                            <div class="col-md-6">
                                <input type="text" name="document_name" class="form-control input-md"/>
                            </div>
                        </div>-->
                        
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic" style="text-align:left;">Main Category</label>
                            <div class="col-md-6">                                        
                                
                                <select class="" id="category1" name="one" style="width:100%;">
                                    <option value="0">-- Choose Main Category --</option>
                                    <?php
                                    $sql = "SELECT * FROM tbl_category WHERE parent_id=0"; 
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_ASSOC);                
                                    //var_dump($results );
                                    //$rows = $query->rowCount();
                                    foreach($results as $result)
                                    {
                                    ?>                                    
                                        <option value="<?php echo $result['cid']; ?>"><?php echo $result['category'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group subcategory">
                            
                        </div>
                        									

                        <div class="form-group sub-subcategory">
                            
                        </div>
                         
                                                       
                    	</fieldset>
                    </div>
                </div>
            </div>
    
            <input type="hidden" name="document_name_hidden" />
            
            <div class="col-md-6 column">
                <div class="form-group" id="drop" style="border:2px solid #fff;margin:0px;">Drop Here<br />
                	
                    <a>Browse</a>
                	<input type="file" name="upl" id="bnm" multiple  />
                	<!--<input class="file" data-upload-url="#" id="browse" type="file" name="upl" multiple="true" data-max-file-count="5">-->
                </div>
            </div>
            
           
            
        </div><!--container-->
    </div><!--row clearfix-->
    
    <div class="container">
        <div class="clearfix">
            <div style="min-height:85px;height:auto;">
            	<button type="button" class="btn btn-success upload_reset">Do you want to continue</button>
                <div class="clear"></div>
                <table style="border:5px solid #D9EDF7;min-height:85px;" id="upload_doclist">
                   <!-- The file uploads will be shown here -->
                  <thead></thead>
                  <tbody></tbody>
                </table>
                <div class="clear"></div>
           	</div>
    	</div><!--container-->
    </div><!--row clearfix-->
	
    
    </form>






    


        

<div class="upload-details"></div>
<?php require('footer.php'); ?>        




