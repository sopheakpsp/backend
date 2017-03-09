

<div class="row">
<form action="" method="post" id="updateUserinfo">
	<div class="col-md-2" style="height: 140px; background: url(<?php echo !empty($userDetail->filename)? 'staff/'.$userDetail->filename : 'staff/nostaffimage.gif'; ?>) no-repeat center; background-size: auto 100%">
    </div>
    <div class="col-md-4">
      <h5 class="capital"><?php echo $userDetail->first_name.' '.$userDetail->last_name; ?></h5>
      <h6 title="Source Title"><?php echo $userDetail->position; ?><i class="icon-map-marker"></i></h6>
      <p>
        <i class="fa fa-globe"></i> <?php echo $userDetail->email; ?><br>
        <i class="fa fa-phone"></i> <input type="text" class="no-border" name="phone" placeholder="Phone Number" value="<?php echo !empty($userDetail->phone)?$userDetail->phone:""; ?>"><br>
      </p>
      <p>
      <textarea name="user-info" id="" cols="30" rows="10">
        <?php echo !empty($userDetail->user_info)?$userDetail->user_info:""; ?>
        <?php echo $userDetail->id ?>

      </textarea>
      </p>
      <input type="submit" value="Save" class="btn btn-primary btn-sm">
    </div>
</form>
</div><!--end row-->
