$(document).ready(function() {

	// var mapCenter = new google.maps.LatLng(47.6145, -122.3418); //Google map Coordinates
	var map;
	
	map_initialize(); // initialize google map
	
	//############### Google Map Initialize ##############
	function map_initialize()
	{
			var googleMapOptions = 
			{ 
				// center: mapCenter, // map center
				zoom: 12, //zoom level, 0 = earth view to higher value
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL //zoom control size
				},
				scaleControl: true, // enable scale control
				//mapTypeId: google.maps.MapTypeId.HYBRID // google map type
				mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
			};

		   	map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);	

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

		   	// Try HTML5 geolocation. get current location

	        if (navigator.geolocation) {
	          navigator.geolocation.getCurrentPosition(function(position) {
	            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            };
	            map.setCenter(pos);
	          }, function() {
	            handleLocationError(true, map.getCenter());
	          });
	        } else {
	          // Browser doesn't support Geolocation
	          handleLocationError(false, map.getCenter());
	        }

	        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	        infoWindow.setPosition(pos);
	        infoWindow.setContent(browserHasGeolocation ?
	                              'Error: The Geolocation service failed.' :
	                              'Error: Your browser doesn\'t support geolocation.');
	      	}				
			
			// Load Markers from the XML File, Check (map_process.php)
			$.get("include/map_process.php", function (data) {
				$(data).find("marker").each(function () {
					  var name 		= $(this).attr('name');
					  var address 	= '<p>'+ $(this).attr('address') +'</p>';
					  var type 		= $(this).attr('type');
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
					  create_marker(point, name, address, false, false, false, "icons/house.png");
				});
			});	
			
			//Right Click to Drop a New Marker
			google.maps.event.addListener(map, 'rightclick', function(event) {
				//Edit form to be displayed with new marker
				var EditForm = '<p><div class="marker-edit">'+
				'<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">'+
				'<label for="pName"><span>Place Name :</span><input type="text" name="pName" class="save-name" placeholder="Enter Title" maxlength="40" /></label>'+
				'<label for="pDesc"><span>Description :</span><textarea name="pDesc" class="save-desc" placeholder="Enter Address"></textarea></label>'+
				'<input type="text" name="pType" class="save-type" value="listing" hidden>'+
				'<input type="text" name="pRefId" class="save-ref-id value="" hidden>'+
				'</form>'+
				'</div></p><button name="save-marker" class="save-marker">Save Marker</button>';

				//Drop a new Marker with our Edit Form
				create_marker(event.latLng, 'New Marker', EditForm, true, true, true, "icons/information.png");
			});
										
	}


	
	//############### Create Marker Function ##############
	function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			draggable:DragAble,
			animation: google.maps.Animation.DROP,
			//title:"Hello World!",
			icon: iconPath
		});
		
		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win">'+
		'<div class="marker-inner-win"><span class="info-content">'+
		'<h1 class="marker-heading">'+MapTitle+'</h1>'+
		MapDesc+ 
		'</span><button name="remove-marker" class="remove-marker" title="Remove Marker">Remove Marker</button>'+
		'</div></div>');	

		
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
		//set the content of infoWindow
		infowindow.setContent(contentString[0]);

		//Find remove button in infoWindow
		var removeBtn 	= contentString.find('button.remove-marker')[0];
		var saveBtn 	= contentString.find('button.save-marker')[0];

		//add click listner to remove marker button
		google.maps.event.addDomListener(removeBtn, "click", function(event) {
			remove_marker(marker);
		});
		
		if(typeof saveBtn !== 'undefined') //continue only when save button is present
		{
			//add click listner to save marker button
			google.maps.event.addDomListener(saveBtn, "click", function(event) {
				var mReplace = contentString.find('span.info-content'); //html to be replaced after success
				var mName = contentString.find('input.save-name')[0].value; //name input field value
				var mDesc  = contentString.find('textarea.save-desc')[0].value; //description input field value
				var mType = contentString.find('input.save-type')[0].value; //type of marker
				
				if(mName =='' || mDesc =='')
				{
					alert("Please enter Name and Description!");
				}else{
					save_marker(marker, mName, mDesc, mType, mReplace); //call save marker function
				}
			});
		}
		
		//add click listner to save marker button		 
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker); // click on marker opens info window 
	    });
		  
		if(InfoOpenDefault) //whether info window should be open by default
		{
		  infowindow.open(map,marker);
		}
	}
	
	//############### Remove Marker Function ##############
	function remove_marker(Marker)
	{
		
		/* determine whether marker is draggable 
		new markers are draggable and saved markers are fixed */
		if(Marker.getDraggable()) 
		{
			Marker.setMap(null); //just remove new marker
		}
		else
		{
			//Remove saved marker from DB and map using jQuery Ajax
			var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
			var myData = {del : 'true', latlang : mLatLang}; //post variables
			$.ajax({
			  type: "POST",
			  url: "include/map_process.php",
			  data: myData,
			  success:function(data){
					Marker.setMap(null); 
					alert(data);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError); //throw any errors
				}
			});
		}

	}
	
	//############### Save Marker Function ##############
	function save_marker(Marker, mName, mAddress, mType, replaceWin)
	{
		//Save new marker using jQuery Ajax
		var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
		var myData = {name : mName, address : mAddress, latlang : mLatLang, type : mType }; //post variables
		console.log(replaceWin);		
		$.ajax({
		  type: "POST",
		  url: "include/map_process.php",
		  data: myData,
		  success:function(data){
				replaceWin.html(data); //replace info window with new html
				Marker.setDraggable(false); //set marker to fixed
				Marker.setIcon('icons/house.png'); //replace icon
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
		});
	}

});

