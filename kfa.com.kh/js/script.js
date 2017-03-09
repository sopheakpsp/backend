$(document).ready(function(){
	var agentOffset = $("#agency").offset().top;
	
	$("#agency").wrap('<div class="agent-placeholder"></div>');
	$(".agent-placeholder").height($("#agency").outerHeight());

	$(window).scroll(function(){
		var scrollPos = $(window).scrollTop();

		$(".status").html(scrollPos);
		if(scrollPos >= agentOffset){
			$("#agency").addClass("fixed");
		}
		else{
			$("#agency").removeClass("fixed");
		}
	});
});