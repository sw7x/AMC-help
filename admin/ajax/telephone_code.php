<?php
$mainarray;
include('../country_array.php');
include('../../data/escape_string.php');
//echo '<pre>',print_r($countries),'<pre>';


$user_country = $_REQUEST['country'];
$countries_lenth =  sizeof($countries);



for($i=0;$i<$countries_lenth;$i++)
{
	if($countries[$i]['code'] == $user_country)
	{
		$index = $i;
	}
}

//echo $countries[$index]['d_code'];


$mainarray['tpcode'] = $countries[$index]['d_code'];











echo json_encode($mainarray);
