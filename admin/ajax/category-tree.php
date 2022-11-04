<?php 
$directory ='ajax_';
session_start();
include('../../dbcon.php');
include('../init.php');
include('../../data/escape_string.php');

$id = $_REQUEST['id']
 
 
 
 ?>

   
<label style="padding:10px 0px;" for="add main category">Category tree</label>
  
<div class="tree well tree_<?php echo $id; ?>">
    
    <?php
	$sqla1 = "SELECT * FROM tbl_category WHERE tbl_category.parent_id=0 GROUP BY cid ORDER BY cid ASC";
	$querya1 = $conn->prepare($sqla1);
	$isExecute =  $querya1->execute(array());
	$resultsa1 = $querya1->fetchAll(PDO::FETCH_ASSOC); 
	
	foreach($resultsa1 as $rowa1)
	{
	?>
    <!--1-->
    <ul>
        <li class="level1 parent_li" data-categoryid="<?php echo $rowa1['cid'];?>">
            <span><?php echo $rowa1['category'];?></span>
            
            
            
            <?php
			$sqlb1="SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";
			$queryb1 = $conn->prepare($sqlb1);
			$isExecute =  $queryb1->execute(array($rowa1['cid']));
			$resultsb1 = $queryb1->fetchAll(PDO::FETCH_ASSOC); 
			
			foreach($resultsb1 as $rowb1)
			{
			?>
            <!--2-->
            <ul>
                <li class="level2 parent_li" data-categoryid="<?php echo $rowb1['cid'];?>">
                	<span><?php echo $rowb1['category'];?></span>
                    
                    
                    
                    <?php
					$sqlc1   ="SELECT * FROM tbl_category WHERE tbl_category.parent_id=? GROUP BY cid ORDER BY cid ASC";
					$queryc1 = $conn->prepare($sqlc1);
					$isExecute =  $queryc1->execute(array($rowb1['cid']));
					$resultsc1 = $queryc1->fetchAll(PDO::FETCH_ASSOC); 
					
					foreach($resultsc1 as $rowc1)
					{
					?>
                    <!--3-->
                    <ul>
                        <li class="level3" data-categoryid="<?php echo $rowc1['cid'];?>">
	                        <span><?php echo $rowc1['category'];?></span>
                        </li>
                    </ul>
                    <!--3-->
                    <?php 
					}
					?>
                    
                    
                </li>
           	</ul>
            <!--2-->
            <?php 
			}
			?>
            
            
        </li>
     </ul>
     <!--1-->
	<?php 
	}
	?>
</div>

<!--<script type="text/javascript" src="../js/categorytree.js"></script>-->