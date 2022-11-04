
	
	<script>
   	
		
		
		
		<?php if(isset($_SESSION['userdata']))
		{ 
		?>	var islogin = true; 
			var userid =<?php echo $_SESSION['userdata']['userid']; ?>;
		<?php	
		}
		else
		{	
		?> 
		var islogin = false; 
		<?php
		}
		?>    
		
		<?php if(isset($email_para)){?>	
			var email_para = <?php echo $email_para;?>;
		<?php }else{ ?>	
			var email_para = "<?php echo '';?>";
		<?php }?>
		
    </script>
	
	<script type="text/javascript" src="js/category.view.js"></script>
    
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" src="js/form.validation.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/ui.js"></script>
	
	
	
	
	
	
    
</body>
</html>