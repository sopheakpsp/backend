<form action="" method="get">
	<div>
      <label class="radio-inline"><input type="radio" name="optradio" value="1">Option 1</label>
      <label class="radio-inline"><input type="radio" name="optradio" value="2">Option 2</label>
      <label class="radio-inline"><input type="radio" name="optradio" value="3">Option 3</label>
    </div>
    <input type="submit" name="submit">
</form>

<?php 
if(isset($_GET['submit'])){
	echo $_GET['optradio'];
}

 ?>