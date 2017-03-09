// JavaScript Document
//var jq = jQuery.noConflict();
$(function() {	
	$('#slide_gl').carouFredSel({
		width: '100%',
		direction   : "left",
		prev: '#prev_2',
		next: '#next_2',
		scroll : {
			items			: 1,
			duration        : 600,
			effect			: 'easeOutBounce',
			pauseOnHover	: true
		},
	});	
			
});
