<?php
session_start();
$page ='';
include('../data/escape_string.php');
include('../dbcon.php');

$sql = "SELECT * FROM tbl_admin WHERE id=1";

$query = $conn->prepare($sql);
$isExecute = $query->execute();





if($isExecute)
{
	$adminrows = $query->rowCount();
	
	
	if($adminrows==1)
	{
		$result = $query->fetch(PDO::FETCH_ASSOC);
		
		
		$DBadmin = $result['username'];
		$DBadminpassowrd = $result['password'];
		
		if(!isset($_SESSION['admindata']))
		{	
			if(isset($_REQUEST['admin_submit']))
			{
		
				if($_REQUEST['admin_name']==$DBadmin && ($_REQUEST['admin_pass'])==$DBadminpassowrd)
				{
					
					$_SESSION['admindata'] = array(
																		'is_login'=>true,
																		'username'=>'admin',
													);
					
					header('location:dashboard.php');
					
				}
				else
				{
					header('location:index.php');
				}
			}
			else
			{
				
			}
		}
		else
		{
			header('location:dashboard.php');
		}
	}
	else
	{
		header('location:index.php');
	}
}
else
{
	$adminrows = 0;
	header('location:index.php');
	
}








?>

<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<!--form action="" method="post">

    <label for="username">User name<span>&nbsp;*</span></label>
    <input type="text" name="admin_name" id="" value="">
    
    <label for="password">password<span>&nbsp;*</span></label>
    <input type="password" name="admin_pass" id="" value="">
    
    <input type="hidden" name="aaa" value="123" />
    <input type="submit" name="admin_submit" id="" value="Login" class="" align="left">
    <input type="reset" value="Reset" class="">


</form-->

<?php //echo phpinfo(); ?>

 <div class="container">
        <div class="row">
		
		<div class="col-md-12">
    <div class="modal-dialog" style="margin-top:10%;">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-transform:uppercase;font-size:24px;">Login</h3>
                    </div>
                    <div class="panel-body">
                       <form action="" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                	Username<span style="color:red;"> *</span>
                                    <input class="form-control" placeholder="" name="admin_name" id="" type="text" autofocus="">
                                </div>
                                <div class="form-group" id="pass">
                                	Password<span style="color:red;"> *</span>
                                    <input class="form-control" placeholder="" name="admin_pass" id="" type="password" value="">
                                </div>
                                <input type="hidden" name="aaa" value="123" />
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="admin_submit" id="" value="Login" class="btn btn-success" align="left">
								<input type="reset" value="Reset" class="btn btn-warning">
                                <div class="form-group" id="" style="margin-top:15px;">
                                <span style="color:red;">*</span> - Required Fields
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>
		
		
		
           
        </div>
        <!-- /.row -->
    </div>





<!--?php include('footer.php'); ?>





