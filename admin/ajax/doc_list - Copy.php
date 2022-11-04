<?php 
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php'); 
include('../../data/escape_string.php');




$task = $_REQUEST['task'];
$userid = $_REQUEST['docmg_userid'];
$sessionuserid = $userid;



if($task=='view')
{
?>
	<div class="" style="height:500px;overflow:scroll;overflow-x: hidden;">
        <div class="" style="width:100%">
            <div class="panel-group" id="accordion0">
            <?php 
            //if(isset($_SESSION['userdata']))
            //{	
                LoadPanel(0,$sessionuserid);
            //} 
            ?>
            </div> <!-- .panel-group -->
        </div> <!-- .container -->       	
    </div>
<?php	
}
?>



						





<?php 

	function GetLstDoc($iCid,$sessionuserid)
	{
		$oLDoc = array();
		
		//get docs assinged for category
		$sQuery = "SELECT * FROM tbl_docs WHERE tbl_docs.categoryid=".$iCid." AND tbl_docs.status=1 AND userid=".$sessionuserid;
		
		
		$oResult = mysql_query($sQuery);
		
		while ($oRow = mysql_fetch_array($oResult))
		{
			$oLDoc[$oRow['doc_name']] = array($oRow['filename'],$oRow['id']);
		}
		return $oLDoc;
	}
	
	function IsShow($iCid,$sessionuserid)
	{
		if (sizeof(GetLstDoc($iCid,$sessionuserid)))
		{
			return true;
		}
		
		//get subcategories
		$sQuery = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=".$iCid." GROUP BY cid ORDER BY cid ASC";
		$oResult = mysql_query($sQuery );
	
		while($oRow = mysql_fetch_array($oResult))
		{
			if (IsShow($oRow['cid'],$sessionuserid))
			{
				return true;
			}
		}
		
		return false;
	}
	
	function LoadPanel($iCid,$sessionuserid)
	{
		$sQuery = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=".$iCid." GROUP BY cid ORDER BY cid ASC";
		$oResult = mysql_query($sQuery );

		while($oRow = mysql_fetch_array($oResult))
		{
			if (IsShow($oRow['cid'],$sessionuserid))
			{
		?>
				<div class="panel panel-default">
					
					<div class="panel-heading nopadding">
						<h4 class="panel-title">
							<a class="collapsed categorylink clear" data-toggle="collapse" href="#collapse<?php echo $oRow['cid']?>"><?php echo $oRow['category'];?></a>
							<button type="button" class="btn btn-default btn-danger btn-xs docmg_block" data-categoryid="<?php echo $oRow['cid'];?>"><span class="glyphicon glyphicon-lock"></span></button>
                        	<div class="clear"></div>
                        </h4>
					</div>
					
					<div id="collapse<?php echo $oRow['cid']?>" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="panel-group" id="accordion2">
                            	<table>
                                	
								<?php
								$oLDoc = GetLstDoc($oRow['cid'],$sessionuserid);
								foreach ($oLDoc as $sDoc => $docinfoarray)
								{
                                ?>
								<tr>
                                    <td><?php echo $sDoc;?></td>
                                    <td>block</td>
                                    
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?php echo $docinfoarray[0]; ?>" >
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </td>
                                    
                                    <td>
                                    <button class="btn btn-primary btn-xs doc_rename" data-title="Rename" data-docrenameid="<?php echo $docinfoarray[1];?>" >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    </td>
								</tr></table>
                                <?php
								}
								LoadPanel($oRow['cid'],$sessionuserid);
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