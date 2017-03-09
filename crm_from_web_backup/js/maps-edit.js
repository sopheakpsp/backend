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

	var myLatlng = new google.maps.LatLng(myLat, myLng);
	var option = {
					zoom: 15,
					center: myLatlng,
					maxZoom: 22,
					minZoom: 8,
					mapTypeId: google.maps.MapTypeId.HYBRID,
					scrollwheel: true,
					fullscreenControl: true,
					disableDoubleClickZoom: true,
					scaleControl: true,
	};

	map = new google.maps.Map(getid('maps'), option);

  marker = new google.maps.Marker({
    map:map,
    position: myLatlng,
    draggable: true,
    icon: 'icons/house.png'
  });

  // Add Marker Drag Event
	google.maps.event.addDomListener(marker, 'drag', function(event){
		var lat = event.latLng.lat();
	    var lng = event.latLng.lng();

		getid('lat').value = lat;
		getid('lng').value = lng;
	});

	google.maps.event.addListener(map, 'dblclick', function(event){
  	var latLng = event.latLng; // returns LatLng object
	map.setCenter(latLng); 
	map.setZoom(16);
  });

}