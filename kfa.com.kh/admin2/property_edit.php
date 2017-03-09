<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php 
    isset($_GET['id'])? $id = $_GET['id'] : "";
    isset($_GET['page'])? $page = $_GET['page'] : $page = 1;
    $property = Property::find_by_id($id);
?>
<?php 
$message = array();

if(isset($_POST['submit'])){
   // $property = new Property();
   // $property->id = $id; 
   $property->title = $_POST['title'];
   $property->type = $_POST['type'];
   $property->category = $_POST['category'];
   $property->price = $_POST['price'];
   $property->unit = $_POST['unit'];
   $property->pricing_date = $_POST['pricing_date'];
   // $property->code = $property->get_code();
   $property->location = $_POST['location'];
   $property->land_size = $_POST['land_size'];
   $property->house_size = $_POST['house_size'];
   $property->bed_room = $_POST['bed_room'];
   $property->bath_room = $_POST['bath_room'];
   $property->floor = $_POST['floor'];
   $property->year_built = $_POST['year_built'];
   $property->description = $_POST['description'];
   // $property->thumbnail = 'property/' . $property->get_code() . '/thumnail.jpg';
   $property->agent = $_POST['agent'];
   $property->status = 2;
   $property->updated_by = $user_session->first_name . " " . $user_session->last_name;
   $property->updated_date = get_date();

   if ($property->update()) {
        redirect("property_confirm.php?id={$property->id}&page={$page}");              
   }
   else{
        $session->message("Update problem, please try again or check with your IT Administrator.", "danger");
        redirect("property_edit.php?page={$page}");
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
                            <small>Code: <?php echo $property->code; ?></small>
                        </h1>

                        <?php if ($message): ?>
                         <pre>
                        <?php print_r($message)  ; ?>
                        </pre>   
                        <?php endif ?>
                        

                        <?php if(isset($session->message)){ ?>
                            <div class="alert alert-<?php echo $session->message_color;?>" role="alert"><?php echo $session->message; ?></div>
                        <?php } ?> 
                        <form action="" method="post" enctype="multipart/form-data" id="validation-form">
                            <div class="col-md-8">

                                <div class="form-group form-error" >
                                    <label for="title">* Title:</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $property->title; ?>" required>
                                </div>

                                <div class="form-group width-haft form-error">
                                    <label for="type">* Property Type:</label>
                                    <select class="form-control" name="type" required>
                                        <option value="<?php echo $property->type; ?>"><?php echo $property->type; ?></option>
                                        <option disabled role=separator>--------------------</option>
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
                                        <option value="<?php echo $property->category; ?>"><?php echo $property->category; ?></option>
                                        <option disabled role=separator>--------------------</option>
                                        <option>Sale</option>
                                        <option>Rent</option>
                                        <option>Sale/Rent</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="location">* Location:</label>
                                    <input type="text" name="location" class="form-control" value="<?php echo $property->location; ?>" required>
                                </div>

                                <div class="form-inline">
                                    <div class="form-group width-30">
                                        <label for="price">* Price:</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $property->price; ?>" required>
                                            <div class="input-group-addon">.00</div>
                                        </div>
                                    </div>
                                    <div class="form-group width-30">
                                        <label for="unit">/SQM, /MONTH</label>
                                        <select class="form-control" name="unit">
                                            <option value="<?php echo $property->unit; ?>"><?php echo $property->unit; ?></option>
                                            <option>/SQM</option>
                                            <option>/MONTH</option>
                                        </select>
                                    </div>
                                    <div class="form-group width-30">
                                        <label for="pricing_date">* Pricing Date:</label>
                                        <input type="date" class="form-control" id="pricing_date" name="pricing_date" value="<?php echo $property->pricing_date; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group width-30">
                                    <label for="land_size">* Land Size:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="land_size" value="<?php echo $property->land_size; ?>" required>
                                        <div class="input-group-addon">SQM</div>
                                    </div>
                                </div>

                                <div class="form-group width-30">
                                  <label for="house_size">House Size:</label>
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="house_size" value="<?php echo $property->house_size; ?>">
                                      <div class="input-group-addon">SQM</div>
                                  </div>
                                </div>
                            
                                

                                <div class="form-group">
                                  <label for="description">Property Description:</label>
                                  <textarea class="form-control" rows="5" name="description"><?php echo $property->description; ?></textarea>
                                </div>    
                            </div>
                            <div class="col-md-4">

                            <div class="form-group">
                                  <label for="bed_room">Bed Room:</label>
                                  <input type="number" class="form-control" name="bed_room" value="<?php echo $property->bed_room; ?>">
                                </div>

                                <div class="form-group">
                                  <label for="bath_room">Bath Room</label>
                                  <input type="number" class="form-control" name="bath_room" value="<?php echo $property->bath_room; ?>">
                                </div>

                                <div class="form-group">
                                  <label for="floor">Floor:</label>
                                  <input type="text" class="form-control" name="floor" value="<?php echo $property->floor; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="year_built">Year Built:</label>
                                    <select name="year_built" id="" class="form-control">
                                        <option value="<?php echo $property->year_built; ?>"><?php echo $property->year_built; ?></option>
                                        <option disabled role=separator>--------------------</option>
                                        <?php for($i=date('Y'); $i>=date('Y')-20; $i--): ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="agent">* Sale Agent Selection:</label>
                                    <select class="form-control" name="agent" required>
                                        <?php $agent_single = Agent::find_by_id($property->agent); ?>
                                        <option value="<?php echo $agent_single->id;?>"><?php echo $agent_single->name;?></option>
                                        <option disabled role=separator>--------------------</option>
                                        <?php 
                                            $agents = Agent::find_all();
                                            foreach($agents as $agent) :
                                        ?>
                                        <option value="<?php echo $agent->id; ?>"><?php echo $agent->name; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <a href="property_managing.php?page=<?php echo $page; ?>" class="pull-right"><i class="fa fa-caret-left"></i>Back</a>
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

