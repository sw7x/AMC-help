<?php 
error_reporting (E_ALL ^ E_DEPRECATED);
$directory ='';
session_start();
include('init.php');
include('../dbcon.php');
$page ='dashboard';
?>


<?php include('header.php'); ?>

	
    <?php include('navigation.php'); ?>
    
    
    <?php
	if(isset($_REQUEST['change_password_submit']))
	{
		
		$password_old = $_REQUEST['password_old'];
		$password_new = $_REQUEST['password_new'];
		
		$sql       = "SELECT * FROM tbl_admin WHERE id=1";
		$query     = $conn->prepare($sql);
    	$isExecute = $query->execute(); 


		if($isExecute)
		{
			$rows    = $query->rowCount();
			if($rows ==1)
			{
				$result = $query->fetch(PDO::FETCH_ASSOC);
				if($result['password']==$password_old)
				{
					$sql2 = "UPDATE tbl_admin SET password='".$password_new."' WHERE id=1";
					$query2     = $conn->prepare($sql2);
    				$isExecute2 = $query2->execute(array($password_new)); 
					
					if($query)
					{
						$status = 'Successfully';	
					}
					else
					{
						$status = 'Failed';	
					}
					
				}
				else
				{
					$status = 'Failed';	
				}
			}
			else
			{
				$status = 'Failed';	
			}
		}
		else
		{
			$rows = 0;
			$status = 'Failed';
		}
		
		
		
		
	}
	//$status
	//Failed
	//Successfully
	
	?>
    
    
    
    
    
    
    
    <div class="container">
        <div class="row">
        
        	<div class="col-md-12">
                <a class="btn btn-sm btn-info" href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashbord</a><br>
                <br>
               
               <div class="panel panel-info" style="width:100%;margin:0 auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Admin Password</h3>
                    </div>
				</div>
				<br />
        	
            	<div class="col-md-6">
                    <form action="" id="admin_change_password" method="post" name="" autocomplete="off">
                        <div class="form-group">
                            <label for="" style="float:left;padding:10px 0px;">Type Password<span></span></label><br/>
                            <input type="password" name="password_old" value="" id="" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="" style="float:left;padding:10px 0px;">Type New Password<span></span></label><br/>
                            <input type="password" name="password_new" value="" id="" class="form-control">
                        </div>
                        
                        <div>
                            <div id="hint1" class="hint"></div>
                            <input class="btn btn-success formbuttons" style="float:left" name="change_password_submit" type="submit" value="Submit" id="">
                            <input class="btn btn-warning formbuttons" style="float:right" name="" type="reset" value="Reset" id="">
                            <div class="clear"></div>
                        </div>
                    </form>
                    <br/><br/><br/>
				</div><!--col-md-6-->
            
            	<div class="clear"></div>
            	<?php if(isset($status))
                {
                    if($status=='Successfully')
                    {
                    ?>
                        <div id="password_change_status" style="font-size:24px;font-weight:bold;color:rgb(9, 229, 9);padding:15px;"><?php if(isset($status)){echo 'Change Password '.$status;}?></div>
                    <?php
                    }
                    if($status=='Failed')
                    {
                    ?>
                        <div id="password_change_status" style="font-size:24px;font-weight:bold;color:red;padding:15px;"><?php if(isset($status)){echo 'Change Password '.$status;}?></div>
                    <?php
                    }
                } 
                ?>
            
            </div><!--col-md-12-->
            
    	</div><!--row-->
    </div><!--container-->
    
        
        
        
<?php require('footer.php'); ?>