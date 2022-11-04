<?php
$directory ='';
session_start();
include('init.php');
$page ='';
include('../data/escape_string.php');
include('../dbcon.php');
?>

<?php include('header.php'); ?>
	
	<?php include('navigation.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-info" href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashbord</a><br>
                <br>
               

                <div class="panel panel-info" style="width:100%;margin:0 auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Category</h3>
                    </div>
				</div>

                <br />


                <div class="table-responsive">

                    <div class="tabbable" id="tabs-595705">    
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#panel-697082" data-toggle="tab" class="capital add_main_category">add main category</a>
                            </li>
                            <li >
                                <a href="#panel-697083" data-toggle="tab" class="capital add_sub_category">add level 2 category</a>
                            </li>
                            <li >
                                <a href="#panel-697084" data-toggle="tab" class="capital add_sub_sub_category">add level 3 category</a>
                            </li>
                            <li >
                                <a href="#panel-697086" data-toggle="tab" class="capital category__management">View/Delete/Edit categories</a>
                            </li>
                        </ul>
                    </div>	
				</div>
    
     		</div>
     	</div>
    </div>   
    
    
    
    
    <div class="tab-content">
    	<!---->
        <div class="tab-pane active" id="panel-697082">
            
            <div class="container">
        		<div class="row" style="margin:0px;">
            		<div class="col-md-6" style="padding:30px 20px;float:left">
            
                        <form action="" id="category1" method="post" name="" autocomplete="off">
                            <label for="add main category" style="float:left;padding:10px 0px;">Add main category<span></span></label><br/>
                            <input type="text" name="addmaincategory1" value="" id="add-main-category1" class="form-control">
                            
                            <div>
                                <div id="hint1" class="hint"></div>
                                <input class="btn btn-success formbuttons" style="float:left" name="add-main-category1_submit" type="submit" value="ADD" id="add-main-category1_submit">
                                <input class="btn btn-warning formbuttons" style="float:right" type="reset" value="Reset" id="add-main-category1_reset">
                            	<div class="clear"></div>
                            </div>
                        </form>
                        <br/><br/><br/>
            		</div>
                    <div style="padding:30px 20px;float:left;height:430px;overflow:scroll;overflow-x:hidden;" class="col-md-6" id="panel-697082-tree"></div>
                    <div class="clear"></div>
				</div>
            </div>
        <div class="clear"></div>
        </div>
		
        <!---->
        <div class="tab-pane" id="panel-697083">        
            
            <div class="container">
        		<div class="row"  style="margin:0px;">
            		<div class="col-md-6" style="padding:30px 20px;float:left">            
            
                        <form action="" id="category2" method="post" name="" autocomplete="off">
                            <label for="add level2 sub category" style="float:left;">Add level2 sub category<span></span></label><br/><br/>
                            
                            <!--<label for="" id='lbl_maincategorydiv_2' style="float:left;padding:10px 0px;">Main category<span></span></label><br/><br/>-->
                            <div class="maincategorydiv_2"></div>
                            
                            <label id='lbl_subcategory2__' for="" style="float:left;padding:10px 0px;">Add sub category<span></span></label><br/>
                            <input type="text" name="subcategory2" value="" id="subcategory2__" class="form-control">
                           	<div>
                                <div id="hint2" class="hint"></div>
                                <input class="btn btn-success formbuttons" style="float:left" name="add-level2-category-submit" type="submit" value="ADD" id="add-level2-category-submit">
                                <input class="btn btn-warning formbuttons" style="float:right" type="reset" value="Reset" id="add-level2-category-reset">
                                <div class="clear"></div>
                           	</div>
                        </form>
            			<br/><br/><br/>
            		</div>
                    <div style="padding:30px 20px;float:left;height:430px;overflow:scroll;overflow-x:hidden;"  class="col-md-6"  id="panel-697083-tree"></div>
                    <div class="clear"></div>
                </div>
            </div>            
        </div>
    
    	<!---->
        <div class="tab-pane" id="panel-697084">        
            <div class="container">
        		<div class="row" style="margin:0px;">
            		<div class="col-md-6" style="padding:30px 20px;">        	
            
            
                        <form action="" id="category3" method="post" name="" autocomplete="off">
                            <label for="add main category" style="float:left;">Add level3 sub category<span></span></label><br/><br/>
                            
                           	<!-- <label id="lbl_maincategorydiv_3" for="" style="float:left;padding:10px 0px;">Main category<span></span></label><br/>-->
                            <div class="maincategorydiv_3"></div>
                            
                            <?php 
                            //$sql = "SELECT * FROM tbl_category WHERE parent_id=0";
                            //$query = mysql_query($sql);
                            ?>
                            <div id="subcategory3-div"></div>
                            
                            <label id="lbl_subsubcategory3" for="" style="float:left;padding:10px 0px;">Level 3 sub category<span></span></label><br/>
                            <input type="text" name="subsubcategory3" value="" id="sub-subcategory3" class="form-control">
                            <div>
                                <div id="hint3" class="hint"></div>
                                <input class="btn btn-success formbuttons" style="float:left" name="add-level3-category-submit" type="submit" value="ADD" id="add-level3-category-submit">
                                <input class="btn btn-warning formbuttons" style="float:right" type="reset" value="Reset" id="add-level3-category-reset">
                                <div class="clear"></div>
                            </div>
                        </form>
            		</div>
                    <div style="padding:30px 20px;float:left;height:430px;overflow:scroll;overflow-x:hidden;" class="col-md-6"  id="panel-697084-tree"></div>
                    <div class="clear"></div>
            	</div>
            </div>                        
        </div>
        
        <!---->
        <!---->
		
		<div class="tab-pane" id="panel-697086">
			<div class="container" id="accordion">
            	
				
				
    		</div> <!-- .container -->
        </div><!--tab-pane-->
	
		
        
	</div><!--tab-content-->  
    
    
    
   <script>
   $(document).ready(function(e)
   {
    	$.ajax(
		{
			type: "POST",
			dataType:'html',
			url:"../admin/ajax/category-tree.php",
			async:true,
			data:{id:1},
			success:function(html)
			{
				$('#panel-697082 .container .row #panel-697082-tree').html(html);
				
				$('li.parent_li > span').each(function(index, element)
				{
					$(this).parent('li.parent_li').find(' > ul > li').hide('fast');   
				});
			},
			error:function(request,errorType,errorMessage) 
			{
				alert ('error - '+errorType+'with message - '+errorMessage);
			}
		});
	
	});
   
   </script>
        
	<!-- -->	
<?php require('footer.php'); ?>