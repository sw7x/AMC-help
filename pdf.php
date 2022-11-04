<?php 
include('init.php'); 
include('dbcon.php');
$page = 'pdf';
include('data/escape_string.php');

            

if(!isset($_SESSION['userdata'])){
    header('Location: index.php');
}
    


// if(isset($_POST['delete_account_submit']))
// {
// 	$ac_delete_pass = $_POST['ac_del_pass'];
	
// 	$sql = "SELECT account_disable_code FROM tbl_user WHERE id=".$_SESSION['userdata']['userid'];
// 	$result =  mysql_query($sql);
	
// 	$row = mysql_fetch_assoc($result);
// 	//echo $row['account_disable_code'];
	
// 	if($ac_delete_pass == $row['account_disable_code'])
// 	{
// 		$sql = "UPDATE tbl_user SET account_status =NULL WHERE id=".$_SESSION['userdata']['userid']; 
// 		$query_result = mysql_query($sql);
// 		header('location:logout.php');
// 	}
	
// 	if($ac_delete_pass=='' || $row['account_disable_code'] !== $ac_delete_pass )
// 	{
// 		$sql = "UPDATE tbl_user SET account_status = NULL WHERE id=".$_SESSION['userdata']['userid']; 
// 		$query_result = mysql_query($sql);
// 		header('location:logout.php');
// 	}
	
// }
?>


<?php
	
	function GetLstDoc($iCid,$sessionuserid,$conn)
	{
		$oLDoc = array();
		
		//get docs assinged for category
		$sSql = "SELECT * FROM tbl_docs WHERE tbl_docs.categoryid=? AND tbl_docs.status=1 AND userid=?";
		$sQuery = $conn->prepare($sSql);
	    $sQuery->execute(array($iCid,$sessionuserid));
	    $oResult = $sQuery->fetchAll(PDO::FETCH_ASSOC);
    
		
		foreach ($oResult as $oRow)
		{
			$oLDoc[$oRow['doc_name']] = $oRow['filename'];
		}
		return $oLDoc;
	}

	function IsShow($iCid,$sessionuserid,$conn)
	{
		if (sizeof(GetLstDoc($iCid,$sessionuserid,$conn)))
		{
			return true;
		}
		
		//get subcategories
		$sSql = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";
		$sQuery = $conn->prepare($sSql);
	    $sQuery->execute(array($iCid));
	    $oResult = $sQuery->fetchAll(PDO::FETCH_ASSOC);

		foreach($oResult as $oRow)
		{
			if (IsShow($oRow['cid'],$sessionuserid,$conn))
			{
				return true;
			}
		}
		
		return false;
	}
	
	function LoadPanel($iCid,$sessionuserid,$conn)
	{
		$sSql = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";		
		$sQuery = $conn->prepare($sSql);
	    $sQuery->execute(array($iCid));
	    $oResult = $sQuery->fetchAll(PDO::FETCH_ASSOC);


		foreach($oResult as $oRow)
		{
			if (IsShow($oRow['cid'],$sessionuserid,$conn))
			{
		?>
				<div class="panel panel-default">
					
					<div class="panel-heading nopadding">
						<h4 class="panel-title">
							<a class="collapsed categorylink clear" data-toggle="collapse" href="#collapse<?php echo $oRow['cid']?>"><?php echo $oRow['category'];?></a>
						</h4>
					</div>
					
					<div id="collapse<?php echo $oRow['cid']?>" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="panel-group" id="accordion2">
								<?php
									$oLDoc = GetLstDoc($oRow['cid'],$sessionuserid,$conn);
									foreach ($oLDoc as $sDoc => $sFile)
									{
								?>
										<a  href="" data-file="<?php echo $sFile;?>" class="readonline"><?php echo $sDoc;?></a><br />
								<?php
									}
									LoadPanel($oRow['cid'],$sessionuserid,$conn);
								?>
							</div>
						</div>
					</div>    
				</div> <!-- .panel -->
		<?php
			}
		}
	}
?>


<?php include('header.php'); ?>

<!--oncontextmenu="return false"-->


    <!-- Navigation -->
    <?php include('navigation.php'); 
	
	
	$sessionuserid = $_SESSION['userdata']['userid'];
   	//echo '['.$sessionuserid.']';
   
    //$sessionuserid = 104;//-----------------------------------------
	?>
    
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
		
		
			<div class="container">
				<div class="row clearfix">
					<div class="col-md-1 column">
					</div>
					<div class="col-md-3 column" style="margin-left:5%;">
						<h4></h4>
						<br>
						<strong >Related Documents</strong>
						<br><br>
						
                        <!------------------------>
						<div class="" style="height:500px;overflow:scroll;overflow-x: hidden;">
							<div class="" style="width:100%">
								<div class="panel-group" id="accordion0">
								<?php 
								if(isset($_SESSION['userdata']))
								{	
									LoadPanel(0,$sessionuserid,$conn);
								} 
								?>
								</div> <!-- .panel-group -->
							</div> <!-- .container -->       	
							
                    	</div>
						<!--------------------->
					
                    </div><!--end of class="col-md-3 column"-->
                    
                   	
                    <style>
					.flag-wrapper {display:none;}
					iframe .flag-wrapper {display:none !important;}
					</style>
					<div class="col-md-6 column" style="margin-top:0px;">
						<h4 style="background:#1A4C9C;padding:10px;color:#ffffff;width:95%;text-transform:capitalize;" class="docname">Document Name</h4>
						<div class="media" style="background-color: rgb(255, 255, 255); width: 528px;" id="flashcontent">
                        	
                            <div class='pdfdiv'>Your Document Loads in Here</div>
                        	<!--<div class='pdfdiv'><img src="images/loading-blue.gif" alt="" /></div> --> 
                        </div>
						
                        
                       
                        	
                            
                            
					   <!--help button-->
						<a id="modal-857150" href="#modal-container-857150" role="button" class="btn btn-success" data-toggle="modal">Help</a>
						<div class="modal fade" id="modal-container-857150" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content" style="padding: 15px;">
									
									<h4>Entre your email and message</h4>
									<form role="form" method="post" action="" autocomplete="off" id="user_help_form">
										<div class="form-group">
										  <label for="pwd">Email</label>
										  <input type="email" class="form-control" id="help_email" placeholder="Enter your email" name="help_email">
										</div>
										
										<div class="form-group">
										  <label for="pwd">Message</label>
										  <textarea class="form-control" rows="7" id="comment" placeholder="Enter your message in 300 characters" name="help_comment"></textarea>
										</div>                                        
										
										<input type="hidden" name="help_userid" value="<?php if(isset($_SESSION['userdata'])){	echo $_SESSION['userdata']['userid'];}else{	echo 0;}?>">
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</form>  
									
								</div>
							</div>
						</div>
                        
                    </div>
					<div class="col-md-1 column"></div>
				</div>
			</div>
		
		
		</div><!-- /.row -->
    </div><!-- /.container -->
    
    
   <div class="modal fade" id="modal-container-857149" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:15px;height:200px;">
                
                <h4>Entre 4 digit number send to your email to delete account</h4>
                <form role="form" action="" method="post" autocomplete="off">
                    <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="ac_del_pass" name="ac_del_pass" placeholder="Enter password for deactivate account" maxlength="4">
                    </div>
                    <input type="hidden" name="delete_account_submit">
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>  
                
            </div>
        </div>
        <div class="clear"></div>
    </div> 



	<div class="modal fade" id="modal-container-857151" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content thankdiv" style="padding: 15px;">
                <h4>We have received your communication. We will be in touch with you shortly.<br /><br />
                Thank you.</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
    
	<div class="modal fade" id="modal-container-857152" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content thankdiv" style="padding: 15px;">
                <h4>Error submiting your comments to system.</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
    
    <?php require('footer.php'); ?>
