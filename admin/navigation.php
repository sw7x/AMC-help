    <!-- Navigation -->
    <nav class="navbar navbar-default" style="margin-top:0%;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span></button> <a class="navbar-brand" href="dashboard.php" style="font-size:25px;">Admin Panel</a>
            </div>
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <!--
                <div class="col-sm-3 col-md-3">
                    <form class="navbar-form">
                        <div class="input-group">
                            <input class="form-control" name="q" placeholder="Search" type="text">
							<div class="input-group-btn">
                                <button class="btn btn-default glyphicon glyphicon-search" style="margin-top:-2px;" type="submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
                -->

                <ul class="nav navbar-nav navbar-right">
                    <?php 
					if(isset($_SESSION['admindata']))
					{
					?>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <?php 
					}
					?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav><!-- Page Content -->