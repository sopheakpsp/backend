<form id="searchbox" action="search.php" method="post">
    <input id="search"  name="search_txt" type="text" value="ស្វែងរកអតិថិជន រឺបុគ្គលិក"
                    onfocus="if(this.value=='ស្វែងរកអតិថិជន រឺបុគ្គលិក'){this.value='';this.style.color='black';}"
                    onblur="if(this.value==''){this.value='ស្វែងរកអតិថិជន រឺបុគ្គលិក';this.style.color='#999'; this.style.fontStyle='italic';}" 
                    onkeypress="this.style.color='Black'; this.style.fontStyle='normal'" align="center">
    <input id="submit" name="search_btn" type="submit" value=" ">
 </form>
  <?php 
 	
	
	
	
	
	
	if(isset($_POST['search_btn']) && $_POST['search_btn']==" "){
		$find = $_POST['search_txt'];
		header("location:search.php?find=$find");
	}
 ?>
 
