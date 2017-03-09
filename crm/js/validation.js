$(function(){

	$.validator.setDefaults({
		errorClass: 'form_error',
		errorElement: 'div'
	});

	$("#validation-form").validate({
		errorLabelContainer: "#errorBox",
		rules:{
			title:{
				required: true
			},
			type: {
				required: true
			},
			category: {
				required: true
			},
			location: {
				required: true
			},
			price:{
				required: true
			},
			land_size:{
				required: true
			},
			agent: {
				required: true
			},
			file: {
				required: true
			}
		},
		submitHandler: function('#validation-form'){
			$('#validation-form').ajaxSubmit();
		}
	});
});