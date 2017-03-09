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
                            Search
                        </h2>
                    </div>
                </div>
                <!-- /.row -->
			<form action="" method="post">
                <label for="code">Code</label>
                <input type="text" name="code"><br>
                <label for="city">City</label>
                <input type="text" name="city"><br>
                <label for="">district</label>
                <input type="text" name=""><br>
                <label for="">commune</label>
                <input type="text" name=""><br>
                <label for="">type</label>
                <input type="text" name=""><br>
                <label for="">category</label>
                <input type="text" name=""><br>
                <label for="">min price</label>
                <input type="text" name=""><br>
                <label for="">max price</label>
                <input type="text" name=""><br>
                <label for="">from date</label>
                <input type="text" name=""><br>
                <label for="">to date</label>
                <input type="text" name=""><br>
                <input type="submit" name="search">
            </form>

            <?php 
                if(isset($_POST['search'])){
                    $code = trim($_POST['code']);
                    $city = trim($_POST['city']);
                    $sql = "SELECT COUNT(*) FROM property WHERE city = '".$city."'";
                    $result = $database->query($sql);
                    $row = mysqli_fetch_array($result);
                    echo array_shift($row);
                }

             ?>

	       </div>
	       <!-- /#page-wrapper -->

	    </div>
	    <!-- /#wrapper -->

    <?php include ("include/footer.php"); ?>

</body>

</html>
