<?php 
require_once("../include/init.php");
if(!$session->is_signed_in()) { redirect("login.php");}
$user_session = User::find_by_id($_SESSION['user_id']); 

function save_property($redirect){
  $message = array();

     $property = new Property();
     $property->title = $_POST['title'];
     $property->type = $_POST['type'];
     $property->category = $_POST['category'];
     //$property->price = $_POST['price'];
     //$property->unit = $_POST['unit'];
     $property->pricing_date = dateToDb($_POST['pricing_date']);
     $property->sale_price = $_POST['sale_price'];
     $property->rent_price = $_POST['rent_price'];
     $property->vp = $_POST['vp'];
     $property->lp = $_POST['lp'];
     $property->bp = $_POST['bp'];
     $property->code = $property->get_code();
     //$property->location = $_POST['location'];
     $property->city = $_POST['city'];
     $property->district = $_POST['district'];
     $property->commune = $_POST['commune'];
     $property->road = $_POST['road'];
     $property->home = $_POST['home'];
     $property->land_size = $_POST['land_size'];
     $property->house_size = $_POST['house_size'];
     $property->bed_room = $_POST['bed_room'];
     $property->bath_room = $_POST['bath_room'];
     $property->floor = $_POST['floor'];
     $property->year_built = $_POST['year_built'];
     $property->title_deed = $_POST['title_deed'];
     $property->description = $_POST['description'];
     $property->user_note = $_POST['user_note'];
     $property->thumbnail = 'property/' . $property->get_code() . '/thumnail.jpg';
     $property->agent = $_POST['agent'];
     $property->owner_number = $_POST['owner_number'];
     $property->status = 2;
     $property->listed_by = $user_session->id;
     $property->listed_date = get_date();
     // exit($property->pricing_date);

     if ($property->save()) {

          $ref_id = $property->id;

          $folder_create = "../" . PROPERTY_FOLDER . "/" . $property->code;

          if (file_exists($folder_create)) {
              $message[] = "{$property->code} folder is already exists.";
          }
          else{
              mkdir($folder_create, 0755);
          }

          for ($i=0; $i < count($_FILES['files']['name']); $i++) { 
              $property_image = new Property_image();
              $property_image->image_upload($_FILES['files'], $i, $property->code, $property->id);
          }

          redirect($redirect);              
     }
     else{
          $session->message(mysql_error(), "danger");
          redirect("property.php");
     }
                  
  
}

if(isset($_POST['save_property'])){
  save_property("property_managing.php");
}elseif(isset($_POST['save_and_new'])){
  echo "you click save and new";
}elseif(isset($_POST)){
  
}

 ?>