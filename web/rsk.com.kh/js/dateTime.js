// JavaScript Document

function showDate(){
	var days = new Array("អាទិត្យ","ចន្ទ","អង្គារ","ពុធ","ព្រហស្បតិ៍","សុក្រ","សៅរ៍")
	var currentTime = new Date();
	var dayofweek = currentTime.getDay();
	var month = currentTime.getMonth() + 1;
	var month_name = new Array("ធ្នូ","មករា","កុម្ភះ","មីនា","មេសា","ឧសភា","មិថុនា","កក្កដា","សីហា","កញ្ញា","តុលា",
							"វិច្ឆិកា");
	var day = currentTime.getDate();
	var year = currentTime.getFullYear();
	document.write("ថ្ងៃ"+ days[dayofweek] + "  ទី" + day + "  ខែ"+ month_name[month] + "  ឆ្មាំ" + year +"<br/>");
	//document.write(dayofweek+"-"+month+"-"+year);
}
	

