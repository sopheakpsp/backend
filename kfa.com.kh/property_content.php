<?php require_once 'admin2/include/init_client.php';?>

<div class="property-container" border="1">

<?php 

$properties = Property::find_all_active_with_limit(12);
foreach ($properties as $property) :

 ?>
	<div class="property">
		<a href="property_detail.php?id=<?php echo $property->id;?>">
		<img class="property-img" src="<?php echo $property->thumbnail;?>" alt="<?php echo $property->thumbnail;?>"/>
		</a>
		<div class="title"><?php echo $property->title;?></div>
		<div class="color">
		<div>Property Code: <?php echo $property->code;?> </div>
		<div>Price: <?php echo 'USD ' . number_format($property->price, 2);?></div>

		</div>
	</div>

<?php endforeach; ?>

<div class="right">
	<a href="property.php">
		<img src="img/showmore.png" class="width-30">
	</a>
</div>

<div class="clear"></div>


