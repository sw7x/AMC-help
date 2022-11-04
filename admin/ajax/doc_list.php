<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');

	$task = $_REQUEST['task'];

	if($task=='view')
	{
		$userid = $_REQUEST['docmg_userid'];
		$sessionuserid = $userid;
?>		<!--max-height:500px;overflow:scroll;overflow-x: hidden;-->
        <div class="" style="" data-userid="<?php echo $userid; ?>">
            <div class="" style="width:100%">
                <div class="panel-group" id="accordion0">
                
                <?php	LoadPanel(0,$sessionuserid,null,$conn);	?>
                
                </div> <!-- .panel-group -->
            </div> <!-- .container -->       	
        </div>
<?php	
	}
	else if($task =='block')
	{
		$doc_id = $_REQUEST['doc_id'];
		$sql = "SELECT status FROM tbl_docs WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($doc_id));
		$result = $query->fetch(PDO::FETCH_ASSOC);

		if($result['status'] == 0)
		{
			$stat = 0;
			/*change status to 1*/			
		}
		else if($result['status'] == 1)
		{
			$stat = 1;
			/*change status to 0*/			
		}
		
		$sql = "UPDATE tbl_docs SET status=1 WHERE id=?";
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($doc_id));
		
	

		$sql = "SELECT status FROM tbl_docs WHERE id=".$doc_id;
		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($doc_id));
		$result = $query->fetch(PDO::FETCH_ASSOC);
	
	 
		if($result['status']==1)
		{
		?>	
			<button class="btn btn-danger btn-xs block_docmanage" data-docid="<?php echo $doc_id; ?>">
				<span class="glyphicon glyphicon-lock"></span>
			</button>
		<?php  
		} 
		else if($result['status']==0)
		{
		?>
			<button class="btn btn-success btn-xs block_docmanage" data-docid="<?php echo $doc_id; ?>">
				<span class="glyphicon glyphicon-ok"></span>
			</button>
		<?php
		 }
		 else
		 {
			echo 'error';
		 }
	}
	else if($task =='delete')
	{
		$doc_id = $_REQUEST['doc_id'];
		///////////////////////////////////////////////////$userid = $_REQUEST['docmg_userid'];
		
		//delete file and 
		$sql = "SELECT filename,username FROM tbl_docs INNER JOIN tbl_user ON tbl_docs.userid=tbl_user.id WHERE tbl_docs.id=?";
		$query 		= $conn->prepare($sql);
		$isExecute 	=  $query->execute(array($doc_id));
		$result 	= $query->fetch(PDO::FETCH_ASSOC);



		
		$dataarray;
		//echo 'username'.$result['username'].'<br />';
		//echo 'filename'.$result['filename'].'<br />';
		
		$del_file_url = "../upload/".$result['username']."/".$result['filename'];
		if(is_dir($del_file_url))
		{
			unlink($del_file_url);
		}
		
		if(unlink($del_file_url))
		{
			//delete record
			$sql = "DELETE FROM tbl_docs WHERE id=".$doc_id;
			$query = $conn->prepare($sql);
			$isExecute =  $query->execute(array($doc_id));		
		
			if($query)
			{
				$dataarray['result']=true;
			}
			else
			{
				$dataarray['result']=false;
			}
			
		}
		else
		{
			$dataarray['result']=false;
		}
		echo json_encode($dataarray);
	}						
	else if($task =='categoryblock')
	{
		$dataarray;
		//$doc_id = $_REQUEST['doc_id'];
		$cid = $_REQUEST['docmgCategoryID'];
		$userid = $_REQUEST['userID'];
		
		$categoryLevel1 = $_REQUEST['cl1'];
		$categoryLevel2 = $_REQUEST['cl2'];
		$categoryLevel3 = $_REQUEST['cl3'];
		
		
		//$check__category = getCategory_AllDocStat($cid,$userid,false);
		
		
		$dataarray['checkCategoryPrevious'] = $checkCategoryPrevious = getCategoryAllDocStat($cid,$userid,$conn);
		
		$dataarray['blockCategoryAllDocStat'] = blockCategoryAllDocStat($cid,$userid,!$checkCategoryPrevious,$conn);
		
		$dataarray['checkCategoryLatest'] = $checkCategoryLatest = getCategoryAllDocStat($cid,$userid,$conn);
		
		if($categoryLevel1!='invalid'){$dataarray['categoryLevel1'] = getCategoryAllDocStat($categoryLevel1,$userid,$conn);}
		if($categoryLevel2!='invalid'){$dataarray['categoryLevel2'] = getCategoryAllDocStat($categoryLevel2,$userid,$conn);}
		if($categoryLevel3!='invalid'){$dataarray['categoryLevel3'] = getCategoryAllDocStat($categoryLevel3,$userid,$conn);}
		
		
		if($categoryLevel1!='invalid'){$dataarray['l1onlydocstat'] = CategoryOnlyAllDocStat($categoryLevel1,$userid,$conn);}
		if($categoryLevel2!='invalid'){$dataarray['l2onlydocstat'] = CategoryOnlyAllDocStat($categoryLevel2,$userid,$conn);}
		if($categoryLevel3!='invalid'){$dataarray['l3onlydocstat'] = CategoryOnlyAllDocStat($categoryLevel3,$userid,$conn);}
		
		$dataarray['docmgCategoryID'] = $cid;
		$dataarray['userID'] = $userid;
		
		echo json_encode($dataarray);
	}
	else if($task =='allcategorystat')
	{
		$userid = $_REQUEST['userid'];
		$cl1 = $_REQUEST['cl1'];
		$cl2 = $_REQUEST['cl2']; 
		$cl3 = $_REQUEST['cl3']; /**/
		
		$dataarray['cl1'] = $cl1;
		$dataarray['cl2'] = $cl2;
		$dataarray['cl3'] = $cl3;/**/
		
		if($cl1!='invalid'){$dataarray['cl1status'] = getCategoryAllDocStat($cl1,$userid,$conn);}
		if($cl2!='invalid'){$dataarray['cl2status'] = getCategoryAllDocStat($cl2,$userid,$conn);}
		if($cl3!='invalid'){$dataarray['cl3status'] = getCategoryAllDocStat($cl3,$userid,$conn);}
		
		echo json_encode($dataarray);
	}

/*--------------------- functions -------------------------*/
	
	
	
	
	function blockCategoryAllDocStat($cid,$userid,$stat,$conn)
	{
		if(!$stat){$stat = 0;}
		
		//$last = false;
		$sqlc1 = "SELECT cid FROM tbl_category WHERE tbl_category.cid=? GROUP BY cid ORDER BY cid ASC";
		$queryc1 		= $conn->prepare($sqlc1);
		$isExecutec1 	=  $queryc1->execute(array($cid));
		

		
		if(!$isExecutec1){return false;}
		$rowsc1 = $queryc1->rowCount();
		//$dataarray['row1'] = $rowsc1;
		
		if($rowsc1)
		{
			
			
			$sqlc2 = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id IN(".$sqlc1.") GROUP BY cid ORDER BY cid ASC";
			$queryc2 = $conn->prepare($sqlc2);
			$isExecutec2  =  $queryc2->execute(array($cid));

			
			if(!$isExecutec2){return false;}
			$rowsc2 = $queryc2->rowCount();
		
		               
			$sqldoc1 = "UPDATE tbl_docs SET status=? WHERE userid=? AND tbl_docs.categoryid IN(".$sqlc1.")";
			$querydoc1 = $conn->prepare($sqldoc1);
			$isExecute_doc1 =  $querydoc1->execute(array($stat,$userid,$cid));

			
			if(!$isExecute_doc1){return false;}
			//return $querydoc1;
			//return $querydoc1;
			/*while($statdoc1 = mysql_fetch_array($querydoc1))
			{
				if($statdoc1['status']==1)
				{
					return true;
				}
				
			}*/
			
			if($rowsc2)
			{
			
				$sqlc3 = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id IN(".$sqlc2.") GROUP BY cid ORDER BY cid ASC";
				
				$queryc3 = $conn->prepare($sqlc3);
				$isExecutec3 	=  $queryc3->execute(array($cid));
				$rowsc3 		= $queryc3->rowCount();
				if(!$isExecutec3){return false;}
				
				
				$sqldoc2 =  "UPDATE tbl_docs SET status=? WHERE userid=? AND tbl_docs.categoryid IN(".$sqlc2.")";;
				$querydoc2 = $conn->prepare($sqldoc2);
				$isExecute_doc2 =  $querydoc2->execute(array($stat,$userid,$cid));
				


				if(!$isExecute_doc2){return false;}
				/*while($statdoc2 = mysql_fetch_array($querydoc2))
				{
					if($statdoc2['status']==1)
					{
						return true;
					}
				}*/
			
				if($rowsc3)
				{
					//$rowsc4=0
					
					$sqldoc3 =  "UPDATE tbl_docs SET status=? WHERE userid=? AND tbl_docs.categoryid IN(".$sqlc3.")";;
					
					$querydoc3 		= $conn->prepare($sqldoc3);
					$isExecutedoc3 	= $querydoc3->execute(array($stat,$userid,$cid));				


					if(!$isExecutedoc3){return false;}
					/*while($statdoc3 = mysql_fetch_array($querydoc3))
					{
						if($statdoc3['status']==1)
						{
							return true;
						}
					}*/
				
				}
			}
		
		}
		return true;
	}
	
	
	
	
	function CategoryOnlyAllDocStat($cid,$userid,$conn)
	{
		$stat='invalid';
		
		$sql = "SELECT * FROM tbl_docs WHERE userid=? AND tbl_docs.categoryid =?";
		$query 		= $conn->prepare($sql);
		$isExecute 	= $query->execute(array($userid,$cid));
		$results 	= $query->fetchAll(PDO::FETCH_ASSOC);          
		
		foreach($results as $result)
		{
			
			if(($result['status']==1) && (!isset($stat) || $stat==true ))
			{
				$stat = true;
			}
			else if(($result['status']==0) && (!isset($stat) || $stat==false ))
			{
				$stat = false;
			}
			else
			{
				$stat='invalid';
				break;
			}
			
		}
		
		return $stat;
	}
	
	
	/*-start------functions that check category status according to document status--------------*/
	
	function getCategoryAllDocStat($cid,$userid,$conn)
	{
		//$last = false;
		$sqlc1 			= "SELECT cid FROM tbl_category WHERE tbl_category.cid=? GROUP BY cid ORDER BY cid ASC";
		$queryc1 		= $conn->prepare($sqlc1);
		$isExecutec1 	= $queryc1->execute(array($cid));
		//$resultsc1 	= $queryc1->fetchAll(PDO::FETCH_ASSOC);         


		if($isExecutec1)
		{
			$rowsc1 = $queryc1->rowCount();
		}
		else
		{
			$rowsc1=0;	
		}
		//$dataarray['row1'] = $rowsc1;
		
		if($rowsc1)
		{
			
			
			$sqlc2 = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id IN(".$sqlc1.") GROUP BY cid ORDER BY cid ASC";
			$queryc2 		= $conn->prepare($sqlc2);
			$isExecutec2 	= $queryc2->execute(array($cid));
			//$resultsc2 		= $queryc2->fetchAll(PDO::FETCH_ASSOC);



			if($isExecutec2)
			{
				$rowsc2 = $queryc2->rowCount();
			}
			else
			{
				$rowsc2 = 0;	
			}
			
			$sqldoc1 = "SELECT * FROM tbl_docs WHERE userid=? AND tbl_docs.categoryid IN(".$sqlc1.")";
			$querydoc1 		= $conn->prepare($sqldoc1);
			$isExecutedoc1 	= $querydoc1->execute(array($userid,$cid));
			$resultsdoc1    = $querydoc1->fetchAll(PDO::FETCH_ASSOC);



			foreach($resultsdoc1 as $statdoc1)
			{
				if($statdoc1['status']==1)
				{
					return true;
				}
				
			}
			
			if($rowsc2)
			{
			
				$sqlc3 = "SELECT cid FROM tbl_category WHERE tbl_category.parent_id IN(".$sqlc2.") GROUP BY cid ORDER BY cid ASC";
				$queryc3 		= $conn->prepare($sqlc3);
				$isExecutec3 	= $queryc3->execute(array($cid));
				//$resultsc3    	= $queryc3->fetchAll(PDO::FETCH_ASSOC);

				if($isExecutec3)
				{
					$rowsc3 = $queryc3->rowCount();
				}
				else
				{
					$rowsc3 = 0;	
				}
				
				$sqldoc2 			= "SELECT * FROM tbl_docs WHERE userid=? AND tbl_docs.categoryid IN(".$sqlc2.")";
				$querydoc2 			= $conn->prepare($sqldoc2);
				$isExecutedoc2  	= $querydoc2->execute(array($userid,$cid));
				$resultsdoc2    	= $querydoc2->fetchAll(PDO::FETCH_ASSOC);


				foreach($resultsdoc2 as $statdoc2)
				{
					if($statdoc2['status']==1)
					{
						return true;
					}
				}
			
				if($rowsc3)
				{
					//$rowsc4=0
					
					$sqldoc3 = "SELECT * FROM tbl_docs WHERE userid=".$userid." AND tbl_docs.categoryid IN(".$sqlc3.")";
					
					$querydoc3 			= $conn->prepare($sqldoc3);
					$isExecutedoc3  	= $querydoc3->execute(array($userid));
					$resultsdoc3    	= $querydoc3->fetchAll(PDO::FETCH_ASSOC);

					foreach($resultsdoc3 as $statdoc3)
					{
						if($statdoc3['status']==1)
						{
							return true;
						}
					}
				
				}
			}
		
		}
		return false;
	}
	/*-end------functions that check category status according to document status--------------*/
	
	
	function GetLstDoc($iCid,$sessionuserid,$conn)
	{
		$oLDoc = array();
		
		//get docs assinged for category
		$sSql = "SELECT * FROM tbl_docs WHERE tbl_docs.categoryid=? AND userid=?";
		$oQuery 		= $conn->prepare($sSql);
		$isExecute_o 	=  $oQuery->execute(array($iCid,$sessionuserid));
		$oResults 		=  $oQuery->fetchAll(PDO::FETCH_ASSOC);


		foreach ($oResults as $oResult)
		{
			$oLDoc[$oResult['doc_name']] = array($oResult['filename'],$oResult['id'],$oResult['status']);
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
		$sSql 		= "SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";
		$oQuery 	= $conn->prepare($sSql);
		$isExecute 	= $oQuery->execute(array($iCid));
		$oResults 	= $oQuery->fetchAll(PDO::FETCH_ASSOC);   



		foreach($oResults as $oResult)
		{
			if (IsShow($oResult['cid'],$sessionuserid,$conn))
			{
				return true;
			}
		}
		
		return false;
	}
	
	function LoadPanel($iCid,$sessionuserid,$i=NULL,$conn)
	{
		if(!isset($i)){$i=1;}else{$i=$i+1;}
		
		$sSql = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";

		$oQuery 	= $conn->prepare($sSql);
		$isExecute 	=  $oQuery->execute(array($iCid));
		$results 	= $oQuery->fetchAll(PDO::FETCH_ASSOC);   



		
		foreach($results as $result)
		{
			//$i
			if (IsShow($result['cid'],$sessionuserid,$conn))
			{
		?>
				<div class="panel panel-default level<?php echo $i; ?>">
					
					<div class="panel-heading nopadding panel-headinglevel<?php echo $i; ?>">
						<h4 class="panel-title" style="width:100%;">
							<a class="collapsed categorylink" data-toggle="collapse" href="#collapse<?php echo $result['cid']?>"><?php echo $result['category'];?></a>
							<?php 
								//echo 'category id'.$result['cid'].'<br/>';
								//echo 'userid'.$sessionuserid.'<br/>';
								//echo 'parent id'.$result['parent_id'].'<br/>';
								
								if(getCategoryAllDocStat($result['cid'],$sessionuserid,$conn))
								{	
									
								?>
									<button type="button" class="btn btn-default btn-danger btn-sm docmgCategoryBlock pull-right" data-categoryid="<?php echo $result['cid'];?>"><span class="glyphicon glyphicon-lock"></span></button>
								<?php
                                }
								else
								{	
								?>
                                	<button type="button" class="btn btn-default btn-success btn-sm docmgCategoryBlock pull-right" data-categoryid="<?php echo $result['cid'];?>"><span class="glyphicon glyphicon-ok"></span></button>
								<?php	
								}
							
							?>
                            
                            <!--<button type="button" class="btn btn-default btn-danger btn-xs docmgCategoryBlock" data-categoryid="<?php //echo $result['cid'];?>"><span class="glyphicon glyphicon-lock"></span></button>-->
                        	<div class="clear"></div>
                        </h4>
					</div>
					
					<div id="collapse<?php echo $result['cid']?>" class="panel-collapse collapse panel-collapselevel<?php echo $i;?>">
						<div class="panel-body">
							<div class="panel-group" id="accordion2">
                            	
                                <table class="userdoclist display table table-striped table-bordered table-hover">
                                    	
								<?php
                                $isthdraw=false;
								$oLDoc = GetLstDoc($result['cid'],$sessionuserid,$conn);
								
								foreach ($oLDoc as $sDoc => $docinfoarray)
								{
                                	if(!$isthdraw)
									{
								?>
									<tr class="info">
                                        <th>Document name</th>
                                        <th>Block</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    <tr>
                                    <?php 
									}
									$isthdraw=true;
									?>
                                    <tr class="doc__<?php echo $docinfoarray[1]; ?> active">
                                        <td><?php echo $sDoc;?></td>
                                        
                                        <td>
                                        <?php
                                        if($docinfoarray[2]==1)
                                        {
                                        ?>	
                                            <button class="btn btn-danger btn-xs block_docmanage" data-docid="<?php echo $docinfoarray[1]; ?>"><span class="glyphicon glyphicon-lock"></span></button>
                                        <?php  
                                        } 
                                        else if($docinfoarray[2]==0)
                                        {
                                        ?>
                                            <button class="btn btn-success btn-xs block_docmanage" data-docid="<?php echo $docinfoarray[1]; ?>"><span class="glyphicon glyphicon-ok"></span></button>
                                        <?php
                                         }
                                         else{echo 'error';}
                                         ?>
										</td>
                                        
                                        <td><button class="btn btn-danger btn-xs deleteDocmanage" data-docid="<?php echo $docinfoarray[1]; ?>"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        
                                        <td><button class="btn btn-primary btn-xs doc_rename" data-title="Rename" data-docrenameid="<?php echo $docinfoarray[1];?>" ><span class="glyphicon glyphicon-pencil"></span></button></td>
                                    </tr>
                                <!--</table>-->
                                <?php
								}
								?>
                                </table>
								<?php
								
								LoadPanel($result['cid'],$sessionuserid,$i,$conn);
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


