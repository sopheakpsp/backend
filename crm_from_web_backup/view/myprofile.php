<div class="row" style="min-height: 500px">
	<div class="col-md-2" style="height: 140px; background: url(<?php echo !empty($userDetail->filename)? 'staff/'.$userDetail->filename : 'staff/nostaffimage.gif'; ?>) no-repeat center; background-size: auto 100%">
      
    </div>
    <div class="col-md-4">
      
        <h5 class="capital"><?php echo $userDetail->first_name.' '.$userDetail->last_name; ?></h5>
        <h6 title="Source Title"><?php echo $userDetail->position; ?><i class="icon-map-marker"></i></h6>
      
      <p>
        <i class="fa fa-globe"></i> <?php echo $userDetail->email; ?><br>
        <i class="fa fa-phone"></i> <?php echo $userDetail->phone; ?><br>
      </p>
      	<?php echo $userDetail->user_info; ?>
      
      <a href="myprofile.php?edit=1">Edit personal info</a>

      <h4>username: <?php echo $userDetail->username; ?></h4>
    	<a href="myprofile.php?edit=2">Change password</a>
    </div>
    

    
</div><!--end row-->
