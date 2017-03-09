<form action="" method="post" enctype="multipart/form-data">
<input type="file" multiple="multiple" name="file[]" enctype="multipart/form-data"/>
<input type="submit" name="submit">
</form>

<?php 
if (isset($_POST['submit'])) {
    //reorganize($_FILES['file']);
    var_dump($_FILES['file']);
}

function reorganize($files) {
    foreach ($files as $var => $params) {
        foreach ($params as $name => $i) {
            foreach ($i as $num => $val) {
                $images[$var][$name] = $val;
                $arr[$num] = $images;
            }
        }
    }
    return $arr;
}


 ?>