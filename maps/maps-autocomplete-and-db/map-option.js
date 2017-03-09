var map;
var geocoder;

function _($e){
	return document.getElementById($e);
}

initialise();

function initialise(){
	var myLatLng = new google.maps.LatLng(11.5520558,104.9233717);
	var option = {
					zoom: 8,
					center: myLatLng,
					mapTypeId: google.maps.MapTypeId.HYBRID
				};
	map = new google.maps.Map(_('myMap'), option);
	geocoder = new google.maps.Geocoder();
}

$(document).ready(function() {
	$("#autocomplete").autocomplete({
		source:function(request, repsonse){
			geocoder.geocode({'address':request.term}, function(result){
				repsonse($.map(result, function(item){
					return{
						label:item.formatted_address,
						value:item.formatted_address,
						latitude:item.geometry.location.lat(),
						longitude:item.geometry.location.lng(),
					}
				}))
			})
		},
		select:function(event, ui){
			var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
			var marker = new google.maps.Marker({
				map:map,
				draggable: true
			});
			marker.setPosition(location);
			map.setCenter(location);

			var string = 'lat: <input type="text" name="lat[]" value="'+ui.item.latitude+'"> lng: <input type="text" name="lng[]" value="'+ui.item.longitude+'"<br>';
			$('#maps-data').append(string);
		}
	});

	google.maps.event.addListener(map, 'rightclick', function(event) {
		alert('lnglng');
	});

	google.maps.event.addListener(map, 'click', function( event ){
	  //alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
	  //alert(event.latLng);
	  var marker = new google.maps.Marker({
	  	map:map,
	  	draggable: true
	  });
	  marker.setPosition(event.latLng);
	});
});
