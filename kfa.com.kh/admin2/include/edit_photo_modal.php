<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Upload to replace photo</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="file" id="filename">
        <div id="selectd_file"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="set_image">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  $(document).ready(function(){

    $('#set_image').click(function(){
      var photoid = $('#photo-id').attr('data');
      var property_code = $('#property_code').attr('data');
      var fileName = $("#filename").val().split('/').pop().split('\\').pop();
      //alert(photoid + property_code + fileName);

      $.ajax({
        url: "include/ajax_code.php",
        data: {photoid:photoid, property_code:property_code, fileName:fileName},
        type: "POST",
        success: function(data){
          if(!data.error){
            $(".user_image_box img").prop('src', data);
          }
        }
      });
    });    


    

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