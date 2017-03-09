<?php require_once 'admin2/include/init_client.php';?>
<?php isset($_GET['id'])? $rel_id = $_GET['id'] : ""; ?>
<article>
<h3><a href="">New Properties</a></h3>

<div class="property-container" border="1">

<?php

$properties = Property::find_all_active_with_limit(3);;
foreach ($properties as $property):

 ?>
<div class="property-related">
	<a href="property_detail.php?id=<?php echo $property->id;?>">
	<img class="property-img-related" src="<?php echo $property->thumbnail;?>" alt="<?php echo $property->thumbnail;?>"/>
	</a>
	<div class="title"><?php echo $property->title;?></div>
	<div class="color">
	<div>Code number: <?php echo $property->code;?> </div>
	<div>Price: <?php echo 'USD ' . number_format($property->price, 2);?></div>
	</div>
</div>

<?php endforeach; ?>

<div class="clear"></div>

</article>