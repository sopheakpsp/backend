<?php require_once 'admin2/include/init_client.php';?>
<?php 
    $id = $_GET['id'];
    $gallery = Gallery::find_by_id($id);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $gallery->title;?></title>
    <?php include 'head.php';?>
</head>
<body>
<header>
    <?php include 'header.php';?>
</header>
<div style="font-size:11px;border-top:1px solid #aeaeae; border-bottom:1px solid #aeaeae; background:#e9e9e9; padding:5px 0 5px 60px">
    <span style="color:#bf1e2e">&#9679; You are in: Home &gt;</span> Our Gallery
</div>      
<aside class="l-side">
    <?php include 'propertymenu.php';?>
    <?php //include 'search_left.php';?>
    <?php //include 'hotnews.php';?>
</aside>

<section class="middle-section">
<h2 style="margin:0"><?php echo $gallery->title;?></h2>
<br/><br/>
<div class="zoom-gallery">
<?php 
    $gallery_images = Gallery_image::find_all_by_id($id);
    foreach ($gallery_images as $gallery_image):
        if(substr($gallery_image->filename, -12)=='thumnail.JPG' OR substr($gallery_image->filename, -12)=='thumnail.jpg'){}
        else{
 ?>
    <a href="<?php echo $gallery_image->filename;?>" title="" class="property-detail-img">
        <img src="<?php echo $gallery_image->filename;?>" class="property-detail-img">
    </a>
                
            
    <?php } endforeach; ?>
</div>

<br>
<!-- <h3>More Event</h3> -->
<ul class="glist">

</ul>
<!--end more image-->
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

