<?php require_once 'admin2/include/init_client.php';?>

<div class="property-container" border="1">

<?php 

$page = !empty($_GET['page'])? (int)$_GET['page'] : 1;
$item_per_page = 9;
$item_total = Property::count_all_active();

$paginate = new Paginate($page, $item_per_page, $item_total);
$sql = "SELECT * FROM property WHERE status=1 ORDER BY id DESC LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
$properties = Property::find_this_query($sql);

foreach ($properties as $property) :

 ?>

<div class="property-property">
<a href="property_detail.php?id=<?php echo $property->id;?>">
<img class="property-img-property" src="<?php echo $property->thumbnail;?>" alt="<?php echo $property->thumbnail;?>"/>
</a>
<div class="title"><?php echo $property->title;?></div>
<div class="color">
<div>Property Code: <?php echo $property->code;?></div>
<div>Price: <?php echo 'USD ' . number_format($property->price, 2).$property->unit;?></div>



</div>
</div>

<?php endforeach; ?>



<div class="clear"></div>

<div class="center">
	<ul class="pagination">

		<?php 
			if ($paginate->page_total() > 1) {
				if ($paginate->previous()) {
					echo "<li><a href='property.php?page={$paginate->previous()}' class='previous'>«</a></li>";
				}
			}
	
	  		if($paginate->current_page<6){
	  			for($i=1; $i<=6; $i++){
	  				if($i==$paginate->current_page){
	  					echo "<li><a href='#' class='active'>{$i}</a></li>";
	  				}
	  				else{
	  					echo "<li><a href='property.php?page={$i}'>{$i}</a></li>";
	  				}
	  			}
	  		}

	  		if($paginate->current_page>=6 AND $paginate->current_page<=$paginate->page_total()){
	  			echo "<li><a href='property.php?page=1'>1</a></li>";
	  			echo "<li><a href='property.php?page=2'>2</a></li>";
	  			echo "<li><a href='#'>...</a></li>";
	  		}

	  		if($paginate->current_page>=6 AND $paginate->current_page<=$paginate->page_total()-6){
	  			for ($i=$paginate->current_page-2; $i <= $paginate->current_page+2; $i++) { 
	  				if($i==$paginate->current_page){
	  					echo "<li><a href='#' class='active'>{$i}</a></li>";
	  				}
	  				else{
	  					echo "<li><a href='property.php?page={$i}'>{$i}</a></li>";
	  				}
	  			}
	  		}

	  		if($paginate->current_page>$paginate->page_total()-6 AND $paginate->current_page<=$paginate->page_total()){
	  			for ($i=$paginate->current_page-2; $i <= $paginate->page_total(); $i++) { 
	  				if($i==$paginate->current_page){
	  					echo "<li><a href='#' class='active'>{$i}</a></li>";
	  				}
	  				else{
	  					echo "<li><a href='property.php?page={$i}'>{$i}</a></li>";
	  				}
	  			}
	  		}

	  		if($paginate->current_page>0 AND $paginate->current_page + 5 < $paginate->page_total()){
	  			echo "<li><a href='#'>...</a></li>";
	  			for ($i=$paginate->page_total()-1; $i <= $paginate->page_total(); $i++) { 
	  				echo "<li><a href='property.php?page={$i}'>{$i}</a></li>";
	  			}
	  		}

			if ($paginate->page_total() > 1) {
				if ($paginate->has_next()) {
					echo "<li><a href='property.php?page={$paginate->next()}' class='next'>»</a></li>";
				}
			}
		 ?>
	</ul>
</div>
