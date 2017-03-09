
<?php 
  $users = User::find_all();
 ?>
<!-- Modal -->
<div class="modal fade" id="photo-library" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Image Library</h4>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-9">
            <div class="thumbnails row">

            <?php foreach ($users as $user) : ; ?>
              <div class="col-xs-2">
                  <a href="#" role="checkbox" aria-checkd="false" tabindex="0" id="" class="thumbnail">
                      <img class="modal_thumbnails img-responsive" id="modal_image" src="<?php echo $user->user_image_placeholder();?>" data="<?php echo $user->id; ?>" alt="">
                  </a>
                  <div class="photo-id hidden"></div>
              </div>
            <?php endforeach;?>  

            </div>
          </div>
        
          <div class="col-md-3">
            <div id="modal_sidebar" class="thumbnail sidebar_image_box">
              <img src="" alt="">
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="set_user_image" disabled="true" data-dismiss="modal">Set Image</button>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    var user_href;
    var user_href_splitted;
    var user_id;
    var image_src;
    var image_href_splitted;
    var filename;
    var photo_id;

    $('.modal_thumbnails').click(function(){
      $('#set_user_image').prop('disabled', false);

      user_href = $("#user-id").prop('href');
      user_href_splitted = user_href.split("=");
      user_id = user_href_splitted[user_href_splitted.length - 1];

      image_src = $(this).prop("src");
      image_href_splitted = image_src.split("/");
      filename = image_href_splitted[image_href_splitted.length - 1];

      photo_id = $(this).attr("data");

      $.ajax({
        url: "include/ajax_code.php",
        data: {photo_id:photo_id},
        type: "POST",
        success: function(data){
          if(!data.error){
            $("#modal_sidebar").html(data);
          }
        }
      });
    });

    $('#set_user_image').click(function(){
      $.ajax({
        url: "include/ajax_code.php",
        data: {filename:filename, user_id:user_id},
        type: "POST",
        success: function(data){
          if(!data.error){
            $(".user_image_box a img").prop('src', data);
          }
        }
      });
    });

    $('.delete_confirm').click(function(){
      return confirm("Are you sure want to delete this item");
    });
  });
</script>