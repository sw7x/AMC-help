<?php 
$directory ='ajax';
session_start();
include('../../dbcon.php');
include('../init.php');
include('../../data/escape_string.php');

	$deletecatid = $_REQUEST['deletecatid'];

	$sql = "SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.parent_id=0 AND tbl_category.cid=?";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($deletecatid));
	
	if($isExecute)
	{
		$rows1 = $query->rowCount();
	}
  	else
	{
		$rows1 = 0;
	}
	
	if($rows1==0)
	{
		$sql1 = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id=?";
		$sql2 = "SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.cid IN (".$sql1.")";
		
		$query2 = $conn->prepare($sql2);
		$isExecute2 =  $query2->execute(array($deletecatid));

		if($isExecute2)
		{
			$rows2 = $query2->rowCount(); 
			
		}
		else
		{
			$rows2 = 0;
		}
		
		if($rows2==0)
		{
			$sqla = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id=".$deletecatid;
			
			$sqlb = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id IN (".$sqla.")";
			$sqlc = "SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.cid IN (".$sql1.")";
			//$sqlc = SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.cid IN (SELECT cid FROM tbl_category WHERE tbl_category.parent_id IN (SELECT cid FROM tbl_category WHERE tbl_category.parent_id=1))

			$query3 = $conn->prepare($sqlc);
			$isExecute3 =  $query3->execute(array($deletecatid));
			
			if($isExecute3)
			{
				$rows3 = $query->rowCount(); 
				
			}
			else
			{
				$rows3 = 0;
			}
			
			if($rows3==0)
			{
				//delete query
				$sql = "DELETE FROM tbl_category WHERE cid=?";
				$query = $conn->prepare($sql);
				$isExecute =  $query->execute(array($deletecatid));
				
				$status='Category Delete Successfully';
				//load data
			}
			else
			{
				$status='Category Has Files Therefore Cant Delete';
				//cant delete
			}
		}
		else
		{
			$status='Category Has Files Therefore Cant Delete';
			//cant delete
		}
	
	}
	else
	{
		$status='Category Has Files Therefore Cant Delete';
		//cant delete
	}
?>




	
<div class="">
    <div id="cm_status" style="color:<?php if($status=='Category Has Files Therefore Cant Delete'){echo 'red';}elseif($status=='Category Delete Successfully'){echo '#00FF00';}?>"><?php echo $status; ?></div>
   	
    <!-- search -->
    <div class="col-lg-6" style="float:right;padding:15px 0px 15px 15px">
        <input type="text" class="form-control" id="accordian-search" placeholder="Search for Category ..." />
        <div class="clear"></div>
    </div>	
    <!-- end of search -->
    
    <div class="clear"></div>
	<?php
	$sqla1 = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=0 GROUP BY cid ORDER BY cid ASC";
	$querya1 = $conn->prepare($sqla1);
	$isExecute =  $querya1->execute(array());
	$resultsa1 = $querya1->fetchAll(PDO::FETCH_ASSOC);    

	foreach($resultsa1 as $rowa1)
	{
	?>
    
	<div class="panel panel-default stage1" style="margin-bottom:5px;">
    	
        <!--clickable div 1-->
		<div class="panel-heading nopadding">
			<h4 class="panel-title h4-<?php echo $rowa1['cid'];?>" >
				<a class="collapsed categorylink category1" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $rowa1['cid']?>">
					<?php echo $rowa1['category'];?>
				</a>
				<a href="" class="btn btn btn-danger btn-xs categoryupdate" data-target="" data-cid="<?php echo $rowa1['cid'];?>"  data-categoryname="<?php echo $rowa1['category'];?>" data-title="category-update" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                <a class="deletelink" href="#" data-deletecat="<?php echo $rowa1['cid'];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                <div class="clear"></div>
			</h4>
		</div>
        
        <!--collapsable div 1-->
		<div id="collapse<?php echo $rowa1['cid']?>" class="panel-collapse collapse level1">
			<div class="panel-body">
				<!---->
				
				<div class="panel-group" id="accordion1">
				
				<?php 
				$sqla2 = "SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.cid=? ORDER BY cid ASC";
				$querya2 = $conn->prepare($sqla2);
				$isExecute =  $querya2->execute(array($rowa1['cid']));
				$resultsa2 = $querya2->fetchAll(PDO::FETCH_ASSOC);    

				foreach($resultsa2 as $rowa2)
				{
				?>	
					<?php echo $rowa2['doc_name'].'<br />';?>
				<?php
				}
				?>
				
				
				<?php
				$sqlb1="SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";
				$queryb1 = $conn->prepare($sqlb1);
				$isExecute =  $queryb1->execute(array($rowa1['cid']));
				$resultsb1 = $queryb1->fetchAll(PDO::FETCH_ASSOC);    

				foreach($resultsb1 as $rowb1)
				{
				?>
					<div class="panel panel-default stage2" style="margin-bottom:5px;">
                    
                    	<!--clickable div 2-->
						<div class="panel-heading nopadding">
							<h4 class="panel-title h4-<?php echo $rowb1['cid'];?>">
								<a class="collapsed1 categorylink category2" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $rowb1['cid']?>">
									<?php echo $rowb1['category'];?>
								</a>
								<a href="" class="btn btn btn-danger btn-xs categoryupdate" data-target="" data-cid="<?php echo $rowb1['cid'];?>"  data-categoryname="<?php echo $rowb1['category'];?>" data-title="category-update" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a class="deletelink" href="#" data-deletecat="<?php echo $rowb1['cid'];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
								<div class="clear"></div>
							</h4>
						</div>
						
                        <!--collapsable div 2-->
						<div id="collapse<?php echo $rowb1['cid']?>" class="panel-collapse collapse level2">
							<div class="panel-body">
								<!---->
								
								<div class="panel-group" id="accordion2">
								
								<?php 
								$sqlb2 = "SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.cid=? ORDER BY cid ASC";
								$queryb2 = $conn->prepare($sqlb2);
								$isExecute =  $queryb2->execute(array($rowb1['cid']));
								$resultsb2 = $queryb2->fetchAll(PDO::FETCH_ASSOC);

								foreach($resultsb2 as $rowb2)
								{
								?>	
									<?php echo $rowb2['doc_name'].'<br />';?>
								<?php
								}
								?>
								
								
								<?php
								$sqlc1="SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";
								$queryc1 = $conn->prepare($sqlc1);
								$isExecute =  $queryc1->execute(array($rowb1['cid']));
								$resultsc1 = $queryc1->fetchAll(PDO::FETCH_ASSOC);
								
								foreach($resultsc1 as $rowc1)
								{
								?>
									<div class="panel panel-default stage3">
										
                                        <!--clickable div 3-->
                                        <div class="panel-heading nopadding">
											<h4 class="panel-title h4-<?php echo $rowc1['cid'];?>">
												<a class="collapsed categorylink category3" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $rowc1['cid']?>">
													<?php echo $rowc1['category'];?>
												</a>
												<a href="" class="btn btn btn-danger btn-xs categoryupdate" data-target="" data-cid="<?php echo $rowc1['cid'];?>"  data-categoryname="<?php echo $rowc1['category'];?>" data-title="category-update" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a class="deletelink" href="#" data-deletecat="<?php echo $rowc1['cid'];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
												<div class="clear"></div>
											</h4>
										</div>
									
                                    </div> <!-- .panel -->
									
                                    <!--collapsable div 3-->
									<div id="collapse<?php echo $rowc1['cid']?>" class="panel-collapse collapse level3">
										<div class="panel-body">
										<!---->
										<div class="panel-group" id="accordion3">
										
										<?php 
										$sqlc2 = "SELECT * FROM tbl_category INNER JOIN tbl_docs ON tbl_category.cid = tbl_docs.categoryid  WHERE tbl_category.cid=? ORDER BY cid ASC";
										$queryc2 = $conn->prepare($sqlc2);
										$isExecute =  $queryc2->execute(array($rowc1['cid']));
										$resultsc2 = $queryc2->fetchAll(PDO::FETCH_ASSOC);



										foreach($resultsc2 as $rowc2)
										{
										?>	
											<?php echo $rowc2['doc_name'].'<br />';?>
										<?php
										}
										?> 
										
										</div>
									</div>
								</div>
								<?php 
								}
								?>
								</div> <!-- .panel-group -->
								
								<!---->
							</div>
						</div>
					</div> <!-- .panel -->
				<?php 
				}
				?>
				</div> <!-- .panel-group -->
												
				<!---->
			</div>
		</div>
	</div> <!-- .panel -->
	<?php 
	}
	?>
</div>	
    
    
    
    
    
    <div class="modal fade" id="category-update" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
				</div>

				<div class="modal-body">
                    <form action="" id="categoryupdateform" method="post" name="" autocomplete="off">
                        <label for="" style="float:left;padding:10px 0px;">Change Category Name<span></span></label><br/>
                        <input type="text" name="update__category" value="" id="" class="form-control">
                        <input type="hidden" name="categoryupdateid" value="" id="" class="form-control">
                        <div>
                            <div id="hint1" class="hint"></div>
                            <input class="btn btn-success formbuttons" style="float:left" name="" type="submit" value="ADD" id="">
                            <input class="btn btn-warning formbuttons" style="float:right" type="reset" value="Reset" id="">
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
			
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal-fade -->