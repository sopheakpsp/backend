<?php 
        $as = array(1, 2, 3, 4, 5, 6);
        $i=0;
        foreach ($as as $a): ?>   
         <div>hello</div> <?php echo $a ?>
    <?php   
        if (++$i == 3) break; 
        endforeach; 
    ?>