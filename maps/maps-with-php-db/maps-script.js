function getid($e){
	return document.getElementById($e);
}

$(document).ready(function() {

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
	

	// rightclick add marker
	google.maps.event.addListener(map, 'rightclick', function(event){
		createMarker(event.latLng, true, true, true,'icons/maps.png');
	});

	function createMarker(latlng, draggable, infoOpen, removable, icon){
	
	var marker = new google.maps.Marker({
		animation: google.maps.Animation.DROP,
		map: map,
		position: latlng,
		draggable: draggable,
		icon: icon
	});
	
	var markerInfo = $('<div class="marker-form">'+
					   '<div class="head">Subject Property</div>'+
					   '<textarea></textarea>'+
					   '<a href="#" class="remove-marker">Remove</a></div>');
	var inforWindow = new google.maps.InfoWindow();
	inforWindow.setContent(markerInfo[0]);

		// click event to Marker ====================================
		google.maps.event.addDomListener(marker, 'click', function(){
			inforWindow.open(map, marker);
		});

		// check if infoOpen = true ================================
		if(infoOpen){ //whether info window should be open by default
			inforWindow.open(map, marker);
		}

		var removeBtn = markerInfo.find('.remove-marker')[0];

		google.maps.event.addDomListener(removeBtn, 'click', function(event){
			removeMarker(marker);
		});
	}

	// REMOVE MATKER FUNCTION
	function removeMarker(marker){
		if(marker.getDraggable()){
			marker.setMap(null);
		}
	}


	// get your location button
	function addYourLocationButton(map, marker) {
	    var controlDiv = document.createElement('div');

	    var firstChild = document.createElement('button');
	    firstChild.style.backgroundColor = '#fff';
	    firstChild.style.border = 'none';
	    firstChild.style.outline = 'none';
	    firstChild.style.width = '28px';
	    firstChild.style.height = '28px';
	    firstChild.style.borderRadius = '2px';
	    firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
	    firstChild.style.cursor = 'pointer';
	    firstChild.style.marginRight = '10px';
	    firstChild.style.padding = '0px';
	    firstChild.title = 'Your Location';
	    controlDiv.appendChild(firstChild);

	    var secondChild = document.createElement('div');
	    secondChild.style.margin = '5px';
	    secondChild.style.width = '18px';
	    secondChild.style.height = '18px';
	    secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
	    secondChild.style.backgroundSize = '180px 18px';
	    secondChild.style.backgroundPosition = '0px 0px';
	    secondChild.style.backgroundRepeat = 'no-repeat';
	    secondChild.id = 'you_location_img';
	    firstChild.appendChild(secondChild);

	    google.maps.event.addListener(map, 'dragend', function() {
	        $('#you_location_img').css('background-position', '0px 0px');
	    });

	    firstChild.addEventListener('click', function() {
	        var imgX = '0';
	        var animationInterval = setInterval(function(){
	            if(imgX == '-18') imgX = '0';
	            else imgX = '-18';
	            $('#you_location_img').css('background-position', imgX+'px 0px');
	        }, 500);
	        if(navigator.geolocation) {
	            navigator.geolocation.getCurrentPosition(function(position) {
	                var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	                marker.setPosition(latlng);
	                map.setCenter(latlng);
	                map.setZoom(17);
	                clearInterval(animationInterval);
	                $('#you_location_img').css('background-position', '-144px 0px');
	            });
	        }
	        else{
	            clearInterval(animationInterval);
	            $('#you_location_img').css('background-position', '0px 0px');
	        }
	    });

	    controlDiv.index = 1;
	    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
	}

	var myMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        icon: 'icons/currentlocation.png'
    });
    addYourLocationButton(map, myMarker);
    //# end get your location button

});