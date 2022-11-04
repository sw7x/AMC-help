<?php
$directory ='ajax';
session_start();
include('../init.php');
include('../../dbcon.php');
include('../../data/escape_string.php');


// A list of permitted file extensions
//$allowed = array('pdf', 'jpg' , 'jpeg', 'swf');
$allowed = array('jpg' , 'jpeg', 'swf');

$userid = $_REQUEST['user_info'];
$document_name = $_REQUEST['document_name_hidden'];

if(isset($_REQUEST['one'])){$cat1 = $_REQUEST['one'];}else{$cat1 =NULL;}
if(isset($_REQUEST['two'])){$cat2 = $_REQUEST['two'];}else{$cat2 =NULL;}
if(isset($_REQUEST['three'])){$cat3 = $_REQUEST['three'];}else{$cat3 =NULL;}



echo "cat1[".$cat1.']';
echo "cat2[".$cat2.']';
echo "cat3[".$cat3.']';



if($cat2 == NULL || !isset($cat2 )|| $cat2 ==0)
{
	$categoryid = $cat1;
}
else
{
	if($cat3 == NULL || !isset($cat3) || $cat3 ==0)
	{
		$categoryid = $cat2;
	}
	else
	{
		$categoryid = $cat3;
	}
}

echo'-------categoryid ------ '.$categoryid;

$sql = "SELECT * FROM tbl_user WHERE id=?";
$query = $conn->prepare($sql);
$isExecute =  $query->execute(array($userid));
$result = $query->fetch(PDO::FETCH_ASSOC);                



/*
if($userid == 10){$allowed = array('pdf');}
else{$allowed = array('mp3');}
*/


function getfilecount($username)
{
	$folderCount = $fileCount = 0;
	
	if ($handle = opendir('../upload/'.$username))
	{
		while (false !== ($entry = readdir($handle)))
		{
			if ($entry != "." && $entry != "..")
			{
				if (is_dir($entry))
				{
					//echo "Folder => " . $entry . "<br>";
					$folderCount++;
				} 
				else
				{
					//echo "File   => " . $entry . "<br>";
					$fileCount++;
				}
			}
		}
		echo "<br>==============<br>";
		//echo "Total Folder Count : " . $folderCount . "<br>";
		//echo "Total File Count : " . $fileCount;
		closedir($handle);
	}	
		
	return $fileCount;
}




if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0)
{
	echo 'FFFFFFFFFFFFFFFFFFFFFFF';
	
	
	if(!is_dir("../upload/".$result['username']))
	{
		//if directory not exsists it's been created
		mkdir("../upload/".$result['username']);
	}
		
		
	$file_count = getfilecount($result['username']);
	echo "@@@(".$file_count;
	
	/*if file in directory is greater than or equal to 20 then dont upload docs*/
	if($file_count < 20)
	{
		$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
		
		if(!in_array(strtolower($extension),$allowed))
		{
			echo '{"status":"error2"}';
			echo $userid;
			echo $_FILES['upl']['name'];
			exit;
		}
		
		//??????? same filename upload again ???????????????
		if(file_exists("../upload/".$result['username']."/".$_FILES['upl']['name']))
		{
			echo 'file already uploaded';
			exit;
		}
		
		if(move_uploaded_file($_FILES['upl']['tmp_name'], '../upload/'.$result["username"].'/'.$_FILES["upl"]["name"]))
		{
			echo '{"status":"success"}';
			echo $userid;
			echo $_FILES['upl']['name'];
			
			$sql = "INSERT INTO tbl_docs(	id,
											userid,
											filename,
											status,
											categoryid,
											doc_name) VALUES('',?,?,?,?,?)";

			$query     = $conn->prepare($sql);
			$isExecute =  $query->execute(array($userid,
												$_FILES['upl']['name'],
												1,
												$categoryid,
												$document_name));
			



			////////
			
			$sql = "SELECT * FROM tbl_docs INNER JOIN tbl_user ON tbl_docs.userid=tbl_user.id WHERE tbl_docs.userid=?";
			$query = $conn->prepare($sql);
			$isExecute =  $query->execute(array($userid));
			$result = $query->fetch(PDO::FETCH_ASSOC);                
			
			if($isExecute)
			{	

				$rows = $query->rowCount();
				 
				
			}
			else
			{
				$rows = 0;
			}
			
			///////////////


			exit;
		}
	}
	else
	{
		echo 'file limit reached for user';
		exit;	
	}
}

echo '{"status":"error3"}';
echo $document_name;

exit;

?>