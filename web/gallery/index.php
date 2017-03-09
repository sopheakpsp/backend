<?php require_once("admin/include/init.php") ?> 
<?php require_once("header.php"); ?>

<?php 
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $item_per_page = 4;
    $item_total = Photo::count_all();

    $paginate = new Paginate($page, $item_per_page, $item_total);
    $sql = "SELECT * FROM photo_tb LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
    $photos = Photo::find_this_query($sql);

 ?>


 

    <!-- Navigation -->
    <?php require_once("menu.php"); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
    
            <!-- Preview Image -->
                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">Thumbnail Gallery</h1>
                    </div>

                    <?php foreach ($photos as $photo) : ; ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                            <img class="img-responsive" src="admin/<?php echo $photo->photo_path();?>" alt="">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
               
                <div class="row">
                    <ul class="pagination">

                        <?php if($paginate->amount_page() > 1):?>
                            <?php if($paginate->has_previous()): ?>
                            <li class="previous"><a href="index.php?page=<?php echo $paginate->previous();?>">Previous</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php 
                            for ($i=1; $i <= $paginate->amount_page(); $i++) { 
                                if($i == $paginate->current_page){
                                    echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                }
                                else{
                                    echo "<li class=''><a href='index.php?page={$i}'>{$i}</a></li>";
                                }
                            }
                         ?>

                        

                        <?php if($paginate->amount_page() > 1):?>
                            <?php if($paginate->has_next()): ?>
                            <li class="next"><a href="index.php?page=<?php echo $paginate->next();?>">Next</a></li>
                            <?php endif; ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>
	

<?php require_once("footer.php") ?>