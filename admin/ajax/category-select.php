<?php 

$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php');
include('../../data/escape_string.php');


$dataarray;
$level = $_REQUEST['level'];

if($level==1)
{
	$categorylevel1 = $_REQUEST['categorylevel1']; 
	$sql = "SELECT * FROM tbl_category WHERE parent_id=?";   
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($categorylevel1));
	$results = $query->fetchAll(PDO::FETCH_ASSOC);     

   
	if($isExecute)
	{
		$rows = $query->rowCount();
		
	}
  	else
	{
		$rows = 0;
	}
	
	
	
	
	
	if($rows > 0)
	{
?>  <label class="col-md-4 control-label" for="category2" style="text-align:left;">Level2 Category</label>
    <div class="col-md-6">
        <select name="two" class="" id="category2" style="width:100%">
                <option value="0">-- Select Only Main Category --</option>
              <!--  <option value="0" >choose nothing</option>-->
                <?php
                foreach($results as $result)
                {
                ?>                                    
                <option value="<?php echo $result['cid']; ?>"><?php echo $result['category'];?></option>
                <?php
                }
                ?>
        </select>
	</div>   
<?php	
	}
	else
	{
		
	}
}
else if($level==2)
{

	$categorylevel2 = $_REQUEST['categorylevel2'];
	$sql = "SELECT * FROM tbl_category WHERE parent_id=?";    
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($categorylevel2));
	$results = $query->fetchAll(PDO::FETCH_ASSOC);                
	
	if($isExecute)
	{
		$rows = $query->rowCount(); 
		
	}
  	else
	{
		$rows = 0;
	}
	
	if($rows > 0)
	{
?>  
	<label class="col-md-4 control-label" for="category3" style="text-align:left;">Level 3 Category</label>
    <div class="col-md-6">
        <select name="three" class="" id="category3"  style="width:100%">
                <option value="0">-- Select Only Level 2 Category --</option>
               <!-- <option value="0" >choose nothing</option>-->
                <?php
                foreach($results as $result)
                {
                ?>                                    
                <option value="<?php echo $result['cid']; ?>"><?php echo $result['category'];?></option>
                <?php
                }
                ?>
        </select>   
	</div>
<?php
	}
	else
	{
		
		
	}
}

?>


















