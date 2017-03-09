<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php 
$by = !empty($_GET['by'])? (int)$_GET['by'] : "";
$page = !empty($_GET['page'])? (int)$_GET['page'] : 1;
$item_per_page = 12;
$item_total = Property::count_all();

$paginate = new Paginate($page, $item_per_page, $item_total);

if(empty($_GET['by'])){
	$sql = "SELECT * FROM property WHERE listed_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND listed_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AND status <> 5 ORDER BY id DESC LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
}else{
	$sql = "SELECT * FROM property WHERE listed_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND listed_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AND status = {$by} ORDER BY id DESC LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
}

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
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Last Week Property Listed <br>
                            <!--
                            <small>
                            	<a href="property_managing.php"><b>Total: <?php echo Property::count_all(); ?></b></a> | 
                            	<a href="property_managing.php?by=2">Available: <?php echo $avail = Property::count_by_status(2); ?></a> | 
                            	<a href="property_managing.php?by=1">Publish: <?php echo $avail = Property::count_by_status(1); ?></a> | 
                            	<a href="property_managing.php?by=3">Rent: <?php echo $avail = Property::count_by_status(3); ?></a> |
                            	<a href="property_managing.php?by=4">Sold: <?php echo $avail = Property::count_by_status(4); ?></a> |
                            	<a href="property_managing.php?by=5">Deleted: <?php echo $avail = Property::count_by_status(5); ?></a>
	                        </small>

	                        <div class="pull-right">
	                        	<?php if($user_session->struc!=5): ?>
		                            <a href="property.php" class="btn btn-primary">Add New</a>
		                        <?php endif; ?>
	                        </div>
	                        -->
                        </h2>
                        <?php if ($message): ?>
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $message; ?></strong>
                            </div>
                        <?php endif ?>
                        
                        <div class="col-md-12 nopadding">
                            
							<!-- Projects Row -->
					        <div class="row">
						        <?php foreach ($properties as $property) : ?>
						        	<div class="col-sm-6 col-lg-3 col-md-4 property-display">
						        	<div class="font">
				                        <div class="thumbnail">
				                        	<a href="property_view.php?id=<?php echo $property->id;?>&page=<?php echo $page;?>">
				                        	<div style="height:160px; background:url(<?php echo $property->thumbnail;?>) no-repeat center; background-size: auto 100%;"></div>
				                            </a>
				                            <!-- <img src="../<?php //echo $property->thumbnail; ?>" alt="" style="width:320px; height:150px"> -->
				                            <div class="caption">
				                            <div class="pull-right">
					                                <?php
					                                		if($property->status == 1){
					                                			echo "<div class='label label-primary tage'>published</div>";
					                                		}
					                                		elseif ($property->status == 2) {
					                                			echo "<div class='label label-primary tage'>available</div>";
					                                		}
					                                		elseif ($property->status == 3){
					                                			echo "<div class='label label-danger tage'>rending</div>";
					                                		}
					                                		elseif ($property->status == 4){
					                                			echo "<div class='label label-danger tage'>sold</div>";
					                                		}
					                                		else{
					                                			echo "<div class='label label-danger tage'>deleted</div>";
					                                		}
					                                	 ?>

					                               	

					                               	 <div class="customLabel">
					                               	 	<?php 
					                               		echo !empty($property->sale_price)?"<div class=''>s: $ ".number_format($property->sale_price, 2)."</div>":"";
					                               		echo !empty($property->rent_price)?"<div class=''>r: $ ".number_format($property->rent_price, 2)."</div>":"";
					                               		echo !empty($property->lp)?"<div class=''>l: $ ".number_format($property->lp, 2)." /sqm</div>":"";
					                               		echo !empty($property->bp)?"<div class=''>b: $ ".number_format($property->bp, 2)." /sqm</div>":"";
					                               	 	?>
					                               	 </div>
				                            </div>
				                                <div><b><?php echo $property->code; ?></b></div>
				                                <div>
				                                <?php 
						                  			if($property->title){
						                  				if(strlen($property->title)>35){
						                  					$trimstr = substr($property->title, 0, 35).'...';
						                  				}else{
						                  					$trimstr = $property->title;
						                  				}
						                  				echo $trimstr;
						                            }else{
						                                $type = Property_type::find_by_id($property->type);
						                                echo $type->type_name;
						                                echo " for ".$property->category;
						                            }
				                                 ?>
				                                </div>
				                                <?php 
													echo !empty($property->home)? "#".$property->home.", " : "";
				                                    echo !empty($property->road)? "St.".$property->road.", " : "";
				                                    if(!empty($property->commune)){
				                                      $commune = Commune::find_by_id($property->commune);
				                                      echo $commune->commune_name;
				                                    }
				                                    $district = District::find_by_id($property->district);
				                                    $city = City::find_by_id($property->city);
				                                    $address = array($district->district_name, $city->city_name); 
				                                    $addressLine = implode(", ", $address);
				                                    echo $addressLine;
				                                 ?>
				                                <div><b>Pricing Date: </b><?php echo $property->pricing_date; ?></div>
				                                <div><b>Agent: </b>
					                                <?php 
				                                        $agent = User::find_by_id($property->agent);
				                                        echo '<span class="capital">'.$agent->first_name.' '.$agent->last_name.'</span>';
				                                    ?>
				                                </div>
				                                <?php if($user_session->id==$property->agent OR $user_session->struc==1): ?>
				                                <div><b>Owner: </b><?php echo $property->owner_number; ?></div>
				                            	<?php endif; ?>
				                            </div>
				                            <hr>
				                            <div class="ratings">
				                            <?php if($user_session->struc==1): ?>
				                            	<div class="pull-right">
				                                	<a href="property_trush.php?id=<?php echo $property->id; ?>&filename=<?php echo $property->thumbnail; ?>&page=<?php echo $page; ?>" class="label label-danger remove">delete</a>
				                                </div>
				                            <?php endif; ?>
				                                <div>
				                            <?php if($user_session->id==$property->agent OR $user_session->struc==1 OR $user_session->struc==2): ?>
													<a href="property_edit.php?id=<?php echo $property->id;?>&page=<?php echo $page;?>" class="label label-primary">edit</a>
											<?php endif; ?>
													<a href="property_view.php?id=<?php echo $property->id;?>&page=<?php echo $page;?>" class="label label-primary">view</a>
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
