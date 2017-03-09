<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}  ?>
<?php 
    if (empty($_GET['id'])) {
        redirect('photo.php');
    }

    $comments = Comment::find_comment($_GET['id']);

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
                <div></div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                            <small>
                            <a href="add_user.php" class="btn btn-primary">Add Comment</a>
                            </small>
                        </h1>
                        <div><?php echo $session->message; ?></div>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($comments as $comment) : ?>
                                    <tr>
                                        <td>
                                            <?php $photo = Photo::find_by_id($comment->photo_id);?>
                                            <img src="<?php echo $photo->photo_path(); ?>" alt="">
                                            <a href="delete_comment_photo.php?id=<?php echo $comment->id?>">Delete</a>
                                        </td>
                                        <td><?php echo $comment->id; ?></td>
                                        <td><?php echo $comment->author; ?></td>
                                        <td><?php echo $comment->body; ?></td>
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
