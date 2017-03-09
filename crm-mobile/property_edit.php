<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']);
      $user_id = $user_session->id;
?>
<?php 
    isset($_GET['id'])? $id = $_GET['id'] : "";
    isset($_GET['page'])? $page = $_GET['page'] : $page = 1;
    $property = Property::find_by_id($id);
?>
<?php 
$message = array();
if(isset($_POST['save'])){
   // $property = new Property();
   // $property->id = $id;
   $property->title = $_POST['title'];
   $property->type = $_POST['type'];
   $property->category = $_POST['category'];
   $property->pricing_date = dateToDb($_POST['pricing_date']);
   $property->sale_price = $_POST['sale_price'];
   $property->rent_price = $_POST['rent_price'];
   $property->lp = $_POST['lp'];
   $property->bp = $_POST['bp'];
   $property->city = $_POST['city'];
   $property->district = $_POST['district'];
   $property->commune = $_POST['commune'];
   $property->road = $_POST['road'];
   $property->home = $_POST['home'];
   $property->lat = $_POST['lat'];
   $property->lng = $_POST['lng'];
   $property->l_width = $_POST['l_width'];
   $property->l_length = $_POST['l_length'];
   $property->land_size = $_POST['land_size'];
   $property->h_width = $_POST['h_width'];
   $property->h_length = $_POST['h_length'];
   $property->house_size = $_POST['house_size'];
   $property->bed_room = $_POST['bed_room'];
   $property->bath_room = $_POST['bath_room'];
   $property->floor = $_POST['floor'];
   $property->year_built = $_POST['year_built'];
   $property->title_deed = $_POST['title_deed'];
   $property->description = $_POST['description'];
   $property->user_note = $_POST['user_note'];
   $property->agent = $_POST['agent'];
   $property->owner_number = $_POST['owner_number'];
   $property->status = $_POST['optradio'];
   $property->updated_by = $user_id;
   $property->updated_date = get_date();

   if ($property->update()){
        $session->message("Updated Successful.", "success");
        redirect("property_edit.php?id={$id}");              
   }
   else{
        $session->message("Update false", "danger");
        redirect("property_edit.php?id={$id}");
   }

}


 ?>
<?php require_once("include/header.php"); ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include ("include/top-nav-left.php");?>
            <!-- Top Menu Items -->
            <?php include ("include/top-nav-right.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include ("include/side-nav.php");?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Edit Property
                        </h2>

                        <?php if(isset($session->message)){ ?>
                            <div class="alert alert-<?php echo $session->message_color;?>" role="alert"><?php echo $session->message; ?></div>
                        <?php } ?>

                          
                        <div class="col-md-8 font">

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="pull-right">
                                  <form action="" enctype="multipart/form-data">
                                      <span class="btn btn-success btn-sm btn-file">
                                          Add more image + <input type="file" name="file[]" id="upload" multiple>
                                      </span>
                                      <input type="text" name="ref_id" value="<?php echo $id; ?>" hidden>
                                      <input type="text" name="property_code" value="<?php echo $property->code; ?>" hidden>
                                  </form>
                              </div>
                              
                              <script>
                              $(document).ready(function(){
                                  $('#upload').change(function(e){
                                      e.preventDefault(); // prevent default submission
                                      var formData = new FormData($(this).parents('form')[0]) //grap all form data
                                      $.ajax({
                                          url: 'include/ajax_upload.php',
                                          type: 'POST',
                                          data: formData, //data sent to server
                                          cache: false, // to unable request page to be cached
                                          contentType: false, //tell jquery not to set content type
                                          processData: false, // tell jquery not to process data
                                          success: function(data){ //alert of data success
                                              location.reload(true);
                                              // alert(data);
                                          }
                                          
                                      });
                                      return false;
                                  });
                                  
                                  $('.remove').click(function(){
                                      return confirm("Are you sure want to remove");
                                  });
                              });
                            </script>   

                            <strong>Images:</strong>
                          </div>
                          <div class="panel-body grey">
                            <?php
                                $property_images = Property_image::find_all_by_id($id);
                                foreach ($property_images as $value) {
                                    !empty($array[] = basename($value->filename))?$array[] = basename($value->filename):"No images set";
                                }
                                if(empty($array)){
                                  echo "No images set";
                                }
                                // else{
                                //     if(!in_array('thumnail.jpg', $array)){
                                //       echo "<div class='alert alert-danger' role='alert'>Warning! there is no <b>thumnail.jpg</b> to show in front page. <br><small>(Tip: create filename thumnail.jpg size <strong>W:400px and height:auto</strong> and extension file must be <b>.jpg not .JPG</b> then click add more image.)</small></div>";
                                //   }
                                //}
                                

                              ?>

                              <?php foreach($property_images as $property_image) :?>
                                <div class="col-md-4">
                                    <img class="img-responsive thumbnail" src="<?php echo $property_image->filename; ?>" alt="" style="margin-bottom: 3px">
                                    <!-- <span><?php echo basename($property_image->filename); ?></span> -->
                                    <a class="label label-warning" href="include/property_image_delete.php?id=<?php echo  $property_image->id; ?>&filename=<?php echo  $property_image->filename; ?> &p_id=<?php echo $id; ?>">remove</a>
                                </div>                              
                              <?php endforeach;?>
                          </div>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data" class="font">
  
                            <div>
                              <label for="">Google maps</label>
                              <!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box"> -->
                              <div id="maps"></div>
                              <input type="text" name="lat" id="lat" class="no-border" value="<?php echo $property->lat;?>" >
                              <input type="text" name="lng" id="lng" class="no-border" value="<?php echo $property->lng;?>" >
                            </div><br>

                            <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" class="form-control" value="<?php echo !empty($property->title)? $property->title:false; ?>">
                            </div>

                            <div class="form-group">
                              <label for="description">Description *</label>
                              <textarea class="form-control" rows="15" name="description"><?php echo !empty($property->description)? $property->description:false; ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="user_note">User Note: (This note for your own personal use only)</label>
                              <textarea class="form-control" rows="8" name="user_note"><?php echo !empty($property->user_note)? $property->user_note:false; ?></textarea>
                            </div>

                          </div>
                          <div class="col-md-4 font">                          

                          
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                Property Status
                              </div>
                              <div class="panel-body">
                                <label class="radio-inline"><input type="radio" name="optradio" value="1" <?php if($property->status==1){echo 'checked="checked"';} ?><?php if($user_session->id==$property->agent){echo "disabled";} ?>>Publish</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="2" <?php if($property->status==2){echo 'checked="checked"';} ?>>Available</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="3" <?php if($property->status==3){echo 'checked="checked"';} ?>>Rent</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="4" <?php if($property->status==4){echo 'checked="checked"';} ?>>Sold</label>
                              </div>
                            </div>
                          

                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <strong>General Information</strong>
                              </div>
                              <div class="panel-body">
                                  <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th>Code:</th>
                                        <td><?php echo $property->code; ?></td>
                                    </tr>
                                      <tr>
                                        <th>Type *</th>
                                        <td>
                                          <select class="form-control" name="type" >
                                            <option value="<?php echo $property->type?>" selected>
                                              <?php $p_type = Property_type::find_by_id($property->type); 
                                                  echo $p_type->type_name;?>
                                            </option>
                                              <?php 
                                                  $property_types = Property_type::find_all_asc();

                                                  foreach ($property_types as $property_type) :
                                              ?>
                                            <option value="<?php echo $property_type->id; ?>"><?php echo $property_type->type_name; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Category *</th>
                                        <td>
                                          <select class="form-control" name="category">
                                            <option value="<?php echo $property->category;?>"><?php echo $property->category;?></option>
                                            <option value="Sale">Sale</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sale/Rent">Sale/Rent</option>
                                          </select>
                                        </td>
                                      </tr>

                                      <tr>
                                        <th>L. Width</th>
                                        <td><input type="number" name="l_width" class="form-control" step="0.01" id="l_width" onkeyup="landTotal();" value="<?php echo $property->l_width;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>L. Length</th>
                                        <td><input type="number" name="l_length" class="form-control" step="0.01" id="l_length" onkeyup="landTotal();" value="<?php echo $property->l_length;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Land Size</th>
                                        <td><input type="number" name="land_size" class="form-control" step="0.01" id="land_size" value="<?php echo $property->land_size;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>B. Width</th>
                                        <td><input type="number" name="h_width" class="form-control" step="0.01" id="h_width" onkeyup="houseTotal()" value="<?php echo $property->h_width;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>B. Length</th>
                                        <td><input type="number" name="h_length" class="form-control" step="0.01" id="h_length" onkeyup="houseTotal()" value="<?php echo $property->h_length;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Building Size</th>
                                        <td><input type="number" name="house_size" class="form-control" step="0.01" id="house_size" value="<?php echo $property->house_size;?>"></td>
                                      </tr>

                                      <tr>
                                        <th>Bed Room</th>
                                        <td><input type="text" name="bed_room" class="form-control" value="<?php echo $property->bed_room;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Bath Room</th>
                                        <td><input type="text" name="bath_room" class="form-control" value="<?php echo $property->bath_room;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Floor</th>
                                        <td><input type="text" name="floor" class="form-control" value="<?php echo $property->floor;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Year Built</th>
                                        <td><input type="text" name="year_built" class="form-control" value="<?php echo $property->year_built;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Title Deed</th>
                                        <td>
                                          <select name="title_deed" class="form-control">
                                            <option value="<?php echo $property->title_deed?>" selected><?php echo $property->title_deed;?></option>
                                            <option value="Hard Title">Hard Title</option>
                                            <option value="Soft Title">Soft Title</option>
                                          </select>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>   
                              </div>
                          </div>

                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <strong>Location</strong>
                              </div>
                              <div class="panel-body">
                                  <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <th>Home #</th>
                                        <td><input type="text" name="home" class="form-control" value="<?php echo $property->home;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>Road #</th>
                                        <td><input type="text" name="road" class="form-control" value="<?php echo $property->road;?>"></td>
                                      </tr>
                                      <tr>
                                        <th>City *</th>
                                        <td>
                                          <select class="form-control" name="city" id="city">
                                            <option value="<?php echo $property->city;?>">
                                                <?php 
                                                $cityname = City::find_by_id($property->city);
                                                echo $cityname->city_name;?>
                                            </option>
                                              <?php 
                                                  $citys = City::find_all();

                                                  foreach ($citys as $city) :
                                              ?>
                                                  <option value="<?php echo $city->id; ?>"><?php echo $city->city_name; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>District *</th>
                                        <td>
                                          <select class="form-control" name="district" id="district">
                                            <option value="<?php echo $property->district;?>">
                                            <?php 
                                                $districtname = District::find_by_id($property->district);
                                                echo $districtname->district_name;?>
                                            </option>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Commune *</th>
                                        <td>
                                          <select class="form-control" name="commune" id="commune">
                                            <option value="<?php echo !empty($property->commune)?$property->commune:false;?>">
                                            <?php 
                                              if(!$property->commune){}
                                                else{
                                                  $communename = Commune::find_by_id($property->commune);
                                                echo $communename->commune_name;
                                                }
                                                ?>
                                                </option>
                                          </select>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>   
                              </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <strong>Price</strong>
                            </div>
                            <div class="panel-body">
                              <table class="table table-borderless">
                                <tbody>
                                  <tr>
                                    <th>Sale Price</th>
                                    <td><input type="number" class="form-control" name="sale_price" value="<?php echo $property->sale_price;?>"></td>
                                  </tr>
                                  <tr>
                                    <th>Rent Price</th>
                                    <td><input type="number" class="form-control" name="rent_price" value="<?php echo $property->rent_price;?>"></td>
                                  </tr>
                                  <!-- <tr>
                                    <th>V.P</th>
                                    <td><input type="number" class="form-control" name="vp"></td>
                                  </tr> -->
                                  <tr>
                                    <th>L.P /sqm</th>
                                    <td><input type="number" class="form-control" name="lp" value="<?php echo $property->lp;?>"></td>
                                  </tr>
                                  <tr>
                                    <th>B.P /sqm</th>
                                    <td><input type="number" class="form-control" name="bp" value="<?php echo $property->bp;?>"></td>
                                  </tr>
                                  <tr>
                                    <th>Date *</th>
                                    <td><input type="text" class="form-control" name="pricing_date" id="datepicker" value="<?php echo dateFromDb($property->pricing_date);?>"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <strong>Contact</strong>
                            </div>
                            <div class="panel-body">
                              <table class="table table-borderless">
                              <tbody>
                                
                                <tr class="<?php if($user_session->struc==3){echo "hidden";} ?>">
                                  <th>Agent *</th>
                                  <td>
                                    <select class="form-control" name="agent">
                                      <option value="<?php echo $property->agent;?>" selected>
                                      <?php 
                                      $agentname = User::find_by_id($property->agent);
                                      echo $agentname->first_name.' '.$agentname->last_name;
                                       ?>
                                      </option>
                                      <?php 
                                          $agents = User::find_all();
                                          foreach($agents as $agent) :
                                              if($agent->struc==2 OR $agent->struc==3):
                                      ?>
                                          <option value="<?php echo $agent->id; ?>"><?php echo $agent->first_name.' '.$agent->last_name; ?></option>
                                      <?php
                                              endif; 
                                          endforeach; 
                                      ?>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Owner *</th>
                                  <td><input type="text" class="form-control" name="owner_number" value="<?php echo $property->owner_number;?>"></td>
                                </tr>

                              </tbody>
                            </table>
                            </div>
                          </div>
                            
                           <div class="panel panel-primary">
                              <div class="panel-heading">
                                <strong>Save Panel</strong>
                              </div>
                              <div class="panel-body">
                                <label class="checkbox" style="margin-left:19px"><input type="checkbox" value="1" name="publish_request">Request for Publishing</label>
                                <input type="submit" class="btn btn-sm btn-primary" value="Save" name="save" >
                                <a href="property_view.php?id=<?php echo $id;?>"><input type="button" class="btn btn-sm btn-default" value="View"></a>
                                <!-- <input type="submit" class="btn btn-sm btn-default" value="Save &amp; View Detail" name="save_and_detail"> -->
                              </div>
                            </div>

                          </div><!--end col md 4-->

                          <div class="col-md-8">
                            
                          </div>

                          <div class="col-md-4">
                            
                          </div>
                           
                        </form>

                        <!-- end form -->
                    </div> 
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- jqueryui -->
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-ui.min.js"></script>

<script type="text/javascript">
$(document).ready(function($){

  $("#city").change(function(){
    var city_id = $(this).val();
    $.ajax({
      url: "ajax/search.php",
      method: "POST",
      data: {city_id:city_id},
      success: function(data){
        $("#district").html(data);
      },
      error: function(exception){
        alert('Exeption:'+exception);
      }
    });
  });

  $("#district").change(function(){
    var district_id = $(this).val();
    $.ajax({
      url: "ajax/search.php",
      method: "post",
      data: {district_id:district_id},
      success: function(data){
        $("#commune").html(data);
      }
    });
  });

  $(function(){
    $("#datepicker").datepicker();
  });
}); 

function landTotal(){
  var landW = document.getElementById('l_width').value;
  var landL = document.getElementById('l_length').value;

  var total = landW*landL;
  var ftotal = total.toFixed(2)
  document.getElementById('land_size').value = parseFloat(ftotal);
}

function houseTotal(){
  var houseW = document.getElementById('h_width').value;
  var houseL = document.getElementById('h_length').value;

  var total = houseW*houseL;
  var ftotal = total.toFixed(2)
  document.getElementById('house_size').value = parseFloat(ftotal);
}
 
</script>

<!-- maps api -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw&libraries=places"></script>
<script src="js/maps-edit.js"></script>

<?php include ("include/footer.php"); ?>