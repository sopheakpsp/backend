<?php require_once("include/header.php"); ?>
<?php require_once("include/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");}  ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <?php require_once ("include/top-nav-left.php");?>

            <!-- Top Menu Items -->
            <?php require_once ("include/top-nav-right.php");?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php require_once ("include/side-nav.php");?>

            <!-- /.navbar-collapse -->

        </nav>

        <div id="page-wrapper">

            <?php require_once ("include/admin_content.php"); ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php require_once ("include/footer.php"); ?>


