<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php 
	$user_id = $_SESSION['user_id'];
	$userDetail = User::find_by_id($user_id);
 ?>
 <?php require_once("include/header.php"); ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include ("include/top-nav-left.php");?>
            <!-- Top Menu Items -->
            <?php include ("include/top-nav-right.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include ("include/side-nav.php");?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

          <div class="container-fluid font">
          		<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            My Profile <small>Overview</small>
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

			  <div class="row">
			    	<div class="col-md-2" style="height: 140px; background: url(<?php echo !empty($userDetail->filename)? 'staff/'.$userDetail->filename : 'staff/nostaffimage.gif'; ?>) no-repeat center; background-size: auto 100%">
				      
				    </div>
				    <div class="col-md-4">
				      <blockquote>
				        <p class="capital"><?php echo $userDetail->first_name.' '.$userDetail->last_name; ?></p>
				        <small><cite title="Source Title"><?php echo $userDetail->position; ?><i class="icon-map-marker"></i></cite></small>
				      </blockquote>
				      <p>
				        <i class="fa fa-globe"></i> <?php echo $userDetail->email; ?><br>
				        <i class="fa fa-phone"></i> <?php echo $userDetail->phone; ?><br>
				      </p>
				      <p>
				      	<?php echo $userDetail->user_info; ?>
				      </p>
				      <br/>
				      <button class="btn btn-primary btn-sm">Edit</button>
				    </div>		    
			  </div><!--end row-->
	       </div>
	       <!-- /#page-wrapper -->

	    </div>
	    <!-- /#wrapper -->

    <?php include ("include/footer.php"); ?>

</body>

</html>
