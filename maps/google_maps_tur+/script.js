(function(window, mapster){
  //map option
  var options = mapster.MAP_OPTIONS,
  element = document.getElementById('map-canvas');
    
  //map
  map = new Mapster.create(element, options);
  map.zoom(11);

  var marker = map.addMarker({
  	lat: 11.5263987,
  	lng: 104.8221165,
  	content: 'I like money',
  	// draggable: true,
  	// visible: true,
  	// id: 1,
  	icon: "villa.png"
  });

  var marker2 = map.addMarker({
  	lat: 11.6263987,
  	lng: 104.8221165,
  	content: 'I like girl',
  	// draggable: true,
  	// visible: true,
  	// id: 1,
  	icon: "villa.png"
  });

  console.log(map.markers);

  // map._removeMarker(marker2);
  // console.log(map.markers);

  // var found = map.findMarkerByLat(11.6263987);
  // console.log(found);
  
}(window, window.Mapster || (window.Mapster = {})));

