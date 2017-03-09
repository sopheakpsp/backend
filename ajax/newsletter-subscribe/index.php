<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Newsletter Subscribe</title>
	<link href="https://maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<div class="row">
        <div class="span12">
    		<div class="thumbnail center well well-small text-center">
                <h2>Newsletter</h2>
                
                <p>Subscribe to our weekly Newsletter and stay tuned.</p>
                
                <form id="subscribe-form">
                	<div class="">
                        <input type="text" id="name" name="name" placeholder="Your name" data-validation="required">
                    </div>
                    <div class="">
                        <input type="text" id="email" name="email" placeholder="your@email.com" data-validation="email">
                    </div>
                    <br />
                    <button type="submit" class="btn btn-large">Subscribe Now!</button>
              	</form>
              	<div id="form-result"></div>
            </div>    
        </div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.19/jquery.form-validator.min.js"></script>

<script>
  $.validate({
  	form: '#subscribe-form',
	onSuccess : function($form) {
  	$.post("script.php", 
  		{
  			name: $('#name').val(),
  			email: $('#email').val()
  		}, 
  		function(data, status){
  			$('#form-result').html(data);
  		});

  	return false; // Will stop the submission of the form
    },
  });
</script>
</body>
</html>