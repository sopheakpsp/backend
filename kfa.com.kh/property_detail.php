<?php require_once 'admin2/include/init_client.php';?>

<?php 
    $id = $_GET['id'];
    $property = Property::find_by_id($id);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $property->title?></title>
    <?php include 'head.php';?>
</head>
<body>
<header>
    <?php include 'header.php';?>
</header>
<div style="font-size:11px;border-top:1px solid #aeaeae; border-bottom:1px solid #aeaeae; background:#e9e9e9; padding:5px 0 5px 60px">
    <span style="color:#bf1e2e">&#9679; You are in: Home &gt;</span> Property Detail
</div>      
<aside class="l-side">
    <?php include 'propertymenu.php';?>
    <?php //include 'search_left.php';?>
    <?php //include 'hotnews.php';?>
</aside>
<section class="middle-section">
    <div class="title2"><?php echo $property->title?></div>
    <ul class="noliststyle">
        <li style="font-size:14px; color:#af1b31"><?php echo 'USD ' . number_format($property->price, 2);?></li>
        <li><img src='img/code.png' width='15'/><?php echo $property->code?></li>
        <li><img src='img/size.png' width='15'/><?php echo $property->land_size?></li>
        <!--get bed if exist-->
        <?php
        if (!$property->bed_room){}
        else{
            echo "<li><img src='img/bed.png' width='15'/>".$property->bed_room."</li>";
        }
        ?>
        <!--get bath if exist-->
        <?php
        if (!$property->bath_room){}
        else{
            echo "<li><img src='img/bath.png' width='15'/>".$property->bath_room."</li>";
        }
        ?>
    </ul>
    <?php 
        $property_image = Property_image::find_by_ref_id($id);
     ?>
    <img src="<?php echo $property_image->filename;?>" width="100%" height="auto" style="margin:15px 0 0 0" alt="<?php echo $property_image->filename;?>">
    
    <div class="title2">Property Detail</div>
    <ul>
        <li id="property_code" data="<?php echo $property->code; ?>">Code: <b><?php echo $property->code; ?></b></li>
        <li>Type: <?php echo $property->type; ?></li>
        <li>Status: <?php echo $property->category; ?></li>
        <li>Price: <?php echo '$ ' . number_format($property->price, 2) ." ". $property->unit; ?></li>
        <li>Pricing Date: <?php echo $property->pricing_date; ?></li>
        <li>Land Size: <?php echo $property->land_size; ?></li>
        <li>House Size: <?php echo $property->house_size; ?></li>
        <li>Bed Room: <?php echo $property->bed_room; ?></li>
        <li>Bath Room: <?php echo $property->bath_room; ?></li>
        <li>Floor: <?php echo $property->floor; ?></li>
        <li>Year Built: <?php echo $property->year_built; ?></li>
        <!-- <li>Listed by: <span style="text-transform:capitalize"><?php echo $property->listed_by; ?></span></li> -->
        <li>Listed Date: <?php echo $property->listed_date; ?></li>
        <li>Agent: 
            <?php 
                $agent = Agent::find_by_id($property->agent);
                echo $agent->name;
            ?>
        </li>
        <li>Property Location: <?php echo $property->location; ?></li>
    </ul>

    <div class="title2">Property Description</div>
    <div style="margin:15px 0 0 0;font-size:13px"><?php echo $property->description;?></div>

    <br/>

<div class="clear"></div>

<h3>More Images</h3>
<div class="clear"></div>

<div class="zoom-gallery">

<?php 
    $property_images = Property_image::find_all_by_id($id);
    foreach ($property_images as $property_image):
        if(substr($property_image->filename, -12)=='thumnail.JPG' OR substr($property_image->filename, -12)=='thumnail.jpg'){}
        else{
 ?>
    <a href="<?php echo $property_image->filename;?>" title="" class="property-detail-img">
        <img src="<?php echo $property_image->filename;?>" class="property-detail-img">
    </a>
                
            
    <?php } endforeach; ?>

</div>
<!--end more image-->
</section>

<aside class="r-side">

<?php $agent = Agent::find_by_id($property->agent); ?>

<div class="agency" id="agency">
<div class="title2">Agency's Contact</div>
<table>
    <tr>
        <td>Agent:</td><td><?php echo $agent->name;?></td>
    </tr>
    <tr>
        <td>Position:</td><td><?php echo $agent->position;?></td>
    </tr>
    <tr>
        <td>Mobile:</td><td><?php echo $agent->phone;?></td>
    </tr>
    <tr>
        <td>Email:</td><td><?php echo $agent->email;?></td>
    </tr>
</table>
</div>

<article>

<?php include("new_property.php"); ?>
<div class="clear"></div>

</article>

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

