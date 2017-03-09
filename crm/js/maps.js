function getid($e){
	return document.getElementById($e);
}

// function updatetext($value){
// 	if(getid('marker-info')!==null){
// 		getid('marker-info').innerHTML = $value.value;
// 	}
// }

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
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_CENTER
          },
	};

	map = new google.maps.Map(getid('maps'), option);

	// Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
	// #End Search Box
var plus = 0;
var level = 14 + plus;
  google.maps.event.addListener(map, 'dblclick', function(event){
    
    map.setZoom(level);
    var dblLatlng = event.getPosition();
    map.setCenter(dblLatlng);
    plus = 2;
  })
}

// Add Marker Event
google.maps.event.addListenerOnce(map, 'rightclick', function(event){
	addMarker(event.latLng, 'icons/maps.png', true, true);
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

	map.panTo(marker.getPosition());

	content = '<div class="marker-form"><div class="head" id="marker-header">Subject Property</div><div id="marker-info"></div></div>'
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

	getid('lat').value = lat;
	getid('lng').value = lng;

	// Add Marker Drag Event
	google.maps.event.addDomListener(marker, 'drag', function(event){
		var lat = event.latLng.lat();
	  var lng = event.latLng.lng();

		getid('lat').value = lat;
		getid('lng').value = lng;
	});
}

if(getid('lat').value>0){
    var getLatlng = new google.maps.LatLng(parseFloat(getid('lat').value),parseFloat(getid('lng').value));
    
    console.log(getLatlng);

    addMarker(getLatlng, 'icons/maps.png', true, true);
  }