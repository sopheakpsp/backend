<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}  ?>
<?php $users = User::find_all(); ?>
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
                            User
                            <small>
                            <a href="add_user.php" class="btn btn-primary">Add User</a>

                            </small>
                        </h1>
                        <?php if ($message): ?>
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $message; ?></strong>
                            </div>
                        <?php endif ?>
                        
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User Image</th>
                                        <th>Id</th>
                                        <th>File Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $user->user_image_placeholder(); ?>" alt="" class="user_image">
                                            <div>
                                                <a href="delete_user.php?id=<?php echo $user->id;?>">Delete</a>
                                                <a href="edit_user.php?id=<?php echo $user->id;?>">Edit</a>
                                                <a href="">View</a>
                                            </div>
                                        </td>
                                        <td><?php echo $user->id; ?></td>
                                        <td><?php echo $user->first_name; ?></td>
                                        <td><?php echo $user->last_name; ?></td>
                                        <td><?php echo $user->username; ?></td>
                                        <td><?php echo $user->password; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
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
