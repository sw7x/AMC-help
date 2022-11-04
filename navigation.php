<?php 
	
	

	//var_dump($_SESSION['userdata']);
	//die();
	
	
	/*_________________handling the login_________________*/
	
	if(isset($_SESSION['userdata']))
	{
		if(isset($_GET['doctor']) && $page == 'index')
		{	
			var_dump('expression111');
			//header('Location: logout.php?ffff');
		}
		
		
		$sql = "SELECT * FROM tbl_user WHERE username =? AND account_status=1";
		

		$query = $conn->prepare($sql);
		$isExecute =  $query->execute(array($_SESSION['userdata']['username']));		
		$result = $query->fetch(PDO::FETCH_ASSOC);



		
		if($isExecute)
		{
			$rows = $query->rowCount();
			
		}
		else
		{
			$rows = 0;
		}
		
		
		if($rows==1)
		{
			
		}
		else
		{	
			var_dump('expression2222');
			//header('Location: logout.php');
		}
		
	}
	else
	{
		
		

		if($page !== 'index' && $page !== 'emergency')
		{	
			//var_dump('expression3333');
			//header('Location: index.php?status='.base64_encode('access_denied')."'");
			//////////////////////////
		}													  
		
		
		if(isset($_GET['doctor']) && $page == 'sample-account')
		{	
			
			//var_dump($page);

			$doctor = $_GET['doctor'];
			
			$real_url = base64_decode($doctor);
			$real_url_arr = explode("&", $real_url);				  
			$ah8y = explode("A8hy=", $real_url_arr[2]);
			$parameter_url = base64_decode($ah8y[1]);
			$parameters = explode("=", $parameter_url);
			$email_parameter = $parameters[1];//$email_para = user email
			$email_para = "'".$email_parameter."'";
			
			//$ptr = 
			
			
			//echo '{'.sizeof($ptr).'}';
			//print_r($ptr);
				
			if(strpos($real_url ,"ptr="))
			{
				$ptr= explode("ptr=", $real_url_arr[4]);
				$amc_url = base64_decode($ptr[1]);
				$amc_ = explode("=", $amc_url);
				$amc_parameter = $amc_[1];
				$amc_para = "'".$amc_parameter."'";
				//echo $email_para;
			}
			
			/*		
			$sql = "SELECT * FROM tbl_user WHERE email='".$email_parameter."'";
			$query = mysql_query($sql);
			$rows = mysql_num_rows($query);
			
			$result = mysql_fetch_array($query);
			
			//if(/*$rows!== 1 || */
			//$result['account_status']!== NULL)
			//{
				//header('Location: pdf.php');
			//}
			
			
		}

	}
		
?>   
    
    
    <!-- Page Content -->
    <header role="banner">
        <div id="cd-logo">
            <a href="/">
                <img src="images/logo.png" alt="Logo">
            </a>
        </div>

        <nav class="main-nav">
            <ul>
                <?php
	            if(isset($_SESSION['userdata'])):
	            ?>  
	                <li><a class="cd-signin show-username" href="#" id="loggedas">Logged AS <?php echo $_SESSION['userdata']['firstname'];?></a></li>
	                <li><a class="cd-signup link" href="/logout.php" id="logout">Log out</a></li>
	            <?php
	            else:
	            ?>
            		<li><a class="cd-signin" href="">Sign in</a></li>
                	<li><a class="cd-signup" href="">Sample account</a></li>
                <?php 
            	endif;
                ?>
                <!-- inser more links here -->
                
            </ul>
        </nav>
    </header>





   
   