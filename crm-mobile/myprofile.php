<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php 
	$user_id = $_SESSION['user_id'];
	$userDetail = User::find_by_id($user_id);
 ?>
 <?php 
if(isset($_POST['submit']) AND $_POST['submit']=="Save"){
   echo "ok";
}

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
			<?php 
			if(isset($_GET['edit']) AND $_GET['edit']==1){
				include("view/myprofile_edit.php");
			}else{
				include("view/myprofile.php");
			}

			 ?>
	       </div>
	       <!-- /#page-wrapper -->

	    </div>
	    <!-- /#wrapper -->

    <?php include ("include/footer.php"); ?>

</body>

</html>
