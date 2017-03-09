<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php 
    $message = "";
    if(isset($_POST['submit'])){
       $photo = new Photo();
       $photo->title = $_POST['title'];
       $photo->set_file($_FILES['file']);

        if($photo->save()){
            $message = "Photo upload successfully.";
        }
        else{
            $message = join("<br>", $photo->errors);
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
                            Upload
                            <small>Subheading</small>
                        </h1>
                        
                        <div class="col-md-6">
                            <?php echo $message; ?>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="form-group"><label for="title">Title</label><input type="text" name="title" class="form-control"></div>
                                <div class="form-group"><label for="file">File</label><input type="file" name="file"></div>
                                <input type="submit" name="submit">
                            </form>
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
