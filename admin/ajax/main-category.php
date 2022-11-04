<?php
$directory ='ajax';
session_start();
include('../../dbcon.php');
include('../init.php');


	
	
	$sql = "SELECT * FROM tbl_category WHERE parent_id=0 ORDER BY cid DESC";
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute();
	$results = $query->fetchAll(PDO::FETCH_ASSOC);                
	
	
    
	if($query)
	{
		$rows = $query->rowCount();
	}
  	else
	{
		$rows = 0;
	}
	
	if($rows>=1)
	{
	?>	
    	<label for="" id='lbl_maincategorydiv_2' style="float:left;padding:10px 0px;">Main category<span></span></label><br/><br/>
        <select id="maincategory2" class="" name="" style="float:left;width:100%;">
        <option></option>
		<?php
        foreach($results as $row)
		{
		?>
		<option value="<?php echo $row['cid']; ?>"><?php echo $row['category']; ?></option>
		<?php 
		}
		?>
		</select>
        <div class="clear"></div><br />
    <?php
	}
	else
	{
	?>
    	<i></i>
    <?php
	}



?>

