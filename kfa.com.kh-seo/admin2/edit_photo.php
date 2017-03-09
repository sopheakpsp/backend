<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");}?>
<?php 
    if(empty($_GET['id'])){
        redirect("photo.php");
    }
    else{
        $photo = Photo::find_by_id($_GET['id']);
        if(isset($_POST['save'])){
            if($photo){
                $photo->title = $_POST['title'];
                $photo->description = $_POST['description'];
                $photo->caption = $_POST['caption'];
                $photo->alt = $_POST['alt'];

                $photo->save();
            }
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
                            Photo
                            <small>Subheading</small>
                        </h1>
                        
                    <form action="" method="post"> 
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="image" class="thumbnail">Thumbnail</label>
                                <img src="<?php echo $photo->photo_path();?>" alt="" class="thumbnail">
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alt">Alternate Text</label>
                                <input type="text" name="alt" class="form-control" value="<?php echo $photo->alt; ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">value="<?php echo $photo->description; ?>"</textarea>
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