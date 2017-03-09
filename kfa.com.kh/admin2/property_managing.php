<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php 
$page = !empty($_GET['page'])? (int)$_GET['page'] : 1;
$item_per_page = 12;
$item_total = Property::count_all();

$paginate = new Paginate($page, $item_per_page, $item_total);
$sql = "SELECT * FROM property ORDER BY id DESC LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
$properties = Property::find_this_query($sql);
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
                            Property Management
                            <small>Total: <?php echo Property::count_all(); ?></small>
                            <small><a href="property.php">Add New</a></small>
                        </h1>
                        <?php if ($message): ?>
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $message; ?></strong>
                            </div>
                        <?php endif ?>
                        
                        <div class="col-md-12">
                            
							<!-- Projects Row -->
					        <div class="row">
						        <?php foreach ($properties as $property) : ?>
						        	<div class="col-sm-6 col-lg-3 col-md-4 property-display">
						        	<div class="font">
				                        <div class="thumbnail">
				                            <img src="../<?php echo $property->thumbnail; ?>" alt="" style="width:320px; height:150px">
				                            <div class="caption">
				                            <div class="pull-right">
					                                <?php
					                                		if($property->status == 1){
					                                			echo "<div class='label label-primary'>public</div>";
					                                		}
					                                		elseif ($property->status == 2) {
					                                			echo "<div class='label label-warning'>panding</div>";
					                                		}
					                                		else{
					                                			echo "<div class='badge'>inactive</div>";
					                                		}
					                                	 ?>
				                               	</div>
				                                <div><b><?php echo $property->code; ?></b></div>
				                                
				                                <div><?php echo $property->type.' for '.$property->category; ?></div>
				                                <div><?php echo $property->location; ?></div>
				                                <div></div>
				                                <div><b>Listed By: </b><?php echo $property->listed_by; ?></div>
				                                <div><b>Listed Date: </b><?php echo $property->listed_date; ?></div>
				                                <div><b>Agent: </b>
					                                <?php 
				                                        $agent = Agent::find_by_id($property->agent);
				                                        echo $agent->name;
				                                    ?>
				                                    </div>
				                                <div><b>Price: </b><?php echo '$ ' . number_format($property->price, 2) ." ". $property->unit; ?></div>
				                            </div>
				                            <hr>
				                            <div class="ratings">
				                            <?php if($user_session->struc==1): ?>
				                            	<div class="pull-right">
				                                	<a href="property_remove.php?id=<?php echo $property->id; ?>&filename=<?php echo $property->thumbnail; ?>&page=<?php echo $page; ?>" class="label label-danger">remove</a>
				                                </div>
				                            <?php endif; ?>
				                                <div>
				                            <?php if($user_session->struc!=3): ?>
													<a href="property_edit.php?id=<?php echo $property->id;?>&page=<?php echo $page;?>" class="badge">update</a>
											<?php endif; ?>
													<a href="" class="badge">view</a>
				                                </div>
				                                
				                            </div>
				                        </div>
				                       </div>
				                    </div>
						        <?php endforeach; ?>
					        </div>
					        <!-- /.row -->


<!-- paging -->
<div class="center">
<nav>
	<ul class="pagination">

		<?php 
			if ($paginate->page_total() > 1) {
				if ($paginate->previous()) {
					echo "<li><a href='property_managing.php?page={$paginate->previous()}' class='previous'>«</a></li>";
				}
			}
	
	  		if($paginate->current_page<6){
	  			for($i=1; $i<=6; $i++){
	  				if($i==$paginate->current_page){
	  					echo "<li class='active'><a href='#'>{$i}</a></li>";
	  				}
	  				else{
	  					echo "<li><a href='property_managing.php?page={$i}'>{$i}</a></li>";
	  				}
	  			}
	  		}

	  		if($paginate->current_page>=6 AND $paginate->current_page<=$paginate->page_total()){
	  			echo "<li><a href='property_managing.php?page=1'>1</a></li>";
	  			echo "<li><a href='property_managing.php?page=2'>2</a></li>";
	  			echo "<li><a href='#'>...</a></li>";
	  		}

	  		if($paginate->current_page>=6 AND $paginate->current_page<=$paginate->page_total()-6){
	  			for ($i=$paginate->current_page-2; $i <= $paginate->current_page+2; $i++) { 
	  				if($i==$paginate->current_page){
	  					echo "<li class='active'><a href='#'>{$i}</a></li>";
	  				}
	  				else{
	  					echo "<li><a href='property_managing.php?page={$i}'>{$i}</a></li>";
	  				}
	  			}
	  		}

	  		if($paginate->current_page>$paginate->page_total()-6 AND $paginate->current_page<=$paginate->page_total()){
	  			for ($i=$paginate->current_page-2; $i <= $paginate->page_total(); $i++) { 
	  				if($i==$paginate->current_page){
	  					echo "<li class='active'><a href='#'>{$i}</a></li>";
	  				}
	  				else{
	  					echo "<li><a href='property_managing.php?page={$i}'>{$i}</a></li>";
	  				}
	  			}
	  		}

	  		if($paginate->current_page>0 AND $paginate->current_page + 5 < $paginate->page_total()){
	  			echo "<li><a href='#'>...</a></li>";
	  			for ($i=$paginate->page_total()-1; $i <= $paginate->page_total(); $i++) { 
	  				echo "<li><a href='property_managing.php?page={$i}'>{$i}</a></li>";
	  			}
	  		}

			if ($paginate->page_total() > 1) {
				if ($paginate->has_next()) {
					echo "<li><a href='property_managing.php?page={$paginate->next()}' class='next'>»</a></li>";
				}
			}
		 ?>
	</ul>
</nav>	
</div>

<!-- #paging -->






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
