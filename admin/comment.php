<?php
$directory ='';
session_start();
include('init.php');
include('../dbcon.php');
include('../data/escape_string.php');

$sql = "SELECT tu.username,tc.id,tc.user_email,tc.comment FROM tbl_comments AS tc INNER JOIN tbl_user AS tu ON tc.user_id=tu.id ORDER BY tc.id DESC"; 
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);                
//var_dump($results );
//$rows = $query->rowCount();



$page ='';

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
                        <h3 class="panel-title">User Comments</h3>
                    </div>
				</div>

                <br />


                <div class="table-responsive">
                    <table class="display" id="commenttable" style="font-size:13px;"><!-- class="table table-bordered table-striped" -->
                        <thead>
                            <tr>
                                <th>User Name</th>

                                <th>Comments</th>

                                <th>Email</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>
                           <?php
                             foreach($results as $result)
                            {    
                            ?>	<tr id="commentrow<?php echo $result['id'];?>">
                                    <td><?php echo $result['username']; ?></td>
                                    <td><?php echo $result['comment']; ?></td>
                                    <td><?php echo $result['user_email']; ?></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <a href="" class="delete_comment btn btn-danger btn-xs" data-title="delete_comment" data-commentid="<?php echo $result['id'];?>"><span class="glyphicon glyphicon glyphicon-remove-sign"></span></a></p></td>
                                 </tr>
                            <?php
                            }
                            ?>
                 		</tbody>
                    </table>


                    <div class="clearfix">
                    </div>

				</div>
            </div>
        </div>
    </div>





	<div class="modal fade" id="comment_deletefinish" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
				</div>

				<div class="modal-body">
                    <div class="alert">Successfully Deleted User Comment</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success deleteuser" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
   
   
   
   	<div class="modal fade" id="comment_deleteerror" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">×</button>
				</div>

				<div class="modal-body">
                    <div class="alert">Unable to Deleted User Comment</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-success deleteuser" data-dismiss="modal" type="button"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;OK</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php require('footer.php'); ?>