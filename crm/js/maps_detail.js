function getid($e){
	return document.getElementById($e);
}

var map;
var marker;

initialize();

function initialize(){
  var myLat = getid('lat').value;
  var myLng = getid('lng').value;
  if(myLat<=0){
  	myLat = 11.5520558;
  	myLng = 104.9233717;
  }
	var myLatlng = new google.maps.LatLng(myLat,myLng);
	var option = {
					zoom: 15,
					center: myLatlng,
					maxZoom: 22,
					minZoom: 8,
					mapTypeId: google.maps.MapTypeId.HYBRID,
					scrollwheel: false,
					fullscreenControl: true,
					disableDoubleClickZoom: true,
					scaleControl: true,
	};

	map = new google.maps.Map(getid('maps'), option);
	
  marker = new google.maps.Marker({
    map:map,
    position: myLatlng,
    draggable: false,
    icon: 'icons/house.png'
  });

  google.maps.event.addListener(marker, 'dblclick', function(event){
  	map.setZoom(18);
  	var latLng = marker.getPosition(); // returns LatLng object
	map.setCenter(latLng); 
  });
  
}