<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php 
$message = array();

if(isset($_POST['submit'])){
   $property = new Property();
   $property->title = $_POST['title'];
   $property->type = $_POST['type'];
   $property->category = $_POST['category'];
   $property->price = $_POST['price'];
   $property->unit = $_POST['unit'];
   $property->pricing_date = $_POST['pricing_date'];
   $property->code = $property->get_code();
   $property->location = $_POST['location'];
   $property->land_size = $_POST['land_size'];
   $property->house_size = $_POST['house_size'];
   $property->bed_room = $_POST['bed_room'];
   $property->bath_room = $_POST['bath_room'];
   $property->floor = $_POST['floor'];
   $property->year_built = $_POST['year_built'];
   $property->description = $_POST['description'];
   $property->thumbnail = 'property/' . $property->get_code() . '/thumnail.jpg';
   $property->agent = $_POST['agent'];
   $property->status = 2;
   $property->listed_by = $user_session->first_name . " " . $user_session->last_name;
   $property->listed_date = get_date();

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

        redirect("property_confirm.php?id={$ref_id}");              
   }
   else{
        $session->message("Your upload file are opening with another program.", "danger");
        redirect('property.php');
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
                        <h1 class="page-header">
                            Property
                            <small>Total: <?php echo Property::count_all(); ?></small>
                            <small><a href="http://kfa.com.kh/property.php" target="blank">View in Website</a></small>
                        </h1>

                        <?php if ($message): ?>
                         <pre>
                        <?php print_r($message)  ; ?>
                        </pre>   
                        <?php endif ?>
                        

                        <?php if(isset($session->message)){ ?>
                            <div class="alert alert-<?php echo $session->message_color;?>" role="alert"><?php echo $session->message; ?></div>
                        <?php } ?> 
                        <form action="property.php" method="post" enctype="multipart/form-data" id="validation-form">
                            <div class="col-md-8">

                                <div class="form-group form-error" >
                                    <label for="title">* Title:</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>

                                <div class="form-group width-haft form-error">
                                    <label for="type">* Property Type:</label>
                                    <select class="form-control" name="type" required>
                                        <option></option>
                                        <?php 
                                            $property_types = Property_type::find_all_asc();

                                            foreach ($property_types as $property_type) :
                                        ?>
                                            <option value="<?php echo $property_type->type_name; ?>"><?php echo $property_type->type_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group width-30">
                                    <label for="category">* Property Category:</label>
                                    <select class="form-control" name="category" required>
                                        <option></option>
                                        <option>Sale</option>
                                        <option>Rent</option>
                                        <option>Sale/Rent</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="location">* Location:</label>
                                    <input type="text" name="location" class="form-control" required>
                                </div>

                                <div class="form-inline">
                                    <div class="form-group width-30">
                                        <label for="price">* Price:</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="price" name="price" required>
                                            <div class="input-group-addon">.00</div>
                                        </div>
                                    </div>
                                    <div class="form-group width-30">
                                        <label for="unit">/SQM, /MONTH</label>
                                        <select class="form-control" name="unit">
                                            <option></option>
                                            <option>/SQM</option>
                                            <option>/MONTH</option>
                                        </select>
                                    </div>
                                    <div class="form-group width-30">
                                        <label for="pricing_date">* Pricing Date:</label>
                                        <input type="date" class="form-control" id="pricing_date" name="pricing_date" required>
                                    </div>
                                </div>

                                <div class="form-group width-30">
                                    <label for="land_size">* Land Size:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="land_size" required>
                                        <div class="input-group-addon">SQM</div>
                                    </div>
                                </div>

                                <div class="form-group width-30">
                                  <label for="house_size">House Size:</label>
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="house_size">
                                      <div class="input-group-addon">SQM</div>
                                  </div>
                                </div>
                            
                                

                                <div class="form-group">
                                  <label for="description">Property Description:</label>
                                  <textarea class="form-control" rows="5" name="description"></textarea>
                                </div>    
                            </div>
                            <div class="col-md-4">

                            <div class="form-group">
                                  <label for="bed_room">Bed Room:</label>
                                  <input type="number" class="form-control" name="bed_room">
                                </div>

                                <div class="form-group">
                                  <label for="bath_room">Bath Room</label>
                                  <input type="number" class="form-control" name="bath_room">
                                </div>

                                <div class="form-group">
                                  <label for="floor">Floor:</label>
                                  <input type="text" class="form-control" name="floor">
                                </div>

                                <div class="form-group">
                                    <label for="year_built">Year Built:</label>
                                    <select name="year_built" id="" class="form-control">
                                        <option value=""></option>
                                        <?php for($i=date('Y'); $i>=date('Y')-20; $i--): ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="agent">* Sale Agent Selection:</label>
                                    <select class="form-control" name="agent" required>
                                        <option></option>
                                        <?php 
                                            $agents = Agent::find_all();
                                            foreach($agents as $agent) :
                                        ?>
                                        <option value="<?php echo $agent->id; ?>"><?php echo $agent->name; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="from-group file">
                                    <label for="file">* Drop files here to upload</label>
                                    <input type="file" name="files[]" class="dropzone" multiple required>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                </div>
                             </div>

                        </form>


                        <!-- dropzone
                        
                        <div class="col-md-4">
                            <form action="property.php" class="dropzone"></form>
                        </div>

                        /dropzone -->



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


<?php include ("include/footer.php"); ?>

