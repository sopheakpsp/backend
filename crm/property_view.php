<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php if(empty($_GET['id'])){redirect('property_managing.php');} ?>
<?php isset($_GET['page'])? $page = $_GET['page'] : $page = ""; ?>
<?php 
    $id = $_GET['id'];
    $property = Property::find_by_id($id);
    if(isset($_POST['change_status'])){
        $property->status = $_POST['status'];
        $property->save();
        redirect("property_view.php?id={$id}&page={$page}");
    }
    $property_images = Property_image::find_all_by_id($id);

 ?>
 <?php require_once("include/header.php"); ?>
    <div id="photo-id" data="<?php echo $id; ?>" style="display:none"></div>
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

            <!-- Portfolio Item Heading -->
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-header">
                            <?php 
                            if($property->title){
                                echo $property->title;
                            }else{
                                $type = Property_type::find_by_id($property->type);
                                echo $type->type_name;
                                echo " for ".$property->category;
                            }

                             ?>
                                <br>
                                <small>
                                <?php
                                    echo !empty($property->home)? "#".$property->home.", " : "";
                                    echo !empty($property->road)? "St.".$property->road.", " : "";
                                    if(!empty($property->commune)){
                                      $commune = Commune::find_by_id($property->commune);
                                      echo $commune->commune_name;
                                    }
                                    $district = District::find_by_id($property->district);
                                    $city = City::find_by_id($property->city);
                                    $address = array($district->district_name, $city->city_name); 
                                    $addressLine = implode(", ", $address);
                                    echo $addressLine;
                                    
                                    echo !empty($property->sale_price)?" (Sale price: $ " . number_format($property->sale_price, 2):"";
                                    echo !empty($property->rent_price)?" / Rent price: $".number_format($property->rent_price, 2):"";
                                    echo !empty($property->lp)?" / LP: $".number_format($property->lp, 2):"";
                                    echo !empty($property->bp)?" / BP: $".number_format($property->bp, 2):"";
                                    echo ")";
                                ?>
                                </small>
                            </h2>

                            
                            <div class="font">
                                <div class="col-md-8">
                                    <div class="row">
                                        <strong>Description:</strong>
                                        <p><?php echo $property->description; ?></p>
                                        <strong>Images:</strong>
                                    </div>
                                    
                                    <div class="row">
                                        
                                    <?php 
                                        foreach($property_images as $property_image) :
                                        if(substr($property_image->filename, -12)!='thumnail.jpg'):
                                    ?>

                                        <img class="img-responsive thumbnail col-md-4" src="<?php echo $property_image->filename; ?>" alt="<?php echo $property_image->filename; ?>">
                                
                                    <?php 
                                        endif;
                                        endforeach;
                                    ?>
                                    </div>
                                    <div class="row">
                                        <strong>Maps</strong>
                                        <div id="maps"></div>
                                        <input type="number" id="lat" value="<?php echo $property->lat; ?>" hidden>
                                        <input type="number" id="lng" value="<?php echo $property->lng; ?>" hidden>
                                    </div>
                                    <hr>
          
                                    <div class="row">
                                      <strong>Agent's note</strong>
                                      <div><?php echo $property->user_note; ?></div>
                                    </div>
                                    
                                </div>

                                 <!--  -->
                            <div class="col-md-4">
                          
                            <div class="status available"><p>
                              <?php
                                if($property->status == 1){
                                  echo "published";
                                }
                                elseif ($property->status == 2) {
                                  echo "available";
                                }
                                elseif ($property->status == 3){
                                  echo "rending";
                                }
                                elseif ($property->status == 4){
                                  echo "sold";
                                }
                                else{
                                  echo "deleted";
                                }
                              ?>
                            </p></div>

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
                                        <th>Type:</th>
                                        <td>
                                          <?php 
                                                $type = Property_type::find_by_id($property->type);
                                                echo $type->type_name;
                                             ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Category:</th>
                                        <td>
                                          <?php echo $property->category; ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Land Size:</th>
                                        <td><?php echo $property->land_size; ?></td>
                                      </tr>
                                      <tr>
                                        <th>House Size:</th>
                                        <td><?php echo $property->house_size; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Bed Room:</th>
                                        <td><?php echo $property->bed_room; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Bath Room:</th>
                                        <td><?php echo $property->bath_room; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Floor:</th>
                                        <td><?php echo $property->floor; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Year Built:</th>
                                        <td><?php echo $property->year_built; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Title Deed:</th>
                                        <td>
                                          <?php echo $property->title_deed; ?>
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
                                        <td><?php echo $property->home; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Road:</th>
                                        <td><?php echo $property->road; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Commune:</th>
                                        <td>
                                          <?php 
                                          if(!empty($property->commune)){
                                            $commune = Commune::find_by_id($property->commune);
                                            echo $commune->commune_name;
                                          }
                                          ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>District:</th>
                                        <td>
                                          <?php echo $district->district_name; ?>
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <th>City:</th>
                                        <td>
                                          <?php echo $city->city_name; ?>
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
                                    <th>Sale Price:</th>
                                    <td><?php echo "$ " . number_format($property->sale_price, 2);?></td>
                                  </tr>
                                  <tr>
                                    <th>Rent Price:</th>
                                    <td><?php echo "$ " . number_format($property->rent_price, 2);?></td>
                                  </tr>
                                  <!-- <tr>
                                    <th>V.P</th>
                                    <td><input type="number" class="form-control" name="vp"></td>
                                  </tr> -->
                                  <tr>
                                    <th>L.P /sqm:</th>
                                    <td><?php echo "$ " . number_format($property->lp, 2);?> /sqm</td>
                                  </tr>
                                  <tr>
                                    <th>B.P /sqm:</th>
                                    <td><?php echo "$ " . number_format($property->bp, 2);?> /sqm</td>
                                  </tr>
                                  <tr>
                                    <th>Date:</th>
                                    <td><?php echo $property->pricing_date;?></td>
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
                              <?php if($user_session->id==$property->agent OR $user_session->struc==1): ?>
                                <tr>
                                  <th>Owner:</th>
                                  <td><?php echo $property->owner_number; ?></td>
                                </tr>
                              <?php endif; ?>
                                <tr>
                                  <th>Agent:</th>
                                  <td>
                                    <span class="capital">
                                        <?php 
                                            $agent = User::find_by_id($property->agent);
                                            echo $agent->first_name.' '.$agent->last_name;
                                        ?>
                                    </span>
                                  </td>
                                </tr>
                                
                                <tr>
                                  <th>Listed By:</th>
                                  <td class="capital">
                                    <?php 
                                        $lister = User::find_by_id($property->listed_by);
                                        echo $lister->first_name." ".$lister->last_name; 
                                    ?>
                                </td>
                                </tr>
                                <tr>
                                  <th>Listed Date:</th>
                                  <td><?php echo $property->listed_date; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <strong>Controls</strong>
                            </div>
                            <div class="panel-body">
                            <?php if($user_session->id==$property->agent OR $user_session->struc==1 OR $user_session->struc==2): ?>
                              <a href="property_edit.php?id=<?php echo $id; ?>"><button class="btn btn-sm btn-primary">Edit</button></a>
                            <?php endif; ?>
                              <button class="btn btn-sm btn-default">Print</button>
                            </div>
                          </div>
                            
                            
                          </div><!--end col md 4-->
                            <!--  -->

                            </div>
  
                        </div>

                    </div>
                    <!-- /.row -->

                    

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw&libraries=places"></script>
<script src="js/maps_detail.js"></script>
<?php include ("include/footer.php"); ?>