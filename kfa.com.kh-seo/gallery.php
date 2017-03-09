<?php require_once 'admin2/include/init_client.php';?>





<!DOCTYPE html>
<html lang="en">
<head>
    <title>KFA Gallery</title>
    <?php include 'head.php';?>
</head>
<body>
<header>
    <?php include 'header.php';?>
</header>
<div class="clear"></div>
<div style="font-size:11px;border-top:1px solid #aeaeae; border-bottom:1px solid #aeaeae; background:#e9e9e9; padding:5px 0 5px 60px">
    <span style="color:#bf1e2e">&#9679; You are in: Home &gt;</span> Images Gallery
</div>      
<div class="clear"></div>    
<!-- <aside class="l-side">
    <?php //include 'aboutmenu.php';?>
    <?php //include 'hotnews.php';?>
</aside> -->
<section class="left-section">
<h2>Images Gallery</h2><br/>



<!--column container   -->
<div id="columns">   
   

<?php 
$galleries = Gallery::find_all();
foreach ($galleries as $gallery) :
 ?>

<!--loop show image and figure-->
	<figure>
	<a href="gallery_detail.php?id=<?php echo $gallery->id;?>">
		<img src="<?php echo $gallery->thumbnail;?>" alt="<?php echo $gallery->thumbnail;?>">
    </a> 
		<figcaption><?php echo $gallery->title;?></figcaption>
	</figure>

<!--end loop show image and figure-->
<?php endforeach; ?>

</div>
<!--end #column-->

<div class="clear"></div>

<h3>More Event</h3>
<ul class="glist">

</ul>

</section>
<aside class="r-side">
    <?php include 'related_property.php'?>
</aside>    
<div class="clear"></div>
<div>
    <?php include 'client_slide.php';?>
</div>
<div class="clear"></div>
<footer>    
    <?php include 'footer.php';?>
</footer>
</body>
</html>

