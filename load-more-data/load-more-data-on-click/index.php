<!doctype html>

<html>
	<head>
		<title>Load more content on click with PHP AJAX JQUERY</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
       <div class="container" style="margin: 15px auto">
           <div class="row">
               <div class="col-md-6 col-md-offset-3 results"></div>
           </div>
           <div class="text-center">
               <button class="btn btn-default" id="loadmorebtn">
                   <img src="ajax-loader.gif" class="ani_image" style="float:left" alt="">
                   &nbsp; Load More
               </button>
           </div>
       </div>
       
       
       
       
       
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> <!--bootstrap js need jquery library-->
        <script type="text/javascript">
          var mypage = 1;
          myContent(mypage);
          $('#loadmorebtn').click(function(e) {
            mypage++;
            myContent(mypage);
          });
          function myContent(mypage){
            $('.ani_image').show();
            $.post('ajax_post_control.php', {page:mypage}, function(data){
              if(data.trim().length == 0){
                $('#loadmorebtn').text("hello").prop("disabled", true);
              }
              $('.results').append(data);
              $('html, body').animate({scrollTop: $("#loadmorebtn").offset().top}, 800);
              $('.ani_image').hide();
            });
          }
        </script>
	</body>
</html>