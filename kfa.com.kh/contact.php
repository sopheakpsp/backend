<?php

session_start();

include 'helpers/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : "";
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : "";
$succeed = isset($_SESSION['succeed']) ? $_SESSION['succeed'] : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <?php include 'head.php';?>
</head>
<body>
<header>
    <?php include 'header.php';?>
</header>
<div class="clear"></div>

<div style="font-size:11px;border-top:1px solid #aeaeae; border-bottom:1px solid #aeaeae; background:#e9e9e9; padding:5px 0 5px 60px">
    <span style="color:#bf1e2e">&#9679; You are in: Home &gt;</span> Contact Us
</div>     
 
<div class="clear"></div>    

<section class="left-section">


<div class="clear"></div>

<h2>Send us an email</h2>


    <div class="contact">
        
        <?php if(!empty($errors)): ?>
        <div class="panel">
            <ul><li><?php echo implode('</li><li>',$errors); ?></li></ul>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($succeed)): ?>
        <div class="panelsucceed">
            <?php echo $succeed;?>
        </div>
        <?php endif; ?>
        
    <div style="display:<?php if(!empty($succeed)) echo 'none';?>">    
        <form action="controllers/controller_contact.php" method="post">
            <label>
                Your name *
                <input type="text" name="name" autocomplete="off" <?php echo isset($fields['name']) ? ' value="' . e($fields['name']) . '" ' : ''  ?>>
            </label>
            <label>
                Your email *
                <input type="text" name="email" autocomplete="off" <?php echo isset($fields['email']) ? ' value="' . e($fields['email']) . '" ' : ''  ?>>
            </label>
            <label>
                Your message *
                <textarea name="message" rows="8"><?php echo isset($fields['message']) ? e($fields['message'])  : ''  ?></textarea>
            </label>
            <input type="submit" value="Send">
            
            <p class="note">* mean required</p>
        </form>
	</div>
        
    </div>



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

<?php

unset($_SESSION['errors']);
unset($_SESSION['fields']);
unset($_SESSION['succeed']);

?>
