<?php
$directory ='ajax';
session_start();
include('../../dbcon.php');
include('../init.php');










if(isset($_REQUEST['maincatvalue']))
{
	$maincatvalue = $_REQUEST['maincatvalue'];
	
	$sql = "SELECT * FROM tbl_category WHERE parent_id=? ORDER BY cid DESC";;
	$query = $conn->prepare($sql);
	$isExecute =  $query->execute(array($maincatvalue));
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
    	<label for="" style="float:left;padding:10px 0px;">Level 2 sub category<span></span></label><br/>
        <select id="subcategory3" class="" name="" style="float:left;width:100%;">
        <option></option>
    	<?php
        foreach($results as $result)
		{
		?>
		<option value="<?php echo $result['cid']; ?>"><?php echo $result['category']; ?></option>
		<?php 
		}
		?>
		</select>
        <div class="clear"></div>
        <br/>
    <?php
	}
	else
	{
		echo false;
	?>
    	
    <?php
	}

}


?>

