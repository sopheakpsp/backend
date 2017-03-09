<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php 
    $message = "";
    if(isset($_POST['save'])){
        $user = new User();
        $user->set_file($_FILES['file']);
        $user->first_name = trim($_POST['first_name']);
        $user->last_name = trim($_POST['last_name']);
        $user->username = trim($_POST['username']);
        $user->password = trim($_POST['password']);
        $user->user_info = trim($_POST['user_info']);

        if(empty($_FILES['file'])){
            $user->save();
            redirect("user.php");
        }
        else{
            $user->set_file($_FILES['file']);
            $user->save_image();
            $user->save();
            redirect("user.php");
        }
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

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add User
                            <small>Subheading</small>
                        </h1>
                    <?php echo $message; ?>    
                    <form action="" method="post" enctype="multipart/form-data"> 
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="image">User Image</label>
                                <input type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user_info">User Info</label>
                                <textarea name="user_info" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" name="save" value="Save" class="btn btn-primary">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                        </div>
                    </form> 
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include ("include/footer.php"); ?>

</body>

</html>