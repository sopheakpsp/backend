<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php require_once("include/header.php"); ?>
<?php $photos = Photo::find_all(); ?>

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
                            Photo
                            <small>Subheading</small>
                        </h1>
                        
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Id</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($photos as $photo) : ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $photo->photo_path();?>" alt="<?php echo $photo->photo_path();?>">
                                            <div>
                                                <a href="delete_photo.php?id=<?php echo $photo->id;?>">Delete</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id;?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $photo->id;?>">View</a>
                                                <a href="comment_photo.php?id=<?php echo $photo->id;?>">View Comment</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->filename; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                         <td>
                                            <a href="comment_photo.php?id=<?php echo $photo->id?>">
                                            <?php 
                                                $comments = Comment::find_comment($photo->id);
                                                echo count($comments);
                                             ?>
                                             </a>
                                        </td>
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
