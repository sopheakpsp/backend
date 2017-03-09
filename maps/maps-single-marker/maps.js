function getid($e){
	return document.getElementById($e);
}

function updatetext($value){
	if(getid('marker-info')!==null){
		getid('marker-info').innerHTML = $value.value;
	}
}

var map;
var marker;

initialize();

function initialize(){
	var myLatlng = new google.maps.LatLng(11.5520558,104.9233717);
	var option = {
					zoom: 13,
					center: myLatlng,
					maxZoom: 20,
					minZoom: 8,
					mapTypeId: google.maps.MapTypeId.HYBRID,
					scrollwheel: true,
					fullscreenControl: true,
					disableDoubleClickZoom: true,
					scaleControl: true,
	};

	map = new google.maps.Map(getid('maps'), option);
}

// Add Marker Event
google.maps.event.addListenerOnce(map, 'rightclick', function(event){
	addMarker(event.latLng, '../icons/maps.png', true, true);
});

// Add Marker Function
function addMarker(latlng, icon, dragging, showinfo){
	var marker = new google.maps.Marker({
		position: latlng,
		map:map,
		draggable: dragging,
		icon: icon,
		animation: google.maps.Animation.DROP
	});

	

	content = '<div class="marker-form"><div class="head" id="marker-header">Subject Property</div><textarea id="marker-info">'+getid('info-text').value+'</textarea></div>'
	var info = new google.maps.InfoWindow();
	info.setContent(content);
	if(showinfo){
		info.open(map, marker);
	}

	// Add Click Event to Marker
	google.maps.event.addListener(marker, 'click', function(){
		info.open(map, marker);
	});

	var lat = latlng.lat();
    var lng = latlng.lng();

	getid('lat').innerHTML = lat;
	getid('lng').innerHTML = lng;

	// Add Marker Drag Event
	google.maps.event.addDomListener(marker, 'drag', function(event){
		var lat = event.latLng.lat();
	    var lng = event.latLng.lng();

		getid('lat').innerHTML = lat;
		getid('lng').innerHTML = lng;
	});
}