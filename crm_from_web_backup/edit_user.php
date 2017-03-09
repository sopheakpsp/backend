<?php include("include/init.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");}?>
<?php 
    if(empty($_GET['id'])){redirect('user.php');}
    else{
        $message = "";
        $user = User::find_by_id($_GET['id']);
        if(isset($_POST['save'])){
            if($user){
                $user->set_file($_FILES['file']);
                $user->first_name = trim($_POST['first_name']);
                $user->last_name = trim($_POST['last_name']);
                $user->username = trim($_POST['username']);
                $user->password = trim($_POST['password']);
                $user->user_info = trim($_POST['user_info']);
            }
        
            if(empty($_FILES['file'])){
                $user->save();
                redirect("user.php");
                $session->message("Update Success!");

            }
            else{
                $user->set_file($_FILES['file']);
                $user->save_image();
                $user->save();
                redirect("user.php");
                // redirect("edit_user.php?id={$user->id}");
                $session->message("Update Success!");
            }
        }
    }
 ?>
<?php include("include/header.php"); ?>

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
                            Edit User
                            <small>Subheading</small>
                        </h1>
                    <?php echo $message; ?>
                    <form action="" method="post" enctype="multipart/form-data"> 
                        <div class="col-md-3">
                            <div class="user_image_box">
                                <a href="#" class="thumbnail" data-toggle="modal" data-target="#photo-library">
                                <img src="<?php echo $user->user_image_placeholder();?>" alt=""> 
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">User Image</label>
                                <input type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo trim($user->first_name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" value="<?php echo $user->password; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_info">User Info</label>
                                <textarea name="user_info" id="" cols="30" rows="10" class="form-control"><?php echo $user->user_info;?></textarea>
                            </div>
                        </div>
                        <div class="col-ms-3">
                            <input type="submit" name="save" value="Update" class="btn btn-primary">
                            <a id="user-id" href="delete_user.php?id=<?php echo $user->id;?>" class="btn btn-danger pull-right">Delete</a>
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

    <?php include("include/photo_library_modal.php"); ?>
    <?php include ("include/footer.php"); ?>