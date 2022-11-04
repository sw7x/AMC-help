<?php
include('country_array.php');


$countries_lenth =  sizeof($countries);

?>
<select name="country" id="countrylist" class="" style="width:100%;">
    <option></option>
    <?php
    for($i=0;$i<$countries_lenth;$i++)
    {
    ?>
    
    
        <option value="<?php echo $countries[$i]['code']; ?>" data-d_code="<?php echo $countries[$i]['d_code']; ?>"><?php echo $countries[$i]['name']; ?></option>
    
    <?php	
    }
    ?>
</select>
