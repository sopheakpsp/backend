<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
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
                <div class="row" style="padding: 0">
                    <div class="col-lg-12" style="padding:0; margin:0; height:100%; position:fix">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div class="hei" id="maps"></div>
                        <script>
                            var hei = $(document).height() - 73;
                            $('.hei').css('height', hei);
                        </script>
                        
                        
                    </div> 
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw&libraries=places"></script>
<script src="js/googlemaps.js"></script>
<?php include ("include/footer.php"); ?>

